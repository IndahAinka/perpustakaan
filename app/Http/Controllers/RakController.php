<?php

namespace App\Http\Controllers;

use App\Http\Requests\RakRequest;
use App\Http\Requests\RakStoreRequest;
use App\Models\Rak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $rak;

    public function index()
    {
        $data['info'] = 'rak';
        $data['page'] = 'rak-data';
        $data['rak'] = Rak::selectData();
        // $rak = ;
        // return view('contents.rak.rak-data',compact('info','page'));
        return view('contents.rak.rak-data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['info'] = 'rak';
        $data['page'] = 'rak-create';
        return view('contents.rak.rak-new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RakStoreRequest $request): RedirectResponse
    {
        // $validateData = $request->validate();
        // $validateData = $request->safe()->only('kode','nama');

        $validateData = $request->except('_token');
        $validateData = Rak::inputData($validateData);
        // dd($data);

        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('rak.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rak $rak)
    {
        $data['info'] = 'rak';
        $data['page'] = 'rak-edit';

        return view('contents.rak.rak-edit', compact('data', 'rak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validateData = $request->validate([
            'kode' => 'required|min:3',
            'nama' => 'required|max:255'
        ]);

        $validateData['kode'] = $request->input('kode');
        $validateData['nama'] = $request->input('nama');
        Rak::updateData($id,$validateData);

        $notification = array(
            'message' => 'Data Berhasil Diupdate',
            'alert-type' => 'success'
        );

        return redirect()->route('rak.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rak $rak)
    {
        $id = $rak['id'];
        Rak::deleteData($id);
        return redirect()->route('rak.index');
    }
}
