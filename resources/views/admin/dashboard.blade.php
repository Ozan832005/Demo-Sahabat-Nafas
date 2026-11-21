@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Dashboard Admin</h1>
            <p class="text-gray-500 mt-1">Kelola semua aspek aplikasi Sahabat Nafas</p>
        </div>
        <button onclick="openModal('addUserModal')" class="btn-primary text-white px-5 py-3 rounded-xl font-semibold flex items-center gap-2.5 w-full sm:w-auto justify-center">
            <i class="fa-solid fa-user-plus"></i>
            <span>Tambah Pengguna</span>
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 md:gap-6">
        <div class="stat-card bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Total Pengguna</span>
                <div class="w-13 h-13 bg-gradient-to-br from-teal-400 to-teal-600 rounded-xl flex items-center justify-center shadow-lg shadow-teal-200">
                    <i class="fa-solid fa-users text-white text-xl"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $totalUsers ?? 4 }}</p>
            <p class="text-sm text-emerald-600 mt-1 font-medium flex items-center gap-1">
                <i class="fa-solid fa-arrow-up text-xs"></i>
                +12% dari bulan lalu
            </p>
        </div>

        <div class="stat-card bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Pasien</span>
                <div class="w-13 h-13 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-user-injured text-white text-xl"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $totalPasien ?? 2 }}</p>
            <p class="text-sm text-gray-500 mt-1 font-medium">Pengguna terdaftar</p>
        </div>

        <div class="stat-card bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Perawat</span>
                <div class="w-13 h-13 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-200">
                    <i class="fa-solid fa-user-nurse text-white text-xl"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $totalPerawat ?? 1 }}</p>
            <p class="text-sm text-gray-500 mt-1 font-medium">Tenaga medis aktif</p>
        </div>

        <div class="stat-card bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Admin</span>
                <div class="w-13 h-13 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-200">
                    <i class="fa-solid fa-user-shield text-white text-xl"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $totalAdmin ?? 1 }}</p>
            <p class="text-sm text-gray-500 mt-1 font-medium">Akses penuh sistem</p>
        </div>

        <a href="{{ route('admin.messages') }}" class="stat-card bg-white p-6 rounded-2xl border border-gray-100 shadow-sm block">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Pesan Baru</span>
                <div class="w-13 h-13 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-200">
                    <i class="fa-solid fa-envelope text-white text-xl"></i>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $unreadMessages ?? 3 }}</p>
            <p class="text-sm text-red-500 mt-1 font-medium flex items-center gap-1">
                <span class="w-2 h-2 bg-red-500 rounded-full inline-block pulse-dot"></span>
                Belum dibaca
            </p>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden card-hover">
            <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h3 class="text-xl font-bold text-gray-800">Kelola Pengguna</h3>
                <div class="relative w-full sm:w-72">
                    <input type="text" placeholder="Cari pengguna..." class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition-all">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Pengguna</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden md:table-cell">Email</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Role</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden lg:table-cell">Terdaftar</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                                        <i class="fa-solid fa-user-shield text-white"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800">Admin Sahabat</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-500 hidden md:table-cell">a****@***********</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 bg-purple-100 text-purple-700 rounded-full text-xs font-bold">Admin</span>
                            </td>
                            <td class="py-4 px-6 text-gray-500 text-sm hidden lg:table-cell font-medium">10 Nov 2026</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                                        <i class="fa-solid fa-user-nurse text-white"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800">Perawat Sarah</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-500 hidden md:table-cell">p******@***********</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 bg-green-100 text-green-700 rounded-full text-xs font-bold">Perawat</span>
                            </td>
                            <td class="py-4 px-6 text-gray-500 text-sm hidden lg:table-cell font-medium">12 Nov 2026</td                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                                        <i class="fa-solid fa-user-injured text-white"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800">Pasien Ahmad</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-500 hidden md:table-cell">p*****@***********</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">Pasien</span>
                            </td>
                            <td class="py-4 px-6 text-gray-500 text-sm hidden lg:table-cell font-medium">15 Nov 2026</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                                        <i class="fa-solid fa-user-injured text-white"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800">Pasien Siti</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-500 hidden md:table-cell">p****@***********</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">Pasien</span>
                            </td>
                            <td class="py-4 px-6 text-gray-500 text-sm hidden lg:table-cell font-medium">18 Nov 2026</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 card-hover">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h3>
                <div class="space-y-3">
                    <button onclick="openModal('contactModal')" class="w-full flex items-center gap-3 p-4 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl hover:from-emerald-100 hover:to-teal-100 transition-all group">
                        <div class="w-11 h-11 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-paper-plane text-white"></i>
                        </div>
                        <span class="font-semibold text-gray-800">Hubungi Pengguna</span>
                    </button>
                    <button onclick="openModal('addTherapyModal')" class="w-full flex items-center gap-3 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl hover:from-blue-100 hover:to-indigo-100 transition-all group">
                        <div class="w-11 h-11 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-clock-rotate-left text-white"></i>
                        </div>
                        <span class="font-semibold text-gray-800">Riwayat Terapi</span>
                    </button>
                    <a href="{{ route('admin.messages') }}" class="w-full flex items-center gap-3 p-4 bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl hover:from-orange-100 hover:to-amber-100 transition-all group block">
                        <div class="w-11 h-11 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-envelope-open-text text-white"></i>
                        </div>
                        <span class="font-semibold text-gray-800">Lihat Pesan</span>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 card-hover">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Status Sistem</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-emerald-500 rounded-full pulse-dot"></div>
                            <span class="text-sm font-medium text-gray-700">Server</span>
                        </div>
                        <span class="text-sm font-bold text-emerald-600">Online</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-emerald-500 rounded-full pulse-dot"></div>
                            <span class="text-sm font-medium text-gray-700">Database</span>
                        </div>
                        <span class="text-sm font-bold text-emerald-600">Tersambung</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-emerald-500 rounded-full pulse-dot"></div>
                            <span class="text-sm font-medium text-gray-700">Cache</span>
                        </div>
                        <span class="text-sm font-bold text-emerald-600">Aktif</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm font-medium text-gray-700">Versi App</span>
                        </div>
                        <span class="text-sm font-bold text-gray-600">v1.0.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection