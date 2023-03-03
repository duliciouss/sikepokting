<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        return view('stocks.index', compact('commodities'));
    }
}
