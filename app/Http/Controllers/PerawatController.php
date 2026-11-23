<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TherapyHistory;
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
        $todayTherapies = TherapyHistory::whereDate('created_at', today())->count();
        $totalTherapies = TherapyHistory::count();
        $needsAttention = TherapyHistory::where('difficulty_level', 'berat')->distinct('user_id')->count();
        
        return view('perawat.dashboard', compact('user', 'pasienList', 'todayTherapies', 'totalTherapies', 'needsAttention'));
    }

    public function riwayatTerapi(Request $request)
    {
        $user = Auth::user();
        $pasienList = User::where('role', User::ROLE_PASIEN)->get();
        
        $query = TherapyHistory::with('user');
        
        if ($request->has('pasien_id') && $request->pasien_id) {
            $query->where('user_id', $request->pasien_id);
        }
        
        $therapyHistories = $query->latest()->paginate(10);
        
        return view('perawat.riwayat-terapi', compact('user', 'pasienList', 'therapyHistories'));
    }

    public function storeNote(Request $request)
    {
        $request->validate([
            'history_id' => 'required|exists:therapy_histories,id',
            'note' => 'required|string|max:1000'
        ]);

        $history = TherapyHistory::findOrFail($request->history_id);
        $history->perawat_notes = $request->note;
        $history->save();

        return redirect()->back()->with('success', 'Catatan berhasil disimpan!');
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
        $user = Auth::user();
        return view('perawat.edukasi', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('perawat.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}