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
                    <form id="deleteForm" action="{{ route('kategori.destroy', '') }}" method="POST">
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
                <table id="myDt" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Buku</th>
                            <th >Aksi</th>
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
                <a href="{{ route('kategori.create') }}" class="btn btn-success float-right">Tambah Data</a>
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
     var dtTable = $('#myDt').DataTable({
        processing: true,serverSide: true,pageLength: 10,
        order: [[2, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: ['_all'] },
        ],
        ajax: '{{ route("kategori.index.dt") }}',
        columns: [
            { data: 'id', name: 'id', orderable: true, searchable:false },
            { data: 'kode', name: 'kode', orderable: true, searchable:true },
            { data: 'nama', name: 'nama', orderable: true, searchable:true },
            { data: 'bukus_count', name: 'bukus_count', orderable: true, searchable:true },
            { data: 'action', name: 'action', orderable: false, searchable:false },

        ],
         initComplete: function(settings){
            // table = settings.oInstance.api();
            // initSearchCol(table,'#header-filter','search-col-dt');
        }
    });
</script>

@endsection
