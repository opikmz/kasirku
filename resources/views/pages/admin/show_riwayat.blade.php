@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Riwayat Pembelian</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <div class="row">
                    <div class="col-md">
                        <b>No Pembelian</b><br>
                        <b>Tanggal Pembelian</b><br>
                        <b>User</b><br>

                    </div>
                    @php
                        $user = App\Models\User::find($id->id_user)
                    @endphp
                    <div class="col-md">
                        : {{ $id->id_pembelian }} <br>
                        : {{ $id->created_at }} <br>
                        : {{ $user->username }} <br>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach ($pembelian as $p)
                                @php
                                    $barang = App\Models\barang::findOrFail($p->id_barang);
                                @endphp
                                <tr>
                                    <td>{{ $p->barang }}</td>
                                    <td>{{ $p->jumlah }}</td>
                                    <td>{{ $barang->harga }}</td>
                                    <td>{{ $p->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-4">
                            <b>Jumlah</b>
                        </div>
                        <div class="col-6">
                            <b id="jumlah_harga">: {{ $id->total_harga }}</b>
                        </div>
                        <div class="col-4">
                            <b>Uang</b>
                        </div>
                        <div class="col-5">
                            <b id="jumlah_harga">: {{ $id->uang }}</b>
                        </div>
                        <div class="col-4">
                            <b>Kembalian</b>
                        </div>
                        <div class="col-3" >
                            <b id="jumlah_harga">: {{ $id->kembalian }}</b>
                        </div>
                        <input type="hidden" name="kembalian" id="kembalianV" value="">
                    </div>
                </div>
            </div>
            <div class="card-header py-3">

            </div>
        </div>
    </div>
@endsection
