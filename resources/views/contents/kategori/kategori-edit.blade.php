@extends('layouts.master')


@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Kategori</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kategori.update', $kategori['id']) }}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $kategori['id'] }}">
                                    <div class="form-group">
                                        <label>Kode Kategori</label>
                                        <input type="text" name="kode"
                                            class="form-control @error('kode') is-invalid
                                        @enderror"
                                            value="{{ $kategori['kode'] }}" required autofocus>
                                        @error('kode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid
                                        @enderror"
                                            value="{{ $kategori['nama'] }}" required>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                {{-- Button --}}
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Simpan" class="btn btn-success float-right">
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{-- Footer --}}
        </div>
        <!-- /.card-footer-->
    </div>


    <!-- /.card -->
@endsection

@section('script')
    <script>
        var dtTable = $('#myTable').DataTable({
            processing:true, serverSide:true, pageLength:10,
            order: [[2, 'asc']],
            columnDefs: [
                { className: 'text-center', targets: ['_all']},
            ],
            ajax: '{{ route("kategori.index.dt") }}',
            columns:[
                {data: 'id', name: 'id', orderable:true, searchable:false},
                {data: 'kode', name: 'kode', orderable:true, searchable:false},
                {data: 'nama', name: 'nama', orderable:true, searchable:false},
                {data: 'action', name: 'action', orderable:true, searchable:false},
            ],
            initComplete: function(settings)
            {}
        });
    </script>
@endsection
