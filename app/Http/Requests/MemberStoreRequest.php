<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
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
            'username' => 'required|max:255|min:5',
            'password' => 'required|min:5|max:255',
            'nama' => 'required|min:3|max:255',
            'alamat' => 'required|min:5|max:255',
            'hp'=> 'required|min:10|max:13',
            'email' => 'required|email:dns'
        ];
    }

    public function messages()
    {
        return[
            'username.required'=>'Kolom username tidak boleh kosong',
            'username.min'=>'Kolom username minimal berisi 3 karakter',
            'username.max'=>'Kolom username tidak boleh melebih 255 karakter',
            'password.required'=>'Kolom password tidak boleh kosong',
            'password.min'=>'Kolom password minimal berisi 3 karakter',
            'password.max'=>'Kolom password melebihi batas maksimal password',
            'nama.required'=>'Kolom nama tidak boleh kosong',
            'alamat.required'=>'Kolom alamat tidak boleh kosong',
            'hp.required'=>'Kolom hp tidak boleh kosong',
            'email.required'=>'Kolom email tidak boleh kosong'
        ];
    }
}
