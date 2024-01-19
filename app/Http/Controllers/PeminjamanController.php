<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeminjamanStoreRequest;
use App\Models\Member;
use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

        // Logic kolomn status

        $statuses = [];

        foreach ($data['peminjaman'] as $peminjaman) {
            $tanggal_peminjaman = $peminjaman->tanggal_peminjaman;
            $tanggal_pengembalian = $peminjaman->tanggal_pengembalian;

            if ($tanggal_peminjaman) {
                $tanggal_kembali = Carbon::parse($tanggal_peminjaman)->addDays(7);

                if ($tanggal_pengembalian != NULL) {
                    $status = "Buku Telah dikembalikan";
                } elseif (now()->gt(Carbon::parse($tanggal_kembali))) {
                    $status = "Buku Lewat Batas Peminjaman";
                } else {
                    $status = "Buku Sedang di Pinjam";
                }
            } else {
                $status = 'Tidak ada peminjaman buku';
            }

            $statuses[] = [
                'status' => $status,
                'tanggal_kembali' => $tanggal_kembali,
            ];
        }

        return view('contents.peminjaman.peminjaman-data', compact('data', 'statuses'));
    }


    public function indexDt()
    {
        $data = Peminjaman::with(['bukus', 'members']);
        return DataTables::of($data)
        ->addColumn('tanggal_kembali', function($data){
            $tanggal_kembali = Carbon::parse($data['tanggal_peminjaman'])->addDays(7);
            return Carbon::parse($tanggal_kembali)->format('Y-m-d');
            // return $tanggal_kembali;
        })
        ->addColumn('status', function ($data) {
            $status = '';
            // Ensure that $data['peminjaman'] is an array
            if (is_array($data['peminjaman'])) {
                foreach ($data['peminjaman'] as $peminjaman) {
                    // Ensure that $peminjaman is an object
                    if (is_object($peminjaman)) {
                        $tanggal_peminjaman = $peminjaman->tanggal_peminjaman;
                        $tanggal_pengembalian = $peminjaman->tanggal_pengembalian;

                        if ($tanggal_peminjaman) {
                            $tanggal_kembali = Carbon::parse($tanggal_peminjaman)->addDays(7);
                            if ($tanggal_pengembalian != NULL) {
                                $status = "Buku Telah dikembalikan";
                            } elseif (now()->gt(Carbon::parse($tanggal_kembali))) {
                                $status = "Buku Lewat Batas Peminjaman";
                            } else {
                                $status = "Buku Sedang di Pinjam";
                            }
                        } else {
                            $status = 'Tidak ada peminjaman buku';
                        }


                    }
                }
            }

            return $status;
        })
            ->addColumn('action', function ($data) {
                $action = '
                <div class="btn-group btn-group-sm">
                    <form action="' . route('peminjaman.show', $data->id) . '" method="POST">
                        ' . csrf_field() . '
                        ' . method_field('GET') . '
                        <button class="btn btn-secondary btn-sm mr-2"><i class="fas fa-folder"></i></button>
                    </form>

                    <form action="' . route('peminjaman.edit', $data->id) . '" method="GET">
                        ' . csrf_field() . '
                        <button class="btn btn-secondary btn-sm mr-2 ' . ($data->status == 'Buku Telah dikembalikan' ? 'disabled' : '') . '">
                            <i class="fas fa-edit"></i>
                        </button>
                    </form>

                    <form action="' . route('peminjaman.destroy', $data->id) . '" method="POST">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit"
                            class="btn btn-secondary deleteBtn btn-sm mr-2 ' . ($data->status == 'Buku Telah dikembalikan' ? 'disabled' : '') . '"
                            onclick="return confirm(\'Apakah anda yakin untuk menghapus data ini?\')"
                            value="{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>';
                return $action;
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
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
    public function store(PeminjamanStoreRequest $request): RedirectResponse
    {
        $validateData = $request->except('_token');


        $buku = Buku::find($validateData['buku_id']);

        if ($buku) {
            $buku->decrement('stok');
        } else {
            abort(404, 'Book not found');
        }

        $formattedDate = Carbon::createFromFormat('d/m/Y', $request->tanggal_peminjaman)->format('Y-m-d');
        $validateData['tanggal_peminjaman'] = $formattedDate;
        $validateData = Peminjaman::inputData($validateData);

        $notification = [
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success',
        ];

        return redirect()->route('peminjaman.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $data['info'] = 'Peminjaman';
        $data['page'] = 'Peminjaman-detail';

        $tanggal_kembali = Carbon::parse($peminjaman['tanggal_peminjaman'])->addDays(7);
        $now = Carbon::now();
        $data['hari'] = $tanggal_kembali->diffInDays($now);

        if ($peminjaman['tanggal_pengembalian'] == NULL && $now->gt($tanggal_kembali)) {
            $data['total'] = 20000 * $data['hari'];
        } elseif ($peminjaman['tanggal_pengembalian'] != NULL && $now->gt($tanggal_kembali)) {
            $data['total'] = 20000 * $data['hari'];
        } else {
            $data['hari'] = 0;
            $data['total'] = 0;
        }

        return view('contents.peminjaman.peminjaman_detail', compact('data', 'peminjaman'));
    }

    public function create_pengembalian(Peminjaman $peminjaman)
    {

        $data['info'] = 'Peminjaman';
        $data['page'] = 'Pengembalian-create';

        if ($peminjaman->tanggal_pengembalian != NULL) {
            return view('contents.peminjaman.pengembalian_create', compact('data', 'peminjaman'));
        } else {
            abort(404, 'Halaman tidak ditemukan');
        }
    }

    public function return(Peminjaman $peminjaman)
    {
        $buku = Buku::find($peminjaman['buku_id']);
        // $buku = Buku::find($buku_id);
        $peminjaman = Peminjaman::find($peminjaman->id);


        if ($buku) {
            $buku->increment('stok');

            $peminjaman->update(['tanggal_pengembalian' => now()]);

            return redirect()->back();
        } else {
            return redirect()->back();
        }

        $notification = [
            'message' => 'Buku berhasil dikembalikan',
            'alert-type' => 'success',
        ];

        return redirect()->route('peminjaman.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $member = new Member();
        $data['member'] = $member->selectData()->toArray();

        $buku = new Buku();
        $data['buku'] = $buku->selectData()->toArray();


        $data['info'] = 'Peminjaman';
        $data['page'] = 'Peminjaman-edit';
        return view('contents.peminjaman.peminjaman_edit', compact('data', 'peminjaman'));
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
     * Select2 searchSelect buku_id
     */
    public function buku()
    {
        $data = Buku::where('judul', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return response()->json($data);
    }
    /**
     * Select2 searchSelect buku_id
     */
    public function member()
    {
        $data = Member::where('nama', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $id = $peminjaman['id'];


        Peminjaman::deleteData($id);

        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('peminjaman.index')->with($notification);
    }
}
