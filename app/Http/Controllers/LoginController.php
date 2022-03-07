<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.index');
    }
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'Email' => 'required',
            'Password' => 'required'
        ]);
        $credentials = $request->only('Email', 'Password');
 
        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('admin-maneger');
        }else{
            return view('auth.index');
        }
    }
}
