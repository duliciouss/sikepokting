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
        $prices = Stock::all();
        $markets = Market::oldest('name')->get();
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        return view('stocks.index', compact('prices', 'markets', 'commodities'));
    }

    public function json()
    {
        $prices = Stock::with(['market', 'commodity'])->get();

        return DataTables::of($prices)->addColumn('aksi', function ($data) {
            $isDisabled = '';
            if ($data->status !== 0) {
                $isDisabled = 'disabled';
            }
            $monitoring = '';
            if (auth()->user()->role === 3) {
                $monitoring = 'd-none';
            }

            return '<button type="button" class="btn btn-sm btn-warning btn-edit ' . $monitoring . '" id="btn-edit" data-url="prices/' . $data->id . '" data-method="PUT" data-id="' . $data->id . '" ' . $isDisabled . '> Edit</button> <button type="button" class="btn btn-sm btn-danger btn-delete ' . $monitoring . '" id="btn-delete" data-id="' . $data->id . '" ' . $isDisabled . '> Hapus</button>';
        })->rawColumns(['aksi'])->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->date)->format('d F Y');
            return $formatedDate;
        })->editColumn('price', function ($data) {
            return $data->price . ' per ' . $data->uom;
        })->toJson();
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
