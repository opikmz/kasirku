@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1> <br>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Form Tambah Produk</h6>
            </div>
            <div class="card-body">
                <form action="/store_user" method="POST">
                    @csrf
                    <label for=""> <b>Nama</b> </label>
                    <input type="text" name="nama" class="form-control " style="width:20rem" required>
                    <label for=""> <b>Username</b> </label>
                    <input type="text" name="username" class="form-control " style="width:20rem" required>
                    <label for=""> <b>Password</b> </label>
                    <input type="text" name="password" class="form-control" style="width:20rem" required>
                    <label for=""> <b>Role</b> </label>
                    <div class="input-group" style="width:20rem">
                        <select class="form-control" id="inputGroupSelect01" style="width:20rem" name="role" required>
                            <option value="kasir" >Kasir</option>
                            <option value="admin" >Admin</option>
                            <option value="manager"  >Manager</option>
                        </select>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>

    </div>
@endsection
