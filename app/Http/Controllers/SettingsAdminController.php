<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsAdminController extends Controller
{
    public function SettingsAdmin()
    {
        return view('SettingsAdmin');
    }

    public function SettingsListStaff()
    {
        return view('SettingsListStaff');
    }

    public function SettingsAddStaff()
    {
        return view('SettingsAddStaff');
    }

    public function SettingsOrder()
    {
        return view('SettingsOrder');
    }

    public function SettingsEditProfile($id)
    {
        $akun_admin = DB::table('akun_admin')->where('username',$id)->get();
        return view('SettingsEditProfile',['akun_admin' => $akun_admin]);
    }

    public function SubmitEdit(Request $request)
    {
        DB::table('akun_admin')->where('username',$request->id)->update([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email
        ]);

        return redirect('/settings');
    }

}
