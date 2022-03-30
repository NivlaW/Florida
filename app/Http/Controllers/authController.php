<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class authController extends Controller
{
    public function formLogin()
    {
        if (auth::check()) {
            if (Auth::user()->level=='admin') {
                return redirect('/admin/dashboard',);
            } else {
                return redirect('/resepsionis/client');
            }
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $data = request()->validate([
            'username'=>'required',
            'password'=>'required',
        ],
        [
            'username.required'=>'username tidak boleh kosong',
            'password.required'=>'password tidak boleh kosong',
        ]);
        if (Auth::attempt($data)) {
            if (Auth::user()->level=='admin') {
                return redirect('admin/dashboard',);
            } else {
                return redirect('resepsionis/client');
            }
        } else {
            return view('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
