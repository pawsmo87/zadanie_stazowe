<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Pole imię jest wymagane.',
        'surname.required' => 'Pole nazwisko jest wymagane.',
        'email.required' => 'Pole e-mail jest wymagane.',
        'email.email' => 'Pole e-mail musi być poprawnym adresem e-mail.',
        'phone.required' => 'Pole telefon jest wymagane.',
    ];
}
}
