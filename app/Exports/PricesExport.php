<?php

namespace App\Exports;

use App\Models\Price;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PricesExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $prices = Price::all();
        return view('prices.export', compact('prices'));
    }
}
