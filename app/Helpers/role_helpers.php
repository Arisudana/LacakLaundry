<?php

if (!function_exists('userHasRole')) {
    function userHasRole($role)
    {
        $isAdmin = App\Models\AkunAdmin::where('username', auth()->user()->username)->first();
        $isStaff = App\Models\AkunStaff::where('username', auth()->user()->username)->first();

        if ($role === 'admin' && $isAdmin) {
            return true;
        } elseif ($role === 'staff' && $isStaff) {
            return true;
        }

        return false;
    }
}
