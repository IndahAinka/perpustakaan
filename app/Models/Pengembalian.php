<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengembalian extends Model
{
    use HasFactory;

    public function bukus():HasOne
    {
        return $this->hasOne(Peminjaman::class);
    }

    public static function inputData($data)
    {
        return Pengembalian::create($data);

    }

    public static function updateData($id, $data)
    {
        return Pengembalian::find($id)->update($data);

    }

    public static function deleteData($id)
    {
        return Pengembalian::destroy($id);
    }

    public static function selectData()
    {
        return Pengembalian::all();
    }

}


