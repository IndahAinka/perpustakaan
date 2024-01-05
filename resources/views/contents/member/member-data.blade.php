@extends('layouts.master')


@section('content')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username Member</th>
                            {{-- <th>Password Member</th> --}}
                            <th>Nama Member</th>
                            <th>Alamat Member</th>
                            <th>No Hp Member</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['member'] as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->username }}</td>
                                {{-- <td>{{ $item->password }}</td> --}}
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->hp }}</td>
                                {{-- <td>{{ $item->created_at }}</td> --}}
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <form action="{{ route('member.edit',$item['id']) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button class="btn btn-info"><i class="fas fa-edit"></i></button>
                                            {{-- <button type="button" class="btn btn-info"><i class="fas fa-edit"></button> --}}
                                        </form>
                                        <form action="{{ route('member.destroy',$item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a  class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
            </tr>
            </tfoot> --}}
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('member.create') }}" class="btn btn-success float-right">Tambah Data</a>
                {{-- <input type="submit" value="Tambah Data" class="btn btn-success float-right"> --}}
            </div>
        </div>


    </section>
@endsection
