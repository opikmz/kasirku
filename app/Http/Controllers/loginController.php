<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }
    public function actLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            if(Auth::User()->role === 'kasir'){
                return redirect()->route('dashboard');
            }elseif(Auth::user()->role === 'admin'){
                return redirect()->route('dashboard');
            }elseif(Auth::user()->role === 'manager'){
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
