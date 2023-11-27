<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $user = User::get()->all();
        return view('pages.admin.user',compact('user'));
    }
    public function create()
    {
        return view('pages.admin.tambah_user');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->value);
        $user->role = $request->role;

        $user->save();

        return redirect()->route('user');
    }
    public function destroy(String $id_user){
        $user = User::where('id_user',$id_user)->get()->first();
        $user->delete();
        return redirect()->route('user');
    }
}
