@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Riwayat Pembelian</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="#perHari">Pendapatan harian </a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ $perHari->sum('total_harga') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pendapatan mingguan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ $perMinggu->sum('total_harga') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">pendaptan bulanan
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            Rp.{{ $perBulan->sum('total_harga') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ $total->sum('total_harga') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4" id="perHari">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data hari ini </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableRiwayatPerHari" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No pembelian</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Bayar</th>
                                <th>kembalian</th>
                                <th>user</th>
                                @if (Auth::user()->role == 'manager')
                                    <th>Aksi</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No pembelian</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Bayar</th>
                                <th>kembalian</th>
                                <th>user</th>
                                @if (Auth::user()->role == 'manager')
                                    <th>Aksi</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($perHari as $key => $p)
                                @php
                                    $user = App\Models\User::find($p->id_user);
                                @endphp
                                <tr>
                                    <td> <a href="/show_pembelian/{{ $p->id_pembelian }}"> {{ $p->id_pembelian }} </a></td>
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->total_harga }}</td>
                                    <td>{{ $p->uang }}</td>
                                    <td>{{ $p->kembalian }}</td>
                                    <td>{{ $user->username }}</td>
                                    @if (Auth::user()->role == 'manager')
                                        <td>
                                            {{-- <a href="/edit_pembelian/{{ $p->id_pembelian }}" class="btn btn-primary">edit</a> --}}
                                            <a href="/destroy_pembelian/{{ $p->id_pembelian }}"
                                                class="btn btn-danger">hapus</a>
                                        </td>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            {{-- <a href="/edit_pembelian/{{ $p->id_pembelian }}" class="btn btn-primary">edit</a> --}}
                                            <a href="/destroy_pembelian/{{ $p->id_pembelian }}"
                                                class="btn btn-danger">hapus</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Semua data </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No pembelian</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Bayar</th>
                                <th>kembalian</th>
                                <th>user</th>
                                @if (Auth::user()->role == 'manager')
                                    <th>Aksi</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No pembelian</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Bayar</th>
                                <th>kembalian</th>
                                <th>user</th>
                                @if (Auth::user()->role == 'manager')
                                    <th>Aksi</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pembelian as $key => $p)
                                @php
                                    $user = App\Models\User::find($p->id_user);
                                @endphp
                                <tr>
                                    <td><a href="/show_pembelian/{{ $p->id_pembelian }}"> {{ $p->id_pembelian }} </a></td>
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->total_harga }}</td>
                                    <td>{{ $p->uang }}</td>
                                    <td>{{ $p->kembalian }}</td>
                                    <td> <a href="riwayatByUser/{{ $p->id_user }}">{{ $user->username }}</a> </td>
                                    @if (Auth::user()->role == 'manager')
                                        <td>
                                            {{-- <a href="/edit_pembelian/{{ $p->id_pembelian }}" class="btn btn-primary">edit</a> --}}
                                            <a href="/destroy_pembelian/{{ $p->id_pembelian }}"
                                                class="btn btn-danger">hapus</a>
                                        </td>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            {{-- <a href="/edit_pembelian/{{ $p->id_pembelian }}" class="btn btn-primary">edit</a> --}}
                                            <a href="/destroy_pembelian/{{ $p->id_pembelian }}"
                                                class="btn btn-danger">hapus</a>
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
