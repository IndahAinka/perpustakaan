<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriStoreRequest;
use App\Http\Requests\KategoriUpdateRequest;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

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

    public function indexDt()
    {
        $data = Kategori::query()
        ->with('bukus')
        ->withCount('bukus');
        return DataTables::of($data)
            ->addColumn('bukus_count', function($data){
                return $data->bukus_count;
            })
            ->addColumn('created_at_format', function ($data) {
                return Carbon::parse($data->created_at)->format('d M Y');
            })
            ->addColumn('action', function($data) {
                // return '
                //     <a href="#" class="btn btn-sm btn-success">Edit</a>
                //     <a href="#" class="btn btn-sm btn-warning">Delete</a>
                // ';
                return '<div class="btn-group btn-group-sm">
                                <form action="' . route('kategori.edit', $data->id) . '" method="POST">
                                    ' . csrf_field() . '
                                    ' . method_field('GET') . '

                                    <button class="btn btn-secondary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="' . route('kategori.destroy', $data->id) . '" method="POST">
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
