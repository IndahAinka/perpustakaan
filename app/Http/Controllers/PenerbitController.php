<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenerbitRequest;
use App\Http\Requests\PenerbitStoreRequest;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Penerbit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $penerbit;


    public function index()
    {
        $data['info'] = 'Penerbit';
        $data['page'] = 'Penerbit-data';
        $data['penerbit'] = Penerbit::selectData();
        // return view('contents.penerbit.Penerbit-data',compact('info','page'));
        return view('contents.penerbit.penerbit-data', compact('data'));
    }

    public function indexDt()
    {

        $data = Penerbit::query();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group btn-group-sm">
                                <form action="' . route('penerbit.edit', $data->id) . '" method="GET">
                                    ' . csrf_field() . '
                                    <button class="btn btn-secondary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="' . route('penerbit.destroy', $data->id) . '" method="POST">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-secondary btn-sm mr-2" onclick="return confirm(\'Apakah anda yakin untuk menghapus data ini?\')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
            })
            ->rawColumns(['action'])
            ->toJson();

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
