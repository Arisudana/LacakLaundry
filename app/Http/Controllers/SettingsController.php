<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AkunAdmin;
use App\Models\AkunStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function Settings()
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

        return view('Settings', compact('role'));
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
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

        DB::table('akun_staff')->insert([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'file' => $nama_file,
        ]);

        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $this->validate($request, [
			'file' => 'required',
			'keterangan' => 'required',
		]);

        return redirect('SettingsListStaff');

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
                'email' => $request->email,
                'file' => $nama_file
            ]);
        } elseif ($isStaff) {
            DB::table('akun_staff')->where('username',$request->id)->update([
                'lastName' => $request->lastName,
                'firstName' => $request->firstName,
                'email' => $request->email,
                'file' => $nama_file
            ]);
        }


        return redirect('/settings');
    }

}
