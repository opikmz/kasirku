@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data barang</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (Auth::user()->role == 'manager')
                    <a href="/tambah_produk" class="btn btn-primary">Tambah</a>
                @endif
                @if (Auth::user()->role == 'admin')
                    <a href="/tambah_produk" class="btn btn-primary">Tambah</a>
                @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kode Barang</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                 @if (Auth::user()->role == 'manager')
                                <th>Aksi</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $p)
                                <tr>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->harga }}</td>
                                    <td>{{ $p->kode_barang }}</td>
                                    <td>{{ $p->jenis }}</td>
                                    <td>{{ $p->created_at }}</td>
                                    @if (Auth::user()->role == 'manager')
                                    <td>
                                        <a href="/edit_produk/{{ $p->id_barang }}" class="btn btn-primary">edit</a>
                                        <a href="/destroy_produk/{{ $p->id_barang }}" class="btn btn-danger">hapus</a>
                                    </td>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a href="/edit_produk/{{ $p->id_barang }}" class="btn btn-primary">edit</a>
                                        <a href="/destroy_produk/{{ $p->id_barang }}" class="btn btn-danger">hapus</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
