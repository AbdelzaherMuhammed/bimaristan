<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pin_code' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ];
    }

    public function authorize()
    {
        return true;
    }
}