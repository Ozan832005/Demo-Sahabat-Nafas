@extends('layouts.app')
@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <div class="flex items-center gap-6 mb-4">
                <div class="w-16 h-16 gradient-teal rounded-2xl flex items-center justify-center text-white text-3xl shadow-xl shadow-teal-300/40">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Profil Saya</h1>
                    <p class="text-lg mt-1" style="color: var(--text-secondary)">Lihat dan edit data profilmu</p>
                </div>
            </div>
        </div>

        <div class="max-w-2xl mx-auto">
            <!-- Kartu Info Profil -->
            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 mb-10">
                <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
                    <div class="w-20 h-20 gradient-teal rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-teal-300/40 flex-shrink-0">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-xl" style="color: var(--text-primary)">{{ auth()->user()->name }}</p>
                        <p class="text-gray-500 mt-1 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a3 3 0 11-6 0 3 3 0 016 0zM12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                    <a href="#" onclick="document.getElementById('edit-form').scrollIntoView({behavior:'smooth'})" class="px-5 py-2.5 bg-gradient-to-r from-teal-500 to-teal-600 text-white text-sm font-bold rounded-xl hover:from-teal-600 hover:to-teal-700 transition-all shadow-lg shadow-teal-300/40 whitespace-nowrap">
                        Edit Profil
                    </a>
                </div>
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-sm text-gray-500">Role: <span class="font-semibold text-teal-600 capitalize">{{ auth()->user()->role }}</span></p>
                </div>
            </div>
            <!-- Form Edit Profil -->
            <div id="edit-form" class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h2 class="text-xl font-bold" style="color: var(--text-primary)">Edit Data Profil</h2>
                </div>

                <form id="profile-form" novalidate>
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="space-y-6">
                        <div>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" required class="form-input" placeholder="Masukkan nama lengkap">
                            <p class="text-xs text-gray-400 mt-1">Nama yang akan ditampilkan di dashboard dan profil</p>
                        </div>

                        <div>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" required class="form-input" placeholder="email@contoh.com">
                            <p class="text-xs text-gray-400 mt-1">Email digunakan untuk login dan notifikasi</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="form-label">Password Baru (opsional)</label>
                                <input type="password" name="password" class="form-input" placeholder="Minimal 8 karakter">
                                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah password</p>
                            </div>
                            <div class="flex items-end">
                                <label class="form-label">&nbsp;</label>
                                <input type="password" name="password_confirmation" class="form-input" placeholder="Konfirmasi password">
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex gap-4 pt-6 border-t border-gray-100">
                        <button type="button" onclick="resetProfileForm()" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-bold hover:bg-gray-200 transition-all">Batal</button>
                        <button type="submit" id="profile-submit-btn" class="px-8 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all shadow-lg shadow-teal-300/40 flex items-center gap-2">
                            <svg id="profile-save-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function showProfileToast(message, type = 'success') {
                    let container = document.getElementById('profile-toast-container');
                    if (!container) {
                        container = document.createElement('div');
                        container.id = 'profile-toast-container';
                        container.className = 'fixed bottom-4 right-4 z-[100] flex flex-col gap-3 pointer-events-none';
                        document.body.appendChild(container);
                    }
                    const toast = document.createElement('div');
                    const isError = type === 'error';
                    const bg = isError ? 'bg-gradient-to-r from-red-500 to-red-600' : 'bg-gradient-to-r from-teal-500 to-teal-600';
                    const icon = isError
                        ? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                        : '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
                    toast.className = 'flex items-center gap-3 px-5 py-4 rounded-2xl ' + bg + ' text-white shadow-[0_10px_40px_rgba(0,0,0,0.25)] border border-white/20 min-w-[280px]';
                    toast.innerHTML =
                        '<div class="flex-shrink-0">' + icon + '</div>' +
                        '<div class="flex-1 min-w-0">' +
                        '<p class="text-sm font-semibold leading-tight">' + (isError ? 'Gagal' : 'Berhasil') + '</p>' +
                        '<p class="text-xs opacity-90 leading-tight mt-0.5">' + message + '</p>' +
                        '</div>';
                    container.appendChild(toast);
                    setTimeout(() => {
                        toast.style.opacity = '0';
                        toast.style.transform = 'translateY(10px)';
                        toast.style.transition = 'all 0.3s ease';
                        setTimeout(() => toast.remove(), 300);
                    }, 4000);
                }

                function resetProfileForm() {
                    document.getElementById('profile-form').reset();
                    document.getElementById('profile-form').name.value = '{{ auth()->user()->name }}';
                    document.getElementById('profile-form').email.value = '{{ auth()->user()->email }}';
                    showProfileToast('Form telah di-reset', 'success');
                }

                document.getElementById('profile-form').addEventListener('submit', async function(e) {
                    e.preventDefault();
                    const btn = document.getElementById('profile-submit-btn');
                    const icon = document.getElementById('profile-save-icon');
                    const originalText = btn.innerHTML;

                    btn.disabled = true;
                    btn.classList.add('opacity-75', 'cursor-not-allowed');
                    icon.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 2 5.373 2 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

                    const formData = new FormData(e.target);

                    try {
                        const res = await fetch('{{ route('pasien.profile.update') }}', {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            body: formData
                        });
                        const data = await res.json();

                        if (data.success) {
                            showProfileToast(data.message, 'success');
                            const nameEl = document.querySelector('.font-bold.text-xl');
                            if (nameEl) nameEl.textContent = data.user.name;
                            e.target.name.value = data.user.name;
                            e.target.email.value = data.user.email;
                        } else {
                            showProfileToast(data.message || 'Gagal memperbarui profil', 'error');
                        }
                    } catch (err) {
                        showProfileToast('Terjadi kesalahan jaringan: ' + err.message, 'error');
                    } finally {
                        btn.disabled = false;
                        btn.classList.remove('opacity-75', 'cursor-not-allowed');
                        btn.innerHTML = originalText;
                    }
                });
            </script>
        </div>
    </div>
@endsection