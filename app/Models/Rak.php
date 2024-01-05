<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Stmt\Return_;

class Rak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function rak()
    // {
    //     return $this->hasMany(Buku::class);
    // }

    public function raks():HasMany
    {
        return $this->hasMany(Buku::class, 'rak_id', 'id');
    }

    public static function inputData($data)
    {
        $data_rak = Rak::create($data);
        return $data_rak;
    }

    public static function updateData($id, $data)
    {
        return Rak::find($id)->update($data);

    }

    public static function deleteData($id)
    {
        return Rak::destroy($id);
    }

    public static function selectData()
    {
        $data_rak = Rak::all();
        return $data_rak;
    }

}
