<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = ['kode','nama'];
    protected $guarded = ['id'];
    protected $nullable = ['tanggal_pengembalian'];

    // public function bukus():HasMany
    // {
    //     return $this->hasMany(Buku::class, 'kategori_id', 'id');
    // }

    public function bukus(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function members(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function pengembalian():HasOne
    {
        return $this->hasOne(Pengembalian::class);
    }


    public static function inputData($data)
    {
        $data_kategori = Peminjaman::create($data);
        return $data_kategori;
    }

    public static function updateData($id, $data)
    {
        // $id = Peminjaman::find('id');

        return Peminjaman::find($id)->update($data);

        // return $data_kategori;
    }

    public static function deleteData($id)
    {
        return Peminjaman::destroy($id);
    }

    public static function selectData()
    {
        $data_kategori = Peminjaman::query()
            ->with(['bukus','members'])
            ->get();
            // dd($data_kategori->toArray());
        return $data_kategori;
    }
}
