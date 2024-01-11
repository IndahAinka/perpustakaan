<?php

namespace App\Http\Requests;

use App\Models\Buku;
use Illuminate\Foundation\Http\FormRequest;

class PeminjamanStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'member_id' => 'required',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_peminjaman' => 'required|date|after_or_equal:now'
        ];
    }

    public function messages()
    {
        return [
            'member_id.required' => 'Kolom kode kategori tidak boleh kosong',
            'buku_id.required' => 'Kolom buku tidak boleh kosong',
            'buku_id.exists' => 'Buku tidak ditemukan atau stok tidak mencukupi untuk peminjaman.', // Pesan khusus untuk exists rule
            'tanggal_peminjaman.required' => 'kolom tanggal harus diisi',
            'tanggal_peminjaman.after_or_equal:now' => 'Tanggal peminjaman tidak boleh lebih awal dari hari ini',

        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $buku_id = $this->input('buku_id');

            // Use find method directly with the primary key
            $book = Buku::find($buku_id);

            // Cek apakah buku ditemukan
            if (!$book) {
                $validator->errors()->add('buku_id', 'Buku tidak ditemukan.');
                return;
            }

            // Cek apakah stok cukup untuk peminjaman
            if ($book->stok <= 0) {
                // Gunakan addFailure untuk menambahkan pesan kesalahan
                $validator->addFailure('buku_id', 'Stok buku tidak mencukupi untuk peminjaman.');
            }
        });
    }
}
