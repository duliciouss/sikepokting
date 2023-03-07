<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        return view('dashboard.default', compact('commodities'));
    }

    public function fullscreen()
    {
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        return view('dashboard.fullscreen', compact('commodities'));
    }
}
