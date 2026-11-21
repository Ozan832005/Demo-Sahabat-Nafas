<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->isPasien()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('pasien.dashboard', compact('user'));
    }

    public function terapi()
    {
        return view('pasien.terapi');
    }

    public function edukasi()
    {
        return view('pasien.edukasi');
    }

    public function catatan()
    {
        return view('pasien.catatan');
    }

    public function profile()
    {
        return view('pasien.profile');
    }
}