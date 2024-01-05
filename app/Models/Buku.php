<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['kategori','penerbit','rak'];


    public function peminjamen():HasMany
    {
        return $this->hasMany(Peminjaman::class, 'buku_id', 'id');
    }

    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }


    public function penerbits(): BelongsTo
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }



    public function raks(): BelongsTo
    {
        return $this->belongsTo(Rak::class, 'rak_id', 'id');
    }

    public static function inputData($data)
    {
        return Buku::create($data);
        // return $data_buku;
    }

    public static function updateData($id, $data)
    {
        return Buku::find($id)->update($data);
    }

    public static function deleteData($id)
    {
        return Buku::destroy($id);
    }

    public static function selectData()
    {
        $data_buku = Buku::query()
            ->with(['kategoris', 'penerbits', 'raks'])->get();

        return $data_buku;
    }
}
