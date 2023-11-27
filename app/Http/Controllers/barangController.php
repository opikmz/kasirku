<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = barang::get()->all();
        return view('pages.admin.barang.produk',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.barang.tambah_produk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'barang'=>'required|string|max:255',
        'harga'=>'required',
        'jenis' =>'required',
       ]);

       $produk = new barang;
       $produk->nama = $request->barang;
       $produk->harga = $request->harga;
       $produk->jenis = $request->jenis;
       $produk->kode_barang = $request->kode_barang;
       $produk->save();

       Alert::success('Success', 'Data berhasil ditambahkan');

       return redirect()->route('produk');

    }

    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_barang)
    {
        $barang = barang::Find($id_barang);
        return view('pages.admin.barang.edit_barang',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);
// dd($request->all());
        $barang->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kode_barang' => $request->kode_barang,
            'jenis' => $request->jenis,
        ]);


        return redirect()->route('produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang)
    {
        $barang = barang::findOrFail($id_barang);
        $barang->delete();

        return redirect()->route('produk');
    }
}
