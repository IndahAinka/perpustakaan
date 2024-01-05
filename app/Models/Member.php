<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $nullable = ['status'];

    // public functioN peminjamen():HasMany
    // {
    //     return $this->hasMany(Peminjaman::class, 'member_id', 'id');
    // }
    public function peminjamen():HasMany
    {
        return $this->hasMany(Peminjaman::class, 'member_id', 'id');
    }

    public static function inputData($data)
    {
        $data_member = Member::create($data);
        return $data_member;
    }

    public static function updateData($id, $data)
    {
        return Member::find($id)->update($data);

    }

    public static function deleteData($id)
    {
        return Member::destroy($id);
    }

    public static function selectData()
    {
        $data_member = Member::all();
        return $data_member;
    }
}
