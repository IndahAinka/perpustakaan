<?php

namespace App\Http\Requests;

use App\Models\Kategori;
use Illuminate\Foundation\Http\FormRequest;

class KategoriStoreRequest extends FormRequest
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

            'kode' => 'required|max:10|min:3|unique:kategoris',
            'nama' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kolom kode kategori tidak boleh kosong',
            'kode.unique' => 'Kode yang anda masukkan sudah digunakan',
            'nama.required' => 'Kolom nama tidak boleh kosong',
        ];
    }
}
