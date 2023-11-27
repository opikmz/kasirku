@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data</h1> <br>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Form Edit Produk</h6>
            </div>
            <div class="card-body">
                <form action="/update_produk/{{ $barang->id_barang }}" method="POST">
                    @csrf
                    <label for=""> <b>Nama Barang/Produk</b> </label>
                    <input type="text" name="nama" class="form-control " style="width:20rem"
                        value="{{ $barang->nama }}" required>
                    <label for=""> <b>Harga</b> </label>
                    <input type="number" name="harga" class="form-control " style="width:20rem"
                        value="{{ $barang->harga }}" required>
                    <label for=""> <b>Kode Barang</b> </label>
                    <input type="text" name="kode_barang" class="form-control " style="width:20rem"
                        value="{{ $barang->kode_barang }}">
                    <br>
                    <div class="input-group" style="width:20rem">
                        <select class="form-control" id="inputGroupSelect01" style="width:20rem"
                            value="{{ $barang->kode_barang }}" name="jenis" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="barang">barang</option>
                        </select>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
@endsection
