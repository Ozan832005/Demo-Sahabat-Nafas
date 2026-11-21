@extends('layouts.dashboard')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Hubungi Pengguna</h1>
        <p class="text-gray-500 mt-1">Kirim pesan ke pengguna sistem</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.contact.send') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Pilih Pengguna</label>
                <select name="user_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Pesan</label>
                <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none resize-none" placeholder="Tulis pesan yang ingin dikirim ke pengguna"></textarea>
            </div>
            <div class="pt-4">
                <button type="submit" class="w-full btn-primary text-white px-4 py-3 rounded-xl font-semibold flex items-center justify-center gap-2.5">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Kirim Pesan</span>
                </button>
            </div>
        </form>
    </div>

    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100 p-6">
        <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-circle-info text-blue-600"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-800 mb-1">Informasi</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Pesan yang Anda kirim akan muncul sebagai notifikasi di akun pengguna terkait. Pastikan pesan yang dikirim jelas dan relevan dengan kebutuhan pengguna.</p>
            </div>
        </div>
    </div>
</div>
@endsection