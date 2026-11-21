<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TherapyHistory;
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
        $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
        $currentLayer = $therapyHistories->count() > 0 ? min($therapyHistories->first()->layer, 4) : 0;
        $totalTherapySessions = $therapyHistories->count();
        $unreadNotifications = 3; // Contoh notifikasi belum dibaca
        
        return view('pasien.dashboard', compact('user', 'therapyHistories', 'currentLayer', 'totalTherapySessions', 'unreadNotifications'));
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
    public function notifikasi()
    {
        $user = Auth::user();
        $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
        
        return view('pasien.notifikasi', compact('user', 'therapyHistories'));
    }
}