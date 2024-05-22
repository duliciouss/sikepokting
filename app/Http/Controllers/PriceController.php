<?php

namespace App\Http\Controllers;

use App\Exports\PricesExport;
use App\Http\Requests\PriceStoreRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        $markets = Market::oldest('name')->get();
        $commodities = Commodity::with('uom')->oldest('name')->get();
        return view('prices.index', compact('prices', 'markets', 'commodities'));
    }

    public function json()
    {
        $prices = Price::with(['market', 'commodity'])->get();
        return DataTables::of($prices)->addIndexColumn()->toJson();
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
        return Excel::download(new PricesExport, 'DAFTARHARGA' . now()->format('dmYHis') . '.xlsx');
    }
}
