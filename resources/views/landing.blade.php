@extends('layouts.app')
@section('content')
<section class="gradient-hero text-white py-20 md:py-32">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="slide-in">
                <span class="inline-block px-6 py-3 bg-white/15 rounded-full text-sm font-medium mb-8 border border-white/25 backdrop-blur-sm">
                    Aplikasi Kesehatan Terpercaya
                </span>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 leading-tight">
                    <span class="text-teal-200 typing-text" id="typingText">PPOK Anda</span><span class="text-teal-200 animate-pulse">|</span>
                </h1>
                <p class="text-xl md:text-2xl text-teal-100 mb-10 leading-relaxed">
                    Sahabat Napas membantu Anda menjalani terapi PPOK dengan panduan langkah demi langkah, latihan napas interaktif, dan edukasi kesehatan yang terpercaya.
                </p>
                <div class="flex flex-wrap gap-6">
                    <button onclick="openLoginModal()" class="px-10 py-5 bg-white text-teal-800 rounded-2xl font-bold text-lg hover:bg-teal-50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl cursor-pointer">
                        Masuk
                    </button>
                    <button onclick="openRegisterModal()" class="px-10 py-5 bg-transparent border-2 border-white text-white rounded-2xl font-bold text-lg hover:bg-white/15 transition-all duration-300 backdrop-blur-sm cursor-pointer">
                        Daftar Gratis
                    </button>

                </div>
            </div>
<div class="flex justify-center w-full">
    <div class="relative w-full max-w-md md:max-w-lg animate-float">
        <div id="sliderContainer" class="relative overflow-hidden rounded-3xl shadow-2xl border-4 border-white/20">
                <div id="sliderWrapper" class="flex transition-transform duration-500 ease-out">
                    @for ($i = 1; $i <= 3; $i++)
                        @php $sliderKey = 'slider_image_' . $i; @endphp
                        <div class="slider-item min-w-full">
                            @if(!empty($settings[$sliderKey]))
                                <img src="{{ asset('storage/' . $settings[$sliderKey]) }}" alt="Slider {{ $i }}" class="w-full h-80 md:h-96 object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1559757175-5700dde675bc?w=500&h=500&fit=crop" alt="Slider {{ $i }}" class="w-full h-80 md:h-96 object-cover">
                            @endif
                        </div>
                    @endfor
                </div>
            
            <button onclick="prevSlide()" class="absolute left-3 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 z-10">
                <svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            
            <button onclick="nextSlide()" class="absolute right-3 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 z-10">
                <svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
        
        <div class="flex justify-center gap-3 mt-6">
            <button onclick="goToSlide(0)" class="slider-dot w-3 h-3 rounded-full bg-white transition-all duration-300 hover:scale-125" data-index="0"></button>
            <button onclick="goToSlide(1)" class="slider-dot w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:scale-125" data-index="1"></button>
            <button onclick="goToSlide(2)" class="slider-dot w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:scale-125" data-index="2"></button>
            <button onclick="goToSlide(3)" class="slider-dot w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:scale-125" data-index="3"></button>
        </div>
    </div>
</div>
        </div>
    </div>
</section>

<section class="py-20" style="background: var(--bg-primary)"  id="fitur">
    <div class="max-w-7xl mx-auto px-4" >
        <div class="text-center mb-16">
            <span class="inline-block px-6 py-3 rounded-full text-sm font-medium mb-6" style="background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(6, 182, 212, 0.1)); color: var(--gradient-end); border: 1px solid rgba(20, 184, 166, 0.2)">
                Fitur Unggulan
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6" style="color: var(--text-primary)">
                Semua yang Anda butuhkan untuk mengelola terapi PPOK
            </h2>
            <p class="text-xl max-w-3xl mx-auto" style="color: var(--text-secondary)">
                dalam satu aplikasi yang terintegrasi dan mudah digunakan
            </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="feature-widget">
                <div class="feature-icon-wrapper">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3>Panduan Terapi</h3>
                <p>Panduan langkah demi langkah penggunaan inhaler MDI dan DPI dengan video dan animasi interaktif.</p>
            </div>
            <div class="feature-widget">
                <div class="feature-icon-wrapper">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3>Latihan Napas</h3>
                <p>Latihan pernapasan interaktif dengan timer visual untuk membantu memperkuat otot pernapasan.</p>
            </div>
            <div class="feature-widget">
                <div class="feature-icon-wrapper">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3>Edukasi Kesehatan</h3>
                <p>Artikel dan informasi kesehatan terpercaya tentang PPOK dari sumber medis yang valid.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20" style="background: var(--bg-primary)" id="kontak">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-6" style="color: var(--text-primary)">Hubungi Kami</h2>
            <p class="text-xl max-w-2xl mx-auto" style="color: var(--text-secondary)">
                Ada pertanyaan atau butuh bantuan? Tim kami siap membantu Anda
            </p>
        </div>
        <div class="max-w-2xl mx-auto">
            <div class="flip-card-container">
                <div id="contactFlipCard" class="flip-card">
                    <div class="flip-card-front p-10">
                        <div class="space-y-8">
                            <div class="flex items-center gap-6 p-5 rounded-2xl transition-all duration-300 hover:scale-[1.02]" style="background: var(--bg-tertiary)">
                                <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end))">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-lg font-bold mb-1" style="color: var(--text-primary)">Email</h3>
                                    <p class="break-words" style="color: var(--text-secondary)">{{ $settings['contact_email'] ?? 'kontak@sahabatnapas.com' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-6 p-5 rounded-2xl transition-all duration-300 hover:scale-[1.02]" style="background: var(--bg-tertiary)">
                                <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end))">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-lg font-bold mb-1" style="color: var(--text-primary)">Telepon</h3>
                                    <p class="break-words" style="color: var(--text-secondary)">{{ $settings['contact_phone'] ?? '+62 812-3456-7890' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-6 p-5 rounded-2xl transition-all duration-300 hover:scale-[1.02]" style="background: var(--bg-tertiary)">
                                <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end))">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-lg font-bold mb-1" style="color: var(--text-primary)">Alamat</h3>
                                    <p class="break-words" style="color: var(--text-secondary)">{{ $settings['contact_address'] ?? 'Jl. Kesehatan No. 123, Jakarta Selatan' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-6 p-5 rounded-2xl transition-all duration-300 hover:scale-[1.02]" style="background: var(--bg-tertiary)">
                                <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, #25D366, #128C7E)">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-lg font-bold mb-1" style="color: var(--text-primary)">WhatsApp</h3>
                                    <p class="break-words" style="color: var(--text-secondary)">{{ $settings['contact_whatsapp'] ?? '+62 812-3456-7890' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back p-10">
                        <form id="contactForm" class="space-y-6">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold mb-3" style="color: var(--text-primary)">Nama Lengkap</label>
                                <input type="text" name="name" id="contactName" class="w-full px-5 py-4 rounded-xl border-2 focus:ring-4 focus:ring-teal-500/20 outline-none transition-all duration-300" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-3" style="color: var(--text-primary)">Email</label>
                                <input type="email" name="email" id="contactEmail" class="w-full px-5 py-4 rounded-xl border-2 focus:ring-4 focus:ring-teal-500/20 outline-none transition-all duration-300" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)" placeholder="email@contoh.com" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-3" style="color: var(--text-primary)">Pesan</label>
                                <textarea rows="4" name="message" id="contactMessage" class="w-full px-5 py-4 rounded-xl border-2 focus:ring-4 focus:ring-teal-500/20 outline-none transition-all duration-300 resize-none" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)" placeholder="Tulis pesan Anda..." required></textarea>
                            </div>
                            <div class="flex gap-4">
                                <button type="button" onclick="flipContactCard()" class="flex-1 py-5 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-[1.02]" style="background: var(--bg-tertiary); color: var(--text-primary)">
                                    Kembali
                                </button>
                                <button type="submit" class="flex-1 py-5 rounded-xl font-bold text-lg text-white transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl" style="background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end))">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-6 text-center">
                <button onclick="flipContactCard()" class="px-10 py-5 rounded-xl font-bold text-lg text-white transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl cursor-pointer" style="background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end))">
                    Kirim Pesan
                </button>
            </div>
        </div>
    </div>
    <div class="p-4 sm:p-6 lg:p-8">

                       <!-- VIDEO EDUKASI PPOK: ditambahkan di bawah artikel, tanpa mengubah konten yang sudah ada -->
        <section id="edukasi-media" class="max-w-6xl mx-auto mt-10 mb-6 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60">
            <div class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-teal-950 to-teal-800 px-6 py-8 sm:px-8 sm:py-10">
                <div class="pointer-events-none absolute -right-12 -top-16 h-48 w-48 rounded-full bg-teal-400/10 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-20 left-1/3 h-44 w-44 rounded-full bg-cyan-300/10 blur-2xl"></div>

                <div class="relative z-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="max-w-2xl">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-teal-100">
                            <span class="h-2 w-2 rounded-full bg-teal-300"></span>
                            Edukasi Media
                        </span>
                        <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                            Video Edukasi PPOK
                        </h2>
                        <p class="mt-2 max-w-xl text-sm leading-6 text-teal-100 sm:text-base">
                            Simak video edukasi berikut untuk menambah pemahaman mengenai PPOK. Video dapat diputar langsung dari halaman ini tanpa perlu meninggalkan situs.
                        </p>
                    </div>

                    <div class="hidden h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-white shadow-lg sm:flex">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6.75A2.75 2.75 0 0 1 6.75 4h10.5A2.75 2.75 0 0 1 20 6.75v10.5A2.75 2.75 0 0 1 17.25 20H6.75A2.75 2.75 0 0 1 4 17.25V6.75Z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m10 8.5 5 3.5-5 3.5v-7Z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-6 lg:p-8">
                <div class="relative w-full overflow-hidden rounded-2xl bg-slate-950 shadow-lg ring-1 ring-slate-900/10" style="aspect-ratio: 16 / 9; min-height: 200px;">
                    <iframe
                        class="absolute inset-0 block h-full w-full border-0"
                        src="https://www.youtube.com/embed/9lwxl0zh-LY?rel=0&amp;playsinline=1"
                        title="Video Edukasi PPOK"
                        loading="lazy"
                        referrerpolicy="origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="mt-5 flex flex-col gap-4 border-t border-slate-100 pt-5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-teal-50 text-teal-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <circle cx="12" cy="12" r="9" stroke-width="1.8"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 11v5m0-8h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800">Materi edukasi pasien</p>
                            <p class="mt-1 text-sm leading-5 text-slate-500">Gunakan video ini sebagai bahan belajar dan diskusi bersama tenaga kesehatan.</p>
                        </div>
                    </div>

                    <a
                        href="https://www.youtube.com/watch?v=9lwxl0zh-LY"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-teal-600/20 transition duration-200 hover:-translate-y-0.5 hover:bg-teal-700 focus:outline-none focus:ring-4 focus:ring-teal-200">
                        Tonton di YouTube
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M8 7h9v9"></path>
                        </svg>
                    </a>
                </div>

                <p class="mt-5 rounded-xl border border-amber-100 bg-amber-50 px-4 py-3 text-xs leading-5 text-amber-800">
                    Catatan: Video ini merupakan media edukasi umum, bukan pengganti pemeriksaan atau anjuran medis pribadi. Tetap ikuti rencana terapi dan petunjuk dokter atau tenaga kesehatan yang menangani.
                </p>
            </div>
        </section>
</section>

<footer class="footer-section">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-10 mb-12">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 gradient-teal rounded-xl flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('icon.png') }}" alt="Icon" class="w-full h-full object-cover">
                    </div>
                    <span class="text-xl font-bold" style="color: var(--text-primary)">Sahabat Napas</span>
                </div>
                <p class="mb-6" style="color: var(--text-secondary)">
                    Aplikasi pendampingan terapi PPOK yang membantu Anda menjalani hidup lebih sehat dengan panduan terapi, latihan napas, dan edukasi kesehatan terpercaya.
                </p>
                <div class="flex items-center gap-3 flex-wrap">
                    @if(!empty($settings['social_facebook']))
                    <a href="{{ $settings['social_facebook'] }}" target="_blank" class="social-icon" style="color: var(--text-secondary)">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_tiktok']))
                    <a href="{{ $settings['social_tiktok'] }}" target="_blank" class="social-icon" style="color: var(--text-secondary)">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.44-3.44-3.66-3.65-6.1-.02-.9-.04-1.8-.06-2.7.46-.09.93-.14 1.42-.14 1.07 0 2.14.02 3.21.05.44 0 .93-.06 1.31-.11-.18-.9-.39-1.8-.63-2.67-.02-.08-.03-.16-.05-.22-1.81 1.31-4.19 2.25-6.78 2.39-1.7.04-3.39-.41-4.94-1.31-1.93-1.18-3.41-3.14-3.89-5.32-.18-.89-.23-1.78-.22-2.68.01-1.12.19-2.23.53-3.29 1.36-.09 2.72-.15 4.08-.17.99 0 1.97.04 2.96.1-.17.95-.36 1.9-.57 2.82-.45-.13-.9-.25-1.35-.37-.84-.22-1.65-.53-2.4-.92-.28-.15-.55-.32-.8-.51.05-.15.1-.29.15-.44.83.49 1.73.86 2.67 1.14.9.27 1.83.45 2.78.54 3.53-.04 6.76-1.53 9.13-4.17.76-.86 1.35-1.83 1.75-2.88z"/>
                        </svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" class="social-icon" style="color: var(--text-secondary)">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_youtube']))
                    <a href="{{ $settings['social_youtube'] }}" target="_blank" class="social-icon" style="color: var(--text-secondary)">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-5" style="color: var(--text-primary)">Fitur</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="footer-link inline-block">Panduan Terapi</a></li>
                    <li><a href="#" class="footer-link inline-block">Latihan Napas</a></li>
                    <li><a href="#" class="footer-link inline-block">Edukasi Kesehatan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-5" style="color: var(--text-primary)">Tautan</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="footer-link inline-block">Beranda</a></li>
                    <li><a href="#" class="footer-link inline-block">Kontak</a></li>
                    <li><a href="#" class="footer-link inline-block">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="pt-8 text-center" style="border-top: 1px solid var(--border-color)">
            <p style="color: var(--text-secondary)">© 2024 Sahabat Napas. Semua hak dilindungi.</p>
        </div>
    </div>
</footer>

<script>
    const texts = ['PPOK Anda', 'Kesehatan Anda', 'Terapi Anda', 'Hidup Anda'];
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typingElement = document.getElementById('typingText');
    
    function typeText() {
        const currentText = texts[textIndex];
        
        if (isDeleting) {
            typingElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typingElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }
        
        let typeSpeed = isDeleting ? 50 : 120;
        
        if (!isDeleting && charIndex === currentText.length) {
            typeSpeed = 2000;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            typeSpeed = 500;
        }
        
        setTimeout(typeText, typeSpeed);
    }
    
    typeText();

    function flipContactCard() {
        const card = document.getElementById('contactFlipCard');
        card.classList.toggle('flipped');
    }

    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        try {
            const response = await fetch('/contact', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                alert(data.message);
                this.reset();
                flipContactCard();
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    });
    let currentSlide = 0;
    const totalSlides = 4;
    let slideInterval;
    
    function updateSlider() {
        const wrapper = document.getElementById('sliderWrapper');
        wrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
        
        document.querySelectorAll('.slider-dot').forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-white/50');
                dot.classList.add('bg-white', 'scale-125');
            } else {
                dot.classList.remove('bg-white', 'scale-125');
                dot.classList.add('bg-white/50');
            }
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
        resetInterval();
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
        resetInterval();
    }
    
    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
        resetInterval();
    }
    
    function startInterval() {
        slideInterval = setInterval(nextSlide, 4000);
    }
    
    function resetInterval() {
        clearInterval(slideInterval);
        startInterval();
    }
    
    document.addEventListener('DOMContentLoaded', () => {
        startInterval();
    });
</script>
@endsection