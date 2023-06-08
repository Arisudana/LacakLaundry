<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsAdminController extends Controller
{
    public function SettingsAdmin()
    {
        return view('SettingsAdmin');
    }

    public function SettingsEditProfile()
    {
        return view('SettingsEditProfile');
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

}
