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
                                <h3 class="card-title">Tambah Penerbit</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('penerbit.store') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label>Kode Penerbit</label>
                                        <input type="text" name="kode" class="form-control @error('kode') is-invalid
                                        @enderror" required autofocus value="{{ old('kode') }}">
                                        @error('kode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Penerbit</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid
                                        @enderror" required value="{{ old('nama') }}">
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat Penerbit</label>
                                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid
                                        @enderror" required value="{{ old('alamat') }}">
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Telepon Penerbit</label>
                                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid
                                        @enderror" required value="{{ old('telepon') }}">
                                        @error('telepon')
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