<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'order_no' => [
                'string',
                'required',
            ],
            'client_name' => [
                'string',
                'required',
            ],
            'client_phone' => [
                'string',
                'required',
            ],
            'shipping_address' => [
                'string',
                'required',
            ],
            'notes' => [
                'required',
            ],
            'total' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
