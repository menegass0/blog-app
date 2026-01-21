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
            'email' => 'required|unique:users|email:dns,spoof',
            'slug' => 'required|unique:users|max:80|regex:/^[\w]+$/',
            'password' => ['required', 'string', 'confirmed', Password::min(8)->max(120)->mixedCase()->numbers()->symbols()]
        ];
    }

    public function messages()
    {
        return [
            'name' => 'insira um nome válido',
            'email' => 'insira um endereço de e-mail válido',
            'email.unique' => 'Esse endereço de e-mail já está cadastrado',
            'slug.required' => 'Por favor insira um nick de perfil',
            'slug.regex' => 'o nick de perfil nao pode conter caracteres especiais, apenas letras numeros e underline',
            'slug.unique' => 'Esse nick de perfil já está cadastrado',
            'slug.max' => 'Nick do perfil muito grande',
            'password.min' => 'Sua senha precisa ter pelo menos 8 caracteres.',
            'password.min' => 'Sua senha pode ter no maximo 120 caracteres.',
            'password.confirmed' => 'As senhas não são iguais.',
            'password.mixed_case' => 'Sua senha precisa conter pelo menos uma letra maiúscula e uma minúscula.', // Use 'password.mixed_case' as the key
            'password.numbers' => 'Sua senha precisa conter pelo menos um numero.',
            'password.symbols' => 'Sua senha precisa conter pelo menos um caracter especial.',
        ];
    }
}
