@extends('layouts.app')

@section('content')
    @include('layouts.perawat-nav')
    
    <div class="pt-40 pb-16">
        <div class="max-w-3xl mx-auto px-4">
            <div class="mb-8">
                <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Profil Saya 👤</h1>
                <p class="mt-2" style="color: var(--text-secondary)">Kelola informasi akun dan pengaturan profil Anda</p>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100">
                <p class="text-sm font-medium" style="color: #065f46;">{{ session('success') }}</p>
            </div>
            @endif

            <div class="card-hover p-8 rounded-2xl mb-6">
                <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center text-white text-3xl font-bold">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-xl font-bold" style="color: var(--text-primary)">{{ $user->name }}</h3>
                        <p style="color: var(--text-secondary)">{{ $user->email }}</p>
                        <p class="text-sm mt-1" style="color: var(--gradient-end)">Perawat</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('perawat.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium mb-2" style="color: var(--text-secondary)">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-3 rounded-xl border-0 focus:ring-2 focus:ring-teal-500" style="background: var(--bg-tertiary); color: var(--text-primary)">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2" style="color: var(--text-secondary)">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-3 rounded-xl border-0 focus:ring-2 focus:ring-teal-500" style="background: var(--bg-tertiary); color: var(--text-primary)">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2" style="color: var(--text-secondary)">Password Baru (opsional)</label>
                            <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border-0 focus:ring-2 focus:ring-teal-500" style="background: var(--bg-tertiary); color: var(--text-primary)" placeholder="Kosongkan jika tidak ingin mengubah password">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2" style="color: var(--text-secondary)">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl border-0 focus:ring-2 focus:ring-teal-500" style="background: var(--bg-tertiary); color: var(--text-primary)" placeholder="Masukkan ulang password baru">
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:from-teal-600 hover:to-teal-800 transition-all duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection