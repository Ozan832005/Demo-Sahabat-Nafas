@extends('layouts.app')

@section('content')
    @include('layouts.perawat-nav')
    
    <div class="pt-40 pb-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-8">
                <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Edukasi Kesehatan 📚</h1>
                <p class="mt-2" style="color: var(--text-secondary)">Materi edukasi untuk membantu pasien memahami teknik pernapasan yang benar</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="card-hover p-6 rounded-2xl">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Teknik Pernapasan Diafragma</h3>
                    <p class="mb-4" style="color: var(--text-secondary)">Teknik pernapasan yang menggunakan otot diafragma untuk pernapasan yang lebih dalam dan efisien. Ini adalah dasar dari semua latihan pernapasan yang sehat.</p>
                    <ul class="space-y-2 mb-4">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Duduk santai dengan punggung tegak</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Letakkan tangan di perut</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Hirup napas melalui hidung selama 4 detik</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Kembuskan napas melalui mulut selama 6 detik</span>
                        </li>
                    </ul>
                </div>

                <div class="card-hover p-6 rounded-2xl">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Pernapasan Pursed Lips</h3>
                    <p class="mb-4" style="color: var(--text-secondary)">Teknik pernapasan yang membantu menjaga saluran udara tetap terbuka lebih lama, mengurangi sesak napas dan meningkatkan pertukaran udara di paru-paru.</p>
                    <ul class="space-y-2 mb-4">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Hirup napas melalui hidung selama 2 detik</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Kerucutkan bibir seperti akan bersiul</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Kembuskan napas perlahan melalui bibir kerucut selama 4-6 detik</span>
                        </li>
                    </ul>
                </div>

                <div class="card-hover p-6 rounded-2xl">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Manfaat Latihan Pernapasan</h3>
                    <p class="mb-4" style="color: var(--text-secondary)">Latihan pernapasan teratur memiliki banyak manfaat bagi kesehatan paru-paru dan tubuh secara keseluruhan.</p>
                    <ul class="space-y-2 mb-4">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Meningkatkan kapasitas paru-paru</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Mengurangi stres dan kecemasan</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Menurunkan tekanan darah</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Memperbaiki kualitas tidur</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Meningkatkan energi dan fokus</span>
                        </li>
                    </ul>
                </div>

                <div class="card-hover p-6 rounded-2xl">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-700 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Tips Rutinitas Harian</h3>
                    <p class="mb-4" style="color: var(--text-secondary)">Untuk mendapatkan manfaat maksimal, lakukan latihan pernapasan secara konsisten setiap hari.</p>
                    <ul class="space-y-2 mb-4">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-orange-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Lakukan 5-10 menit setiap pagi setelah bangun tidur</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-orange-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Latihan singkat 2-3 menit saat merasa stres atau cemas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-orange-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Sesi 15 menit sebelum tidur untuk membantu relaksasi</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-orange-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary)">Tingkatkan durasi secara bertahap seiring kemajuan</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card-hover p-8 rounded-2xl">
                <h3 class="text-xl font-bold mb-4" style="color: var(--text-primary)">Panduan Umum untuk Perawat</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Sebagai perawat, penting untuk memahami kondisi pasien dan memberikan panduan yang tepat sesuai dengan tingkat kemampuan mereka. Selalu dorong pasien untuk berlatih secara konsisten dan berikan apresiasi atas kemajuan yang mereka capai.</p>
                <div class="p-4 rounded-xl bg-teal-50 border border-teal-100">
                    <p class="text-sm" style="color: var(--gradient-end)">💡 Tips: Gunakan fitur catatan pada halaman Riwayat Terapi untuk memberikan rekomendasi personal kepada setiap pasien berdasarkan hasil sesi terapi mereka.</p>
                </div>
            </div>
        </div>
    </div>
@endsection