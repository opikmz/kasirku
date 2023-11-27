<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\pembelian;
use App\Models\id_pembelian;
use Illuminate\Http\Request;

class riwayatPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = id_pembelian::get();
        $perHari = id_pembelian::whereDate('created_at',Carbon::today())->get();
        $perMinggu = id_pembelian::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();
        $perBulan = id_pembelian::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->get();
        $pembelian = id_pembelian::get()->all();
        return view('pages.admin.riwayatPembelian',compact('pembelian','perHari','perMinggu','perBulan','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_pembelian)
    {
        $id = id_pembelian::where('id_pembelian',$id_pembelian)->get()->first();
        $pembelian = pembelian::where('id_pembelian',$id_pembelian)->get();
        return view('pages.admin.show_riwayat',compact('id','pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pembelian)
    {
        $id = id_pembelian::where('id_pembelian',$id_pembelian);
        $pembelian = pembelian::where('id_pembelian',$id_pembelian);

        $id->delete();
        $pembelian->delete();

        return redirect()->route('riwayat_pembelian');
    }
    public function riwayatByUser(string $id_user)
    {
        $pembelian = id_pembelian::where('id_user',$id_user)->get();
        return view('pages.admin.riwayatByUser',compact('pembelian'));
    }
}
