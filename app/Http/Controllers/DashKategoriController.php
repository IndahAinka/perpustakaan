<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'kategori-data';
        $info = 'kategori';
        return view('contents.kategori-data',['kategori'=>Kategori::all()],compact('page','info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'kategori-data';
        $info = 'kategori';
        return view('contents.kategori-new',['kategori'=>Kategori::all()],compact('page','info'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //Menampilkan data bedasarkan id
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
