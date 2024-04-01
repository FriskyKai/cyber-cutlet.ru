<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:64',
            'lastName' => 'required|string|max:64',
            'birthDate' => 'required|date',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users|regex:/^8-\d{3}-\d{3}-\d{2}-\d{2}$/',
            'nickname' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ];
    }
}
