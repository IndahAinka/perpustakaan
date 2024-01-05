<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenerbitStoreRequest extends FormRequest
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
            'kode' => 'required|min:3|max:10|unique:penerbits',
            'nama' => 'required|max:255|min:3',
            'alamat' => 'required|min:5|max:255',
            'telepon' => 'required|min:10|max:13|regex:/^([0-9\s\-\+\(\)]*)$/|'
        ];
    }

    public function messages()
    {
        return[
            'kode.required' => 'Kolom kode kategori tidak boleh kosong',
            'kode.unique' => 'Kode yang anda masukkan sudah digunakan',
            'kode.min' => 'Kode yang anda minimal 3 karakter',
            'kode.max' => 'Kode yang anda maksimal 10 karakter',
            'nama.required' => 'Kolom nama tidak boleh kosong',
            'alamat.required' => 'Kolom alamat tidak boleh kosong',
            'telepon.required' => 'Kolom telepon tidak boleh kosong',
        ];
    }
}
