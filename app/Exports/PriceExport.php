<?php

namespace App\Exports;

use App\Models\Price;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PriceExport implements FromView
{
    public function view(): View
    {
        return view('prices.export');
    }
}
