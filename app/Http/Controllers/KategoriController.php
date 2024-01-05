<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Http\Requests\KategoriStoreRequest;
use App\Http\Requests\KategoriUpdateRequest;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    protected $kategori;

    public function index()
    {
        // $data = Kategori::query()->with('bukus')->get()->toArray();
        // dd($data);
        $data['info'] = 'kategori';
        $data['page'] = 'kategori-data';
        $data['kategori'] = Kategori::selectData();


        // $kategori = ;
        // return view('contents.kategori.kategori-data',compact('info','page'));
        return view('contents.kategori.kategori-data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['info'] = 'kategori';
        $data['page'] = 'kategori-create';
        return view('contents.kategori.kategori-new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(KategoriStoreRequest $request): RedirectResponse
    {

        // $validateData = $request->validate();
        // dd($validateData);

        // $validateData = $request->safe()->only('kode','nama');


        $validateData = $request->except('_token');
        $validateData = Kategori::inputData($validateData);
        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori.index')->with($notification);

    }
    // public function store(Request $request)
    // {

    //     $validateData = $request->validate([
    //         'kode' => 'required|max:10|min:3|unique:kategoris',
    //         'nama' => 'required'
    //     ]);

    //     // dd('Berhasil');
    //     $validateData = $request->except('_token');
    //     $validateData = Kategori::inputData($validateData);
    //     $notification = array(
    //         'message' => 'Data Berhasil Ditambahkan',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('kategori.index')->with($notification);
    //     // return view('contents.kategori.kategori-data')->with($notification);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {


        $data['info'] = 'kategori';
        $data['page'] = 'kategori-edit';

        return view('contents.kategori.kategori-edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriUpdateRequest $request, string $id): RedirectResponse
    {


        $validateData['kode'] = $request->input('kode');
        $validateData['nama'] = $request->input('nama');


        Kategori::updateData($id, $validateData);

        $notification = array(
            'message' => 'Data Berhasil Diupdate',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori.index')->with($notification);
    }
    // public function update(Request $request, string $id)
    // {
    //     $validateData = $request->validate([
    //         'kode' => 'required|max:10|min:3',
    //         'nama' => 'required'
    //     ]);

    //     $validateData['kode'] = $request->input('kode');
    //     $validateData['nama'] = $request->input('nama');


    //     Kategori::updateData($id, $validateData);

    //     $notification = array(
    //         'message' => 'Data Berhasil Diupdate',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('kategori.index')->with($notification);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $id = $kategori['id'];


        // return response()->json(['success' => true]);

        // Kategori::deleteData($id);

        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('kategori.index')->with($notification);
    }
}
