<?php

namespace App\Http\Controllers;

use App\Models\TherapyHistory;
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
        $totalTherapySessions = $therapyHistories->count();
        $currentLayer = $totalTherapySessions > 0 ? min($totalTherapySessions, 4) : 0;
        $unreadNotifications = 3;
        $notifications = collect();
        
        return view('pasien.dashboard', compact('user', 'therapyHistories', 'currentLayer', 'totalTherapySessions', 'unreadNotifications', 'notifications'));
    }

    public function terapi()
    {
        $user = Auth::user();
        return view('pasien.terapi', compact('user'));
    }

    public function edukasi()
    {
        $user = Auth::user();
        return view('pasien.edukasi', compact('user'));
    }

    public function catatan()
    {
        $user = Auth::user();
        return view('pasien.catatan', compact('user'));
    }
}