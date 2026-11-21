@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Kelola Pesan</h1>
            <p class="text-gray-500 mt-1">Kelola pesan masuk dari pengguna</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if($messages->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-inbox text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Belum ada pesan</h3>
            <p class="text-gray-500">Pesan masuk dari pengguna akan muncul di sini</p>
        </div>
    @else
        <div class="grid gap-4">
            @foreach($messages as $message)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-all {{ !$message->is_read ? 'border-l-4 border-l-emerald-500' : '' }}">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                            <i class="fa-solid fa-user text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-2 mb-1">
                                <h3 class="font-bold text-gray-800">{{ $message->name }}</h3>
                                @if(!$message->is_read)
                                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold">Baru</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-500 mb-3">{{ $message->email }} • {{ $message->created_at->diffForHumans() }}</p>
                            <p class="text-gray-700 leading-relaxed">{{ $message->message }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2 sm:flex-col">
                        @if(!$message->is_read)
                            <form action="{{ route('admin.messages.read', $message) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Tandai dibaca">
                                    <i class="fa-solid fa-envelope-open"></i>
                                </button>
                            </form>
                        @endif
                        <button type="button" onclick="showConfirm('Hapus Pesan', 'Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dibatalkan.', function() { document.getElementById('deleteMessageForm{{ $message->id }}').submit(); })" class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <form id="deleteMessageForm{{ $message->id }}" method="POST" action="{{ route('admin.messages.destroy', $message) }}" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection