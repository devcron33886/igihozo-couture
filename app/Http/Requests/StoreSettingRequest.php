<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'mobile' => [
                'string',
                'required',
                'unique:settings',
            ],
            'whatsapp_number' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'required',
            ],
        ];
    }
}
