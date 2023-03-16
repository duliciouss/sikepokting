<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommodityStoreRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Models\Commodity;
use App\Models\Uom;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;


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
            return '<button type="button" class="btn btn-icon btn-outline-warning btn-sm btn-edit" id="btn-edit" data-url="commodities/' . $data->id . '" data-method="PUT" data-id="' . $data->id . '"> <i class="ti ti-edit"> </i> </button> <button type="button" class="btn btn-icon btn-outline-danger btn-sm btn-delete" id="btn-delete" data-id="' . $data->id .  '"> <i class="ti ti-trash"> </i> </button>';
        })->rawColumns(['aksi'])->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d F Y');
            return $formatedDate;
        })->addIndexColumn()->toJson();
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
