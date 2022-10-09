<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'market_id' => 'required',
            'commodity_id' => 'required',
            'price' => 'required',
            'date' => 'required'
        ];
    }
}
