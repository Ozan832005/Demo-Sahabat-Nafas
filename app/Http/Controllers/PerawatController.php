<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerawatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->isPerawat()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $user = Auth::user();
        $pasienList = User::where('role', User::ROLE_PASIEN)->get();
        return view('perawat.dashboard', compact('user', 'pasienList'));
    }

    public function pasien()
    {
        $pasienList = User::where('role', User::ROLE_PASIEN)->get();
        return view('perawat.pasien', compact('pasienList'));
    }

    public function monitoring()
    {
        return view('perawat.monitoring');
    }

    public function edukasi()
    {
        return view('perawat.edukasi');
    }

    public function profile()
    {
        return view('perawat.profile');
    }
}