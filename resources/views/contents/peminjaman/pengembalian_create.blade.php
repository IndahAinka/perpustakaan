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
                                <h3 class="card-title">Pengembalian Buku</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('peminjaman.return',$peminjaman->id) }}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="id" value="{{ $peminjaman->id }}">
                                    {{-- <strong><i class="fas fa-book mr-1"></i> Peminjaman</strong>

                                    <p class="text-muted">
                                       Nama Peminjam :{{ $data['peminjaman']->members->nama }} <br>
                                       Judul Buku yang dipinjam :
                                    </p>

                                    <hr> --}}

                                    <div class="form-group">
                                       <strong><p>Tanggal Pengembalian</p></strong>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask-alias="datetime"
                                                name="tanggal_pengembalian" data-inputmask-inputformat="dd/mm/yyyy"
                                                data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                {{-- Button --}}
                <div class="row">
                    <div class="col-12">
                        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
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

    <script></script>
@endsection
