<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreShippingTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipping_type_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
