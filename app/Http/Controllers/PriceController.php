<?php

namespace App\Http\Controllers;

use App\Exports\PriceExport;
use App\Http\Requests\PriceStoreRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        $markets = Market::oldest('name')->get();
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        return view('prices.index', compact('prices', 'markets', 'commodities'));
    }

    public function json()
    {
        $prices = Price::with(['market', 'commodity'])->get();

        return DataTables::of($prices)->addColumn('aksi', function ($data) {
            $isDisabled = '';
            if ($data->status !== 0) {
                $isDisabled = 'disabled';
            }
            $monitoring = '';
            if (auth()->user()->role === 3) {
                $monitoring = 'd-none';
            }

            return '<button type="button" class="btn btn-icon btn-outline-warning btn-sm btn-edit ' . $monitoring . '" id="btn-edit" data-url="prices/' . $data->id . '" data-method="PUT" data-id="' . $data->id . '" ' . $isDisabled . '> <i class="ti ti-edit"> </i></button> <button type="button" class="btn btn-icon btn-outline-danger btn-sm btn-delete ' . $monitoring . '" id="btn-delete" data-id="' . $data->id . '" ' . $isDisabled . '> <i class="ti ti-trash"> </i> </button>';
        })->rawColumns(['aksi'])->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->date)->format('d F Y');
            return $formatedDate;
        })->editColumn('commodity.name', function ($data) {
            return $data->commodity->name . ' (' . $data->uom . ')';
        })->editColumn('price', function ($data) {
            return 'Rp. ' . number_format($data->price);
        })->addIndexColumn()->toJson();
    }

    public function store(PriceStoreRequest $request)
    {
        $commodity = Commodity::findOrFail($request->commodity_id);
        $uomName = $commodity->uom->name;
        $date = Carbon::createFromFormat('d-m-Y', $request->date);
        $market_id = auth()->user()->market_id ?? $request->market_id;

        try {
            $createdPrice = Price::create([
                'market_id' => $market_id,
                'commodity_id' => $request->commodity_id,
                'price' => $request->price,
                'uom' => $uomName,
                'date' => $date,
                'created_by' => auth()->user()->id,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => __('Data berhasil disimpan.'),
            'data' => $createdPrice
        ]);
    }

    public function edit($id)
    {
        $price = Price::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diambil.'),
            'data' => $price
        ]);
    }

    public function update(PriceUpdateRequest $request, $id)
    {
        $price = Price::findOrFail($id);
        $price->update([
            'price' => $request->price
        ]);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diubah.'),
        ]);
    }

    public function destroy($id)
    {
        $price = Price::findOrFail($id);
        $price->delete();
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil dihapus.'),
            'data' => $price
        ]);
    }

    public function export()
    {
        return Excel::download(new PriceExport, 'price-' . now() . '.xlsx');
    }
}
