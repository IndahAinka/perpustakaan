<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenerbitRequest;
use App\Http\Requests\PenerbitStoreRequest;
use App\Models\Member;
use App\Models\Penerbit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['info'] = 'Penerbit';
        $data['page'] = 'Penerbit-data';
        $data['penerbit'] = Penerbit::selectData();
        // $Penerbit = ;
        // return view('contents.penerbit.Penerbit-data',compact('info','page'));
        return view('contents.penerbit.penerbit-data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['info'] = 'Penerbit';
        $data['page'] = 'Penerbit-create';
        return view('contents.penerbit.penerbit-new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenerbitStoreRequest $request): RedirectResponse
    {
        // $validateData = $request->validate();
        // $validateData = $request->safe()->only('kode','nama','alamat','telepon');

        $validateData = $request->except('_token');
        $validateData = Penerbit::inputData($validateData);
        // dd($data);

        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('penerbit.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $Penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $penerbit)
    {
        $data['info'] = 'Penerbit';
        $data['page'] = 'Penerbit-edit';

        return view('contents.penerbit.penerbit-edit', compact('data', 'penerbit'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        // dd('berhasil');
        $data['kode'] = $request->input('kode');
        $data['nama'] = $request->input('nama');
        $data['alamat'] = $request->input('alamat');
        $data['telepon'] = $request->input('telepon');

        Penerbit::updateData($id, $data);

        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('penerbit.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $penerbit)
    {
        $id = $penerbit['id'];
        Penerbit::deleteData($id);
        return redirect()->route('penerbit.index');
    }
}
