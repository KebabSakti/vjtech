<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function loginForm()
    {
    	return view('admin.auth.index');
    }

    public function loginGo(Request $request)
    {
    	if (Auth::guard()->attempt(['username' => $request->username, 'password' => $request->password])) {
		    return redirect()->intended('admin/portfolio');
		}

		//gagal login
		return redirect()->route('login.form')->with('alert', 'Login gagal. Cek kembali username dan password yang anda masukkan');
    }

    public function logout()
    {
        //logout user
    	Auth::logout();
        //clear session
        session()->flush();

    	return redirect()->route('home');
    }
}
