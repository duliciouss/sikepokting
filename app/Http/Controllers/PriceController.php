<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceStoreRequest;
use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        $markets = Market::oldest('name')->get();
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        return view('prices.index', compact('prices', 'markets', 'commodities'));
    }

    public function store(PriceStoreRequest $request)
    {
        $commodity = Commodity::findOrFail($request->commodity_id);
        $uomName = $commodity->uom->name;

        try {
            $price = Price::create([
                'market_id' => $request->market_id,
                'commodity_id' => $request->commodity_id,
                'price' => $request->price,
                'uom' => $uomName,
                'date' => $request->date
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => __('Data berhasil disimpan.'),
            'data' => $price
        ]);
    }
}
