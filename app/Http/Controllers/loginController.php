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
    $userAdmin = Auth::guard('akun_admin')->user();
        $userStaff = Auth::guard('akun_staff')->user();

        if ($userAdmin) {
            $userAdmin->status = 1;
            $userAdmin->save();
        }

        if ($userStaff) {
            $userStaff->status = 1;
            $userStaff->save();
        }

    session()->regenerate();
    return redirect()->route('dashboard');
}

public function logout(){
    $user = Auth::user();
    $user->status = 0;
    $user->save();
    session()->invalidate();
    return redirect()->route('login');

}
}
