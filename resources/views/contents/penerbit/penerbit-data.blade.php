@extends('layouts.master')


@section('content')
    <section class="content">

        @if (session()->has('success'))
            <script>
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
                toastr.success('{{ Session('success') }}')
            </script>
        @endif


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
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
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
                <a href="{{ route('penerbit.create') }}" class="btn btn-success float-right">Tambah Data</a>
                {{-- <input type="submit" value="Tambah Data" class="btn btn-success float-right"> --}}
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
 var dtTable = $('#myDt').DataTable({
        processing: true,serverSide: true,pageLength: 10,
        order: [[2, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: ['_all'] },
        ],
        ajax: '{{ route("penerbit.index.dt") }}',
        columns: [
            { data: 'id', name: 'id', orderable: true, searchable:false },
            { data: 'kode', name: 'kode', orderable: true, searchable:true },
            { data: 'nama', name: 'nama', orderable: true, searchable:true },
            { data: 'alamat', name: 'alamat', orderable: true, searchable:false },
            { data: 'telepon', name: 'telepon', orderable: true, searchable:false },
            { data: 'action', name: 'action', orderable: false, searchable:false },

        ],
        initComplete: function(settings){
            // table = settings.oInstance.api();
            // initSearchCol(table,'#header-filter','search-col-dt');
        }
    });
    </script>
@endsection
