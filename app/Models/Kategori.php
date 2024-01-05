<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = ['kode','nama'];
    protected $guarded = ['id'];

    public function bukus():HasMany
    {
        return $this->hasMany(Buku::class, 'kategori_id', 'id');
    }


    public static function inputData($data)
    {
        $data_kategori = Kategori::create($data);
        return $data_kategori;
    }

    public static function updateData($id, $data)
    {
        // $id = Kategori::find('id');

        return Kategori::find($id)->update($data);

        // return $data_kategori;
    }

    public static function deleteData($id)
    {
        return Kategori::destroy($id);
    }

    public static function selectData()
    {
        $data_kategori = Kategori::query()
            ->with('bukus')
            ->withCount('bukus')
            ->get();
            // dd($data_kategori->toArray());
        return $data_kategori;
    }
}
