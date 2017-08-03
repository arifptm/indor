<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:31',
            'email' => 'required|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
            'password' => 'required|min:6',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'name.min' => 'Harus diisi antara 6-31 karekter.',
            'name.max' => 'Harus diisi antara 6-31 karekter.',
            'email.required'  => 'Kolom email harus diisi.',
            'email.regex' => 'Format email tidak valid',
            'password.required'  => 'Kolom password harus diisi.',
            'password.min'  => 'Minimal 6 karakter.',
            'confirm_password.same'  => 'Kolom ini harus sama dengan kolom password.',
        ];
    }
}