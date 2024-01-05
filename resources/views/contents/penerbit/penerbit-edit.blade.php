@extends('layouts.master')


@section('content')
    <!-- Default box -->
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div> --}}
        <div class="card-body">
            <!-- Main content -->
            <section class="content">
                <form action="{{ route('penerbit.update', $penerbit['id']) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Penerbit</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Penerbit</label>
                                    <input type="text" name="kode" class="form-control @error('kode') is-invalid

                                    @enderror" value="{{ $penerbit['kode'] }}" required>
                                    @error('kode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Nama Penerbit</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid

                                    @enderror" value="{{ $penerbit['nama'] }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat Penerbit</label>
                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid

                                    @enderror" value="{{ $penerbit['alamat'] }}" required>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><div class="form-group">
                                    <label>Telepon Penerbit</label>
                                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid

                                    @enderror" value="{{ $penerbit['telepon'] }}" required>
                                    @error('telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- Button --}}
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
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
