<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberStoreRequest;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['info'] = 'Member';
        $data['page'] = 'member-data';
        $data['member'] = Member::selectData();

        return view('contents.member.member-data', compact('data'));
    }

    public function indexDt()
    {
        $badge = '';
        $data = Member::query();
        return DataTables::of($data)
            ->addColumn('status', function ($data) use (&$badge) {

                switch ($data->status) {
                    case ('active'):
                        $badge = 'success';
                        break;
                    case ('non-active'):
                        $badge = 'danger';
                        break;
                    default:
                        '';
                }

                return
                    '
                <span class="badge badge-' . $badge . ' d-sm-flex justify-content-center">
                                         ' . $data->status . '
                                    </span>
                ';
            })
            ->addColumn('action', function ($data) {
                $action = '
                <div class="btn-group btn-group-sm">
            <form action="' . route('member.show', $data->id) . '" method="POST">
            ' . csrf_field() . '
            ' . method_field('GET') . '
            <button class="btn btn-secondary btn-sm mr-2"><i
                    class="fas fa-folder"></i></button>
        </form>

        <form action="' . route('member.edit', $data->id) . '" method="POST">
            ' . csrf_field() . '
            ' . method_field('GET') . '
            <button class="btn btn-secondary btn-sm mr-2"><i
                    class="fas fa-edit"></i></button>
        </form>
        <form action="' . route('member.destroy', $data->id) . '" method="POST">
            ' . csrf_field() . '
            ' . method_field('DELETE') . '
            <button type="submit" class="btn btn-secondary btn-sm mr-2"
                onclick="return confirm(\'Apakah anda yakin untuk menghapus data ini?\')"><i
                    class="fas fa-trash"></i></button>
        </form>
        </div>

            ';
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
        $data['info'] = 'Member';
        $data['page'] = 'member-create';
        return view('contents.member.member-new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStoreRequest $request): RedirectResponse
    {

        $validateData = $request->except('_token');
        $validateData['status'] = 'active';
        $validateData = Member::inputData($validateData);

        // session()->flash('success', 'Data Berhasil ditambahkan');
        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('member.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $data['info'] = 'Member';
        $data['page'] = 'member-detail';
        // $data['member'] = Member::selectData();

        return view('contents.member.member-detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        $data['info'] = 'Member';
        $data['page'] = 'member-edit';

        return view('contents.member.member-edit', compact('data', 'member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validateData = $request->validate([
        //     'username' => 'required|max:255|min:5',
        //     'password' => 'required|min:5|max:255',
        //     'nama' => 'required|min:3|max:255',
        //     'alamat' => 'required|min:5|max:255',
        //     'hp' => 'required|min:10|max:13',
        //     'email' => 'required|email:dns',
        //     // 'status' => 'required|'

        // ]);
        // dd($request);

        $data['username'] = $request->input('username');
        $data['password'] = $request->input('password');
        $data['nama'] = $request->input('nama');
        $data['alamat'] = $request->input('alamat');
        $data['hp'] = $request->input('hp');
        $data['email'] = $request->input('email');
        $data['status'] = $request->input('status');

        Member::updateData($id, $data);

        // session()->flash('success', 'Data Berhasil diupdate');
        $notification = array(
            'message' => 'Data Berhasil Diupdate',
            'alert-type' => 'success'
        );

        return redirect()->route('member.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $id = $member['id'];
        Member::deleteData($id);
        return redirect()->route('member.index');
    }
}
