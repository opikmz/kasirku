<?php

namespace App\Http\Controllers;

use App\Models\id_pembelian;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index()
    {
        $total = id_pembelian::get();
        $perHari = id_pembelian::whereDate('created_at', Carbon::today())->get();
        $perMinggu = id_pembelian::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $perBulan = id_pembelian::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $perTahun = id_pembelian::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        // $perTahun = id_pembelian::whereBetween('created_at', [Carbon::now()->startOfyear(), Carbon::now()->endOfYear()])->get();
        $keuangan = [];
        $tahunan = Carbon::now()->year;
        for($bulan = 1; $bulan <= 12; $bulan++){
            $awalBulan = Carbon::create($tahunan, $bulan, 1)->startOfMonth();
            $akhirBulan = Carbon::create($tahunan, $bulan, 1)->endOfMonth();

            $keuangan[$awalBulan->format('M')] = id_pembelian::whereBetween('created_at',[$awalBulan,$akhirBulan])->sum('total_harga');
        }
        // dd($keuangan);
        return view('pages.dashboard',compact('total','perHari','perMinggu','perBulan','keuangan','perTahun'));
    }
}
