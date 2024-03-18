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
            'name' => 'required|string|max:255|filled',
            'email' => 'required|string|max:255|email|unique:users|filled',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|filled|same:password',
        ];
    }

    public function messages(): array
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'en':
                return $this->getEnglishMessages();
            case 'fr':
                return $this->getFrenchMessages();
            default:
                return $this->getEnglishMessages();
        }
    }

    public function getEnglishMessages(): array
    {
        return [
            'name.required' => 'The name is required',
            'name.string' => 'The name must be a string',
            'name.max' => 'The name must not exceed 255 characters',
            'email.required' => 'The email is required',
            'email.string' => 'The email must be a string',
            'email.max' => 'The email must not exceed 255 characters',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'The email has already been taken',
            'password.required' => 'The password is required',
            'password.string' => 'The password must be a string',
            'password.min' => 'The password must be at least 8 characters',
            'password.confirmed' => 'The password confirmation does not match',
        ];
    }

    public function getFrenchMessages(): array
    {
        return [
            'name.required' => 'Le nom est requis',
            'name.string' => 'Le nom doit être une chaîne de caractères',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'email.required' => 'L\'adresse email est requise',
            'email.string' => 'L\'adresse email doit être une chaîne de caractères',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères',
            'email.email' => 'L\'adresse email doit être une adresse email valide',
            'email.unique' => 'L\'adresse email a déjà été prise',
            'password.required' => 'Le mot de passe est requis',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas',
        ];
    }
}
