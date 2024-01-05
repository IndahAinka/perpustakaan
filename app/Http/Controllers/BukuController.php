<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuStoreRequest;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['info'] = 'Buku';
        $data['page'] = 'buku-data';
        $data['buku'] = Buku::selectData();
        // dd($data['buku']->toArray());
        // $Buku = ;
        // return view('contents.buku.buku-data',compact('info','page'));
        return view('contents.buku.buku-data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = new Kategori();
        $data['kategori'] = $kategori->selectData()->toArray();

        $penerbit = new Penerbit();
        $data['penerbit'] = $penerbit->selectData()->toArray();

        $rak = new Rak();
        $data['rak'] = $rak->selectData()->toArray();

        $data['info'] = 'Buku';
        $data['page'] = 'buku-create';
        // $data['kategori'] = Kategori::i
        return view('contents.buku.buku-new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuStoreRequest $request):RedirectResponse
    {
        // dd('Berhasil');
        $validateData = $request->except('_token');
        $validateData = Buku::inputData($validateData);

        if($validateData){
            $notification = array(
                'message' => 'Data Berhasil Ditambahkan',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Data Berhasil Ditambahkan',
                'alert-type' => 'error');
        }


        return redirect()->route('buku.index')->with($notification  );
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $Buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = new Kategori();
        $data['kategori'] = $kategori->selectData()->toArray();

        $penerbit = new Penerbit();
        $data['penerbit'] = $penerbit->selectData()->toArray();

        $rak = new Rak();
        $data['rak'] = $rak->selectData()->toArray();

        $data['info'] = 'Buku';
        $data['page'] = 'buku-edit';

        return view('contents.buku.buku-edit', compact('data','buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'kategori_id' => '',
            'penerbit_id' => '',
            'rak_id' => '',
            'judul' => 'required',
            'pengarang' => 'required',
        ]);

        $validateData['kategori_id']= $request->input('kategori_id');
        $validateData['penerbit_id']= $request->input('penerbit_id');
        $validateData['rak_id']= $request->input('rak_id');
        $validateData['judul']= $request->input('judul');
        $validateData['pengarang']= $request->input('pengarang');


        Buku::updateData($id,$validateData);

        if($validateData){
            $notification = array(
                'message' => 'Data Berhasil Diupdate',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Data Gagal di update',
                'alert-type' => 'error');
        }

        return redirect()->route('buku.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $Buku)
    {
        $id = $Buku['id'];
        // Buku::deleteData($id);

        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('buku.index')->with($notification);
    }
}
