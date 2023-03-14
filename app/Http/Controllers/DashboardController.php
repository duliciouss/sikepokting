<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Market;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        $markets = Market::oldest('name')->get();
        return view('dashboard.default', compact('commodities', 'markets'));
    }

    public function fullscreen()
    {
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        $markets = Market::oldest('name')->get();
        return view('dashboard.fullscreen', compact('commodities', 'markets'));
    }
}
