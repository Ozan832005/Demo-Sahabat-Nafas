@extends('layouts.app')

@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-8">
            <a href="{{ route('pasien.dashboard') }}" class="inline-flex items-center gap-2 text-sm font-medium mb-4" style="color: var(--text-secondary)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Dashboard
            </a>
            <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Artikel Kesehatan PPOK</h1>
            <p class="mt-2" style="color: var(--text-secondary)">Informasi terpercaya untuk mengelola penyakit paru obstruktif kronis</p>
        </div>

        <div class="space-y-6">
            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Apa itu PPOK?</h3>
                <p class="mb-4" style="color: var(--text-secondary)">PPOK (Penyakit Paru Obstruktif Kronis) adalah penyakit paru-paru yang menyebabkan kesulitan bernapas akibat penyempitan saluran udara secara permanen. Gejala utamanya adalah sesak napas, batuk kronis, dan produksi dahak berlebihan.</p>
                <a href="#" class="font-medium" style="color: var(--gradient-end)">Baca selengkapnya →</a>
            </div>

            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Pola Makan Sehat untuk Penderita PPOK</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Nutrisi yang tepat sangat penting untuk penderita PPOK. Disarankan untuk mengonsumsi protein tinggi, serat yang cukup, dan membatasi garam serta gula. Jaga berat badan ideal untuk mengurangi beban pernapasan.</p>
                <a href="#" class="font-medium" style="color: var(--gradient-end)">Baca selengkapnya →</a>
            </div>

            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Olahraga yang Aman untuk PPOK</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Latihan fisik ringan seperti jalan kaki, senam pernapasan, dan yoga dapat membantu meningkatkan kapasitas paru-paru. Lakukan secara rutin 3-5 kali seminggu dengan intensitas yang sesuai kondisi Anda.</p>
                <a href="#" class="font-medium" style="color: var(--gradient-end)">Baca selengkapnya →</a>
            </div>

            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Tanda-tanda Eksaserbasi PPOK</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Waspadai gejala memburuk seperti sesak napas yang meningkat, perubahan warna dahak, demam, atau penurunan toleransi aktivitas. Segera hubungi tenaga medis jika mengalami gejala ini.</p>
                <a href="#" class="font-medium" style="color: var(--gradient-end)">Baca selengkapnya →</a>
            </div>
        </div>
    </div>
</div>
@endsection