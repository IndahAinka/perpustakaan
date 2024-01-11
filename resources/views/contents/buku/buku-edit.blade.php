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
                                <h3 class="card-title">Edit Buku</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('buku.update', $buku['id']) }}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" style="width: 100%;" name="kategori_id">
                                            @foreach ($data['kategori'] as $item)
                                                {{-- <option selected="selected"  value="{{ $item['id'] }}">{{ $item['nama'] }}
                                                </option> --}}
                                                <option value="{{ $item['id'] }}" {{  $item['id'] == $item['id'] ? 'selected' : '' }}>
                                                    {{ $item['nama'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <select class="form-control select2" style="width: 100%;" name="penerbit_id">
                                            @foreach ($data['penerbit'] as $item)
                                                {{-- <option  value="{{ $item['id'] }}">{{ $item['nama'] }}
                                                </option> --}}
                                                <option value="{{ $item['id'] }}" {{  $item['id'] == $item['id'] ? 'selected' : '' }}>
                                                    {{ $item['nama'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Rak</label>
                                        <select class="form-control select2" style="width: 100%;" name="rak_id" >
                                            @foreach ($data['rak'] as $item)
                                                <option selected="selected" value="{{ $item['id'] }}">{{ $item['nama'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok"
                                            class="form-control @error('stok') is-invalid

                                        @enderror"
                                            value="{{ $buku['stok'] }}">
                                        @error('stok')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid

                                        @enderror"
                                            value="{{ $buku['judul'] }}">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" name="pengarang"
                                            class="form-control @error('pengarang') is-invalid

                                        @enderror"
                                            value="{{ $buku['pengarang'] }}">
                                        @error('pengarang')
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

@section('myscript')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endsection
