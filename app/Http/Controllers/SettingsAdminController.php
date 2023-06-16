<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AkunAdmin;
use App\Models\AkunStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsAdminController extends Controller
{
    public function SettingsAdmin()
    {
        $user = Auth::user();
        $isAdmin = AkunAdmin::where('username', $user->username)->exists();
        $isStaff = AkunStaff::where('username', $user->username)->exists();

        if ($isAdmin) {
            $role = 'Admin';
        } elseif ($isStaff) {
            $role = 'Staff';
        } else {
            $role = null;
        }

        return view('SettingsAdmin', compact('role'));
    }

    public function SettingsListStaff()
    {
        $user = Auth::user();
        $isAdmin = AkunAdmin::where('username', $user->username)->exists();
        $isStaff = AkunStaff::where('username', $user->username)->exists();

        if ($isAdmin) {
            $role = 'Admin';
        } elseif ($isStaff) {
            $role = 'Staff';
        } else {
            $role = null;
        }

        $akun_staff = DB::table('akun_staff')->paginate(5);

        return view('SettingsListStaff', compact('role'), ['akun_staff' => $akun_staff]);
    }

    public function SettingsAddStaff()
    {
        return view('SettingsAddStaff');
    }

    public function SettingsStaffAdd(Request $request)
    {
        DB::table('akun_staff')->insert([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password = Hash::make($request->password)
        ]);

        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        return redirect('/settings/staff');

    }

    public function SettingsEditProfile($id)
    {
        $user = Auth::user();
        $isAdmin = AkunAdmin::where('username', $user->username)->exists();
        $isStaff = AkunStaff::where('username', $user->username)->exists();

        if ($isAdmin) {
            $akun_admin = DB::table('akun_admin')->where('username',$id)->get();
            return view('SettingsEditProfile',['akun_admin' => $akun_admin]);
        } elseif ($isStaff) {
            $akun_staff = DB::table('akun_staff')->where('username',$id)->get();
        return view('SettingsEditProfile',['akun_staff' => $akun_staff]);
    }
    }

    public function SubmitEdit(Request $request)
    {
        $user = Auth::user();
        $isAdmin = AkunAdmin::where('username', $user->username)->exists();
        $isStaff = AkunStaff::where('username', $user->username)->exists();

        if ($isAdmin) {
            DB::table('akun_admin')->where('username',$request->id)->update([
                'lastName' => $request->lastName,
                'firstName' => $request->firstName,
                'email' => $request->email
            ]);
        } elseif ($isStaff) {
            DB::table('akun_staff')->where('username',$request->id)->update([
                'lastName' => $request->lastName,
                'firstName' => $request->firstName,
                'email' => $request->email
            ]);
        }


        return redirect('/settings');
    }

}
