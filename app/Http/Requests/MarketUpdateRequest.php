<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'unor_id' => 'required',
            'name' => 'required',
            'address' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'unor_id' => 'unit kerja',
            'name' => 'nama pasar',
            'address' => 'alamat',
        ];
    }
}
