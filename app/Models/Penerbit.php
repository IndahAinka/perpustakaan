<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penerbit extends Model
{
    use HasFactory;
    // use SoftDeletes;


    protected $guarded = ['id'];

    // public function buku()
    // {
    //     return $this->hasMany(Buku::class);
    // }

    public function bukus():HasMany
    {
        return $this->hasMany(Buku::class, 'penerbit_id', 'id');
    }

    public static function inputData($data)
    {
        $data_penerbit = Penerbit::create($data);
        return $data_penerbit;
    }

    public static function updateData($id, $data)
    {
        return Penerbit::find($id)->update($data);

    }

    public static function deleteData($id)
    {
        return Penerbit::destroy($id);
    }

    public static function selectData()
    {
        $data_penerbit = Penerbit::all();
        return $data_penerbit;
    }
}
