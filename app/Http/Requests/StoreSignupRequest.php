<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreSignupRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'email' => 'required|email:dns,spoof',
            'password' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()]
        ];
    }

    public function messages()
    {
        return [
            'name' => 'insira um nome válido',
            'email' => 'insira um endereço de e-mail válido',
            'password.min' => 'Sua senha precisa ter pelo menos :min caracteres.',
            'password.mixed_case' => 'Sua senha precisa conter pelo menos uma letra maiúscula e uma minúscula.', // Use 'password.mixed_case' as the key
            'password.numbers' => 'Sua senha precisa conter pelo menos um numero.',
            'password.symbols' => 'Sua senha precisa conter pelo menos um caracter especial.',
        ];
    }
}
