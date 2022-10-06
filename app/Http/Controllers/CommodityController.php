<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Uom;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    public function index()
    {
        $detailCommodities = Commodity::where('type', 'DETAIL')->with('uom', 'parent')->oldest('name')->get();
        $generalCommodities = Commodity::where('type', 'GENERAL')->with('uom')->oldest('name')->get();
        $uoms = Uom::oldest('name')->get();

        return view('commodities.index', compact('generalCommodities', 'detailCommodities', 'uoms'));
    }
}
