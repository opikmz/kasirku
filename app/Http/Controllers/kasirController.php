<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pembelian;
use App\Models\id_pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class kasirController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id_user;
        $pembelians = pembelian::whereNull('id_pembelian')->where('id_user', $user)->get();
        $produk = barang::get()->all();

        return view('pages.kasir.kasir', compact('produk', 'pembelians'));
    }


    //STROREEEEEE


    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'jumlah_harga' => 'required',
            'uang' => 'required',
            'kembalian' => 'required',
            'id_user' => 'required',
        ]);

        if($request->uang < $request->jumlah_harga){
            return redirect()->route('kasir');
        }

        $id_pembelians =  date('YmdHis');
        $user = Auth::user()->id_user;
        $id_pembelian = id_pembelian::create([
            'id_pembelian'=> $id_pembelians,
            'total_harga'=> $request->jumlah_harga,
            'uang'=> $request->uang,
            'id_user'=> $request->id_user,
            'kembalian'=> $request->kembalian,
        ]);

        $id_p = $id_pembelians;

        $pembelian = pembelian::whereNull('id_pembelian')->where('id_user',$user)->update([
            'id_pembelian' => $id_p
        ]);

        $stroke_pembelian = pembelian::where('id_pembelian',$id_p)->get();
        $stroke_id_pembelian = id_pembelian::where('id_pembelian',$id_p)->first();
        return view('pages.kasir.struk', compact('stroke_pembelian','stroke_id_pembelian'));
    }



    //ENDSTOREEEEEE


    public function to_cart(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_barang' => 'required',
            'harga' => 'required',
            'barang' => 'required',
        ]);
// dd($request->all());
        $user = Auth::user()->id_user;
        //mencari id pembelian yang kosong
        $pembelians = pembelian::whereNull('id_pembelian')->where('id_user', $user)->get();
        //
        $produk = barang::get()->all();
        // dd($pembelians);

        foreach ($pembelians as $pembelian) {
            if ($pembelian->id_barang == $request->id_barang) {
                $qty = $pembelian->jumlah + 1;
                $harga = $pembelian->harga + $request->harga;

                $pembelian->update([
                    'jumlah' => $qty,
                    'harga' => $harga,
                ]);
                return redirect()->route('kasir')->with(['pembelians' => $pembelians, 'produk' => $produk]);
            }
        }

        $tocart = new pembelian();
        $tocart->id_barang = $request->id_barang;
        $tocart->harga = $request->harga;
        $tocart->barang = $request->barang;
        $tocart->id_user = $user;
        $tocart->jumlah = 1;
        $tocart->save();



        $pembelians = pembelian::whereNull('id_pembelian')->get();

        // return view('pages.kasir.kasir',compact('pembelians','produk'));
        return redirect()->route('kasir')->with(['pembelians' => $pembelians, 'produk' => $produk]);
    }
    public function update_jumlah(Request $request)
    {
        // dd($request->id_barang,$request->jumlah);
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
        ]);
        $produk = floatval(barang::where('id_barang', $request->id_barang)->pluck('harga')->first());
        // dd(gettype($produk));

        $harga = $request->jumlah * $produk;
        $harga = sprintf('%d', $harga);
        $harga = floatval($harga);

        // dd($harga);
        $id_barang = pembelian::where('id_barang', $request->id_barang);
        $id_barang->update([
            'harga' => $harga,
            'jumlah' => $request->jumlah,
        ]);

        $produk = barang::get()->all();
        $user = Auth::user()->id_user;
        $pembelians = pembelian::whereNull('id_pembelian')->where('id_user', $user)->get();
        return redirect()->route('kasir')->with(['pembelians' => $pembelians, 'produk' => $produk]);
    }
    public function destroy_cart(string $id_barang)
    {
        $pembelian = pembelian::whereNull('id_pembelian')->where('id_barang', $id_barang)->first();
        // dd($pembelian->id_barang);
        $pembelian->delete();
        return redirect()->route('kasir');
    }

    public function stroke(string $id_pembelian)
    {
        dd($id_pembelian);
        $stroke_pembelian = pembelian::where('id_pembelian',$id_pembelian)->get();
        $stroke_id_pembelian = id_pembelian::where('id_pembelian',$id_pembelian)->get();

        return view('pages.kasir.stroke',compact('stroke_pembelian','stroke_id_pembelian'));
    }
}
