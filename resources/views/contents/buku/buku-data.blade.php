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
                            <th>Kategori ID</th>
                            <th>Penerbit ID</th>
                            <th>Rak ID</th>
                            <th>Judul</th>
                            <th>Stok</th>
                            <th>Pengarang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['buku'] as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kategoris->nama }}</td>
                                <td>{{ $item->penerbits->nama }}</td>
                                <td>{{ $item->raks->nama }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->pengarang }}</td>
                                {{-- <td>{{ $item->created_at }}</td> --}}
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <form action="{{ route('buku.edit', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button class="btn btn-secondary btn-sm mr-2"><i class="fas fa-edit"></i></button>
                                            {{-- <button type="button" class="btn btn-info"><i class="fas fa-edit"></button> --}}
                                        </form>
                                        <form action="{{ route('buku.destroy', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a  class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                            <button type="submit" class="btn btn-secondary btn-sm mr-2" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></button>
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
                <a href="{{ route('buku.create') }}" class="btn btn-success float-right">Tambah Data</a>
                {{-- <input type="submit" value="Tambah Data" class="btn btn-success float-right"> --}}
            </div>
        </div>


    </section>

    @if (session()->has('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success('{{ Session('success') }}')
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.error('{{ Session('success') }}')
        </script>
    @endif
@endsection
