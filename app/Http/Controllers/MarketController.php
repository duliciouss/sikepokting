<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketStoreRequest;
use App\Http\Requests\MarketUpdateRequest;
use App\Models\Market;
use App\Models\Unor;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class MarketController extends Controller
{
    public function index()
    {
        $market = Market::oldest('name')->get();
        $unor = Unor::oldest('name')->get();
        return view('markets.index', compact('market', 'unor'));
    }

    public function json()
    {
        $markets = Market::with('unor')->oldest('name')->get();

        return DataTables::of($markets)->addColumn('aksi', function ($data) {
            return '<button type="button" class="btn btn-sm btn-warning btn-edit" id="btn-edit" data-url="markets/' . $data->id . '" data-method="PUT" data-id="' . $data->id . '"> Edit</button> <button type="button" class="btn btn-sm btn-danger btn-delete" id="btn-delete" data-id="' . $data->id .  '"> Hapus</button>';
        })->rawColumns(['aksi'])->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d F Y');
            return $formatedDate;
        })->toJson();
    }

    public function store(MarketStoreRequest $request)
    {
        try {
            $createMarket = Market::create([
                'name' => $request->name,
                'unor_id' => $request->unor_id,
                'address' => $request->address,
                'is_active' => 1,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => __('Data berhasil disimpan.'),
            'data' => $createMarket
        ]);
    }

    public function edit($id)
    {
        $market = Market::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diambil.'),
            'data' => $market
        ]);
    }

    public function update(MarketUpdateRequest $request, $id)
    {
        $market = Market::findOrFail($id);
        $market->update([
            'name' => $request->name,
            'unor_id' => $request->unor_id,
            'address' => $request->address,
        ]);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diubah.'),
        ]);
    }

    public function destroy($id)
    {
        $market = Market::findOrFail($id);
        $market->delete();
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil dihapus.'),
            'data' => $market
        ]);
    }
}
