<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\TherapyHistory;

class PasienController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $therapyHistories = collect();
        $totalTherapySessions = 0;
        $currentLayer = 0;
        $notifications = collect();

        try {
            $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
            $totalTherapySessions = $therapyHistories->count();
            $currentLayer = $totalTherapySessions > 0 ? min($totalTherapySessions, 4) : 0;

            // Buat notifikasi real-time dari riwayat terapi terbaru
            $notifications = $therapyHistories->take(3)->map(function ($history, $index) {
                return (object) [
                    'id' => 'therapy_' . $history->id,
                    'title' => 'Sesi Terapi Layer ' . ($index + 1) . ' Selesai',
                    'message' => 'Data terapi PPOK Anda telah berhasil disimpan pada ' .
                        \Carbon\Carbon::parse($history->created_at)->format('d F Y, H:i'),
                    'created_at' => $history->created_at,
                    'type' => 'therapy'
                ];
            });
        } catch (\Exception $e) {
        }

        $unreadNotifications = $notifications->count();

        return view('pasien.dashboard', compact('user', 'therapyHistories', 'currentLayer', 'totalTherapySessions', 'unreadNotifications', 'notifications'));
    }

    public function terapi()
    {
        $user = Auth::user();
        $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
        return view('pasien.terapi', compact('user', 'therapyHistories'));
    }

    public function storeTerapi(\Illuminate\Http\Request $request)
    {
        try {
            $user = Auth::user();

            $validated = $request->validate([
                'nama_pasien' => 'required|string|max:255',
                'usia' => 'required|integer|min:0|max:150',
                'riwayat_kambuh' => 'required|integer|in:0,1,2',
                'skala_mmrc' => 'required|integer|min:0|max:4',
                'pendamping' => 'required|string',
                'jenis_inhaler' => 'required|string|in:mdpi,dpi,nebu',
                'checklist_inhaler' => 'nullable|array',
                'hari_pemakaian' => 'required|integer|min:0|max:7',
                'kendala_kepatuhan' => 'nullable|array',
                'pilihan_terapi' => 'required|integer|min:0|max:3',
                'jawaban_fakta_mitos' => 'nullable',
                'prioritas_tujuan' => 'required|integer|min:0|max:3',
                'dukungan_pendamping' => 'nullable|string',
                'kesepakatan_tindakan' => 'nullable|array',
                'jawaban_sure' => 'nullable|array',
                'skor_sure' => 'required|integer|min:0|max:4',
                'paspor_keputusan' => 'required|string',
                'duration' => 'required|integer|min:0',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }

        $layer = TherapyHistory::where('user_id', $user->id)->count() + 1;

        try {
            $therapy = TherapyHistory::create([
                'user_id' => $user->id,
                'admin_id' => null,
                'therapy_type' => 'terapi_ppok',
                'duration' => $validated['duration'],
                'notes' => 'Sesi terapi PPOK selesai',
                'status' => 'selesai',
                'layer' => $layer,
                'nama_pasien' => $validated['nama_pasien'],
                'usia' => $validated['usia'],
                'riwayat_kambuh' => $validated['riwayat_kambuh'],
                'skala_mmrc' => $validated['skala_mmrc'],
                'pendamping' => $validated['pendamping'],
                'jenis_inhaler' => $validated['jenis_inhaler'],
                'checklist_inhaler' => json_encode($validated['checklist_inhaler'] ?? []),
                'hari_pemakaian' => $validated['hari_pemakaian'],
                'kendala_kepatuhan' => isset($validated['kendala_kepatuhan']) ? json_encode($validated['kendala_kepatuhan']) : null,
                'pilihan_terapi' => $validated['pilihan_terapi'],
                'jawaban_fakta_mitos' => json_encode($validated['jawaban_fakta_mitos'] ?? []),
                'prioritas_tujuan' => $validated['prioritas_tujuan'],
                'dukungan_pendamping' => $validated['dukungan_pendamping'] ?? null,
                'kesepakatan_tindakan' => json_encode($validated['kesepakatan_tindakan'] ?? []),
                'jawaban_sure' => json_encode($validated['jawaban_sure'] ?? []),
                'skor_sure' => $validated['skor_sure'],
                'paspor_keputusan' => $validated['paspor_keputusan'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan ke database: ' . $e->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data terapi berhasil disimpan!',
            'therapy_id' => $therapy->id
        ]);
    }

    public function edukasi()
    {
        $user = Auth::user();
        return view('pasien.edukasi', compact('user'));
    }

    public function catatan()
    {
        $user = Auth::user();
        $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
        return view('pasien.catatan', compact('user', 'therapyHistories'));
    }

    public function notifikasi()
    {
        $user = Auth::user();
        $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
        return view('pasien.notifikasi', compact('user', 'therapyHistories'));
    }

    public function updateProfile(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui!',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ]
        ]);
    }
}