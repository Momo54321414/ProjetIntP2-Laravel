<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Name_Required'),
            'name.string' => __('Name_String'),
            'name.max' => __('Name_Max'),
            'email.required' => __('Email_Required'),
            'email.string' => __('Email_String'),
            'email.email' => __('Email_Invalid'),
            'email.max' => __('Email_Max'),
            'email.unique' => __('Email_Already_Exists'),
            'password.required' => __('Password_Required'),
            'password.string' => __('Password_String'),
            'password.min' => __('Password_Min'),
            'password.confirmed' => __('Password_Confirmed'),
        ];
    }
   
}
