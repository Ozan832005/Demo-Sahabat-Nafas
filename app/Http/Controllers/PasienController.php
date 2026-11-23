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
                'riwayat_kambuh' => 'required|string|in:tidak_pernah,1x,2x,3x_lebih',
                'skala_mmrc' => 'required|integer|min:0|max:4',
                'pendamping' => 'required|string',
                'jenis_inhaler' => 'required|string|in:kuning,hijau,biru,lainnya',
                'checklist_inhaler' => 'nullable|array',
                'hari_pemakaian' => 'required|integer|min:0|max:7',
                'kendala_kepatuhan' => 'nullable|array',
                'pilihan_terapi' => 'required|string|in:rutin,latihan,kombinasi',
                'jawaban_fakta_mitos' => 'nullable|array',
                'prioritas_tujuan' => 'required|string|in:tidak_ngos,tidak_rawat,ibadah',
                'dukungan_pendamping' => 'nullable|string',
                'kesepakatan_tindakan' => 'nullable|array',
                'harapan_pasien' => 'required|string|in:aktivitas,rawat,ibadah',
                'dukungan_pendamping_baru' => 'nullable|string',
                'rencana_bertahap' => 'nullable|array',
                'paham_manfaat' => 'nullable|string',
                'pilihan_tepat' => 'nullable|string',
                'dukungan_cukup' => 'nullable|string',
                'yakin_keputusan' => 'nullable|string',
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
                'duration' => $validated['duration'] ?? 0,
                'notes' => 'Sesi terapi PPOK selesai',
                'status' => 'selesai',
                'layer' => $layer,
                'nama_pasien' => $validated['nama_pasien'] ?? '',
                'usia' => $validated['usia'] ?? 0,
                'riwayat_kambuh' => $validated['riwayat_kambuh'] ?? '',
                'skala_mmrc' => $validated['skala_mmrc'] ?? 0,
                'pendamping' => $validated['pendamping'] ?? '',
                'jenis_inhaler' => $validated['jenis_inhaler'] ?? '',
                'checklist_inhaler' => $validated['checklist_inhaler'] ?? [],
                'hari_pemakaian' => $validated['hari_pemakaian'] ?? 7,
                'kendala_kepatuhan' => $validated['kendala_kepatuhan'] ?? [],
                'pilihan_terapi' => $validated['pilihan_terapi'] ?? '',
                'jawaban_fakta_mitos' => $validated['jawaban_fakta_mitos'] ?? [],
                'prioritas_tujuan' => $validated['prioritas_tujuan'] ?? '',
                'dukungan_pendamping' => $validated['dukungan_pendamping'] ?? '',
                'kesepakatan_tindakan' => $validated['kesepakatan_tindakan'] ?? [],
                'harapan_pasien' => $validated['harapan_pasien'] ?? '',
                'dukungan_pendamping_baru' => $validated['dukungan_pendamping_baru'] ?? '',
                'rencana_bertahap' => $validated['rencana_bertahap'] ?? [],
                'paham_manfaat' => $validated['paham_manfaat'] ?? '',
                'pilihan_tepat' => $validated['pilihan_tepat'] ?? '',
                'dukungan_cukup' => $validated['dukungan_cukup'] ?? '',
                'yakin_keputusan' => $validated['yakin_keputusan'] ?? '',
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

    public function riwayatTerapi()
    {
        $user = Auth::user();
        $therapyHistories = TherapyHistory::where('user_id', $user->id)->latest()->get();
        return view('pasien.riwayat-terapi', compact('user', 'therapyHistories'));
    }

    public function editTerapi(TherapyHistory $therapy)
    {
        $user = Auth::user();
        if ($therapy->user_id !== $user->id) {
            abort(403);
        }
        return response()->json(['success' => true, 'therapy' => $therapy]);
    }

    public function updateTerapi(\Illuminate\Http\Request $request, TherapyHistory $therapy)
    {
        $user = Auth::user();
        if ($therapy->user_id !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'usia' => 'required|integer|min:0|max:150',
            'riwayat_kambuh' => 'required|string|in:tidak_pernah,1x,2x,3x_lebih',
            'skala_mmrc' => 'required|integer|min:0|max:4',
            'pendamping' => 'required|string|max:255',
            'jenis_inhaler' => 'required|string|in:kuning,hijau,biru,lainnya',
            'hari_pemakaian' => 'required|integer|min:0|max:7',
            'checklist_inhaler' => 'required|array',
            'checklist_inhaler.*' => 'string',
            'kendala_kepatuhan' => 'required|array',
            'kendala_kepatuhan.*' => 'string',
            'pilihan_terapi' => 'required|string|in:rutin,latihan,kombinasi',
            'jawaban_fakta_mitos' => 'required|array',
            'prioritas_tujuan' => 'required|string|in:tidak_ngos,tidak_rawat,ibadah',
            'dukungan_pendamping' => 'required|string|max:255',
            'kesepakatan_tindakan' => 'required|array',
            'kesepakatan_tindakan.*' => 'string',
            'harapan_pasien' => 'required|string|in:aktivitas,rawat,ibadah',
            'dukungan_pendamping_baru' => 'required|string|max:255',
            'rencana_bertahap' => 'required|array',
            'rencana_bertahap.*' => 'string',
            'paham_manfaat' => 'required|string|in:sangat_tidak,tidak,ragu,ya,sangat_ya',
            'pilihan_tepat' => 'required|string|in:sangat_tidak,tidak,ragu,ya,sangat_ya',
            'dukungan_cukup' => 'required|string|in:sangat_tidak,tidak,ragu,ya,sangat_ya',
            'yakin_keputusan' => 'required|string|in:sangat_tidak,tidak,ragu,ya,sangat_ya',
        ]);

        $therapy->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Riwayat terapi berhasil diperbarui',
            'therapy' => $therapy
        ]);
    }

    public function deleteTerapi(TherapyHistory $therapy)
    {
        $user = Auth::user();
        if ($therapy->user_id !== $user->id) {
            abort(403);
        }

        $therapy->delete();

        return response()->json([
            'success' => true,
            'message' => 'Riwayat terapi berhasil dihapus'
        ]);
    }
}