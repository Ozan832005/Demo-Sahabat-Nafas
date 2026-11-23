<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactMessage;
use App\Models\TherapyHistory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->isAdmin()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $user = Auth::user();
        $totalUsers = User::count();
        $totalPasien = User::where('role', User::ROLE_PASIEN)->count();
        $totalPerawat = User::where('role', User::ROLE_PERAWAT)->count();
        $totalAdmin = User::where('role', User::ROLE_ADMIN)->count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        
        return view('admin.dashboard', compact('user', 'totalUsers', 'totalPasien', 'totalPerawat', 'totalAdmin', 'unreadMessages'));
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return back()->with('success', 'Pesan ditandai telah dibaca');
    }

    public function deleteMessage(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Pesan berhasil dihapus');
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:pasien,perawat,admin',
            'age' => 'nullable|integer|min:1|max:150',
            'address' => 'nullable|string',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'age' => $validated['age'] ?? null,
            'address' => $validated['address'] ?? null,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat');
    }

    public function editUser(User $user)
    {
        return view('admin.user-edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:pasien,perawat,admin',
            'age' => 'nullable|integer|min:1|max:150',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'age' => $validated['age'] ?? null,
            'address' => $validated['address'] ?? null,
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }

    public function deleteUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri');
        }
        
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function therapyHistory()
    {
        $therapies = TherapyHistory::with('user', 'admin')->latest()->get();
        $users = User::where('role', User::ROLE_PASIEN)->get();
        return view('admin.therapy', compact('therapies', 'users'));
    }

    public function storeTherapy(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'therapy_type' => 'required|string|max:255',
                'duration' => 'required|integer|min:1',
                'notes' => 'nullable|string',
                // Layer 1 fields
                'riwayat_kambuh' => 'required|string|in:tidak_pernah,1x,2x,3x_lebih',
                'skala_mmrc' => 'required|integer|min:0|max:4',
                // Layer 2 field
                'jenis_inhaler' => 'required|string|in:kuning,hijau,biru,lainnya',
                // Layer 3 field
                'pilihan_terapi' => 'required|string|in:rutin,latihan,kombinasi',
                // Layer 4 field
                'prioritas_tujuan' => 'required|string|in:tidak_ngos,tidak_rawat,ibadah',
            ]);

            // Determine the next layer number
            $layer = TherapyHistory::where('user_id', $validated['user_id'])->count() + 1;

            $therapy = TherapyHistory::create([
                'user_id' => $validated['user_id'],
                'admin_id' => Auth::id(),
                'therapy_type' => $validated['therapy_type'],
                'duration' => $validated['duration'],
                'notes' => $validated['notes'] ?? null,
                'status' => 'selesai',
                'layer' => $layer,
                // Layer 1 fields
                'riwayat_kambuh' => $validated['riwayat_kambuh'] ?? '',
                'skala_mmrc' => $validated['skala_mmrc'] ?? 0,
                // Layer 2 field
                'jenis_inhaler' => $validated['jenis_inhaler'] ?? '',
                // Layer 3 field
                'pilihan_terapi' => $validated['pilihan_terapi'] ?? '',
                // Layer 4 field
                'prioritas_tujuan' => $validated['prioritas_tujuan'] ?? '',
            ]);

            if ($request->expectsJson() || $request->header('Accept') === 'application/json' || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Riwayat terapi berhasil ditambahkan',
                    'therapy_id' => $therapy->id
                ]);
            }

            return redirect()->route('admin.therapy.history')->with('success', 'Riwayat terapi berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->header('Accept') === 'application/json' || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->errors());
        } catch (\Exception $e) {
            if ($request->expectsJson() || $request->header('Accept') === 'application/json' || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menyimpan ke database: ' . $e->getMessage()
                ], 500);
            }

            return back()->withErrors(['error' => 'Gagal menyimpan ke database: ' . $e->getMessage()]);
        }
    }

    public function editTherapy(TherapyHistory $therapy)
    {
        $users = User::where('role', User::ROLE_PASIEN)->get();
        return view('admin.therapy-edit', compact('therapy', 'users'));
    }

    public function updateTherapy(Request $request, TherapyHistory $therapy)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'therapy_type' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $therapy->update([
            'user_id' => $validated['user_id'],
            'therapy_type' => $validated['therapy_type'],
            'duration' => $validated['duration'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('admin.therapy.history')->with('success', 'Riwayat terapi berhasil diperbarui');
    }

    public function deleteTherapy(TherapyHistory $therapy)
    {
        $therapy->delete();
        return redirect()->route('admin.therapy.history')->with('success', 'Riwayat terapi berhasil dihapus');
    }

    public function contact()
    {
        $users = User::all();
        return view('admin.contact', compact('users'));
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $user = User::findOrFail($validated['user_id']);
        
        return redirect()->route('admin.contact')->with('success', "Pesan berhasil dikirim ke {$user->name}");
    }

    public function site()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.site', compact('settings'));
    }

    public function updateSite(Request $request)
    {
        $validated = $request->validate([
            'slider_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'contact_whatsapp' => 'nullable|string',
            'social_tiktok' => 'nullable|url',
            'social_facebook' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_youtube' => 'nullable|url',
        ]);

        for ($i = 1; $i <= 3; $i++) {
            $sliderKey = 'slider_image_' . $i;
            if ($request->hasFile($sliderKey)) {
                $path = $request->file($sliderKey)->store('sliders', 'public');
                Setting::updateOrCreate(['key' => $sliderKey], ['value' => $path, 'type' => 'image']);
            }
        }

        $textFields = ['contact_email', 'contact_phone', 'contact_address', 'contact_whatsapp', 'social_tiktok', 'social_facebook', 'social_instagram', 'social_youtube'];
        foreach ($textFields as $field) {
            if (isset($validated[$field])) {
                Setting::updateOrCreate(['key' => $field], ['value' => $validated[$field], 'type' => 'text']);
            }
        }

        return redirect()->route('admin.site')->with('success', 'Pengaturan situs berhasil diperbarui');
    }
}