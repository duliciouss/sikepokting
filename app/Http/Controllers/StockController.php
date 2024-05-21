<?php

namespace App\Http\Controllers;

// use App\Http\Requests\PriceStoreRequest;
// use App\Http\Requests\PriceUpdateRequest;
use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        $markets = Market::oldest('name')->get();
        $commodities = Commodity::with('uom')->oldest('name')->get();
        return view('stocks.index', compact('stocks', 'markets', 'commodities'));
    }

    public function json()
    {
        $stocks = Stock::with(['market', 'commodity'])->get();

        return DataTables::of($stocks)->addIndexColumn()->toJson();
    }

    public function store(Request $request)
    {
        $commodity = Commodity::findOrFail($request->commodity_id);
        // $date = Carbon::createFromFormat('d-m-Y', $request->date);
        $market_id = auth()->user()->market_id ?? $request->market_id;

        try {
            $createdPrice = Stock::create([
                'market_id' => $market_id,
                'commodity_id' => $request->commodity_id,
                'stock' => $request->stock,
                'date' => $request->date,
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
        $price = Stock::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diambil.'),
            'data' => $price
        ]);
    }

    public function update(Request $request, $id)
    {
        $price = Stock::findOrFail($id);
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
        $price = Stock::findOrFail($id);
        $price->delete();
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil dihapus.'),
            'data' => $price
        ]);
    }
}
