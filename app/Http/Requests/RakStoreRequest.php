<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RakStoreRequest extends FormRequest
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
            'kode' => 'required|min:3|unique:raks',
            'nama' => 'required|max:255'
            //
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kolom kode kategori tidak boleh kosong',
            'kode.unique' => 'Kode yang anda masukkan sudah digunakan',
            'kode.min' => 'Kode yang dimasukkan minimal 3 karakter',
            'nama.required' => 'Kolom nama tidak boleh kosong',
        ];
    }
}
