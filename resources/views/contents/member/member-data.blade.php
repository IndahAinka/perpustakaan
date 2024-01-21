@extends('layouts.master')

@section('content')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username Member</th>
                            <th>Nama Member</th>
                            <th>Alamat Member</th>
                            <th>No Hp Member</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        {{-- <tr>
                            <th><input type="text" class="form-control" placeholder="Filter ID"></th>
                            <th><input type="text" class="form-control" placeholder="Filter Username"></th>
                            <th><input type="text" class="form-control" placeholder="Filter Nama"></th>
                            <th><input type="text" class="form-control" placeholder="Filter Alamat"></th>
                            <th><input type="text" class="form-control" placeholder="Filter No Hp"></th>
                            <th><input type="text" class="form-control" placeholder="Filter Status"></th>
                            <th></th> <!-- Placeholder for action column filter -->
                        </tr> --}}
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Username Member</th>
                            <th>Nama Member</th>
                            <th>Alamat Member</th>
                            <th>No Hp Member</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('member.create') }}" class="btn btn-success float-right">Tambah Data</a>
            </div>
        </div>

        @if (session()->has('success'))
            <script>
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
                toastr.success('{{ Session('success') }}')
            </script>
        @endif

    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            var dtTable = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                responsive: true,
                order: [
                    [2, 'asc']
                ],
                columnDefs: [{
                    classname: 'text-center',
                    targets: ['_all'],
                }],
                ajax: '{{ route('member.index.dt') }}',
                columns: [{
                        data: 'id',
                        name: 'id',
                        order: true,
                        searchable: true
                    },
                    {
                        data: 'username',
                        name: 'username',
                        order: true,
                        searchable: true
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        order: true,
                        searchable: true
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        order: true,
                        searchable: true
                    },
                    {
                        data: 'hp',
                        name: 'hp',
                        order: true,
                        searchable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        order: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        order: true,
                        searchable: false
                    },
                ],
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            let column = this;
                            let title = column.footer().textContent;

                            // Create input element
                            let input = document.createElement('input');
                            input.placeholder = title;
                            column.footer().replaceChildren(input);

                            // Event listener for user input
                            input.addEventListener('keyup', () => {
                                if (column.search() !== this.value) {
                                    column.search(input.value).draw();
                                }
                            });
                        });
                }
            });
        });
    </script>
@endsection

@section('style')
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
@endsection
