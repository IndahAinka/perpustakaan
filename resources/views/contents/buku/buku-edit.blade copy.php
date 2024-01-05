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
                                <h3 class="card-title">Tambah Buku</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('buku.update', $buku['id']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="form-group">
                                        <label>Kategori ID</label>
                                        <input type="text" name="kategori_id" class="form-control"
                                            value="{{ $buku['kategori_id'] }}">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            @foreach ($data['kategori'] as $item)
                                                <option selected="selected" value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Penerbit ID</label>
                                        <input type="text" name="penerbit_id" class="form-control"
                                            value="{{ $buku['penerbit_id'] }}">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            @foreach ($data['penerbit'] as $item)
                                                <option selected="selected" value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Rak ID</label>
                                        <input type="text" name="rak_id" class="form-control"
                                            value="{{ $buku['rak_id'] }}">
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Rak</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            @foreach ($data['rak'] as $item)
                                                <option selected="selected" value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul" class="form-control"
                                            value="{{ $buku['judul'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" name="pengarang" class="form-control"
                                            value="{{ $buku['pengarang'] }}">
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
                        <input type="submit" value="Update" class="btn btn-success float-right">
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
