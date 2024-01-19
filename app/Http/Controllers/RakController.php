<?php

namespace App\Http\Controllers;

use App\Http\Requests\RakRequest;
use App\Http\Requests\RakStoreRequest;
use App\Models\Rak;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $rak;

    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $rak = Rak::selectData();

        //     return DataTables::of($rak)
        //         ->addColumn('kode', function ($rak) {
        //             return $rak->kode;
        //         })
        //         ->addColumn('nama', function ($rak) {
        //             return $rak->nama;
        //         })
        //         ->addColumn('tanggal', function ($rak) {
        //             return $rak->created_at;
        //         })
        //         ->addColumn('aksi', function ($rak) {
        //             return '<div class="btn-group btn-group-sm">
        //                         <form action="' . route('rak.edit', $rak->id) . '" method="GET">
        //                             ' . csrf_field() . '
        //                             <button class="btn btn-info"><i class="fas fa-edit"></i></button>
        //                         </form>
        //                         <form action="' . route('rak.destroy', $rak->id) . '" method="POST">
        //                             ' . csrf_field() . '
        //                             ' . method_field('DELETE') . '
        //                             <button type="submit" class="btn btn-danger" onclick="return confirm(\'Apakah anda yakin untuk menghapus data ini?\')">
        //                                 <i class="fas fa-trash"></i>
        //                             </button>
        //                         </form>
        //                     </div>';
        //         })
        //         ->rawColumns(['aksi'])
        //         ->make(true);
        // }

        $data['info'] = 'rak';
        $data['page'] = 'rak-data';

        return view('contents.rak.rak-data', compact('data'));
    }

    public function indexDt()
    {
        $data = Rak::query();
        return DataTableS::of($data)
            ->addColumn('created_at_format', function ($data) {
                return Carbon::parse($data->created_at)->format('d M Y');
            })
            ->addColumn('action', function ($data) {
                // return '
                //     <a href="#" class="btn btn-sm btn-success">Edit</a>
                //     <a href="#" class="btn btn-sm btn-warning">Delete</a>
                // ';
                return '<div class="btn-group btn-group-sm">
                                <form action="' . route('rak.edit', $data->id) . '" method="GET">
                                    ' . csrf_field() . '
                                    <button class="btn btn-secondary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="' . route('rak.destroy', $data->id) . '" method="POST">
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

        //data => 29 Januari 2023 -> name =2024-01-29
        //data => 01 Januari 2024 -> name =2024-01-01
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
        Rak::updateData($id, $validateData);

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
