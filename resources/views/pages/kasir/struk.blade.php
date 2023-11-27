<!DOCTYPE html>
<html lang="en">
@include('partials.header')

<body>

    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1>Koprasi MUHITEK</h1>
                            <p class="pt-0">Koprasi SMK Muhamadiyah Kretek. Tegalsari, Donotirto, Kretek, Bantul,
                                Yogyakarta</p>
                        </div>
                    </div>
                    @php
                        $user = App\Models\user::find($stroke_id_pembelian->id_user)->first();
                    @endphp
                    <div class="row">
                        <div class="col-xl-6">
                            <ul class="list-unstyled">
                                <li class="text-muted">Kasir</span></li>
                                <li class="text-muted">-<span class="fw-bold">{{ $user->username }}</li>
                                <li class="text-muted">No Pembelian</li>
                                <li class="text-muted">-<span class="fw-bold">{{ $stroke_id_pembelian->id_pembelian }}</li>
                                <li class="text-muted">Tanggal</li>
                                <li class="text-muted">-<span class="fw-bold">{{ $stroke_id_pembelian->created_at }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Belajaan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stroke_pembelian as $s)
                                    @php
                                        $i = 1;
                                        $barang = App\Models\barang::where('id_barang', $s->id_barang)->get();
                                        // dd($barang->all());
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $s->barang }}</td>
                                        <td>{{ $s->jumlah }}</td>
                                        @foreach ($barang as $b)
                                            <td>Rp.{{ $b->harga }}</td>
                                        @endforeach
                                        <td>Rp.{{ $s->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">Total Harga
                                        :Rp.{{ $stroke_id_pembelian->total_harga }}</li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Uang
                                        :Rp.{{ $stroke_id_pembelian->uang }}</li>
                            </ul>
                            <p class="text-black float-start">Kembalian :Rp.{{ $stroke_id_pembelian->kembalian }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xl-8">
                        <p>Thank you for your purchase</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="btn" class="col-xl-2">
        <h6> <a href="/kasir" class="" class="btn btn-primary">Kembali</a></h6>
    </div>
</body>

<script defer>
    window.print();
</script>

</html>
