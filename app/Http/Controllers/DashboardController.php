<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Market;
use App\Models\Price;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->input('date') ?? now());
        session()->put('market_id', $request->input('market_id'));
        session()->put('commodity_id', $request->input('commodity_id'));
        session()->put('date', $request->input('date'));

        $commodities = Commodity::with('uom')->oldest('name')->get();
        $markets = Market::oldest('name')->get();
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'superadmin');
        })->get();
        $marketUsers = User::whereHas('roles', function ($query) {
            $query->where('name', 'pasar');
        })->get();
        $prices = Price::whereDate('date', $date)->with('commodity')->get();
        return view('dashboard.default', compact('commodities', 'markets', 'marketUsers', 'users', 'prices'));
    }

    public function fullscreen()
    {
        $commodities = Commodity::with('uom')->where('type', 'DETAIL')->oldest('name')->get();
        $markets = Market::oldest('name')->get();
        return view('dashboard.fullscreen', compact('commodities', 'markets'));
    }

    public function getChartData()
    {
        $prices = Price::select('date', 'price', 'commodity_id')->orderBy('date')->get();

        $formattedData = [];

        foreach ($prices as $price) {
            $date = Carbon::parse($price->date)->format('Y-m-d');
            $commodityId = $price->commodity_id;

            if (!isset($formattedData[$date])) {
                $formattedData[$date] = [];
            }

            if (!isset($formattedData[$date][$commodityId])) {
                $formattedData[$date][$commodityId] = 0;
            }

            $formattedData[$date][$commodityId] += $price->price;
        }

        $labels = array_keys($formattedData);
        $datasets = [];

        foreach ($formattedData as $date => $prices) {
            foreach ($prices as $commodityId => $price) {
                if (!isset($datasets[$commodityId])) {
                    $datasets[$commodityId] = [
                        'label' => 'Komoditas ' . $commodityId,
                        'data' => [],
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgba(75, 192, 192, 1)',
                        'borderWidth' => 1,
                    ];
                }

                $datasets[$commodityId]['data'][] = $price;
            }
        }

        return response()->json([
            'labels' => $labels,
            'datasets' => array_values($datasets),
        ]);
    }
}
