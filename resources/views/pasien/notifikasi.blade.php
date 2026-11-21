@extends('layouts.app')
@section('content')
    <div class="pt-40 pb-16">
        <div class="mb-12">
            <div class="flex items-center gap-6 mb-4">
                <div class="w-16 h-16 gradient-teal rounded-2xl flex items-center justify-center text-white text-3xl shadow-xl shadow-teal-300/40">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Notifikasi</h1>
                    <p class="text-lg mt-1" style="color: var(--text-secondary)">Catatan penting dari perawat untukmu</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] p-10 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
            <div class="space-y-5">
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-5">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-semibold">Belum ada notifikasi</p>
                    <p class="text-sm text-gray-400 mt-1">Notifikasi dari perawat akan muncul di sini</p>
                </div>
            </div>
        </div>
    </div>
@endsection