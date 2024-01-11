@extends('layouts.master')

@section('content')
    <section class="content">

        {{-- @if (session()->has('success'))
            <div class="btn btn-success toastrDefaultSuccess" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}



        <!-- Modal -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="deleteForm" action="{{ route('peminjaman.destroy', '') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Alert</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" value="deleteForm">
                            <p>Apakah anda yakin untuk menghapus data ??</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th class="text-center">No</th> --}}
                            <th >ID Peminjaman</th>
                            <th >Nama Member</th>
                            <th >Nama Buku</th>
                            <th >Tanggal Peminjaman</th>
                            <th >Tanggal Kembali</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['peminjaman'] as $index => $item)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->members->nama }}</td>
                                <td>{{ $item->bukus->judul }}</td>
                                <td>{{ $item->tanggal_peminjaman }}</td>
                                <td>{{ $statuses[$index]['tanggal_kembali']->format('Y-m-d') }}</td>
                                <td>
                                    @if ($statuses[$index]['status'] == 'Buku Telah dikembalikan')
                                        <span class="badge badge-success d-sm-flex justify-content-center">
                                            {{ $statuses[$index]['status'] }}
                                        </span>
                                    @elseif ($statuses[$index]['status'] == 'Buku Sedang di Pinjam')
                                        <span class="badge badge-warning d-sm-flex justify-content-center">
                                            {{ $statuses[$index]['status'] }}
                                        </span>
                                    @elseif ($statuses[$index]['status'] == 'Buku Lewat Batas Peminjaman')
                                        <span class="badge badge-danger d-sm-flex justify-content-center">
                                            {{ $statuses[$index]['status'] }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <form action="{{ route('peminjaman.show', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button class="btn btn-secondary btn-sm mr-2"><i class="fas fa-folder"></i></button>
                                        </form>


                                        <form action="{{ route('peminjaman.edit', $item['id']) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-secondary btn-sm mr-2 @if ($statuses[$index]['status'] == 'Buku Telah dikembalikan') disabled @endif">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('peminjaman.destroy', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-secondary deleteBtn btn-sm mr-2 @if ($statuses[$index]['status'] == 'Buku Telah dikembalikan') disabled @endif"onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"
                                                value="{{ $item->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-success float-right">Tambah Data</a>
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
@endsection

{{-- @section('script')
    <script>
        $('a.confirm-action').click(function(e) {
            e.preventDefault();
            var modal = $('#deleteConfirmModal');
            modal.data('url', $(this).attr('href'));
            modal.data('request_type', $(this).data('request-type'));
            modal.modal('show');
        });

        $('#deleteConfirm').click(function() {
            var modal = $('#deleteConfirmModal');
            var url = modal.data('url');
            var request_type = modal.data('request_type');
            $('#log').append('Sent ' + request_type + ' to ' + url + '<br>');
            modal.modal('hide');
        });
    </script>
@endsection --}}
