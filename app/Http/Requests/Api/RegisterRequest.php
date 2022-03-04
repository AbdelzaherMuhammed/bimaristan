<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required_without:phone|nullable|numeric|unique:students,phone',
            'email' => 'required_without:phone|nullable|email|unique:students,email',
            'university' => 'required|string',
            'college' => 'required|string',
            'college_level' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function authorize()
    {
        return true;
    }
}