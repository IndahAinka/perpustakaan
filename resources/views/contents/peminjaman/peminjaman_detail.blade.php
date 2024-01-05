@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        Peminjaman paling lama 1 minggu. Lebih dari 1 peminggu peminjaman akan mendapatkan denda
                        keterlambatan 2000 perhari
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i>Detail Peminjaman buku
                                    <small class="float-right">Date: 2/10/2014</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                {{-- Data Peminjam --}}
                                <address>
                                    <strong>{{ $peminjaman->members->nama }}</strong><br>
                                    Email: {{ $peminjaman->members->email }}
                                </address>
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Peminjaman</th>
                                            <th>Kode Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status Pengembalian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $peminjaman->id }}</td>
                                            <td>{{ $peminjaman->buku_id }}</td>
                                            <td>{{ $peminjaman->created_at }}</td>
                                            <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                                            <td>
                                                @if ($peminjaman->tanggal_pengembalian != null)
                                                    Buku Telah dikembalikan
                                                @else
                                                    -
                                                @endif
                                            </td>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Total Denda</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Keterlambatan:</th>
                                            <td> 7 hari</td>
                                        </tr>
                                        <tr>
                                            <th>Denda Perhari</th>
                                            <td>Rp.2000</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>Rp.14.0000</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a>
                                <form action="{{ route('pengembalian.store') }}">
                                    <button type="submit" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Kembalikan Buku
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
