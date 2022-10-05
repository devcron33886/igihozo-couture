<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
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
                'unique:settings,mobile,'.request()->route('setting')->id,
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
