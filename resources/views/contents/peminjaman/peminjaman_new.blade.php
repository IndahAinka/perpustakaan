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
                                <h3 class="card-title">Tambah Peminjaman</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('peminjaman.store') }}" method="POST" novalidate>
                                    @csrf

                                    <div class="form-group">
                                        <label>Nama member</label>
                                        <select class="form-control select2 @error('member_id') is-invalid @enderror"
                                            style="width: 100%;" name="member_id">
                                            @foreach ($data['member'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('member_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Buku</label>
                                        <select class="form-control select2 @error('buku_id') is-invalid @enderror"
                                            style="width: 100%;" id="buku_id" name="buku_id">
                                            @foreach ($data['buku'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['judul'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('buku_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Tanggal Peminjaman</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                                                data-inputmask-alias="datetime" name="tanggal_peminjaman"
                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            @error('tanggal_peminjaman')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Button --}}
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Simpan" class="btn btn-success float-right">
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

    <script>
        $(document).ready(function() {
            $('#buku_id').select2({
                placeholder: 'Pilih Judul Buku',
                ajax: {
                    url: "{{ route('buku.index') }}",
                    dataType: 'json',
                    delay: 250,
                    minimumInputLength: 3, // Set the minimum length for input before triggering the search
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.judul
                                };
                            })
                        };
                    }
                }
            });
        });
    </script>
@endsection
