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
                                <h3 class="card-title">Edit Peminjaman</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('peminjaman.update', $peminjaman['id']) }}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama Member</label>
                                        <select class="form-control select2" style="width: 100%;" name="member_id">
                                            @foreach ($data['member'] as $item)
                                                <option selected="selected"  value="{{ $item['id'] }}">{{ $item['nama'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Kode Buku</label>
                                        <select class="form-control select2" style="width: 100%;" name="buku_id" >
                                            @foreach ($data['buku'] as $item)
                                                <option selected="selected" value="{{ $item['id'] }}">{{ $item['id'] }}
                                                </option>
                                            @endforeach
                                        </select>
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
