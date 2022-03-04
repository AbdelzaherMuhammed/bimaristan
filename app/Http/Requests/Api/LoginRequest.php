<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'device_token' => 'nullable'
        ];
    }

    public function authorize()
    {
        return true;
    }
}