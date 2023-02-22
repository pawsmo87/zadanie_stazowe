<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole "Imię i nazwisko" jest wymagane.',
            'name.max' => 'Pole "Imię i nazwisko" może zawierać maksymalnie :max znaków.',
            'email.required' => 'Pole "E-mail" jest wymagane.',
            'email.email' => 'Pole "E-mail" musi być adresem e-mail.',
            'email.unique' => 'Podany adres e-mail jest już w użyciu.',
            'password.required' => 'Pole "Hasło" jest wymagane.',
            'password.min' => 'Pole "Hasło" musi zawierać co najmniej :min znaków.',
            'password.confirmed' => 'Pole "Potwierdź hasło" nie zgadza się z polem "Hasło".',
        ];
    }
}