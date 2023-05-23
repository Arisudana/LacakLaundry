<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function viewLogin(){
        return view('login');
}

public function login(Request $request){
    $validateData = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $adminAttempt = Auth::guard('akun_admin')->attempt([
        'username' => $request->username,
        'password' => $request->password
    ]);
    $staffAttempt = Auth::guard('akun_staff')->attempt([
        'username' => $request->username,
        'password' => $request->password
    ]);

    if(!$adminAttempt && !$staffAttempt){
        return redirect()->back()->with('error', 'Username atau password salah');
    }
    session()->regenerate();
    return redirect()->route('dashboard');
}

public function logout(){
    session()->invalidate();
    return redirect()->route('login');

}
}
