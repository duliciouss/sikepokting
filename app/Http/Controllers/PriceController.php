<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceStoreRequest;
use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

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
        // dd('a');
        $prices = Price::with(['market', 'commodity'])->get();

        return DataTables::of($prices)->addColumn('aksi', function ($data) {
            return '<button type="button" class="btn btn-sm btn-warning btn-edit" data-id="' . $data->id . '"> Edit</button> <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="' . $data->id . '"> Hapus</button>';
        })->rawColumns(['aksi'])->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->date)->format('d F Y');
            return $formatedDate;
        })->editColumn('price', function ($data) {
            return $data->price . ' per ' . $data->uom;
        })->toJson();
        // dd($prices);
    }


    public function create()
    {
        # code...
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

    public function show($id)
    {
        # code...
    }

    public function edit($id)
    {
        # code...
    }

    public function update(Request $request, $id)
    {
        # code...
    }

    public function destroy($id)
    {
        //
    }
}
