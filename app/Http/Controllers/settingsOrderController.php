<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class settingsOrderController extends Controller
{
    public function viewSettingsOrder()
    {
        return view('SettingsOrder');
    }
}
