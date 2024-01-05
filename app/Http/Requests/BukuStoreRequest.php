<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuStoreRequest extends FormRequest
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
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'rak_id' => 'required',
            'stok' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kolom kategori tidak boleh kosong',
            'penerbit_id.required' => 'Kolom kategori tidak boleh kosong',
            'rak_id.required' => 'Kolom rak tidak boleh kosong',
            'stok.required' => 'Kolom stok tidak boleh kosong',
            'judul.required' => 'Kolom judul tidak boleh kosong',
            'pengarang.required' => 'Kolom pengarang tidak boleh kosong',
        ];
    }
}
