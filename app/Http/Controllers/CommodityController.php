<?php

namespace App\Http\Controllers;

use App\Exports\PriceExport;
use App\Http\Requests\CommodityStoreRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use App\Models\Uom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;


class CommodityController extends Controller
{
    public function index()
    {
        $uom = Uom::oldest('name')->get();
        $parentCommodities = Commodity::with('uom')->where('type', 'GENERAL')->oldest('name')->get();
        return view('commodities.index', compact('parentCommodities', 'uom'));
    }

    public function json()
    {
        $commodities = Commodity::with(['parent', 'uom'])->where('type', 'DETAIL')->get();

        return DataTables::of($commodities)->addColumn('aksi', function ($data) {
            return '<button type="button" class="btn btn-sm btn-warning btn-edit" id="btn-edit" data-url="commodities/' . $data->id . '" data-method="PUT" data-id="' . $data->id . '"> Edit</button> <button type="button" class="btn btn-sm btn-danger btn-delete" id="btn-delete" data-id="' . $data->id .  '"> Hapus</button>';
        })->rawColumns(['aksi'])->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d F Y');
            return $formatedDate;
        })->toJson();
    }

    public function store(CommodityStoreRequest $request)
    {
        try {
            $createdCommodity = Commodity::create([
                'name' => $request->name,
                'uom_id' => $request->uom_id,
                'type' => 'DETAIL',
                'parent_id' => $request->parent_commodity_id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 100,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => __('Data berhasil disimpan.'),
            'data' => $createdCommodity
        ]);
    }

    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diambil.'),
            'data' => $commodity
        ]);
    }

    public function update(PriceUpdateRequest $request, $id)
    {
        $commodity = Commodity::findOrFail($id);
        $commodity->update([
            'name' => $request->name,
            'uom_id' => $request->uom_id,
            'parent_id' => $request->parent_commodity_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diubah.'),
        ]);
    }

    public function destroy($id)
    {
        $commodity = Commodity::findOrFail($id);
        $commodity->delete();
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil dihapus.'),
            'data' => $commodity
        ]);
    }
}
