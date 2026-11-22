@extends('layouts.app')
@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16">
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

        <div class="bg-white rounded-[28px] p-10 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
            <div class="text-center py-8">
                <div class="w-24 h-24 gradient-teal rounded-full flex items-center justify-center text-white font-bold text-3xl shadow-lg mx-auto mb-5">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <p class="font-bold text-xl" style="color: var(--text-primary)">{{ auth()->user()->name }}</p>
                <p class="text-gray-500 mt-1">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
@endsection