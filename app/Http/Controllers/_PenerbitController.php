<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerbitController extends Controller
{

    public function data()
    {
        $info = 'penerbitp';
        $page = 'penerbit-data';
        return view('contents.penerbit-data',compact('info','page'));
    }

    public function new()
    {
        $info = 'penerbitp';
        $page = 'penerbit-new';
        return view('contents.penerbit-new',compact('info','page'));
    }
}
