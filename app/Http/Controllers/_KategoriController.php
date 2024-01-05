<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{


    public function data()
    {
        $info = 'kategori';
        $page = 'kategori-data';
        // $kategori = ;
        // return view('contents.kategori-data',compact('info','page'));
        return view('contents.kategori-data',['kategori'=>Kategori::all()],compact('page','info'));
    }

    public function new(Request $data)
    {

        $info = 'kategori';
        $page = 'kategori-new';
        return view('contents.kategori-new',compact('info','page'));
    }
}
