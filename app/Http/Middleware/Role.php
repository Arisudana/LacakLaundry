<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AkunAdmin;
use App\Models\AkunStaff;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $isAdmin = AkunAdmin::where('username', Auth::user()->username)->first();
        $isStaff = AkunStaff::where('username', Auth::user()->username)->first();

        if($role == 'admin' && $isAdmin){
            return $next($request);
        }else if($role == 'staff' && $isStaff){
            return $next($request);
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki akses');
    }
}
