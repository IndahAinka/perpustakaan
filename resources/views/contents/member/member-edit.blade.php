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
                                <h3 class="card-title">Tambah Member</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('member.update', $member['id']) }}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid

                                        @enderror"
                                            value="{{ $member['username'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control @error('password') is-invalid

                                        @enderror"
                                            value="{{ $member['password'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid

                                        @enderror"
                                            value="{{ $member['nama'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid

                                        @enderror"
                                            value="{{ $member['alamat'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Hp</label>
                                        <input type="text" name="hp" class="form-control @error('hp')

                                        @enderror"
                                            value="{{ $member['hp'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $member['email'] }}">
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
