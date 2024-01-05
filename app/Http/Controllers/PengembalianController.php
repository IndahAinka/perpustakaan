<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['info'] = 'Pengembalian';
        $data['page'] = 'Pengembalian-data';
        return view('contents.pengembalian.pengembalian_data',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['info'] = 'Pengembalian';
        $data['page'] = 'Pengembalian-create';

        // $pinjam = new Peminjaman();
        // $data['pinjam'] = $pinjam->selectData()->toArray();

        return view('contents.pengembalian.pengembalian_create',compact('data','pinjam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        // $request['is_late']= false;
        // $request = Pengembalian::inputData($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
