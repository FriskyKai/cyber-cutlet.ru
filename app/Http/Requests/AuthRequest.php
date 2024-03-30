<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:64',
            'lastName' => 'required|string|max:64',
            'birthDate' => 'required|date',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users|regex:/^\+7-\d{3}-\d{3}-\d{2}-\d{2}',
            'nickname' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
