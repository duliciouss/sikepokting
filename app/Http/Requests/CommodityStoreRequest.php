<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommodityStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'parent_commodity_id' => 'required',
            'name' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'parent_commodity_id' => 'kategori komoditas',
            'name' => 'nama komoditas',
        ];
    }
}
