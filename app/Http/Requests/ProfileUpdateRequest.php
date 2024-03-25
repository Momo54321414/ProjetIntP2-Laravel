<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
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
            'email.lowercase' => __('Email_Lowercase'),
            'email.email' => __('Email_Invalid'),
            'email.max' => __('Email_Max'),
            'email.unique' => __('Email_Already_Exists'),
        ];
    }
}
