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
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th class="text-center">No</th> --}}
                            <th>ID Peminjaman</th>
                            <th>Nama Member</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
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


@section('script')
    <script>
        let myDt = $('#myTable').dataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            order: [
                [2, 'asc']
            ],
            columnDefs: [{
                className: 'text-center',
                target: ['_all']
            }],
            ajax: '{{ route('peminjaman.index.dt') }}',
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'members.nama',
                    name: 'member.nama',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'bukus.judul',
                    name: 'bukus.judul',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'tanggal_peminjaman',
                    name: 'tanggal_peminjaman',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'tanggal_kembali',
                    name: 'tanggal_kembali',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full) {
                        return status;
                    },
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: false
                },
            ]
        })
    </script>
@endsection
