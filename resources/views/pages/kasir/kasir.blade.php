@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kasir</h1>

        <!-- DataTales Example -->

        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Keranjang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($pembelians as $p)
                                        <tr>
                                            <td>{{ $p->barang }}</td>
                                            <td>Rp.{{ number_format($p->harga) }}</td>
                                            <td>
                                                <form action="/update_jumlah" method="POST">
                                                    @csrf
                                                    <input type="number" min="1" value="{{ $p->jumlah }}"
                                                        name="jumlah" style="width:80px" class="form-control"> <br>
                                                    <input type="hidden" value="{{ $p->id_barang }}" name="id_barang"
                                                        style="width:80px" class="form-control">
                                                    <button type="submit" class="btn btn-primary">Refresh</button>
                                                </form>
                                            </td>
                                            <td><a href="/destroy_cart/{{ $p->id_barang }}" class="btn btn-danger">hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <form action="/simpan_pembelian" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <b>Jumlah:</b>
                                    </div>
                                    <div class="col-6">
                                        <b id="jumlah_harga">{{ $pembelians->sum('harga') }}</b>
                                        <input type="hidden" name="jumlah_harga" value="{{ $pembelians->sum('harga') }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                                    </div>
                                    <div class="col-4">
                                        <b>Uang:</b>
                                    </div>
                                    <div class="col-5">
                                        {{-- <style>
                                            input[type="number"]::-webkit-inner-spin-button,
                                            input[type="number"]::-webkit-outer-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }

                                            input[type="number"] {
                                                -moz-appearance: textfield;
                                            }

                                            input[type="number"]::-ms-clear,
                                            input[type="number"]::-ms-reveal {
                                                display: none;
                                            }
                                        </style> --}}
                                        <input type="number" name="uang" list="datalistOptions" class="form-control" min="0" id="inputUang"
                                            oninput="hitungKembalian()" required>
                                            <datalist id="datalistOptions">
                                                <option value="2000" >
                                                <option value="5000">
                                                <option value="10000">
                                                <option value="20000">
                                                <option value="50000">
                                                <option value="100000">
                                              </datalist>
                                    </div>
                                    <div class="col-4">
                                        <b>Kembalian:</b>
                                    </div>
                                    <div class="col-3" id="kembalian">

                                    </div>
                                    <input type="hidden" name="kembalian" id="kembalianV" value="">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($produk as $p)
                                        <tr>
                                            <td>{{ $p->nama }}
                                            <br>
                                            {{ $p->kode_barang }}
                                            </td>
                                            <td>Rp.{{ $p->harga }}</td>
                                            <td>
                                                <form action="/to_cart" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="barang" value="{{ $p->nama }}">
                                                    <input type="hidden" name="harga" value="{{ $p->harga }}">
                                                    <input type="hidden" name="id_barang" value="{{ $p->id_barang }}">
                                                    <button type="submit" class="btn btn-primary">+</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Approach -->
                {{-- <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                    </div>
                    <div class="card-body">
                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                            CSS bloat and poor page performance. Custom CSS classes are used to create
                            custom components and custom utility classes.</p>
                        <p class="mb-0">Before working with this theme, you should become familiar with the
                            Bootstrap framework, especially the utility classes.</p>
                    </div>
                </div> --}}
            </div>
        </div>
        <script>
            function hitungKembalian() {
                var jumlahHarga = parseFloat(document.getElementById('jumlah_harga').innerText);
                var uang = parseFloat(document.getElementById('inputUang').value);

                var kembalian = uang - jumlahHarga;

                document.getElementById('kembalian').textContent = kembalian.toFixed(1);
                document.getElementById('kembalianV').value = kembalian.toFixed(1);
            }
        </script>
    @endsection
