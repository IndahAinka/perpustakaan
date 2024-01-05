<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeminjamanStoreRequest;
use App\Models\Member;
use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['info'] = 'Peminjaman';
        $data['page'] = 'Peminjaman-data';
        $data['peminjaman'] = Peminjaman::selectData();

        return view('contents.peminjaman.peminjaman_data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member = new Member();
        $data['member'] = $member->selectData()->toArray();

        $buku = new Buku();
        $data['buku'] = $buku->selectData()->toArray();

        $data['info'] = 'Peminjaman';
        $data['page'] = 'Peminjaman-data';
        return view('contents.peminjaman.peminjaman_new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->except('_token');

        $buku = Buku::find($validateData['buku_id']);
        $buku->decrement('stok');

        $validateData['tanggal_pengemblaina'] = '';
        $validateData = Peminjaman::inputData($validateData);

        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('peminjaman.index')->with($notification);

    }




    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {


        $data['info'] = 'Peminjaman';
        $data['page'] = 'Peminjaman-detail';
        return view('contents.peminjaman.peminjaman_detail',compact('data','peminjaman'));
        // $buku = Buku::find($peminjaman->buku_id);
        // $peminjaman = Peminjaman::find($peminjaman->id);
        // $buku->increment('stok');
        // $request['tanggal_pengembalian']= now();

        // if ($buku) {
        //     $buku->increment('stok');

        //     $peminjaman->update(['tanggal_pengembalian' => now()]);

        //     return redirect()->back();
        // } else {
        //     return redirect()->back();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $member = new Member();
        $data['member']= $member->selectData()->toArray();

        $buku = new Buku();
        $data['buku']= $buku->selectData()->toArray();


        $data['info'] = 'Peminjaman';
        $data['page'] = 'Peminjaman-edit';
        return view('contents.peminjaman.peminjaman_edit', compact('data','peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validateData['id'] = $request->input('id');
        $validateData['member_id'] = $request->input('member_id');
        $validateData['buku_id'] = $request->input('buku_id');


        Peminjaman::updateData($id, $validateData);

        $notification = array(
            'message' => 'Data Berhasil Diupdate',
            'alert-type' => 'success'
        );

        return redirect()->route('peminjaman.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $id = $peminjaman['id'];


        // return response()->json(['success' => true]);

        Peminjaman::deleteData($id);

        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('peminjaman.index')->with($notification);
    }
}
