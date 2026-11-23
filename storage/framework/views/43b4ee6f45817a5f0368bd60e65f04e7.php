

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.pasien-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="pt-40 pb-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-8">
            <a href="<?php echo e(route('pasien.dashboard')); ?>" class="inline-flex items-center gap-2 text-sm font-medium mb-4" style="color: var(--text-secondary)">
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
                <details class="mt-4 group">
                    <summary class="list-none cursor-pointer font-semibold inline-flex items-center gap-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-lg" style="color: var(--gradient-end)">
                        <span class="group-open:hidden">Baca selengkapnya</span>
                        <span class="hidden group-open:inline">Tutup artikel</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="mt-5 rounded-2xl border border-teal-100 bg-teal-50/60 p-5 sm:p-6 space-y-5">
                        <div>
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Pengertian PPOK</h4>
                            <p class="text-sm leading-7 text-slate-700">PPOK adalah penyakit paru jangka panjang yang menyebabkan aliran udara keluar-masuk paru menjadi terhambat. Kondisi ini dapat berkaitan dengan kerusakan kantung udara paru (emfisema), peradangan saluran napas (bronkitis kronis), atau gabungan keduanya. Keluhan biasanya berkembang bertahap dan dapat memengaruhi kegiatan sehari-hari.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Gejala yang sering ditemukan</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Sesak napas, terutama saat beraktivitas.</li>
                                <li>Batuk yang berlangsung lama, kadang disertai dahak.</li>
                                <li>Mengi atau napas berbunyi, serta mudah merasa lelah.</li>
                                <li>Gejala dapat berubah dari hari ke hari dan kadang mengalami perburukan mendadak.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Faktor risiko</h4>
                            <p class="text-sm leading-7 text-slate-700">Paparan asap rokok (termasuk asap rokok orang lain), polusi udara, asap dari bahan bakar memasak di dalam rumah, serta debu, uap, atau bahan kimia di lingkungan kerja dapat meningkatkan risiko PPOK. Tidak semua orang dengan faktor risiko pasti mengalami PPOK, dan orang yang mengalami gejala perlu dinilai oleh tenaga kesehatan.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Bagaimana PPOK diperiksa?</h4>
                            <p class="text-sm leading-7 text-slate-700">Tenaga kesehatan akan menilai keluhan, riwayat paparan, dan kondisi pasien. Pemeriksaan spirometri (tes fungsi paru dengan alat khusus) digunakan untuk membantu memastikan adanya hambatan aliran udara. Gejala saja tidak cukup untuk memastikan diagnosis.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Hal penting dalam pengelolaan PPOK</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Hindari asap rokok dan paparan polusi sebisa mungkin.</li>
                                <li>Gunakan obat atau inhaler sesuai resep serta pelajari teknik pemakaiannya dari tenaga kesehatan.</li>
                                <li>Tanyakan apakah rehabilitasi paru, vaksinasi, atau dukungan berhenti merokok sesuai dengan kondisi pasien.</li>
                                <li>Kontrol secara berkala dan sampaikan bila gejala berubah atau obat sulit digunakan.</li>
                            </ul>
                        </div>
                        <p class="text-xs leading-5 text-slate-500 border-t border-teal-100 pt-4">Sumber bacaan: <a class="font-semibold underline" style="color: var(--gradient-end)" href="https://www.who.int/news-room/fact-sheets/detail/chronic-obstructive-pulmonary-disease-%28copd%29" target="_blank" rel="noopener noreferrer">WHO – Chronic obstructive pulmonary disease (COPD)</a>.</p>
                    </div>
                </details>
            </div>

            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Pola Makan Sehat untuk Penderita PPOK</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Nutrisi yang tepat sangat penting untuk penderita PPOK. Disarankan untuk mengonsumsi protein tinggi, serat yang cukup, dan membatasi garam serta gula. Jaga berat badan ideal untuk mengurangi beban pernapasan.</p>
                <details class="mt-4 group">
                    <summary class="list-none cursor-pointer font-semibold inline-flex items-center gap-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-lg" style="color: var(--gradient-end)">
                        <span class="group-open:hidden">Baca selengkapnya</span>
                        <span class="hidden group-open:inline">Tutup artikel</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="mt-5 rounded-2xl border border-teal-100 bg-teal-50/60 p-5 sm:p-6 space-y-5">
                        <div>
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Mengapa nutrisi penting?</h4>
                            <p class="text-sm leading-7 text-slate-700">Tubuh tetap membutuhkan energi untuk bernapas, bergerak, dan menjalankan aktivitas. Asupan yang cukup dan beragam membantu menjaga tenaga, kesehatan umum, serta kekuatan otot—termasuk otot yang digunakan untuk bernapas. Kebutuhan setiap pasien dapat berbeda, terutama bila juga memiliki diabetes, tekanan darah tinggi, penyakit jantung, atau kondisi lain.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Prinsip pola makan sehari-hari</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Pilih makanan yang beragam: sayur, buah, sumber protein, dan sumber karbohidrat seperti nasi, oat, atau biji-bijian sesuai kebiasaan serta kebutuhan.</li>
                                <li>Sertakan sumber protein seperti ikan, telur, ayam, tahu, tempe, kacang-kacangan, atau susu sesuai toleransi dan anjuran tenaga kesehatan.</li>
                                <li>Batasi makanan yang terlalu banyak garam, gula tambahan, serta makanan sangat berlemak atau terlalu sering digoreng.</li>
                                <li>Minum cukup sesuai anjuran tenaga kesehatan. Pasien yang memiliki pembatasan cairan karena penyakit lain perlu mengikuti petunjuk khususnya.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Tips bila mudah sesak saat makan</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Makan perlahan dengan porsi lebih kecil tetapi lebih sering bila porsi besar membuat cepat kenyang atau tidak nyaman.</li>
                                <li>Duduk tegak saat makan dan beristirahat sejenak sebelum mulai makan.</li>
                                <li>Kunyah dengan baik dan beri jeda di antara suapan.</li>
                                <li>Perhatikan makanan yang membuat perut kembung karena rasa penuh dapat membuat napas terasa lebih tidak nyaman.</li>
                                <li>Atur waktu makan pada saat energi terasa lebih baik.</li>
                            </ul>
                        </div>
                        <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                            <p class="text-sm leading-6 text-amber-900"><strong>Perlu diingat:</strong> Tidak ada satu pola makan yang cocok untuk semua pasien PPOK. Jangan melakukan diet ketat atau mengonsumsi suplemen tanpa membicarakannya dengan dokter atau ahli gizi. Mintalah penyesuaian bila berat badan berubah tanpa direncanakan, nafsu makan menurun, atau ada penyakit penyerta.</p>
                        </div>
                        <p class="text-xs leading-5 text-slate-500 border-t border-teal-100 pt-4">Sumber bacaan: <a class="font-semibold underline" style="color: var(--gradient-end)" href="https://www.lung.org/lung-health-diseases/lung-disease-lookup/copd/living-with-copd/nutrition" target="_blank" rel="noopener noreferrer">American Lung Association – Nutrition and COPD</a>.</p>
                    </div>
                </details>
            </div>

            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Olahraga yang Aman untuk PPOK</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Latihan fisik ringan seperti jalan kaki, senam pernapasan, dan yoga dapat membantu meningkatkan kapasitas paru-paru. Lakukan secara rutin 3-5 kali seminggu dengan intensitas yang sesuai kondisi Anda.</p>
                <details class="mt-4 group">
                    <summary class="list-none cursor-pointer font-semibold inline-flex items-center gap-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-lg" style="color: var(--gradient-end)">
                        <span class="group-open:hidden">Baca selengkapnya</span>
                        <span class="hidden group-open:inline">Tutup artikel</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="mt-5 rounded-2xl border border-teal-100 bg-teal-50/60 p-5 sm:p-6 space-y-5">
                        <div>
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Apa manfaat tetap aktif?</h4>
                            <p class="text-sm leading-7 text-slate-700">Aktivitas fisik yang disesuaikan dapat membantu memperkuat otot, meningkatkan kebugaran dan kemampuan melakukan kegiatan sehari-hari, serta mengurangi dampak kurang bergerak. Tujuannya bukan memaksakan diri atau menyembuhkan PPOK, melainkan membantu pasien beraktivitas dengan lebih terencana.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Contoh aktivitas yang dapat dibicarakan dengan tenaga kesehatan</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Berjalan santai dengan jarak dan durasi yang disesuaikan kemampuan.</li>
                                <li>Latihan gerak ringan saat duduk atau berdiri, sesuai arahan petugas.</li>
                                <li>Latihan kekuatan dan kelenturan yang diajarkan oleh tenaga terlatih.</li>
                                <li>Latihan pengaturan napas sebagai bagian dari teknik mengelola sesak.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Cara memulai dengan lebih aman</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Konsultasikan terlebih dahulu jenis aktivitas dan tingkat latihan yang sesuai dengan dokter atau fisioterapis, terutama bila baru mulai berolahraga atau memiliki penyakit penyerta.</li>
                                <li>Mulai dari tingkat ringan, lakukan bertahap, atur tempo, dan sisipkan waktu istirahat.</li>
                                <li>Ikuti instruksi mengenai penggunaan inhaler atau oksigen bila memang diresepkan untuk aktivitas.</li>
                                <li>Hindari latihan saat sedang demam, mengalami infeksi, atau gejala PPOK sedang memburuk; tanyakan kepada tenaga kesehatan kapan aman untuk mulai kembali.</li>
                            </ul>
                        </div>
                        <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                            <p class="text-sm leading-6 text-amber-900"><strong>Hentikan aktivitas dan cari pertolongan medis</strong> bila muncul nyeri dada, pusing atau hampir pingsan, mual berat, sesak yang jauh lebih berat dari biasanya, atau gejala yang tidak membaik setelah beristirahat. Program rehabilitasi paru dapat membantu pasien berlatih dengan pengawasan dan rencana yang disesuaikan.</p>
                        </div>
                        <p class="text-xs leading-5 text-slate-500 border-t border-teal-100 pt-4">Sumber bacaan: <a class="font-semibold underline" style="color: var(--gradient-end)" href="https://www.lung.org/lung-health-diseases/lung-disease-lookup/copd/living-with-copd/physical-activity" target="_blank" rel="noopener noreferrer">American Lung Association – Physical Activity and COPD</a> dan <a class="font-semibold underline" style="color: var(--gradient-end)" href="https://www.thoracic.org/patients/patient-resources/resources/exercise-with-lung-disease.pdf" target="_blank" rel="noopener noreferrer">American Thoracic Society – Exercise with Lung Disease</a>.</p>
                    </div>
                </details>
            </div>

            <div class="card-hover p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-3" style="color: var(--text-primary)">Tanda-tanda Eksaserbasi PPOK</h3>
                <p class="mb-4" style="color: var(--text-secondary)">Waspadai gejala memburuk seperti sesak napas yang meningkat, perubahan warna dahak, demam, atau penurunan toleransi aktivitas. Segera hubungi tenaga medis jika mengalami gejala ini.</p>
                <details class="mt-4 group">
                    <summary class="list-none cursor-pointer font-semibold inline-flex items-center gap-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-lg" style="color: var(--gradient-end)">
                        <span class="group-open:hidden">Baca selengkapnya</span>
                        <span class="hidden group-open:inline">Tutup artikel</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="mt-5 rounded-2xl border border-teal-100 bg-teal-50/60 p-5 sm:p-6 space-y-5">
                        <div>
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Apa yang dimaksud eksaserbasi?</h4>
                            <p class="text-sm leading-7 text-slate-700">Eksaserbasi atau kekambuhan akut adalah keadaan ketika gejala PPOK memburuk secara nyata dibandingkan kondisi biasanya. Perburukan dapat berlangsung selama beberapa hari atau lebih dan kadang memerlukan penilaian serta penanganan medis tambahan. Infeksi saluran napas dan paparan iritan seperti asap atau polusi dapat menjadi pemicu.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Tanda-tanda yang perlu dikenali</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Sesak napas lebih berat atau lebih sering daripada biasanya.</li>
                                <li>Batuk bertambah sering atau lebih berat.</li>
                                <li>Dahak bertambah banyak atau berubah warna, kekentalan, maupun jumlahnya.</li>
                                <li>Napas berbunyi, dada terasa lebih berat, tidur terganggu, atau tubuh lebih lelah dari biasanya.</li>
                                <li>Dapat disertai demam atau tanda infeksi lainnya.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Apa yang sebaiknya dilakukan?</h4>
                            <ul class="list-disc pl-5 space-y-2 text-sm leading-6 text-slate-700">
                                <li>Kenali perubahan dari kondisi normal pribadi dan ikuti rencana aksi PPOK yang telah disusun bersama dokter.</li>
                                <li>Hubungi dokter atau fasilitas kesehatan sesegera mungkin bila gejala memburuk, berubah, atau tidak membaik sesuai rencana.</li>
                                <li>Gunakan obat sesuai resep dan petunjuk tenaga kesehatan. Jangan mengubah dosis, menghentikan obat, atau memulai antibiotik maupun obat steroid sendiri tanpa arahan medis.</li>
                                <li>Catat kapan gejala mulai berubah, jenis perubahan yang dirasakan, serta obat yang digunakan untuk disampaikan saat berkonsultasi.</li>
                            </ul>
                        </div>
                        <div class="rounded-xl border border-red-200 bg-red-50 p-4">
                            <p class="text-sm leading-6 text-red-900"><strong>Segera cari pertolongan darurat</strong> bila pasien mengalami kesulitan bernapas yang sangat berat (misalnya terengah-engah atau tidak mampu berbicara), dada terasa sangat berat atau nyeri, bibir/kulit tampak kebiruan atau sangat pucat, atau mendadak kebingungan. Jangan menunggu gejala tersebut hilang dengan sendirinya.</p>
                        </div>
                        <p class="text-xs leading-5 text-slate-500 border-t border-teal-100 pt-4">Sumber bacaan: <a class="font-semibold underline" style="color: var(--gradient-end)" href="https://www.lung.org/lung-health-diseases/lung-disease-lookup/copd/living-with-copd/prevent-flare-ups" target="_blank" rel="noopener noreferrer">American Lung Association – Prevent a COPD Exacerbation or Flare Up</a> dan <a class="font-semibold underline" style="color: var(--gradient-end)" href="https://www.nhs.uk/conditions/chronic-obstructive-pulmonary-disease-copd/" target="_blank" rel="noopener noreferrer">NHS – COPD</a>.</p>
                    </div>
                </details>
            </div>
            
   
        </div>

                
<section id="tutorial-fokus-panik" class="relative mt-8 overflow-hidden rounded-[28px] border border-teal-100 bg-white shadow-xl shadow-teal-900/5">
    <div class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-teal-950 to-teal-700 px-6 py-8 sm:px-8 sm:py-10">
        <div class="pointer-events-none absolute -right-12 -top-16 h-56 w-56 rounded-full bg-teal-300/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 left-1/3 h-48 w-48 rounded-full bg-cyan-300/10 blur-3xl"></div>

        <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-bold uppercase tracking-[.16em] text-teal-100">
                    <span class="h-2 w-2 rounded-full bg-teal-300"></span>
                    Tutorial Interaktif
                </span>
                <h3 class="mt-4 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                    Fokus & Mengendalikan Panik
                </h3>
                <p class="mt-3 max-w-xl text-sm leading-6 text-teal-100 sm:text-base">
                    Pelajari cara menenangkan ritme napas secara perlahan melalui empat langkah sederhana. Ikuti dengan nyaman, tanpa memaksakan napas.
                </p>
            </div>

            <div class="hidden h-20 w-20 shrink-0 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-white shadow-lg sm:flex">
                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                    <path d="M3 12h3l2.2-6 4.1 12 2.4-7 1.4 3H21" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <div class="relative z-10 mt-7 flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-2 rounded-xl border border-white/15 bg-white/10 px-3 py-2 text-xs font-semibold text-white">
                <svg class="h-4 w-4 text-teal-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M12 3v18m9-9H3" stroke-width="1.8" stroke-linecap="round"/></svg>
                Langkah bertahap
            </span>
            <span class="inline-flex items-center gap-2 rounded-xl border border-white/15 bg-white/10 px-3 py-2 text-xs font-semibold text-white">
                <svg class="h-4 w-4 text-teal-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M12 3 4.5 6v5.5c0 4.7 3.2 7.8 7.5 9.5 4.3-1.7 7.5-4.8 7.5-9.5V6L12 3Z" stroke-width="1.7" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Tanpa menahan napas
            </span>
        </div>
    </div>

    <div class="grid gap-6 p-5 sm:p-7 lg:grid-cols-[minmax(0,1.35fr)_minmax(260px,.65fr)] lg:p-8">
        <div class="min-w-0">
            <div class="mb-5">
                <div class="mb-2 flex items-center justify-between gap-3">
                    <p class="text-sm font-bold text-slate-800" data-tutorial-count aria-live="polite">Langkah 1 dari 4</p>
                    <p class="text-xs font-semibold text-slate-500">Panduan 4 langkah</p>
                </div>
                <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                    <div data-tutorial-progress class="h-full w-1/4 rounded-full bg-gradient-to-r from-teal-500 to-cyan-500 transition-all duration-500" style="width:25%"></div>
                </div>
            </div>

            <div class="relative min-h-[260px] overflow-hidden rounded-2xl border border-teal-100 bg-gradient-to-br from-teal-50 via-white to-cyan-50 p-5 sm:p-7">
                <div data-tutorial-step="0" class="tutorial-step">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-teal-600 text-lg font-extrabold text-white shadow-lg shadow-teal-600/20">01</div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[.15em] text-teal-700">Persiapan</p>
                            <h4 class="mt-1 text-xl font-extrabold text-slate-900 sm:text-2xl">Atur posisi yang nyaman</h4>
                        </div>
                    </div>
                    <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                        Duduk dengan posisi tegak dan nyaman. Letakkan kedua kaki dengan stabil. Rilekskan bahu dan leher. Bila terasa sesak, coba condong sedikit ke depan dan istirahatkan lengan pada paha atau meja.
                    </p>
                    <div class="mt-5 flex items-center gap-3 rounded-xl border border-teal-100 bg-white/90 p-4">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-teal-100 text-teal-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M7 20v-5a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v5M9 8a3 3 0 1 0 6 0 3 3 0 0 0-6 0Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 20h16" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                        <p class="text-sm font-medium leading-6 text-slate-700">Cari posisi yang membuat dada dan bahu terasa lebih rileks.</p>
                    </div>
                </div>

                <div data-tutorial-step="1" class="tutorial-step" hidden>
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-teal-600 text-lg font-extrabold text-white shadow-lg shadow-teal-600/20">02</div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[.15em] text-teal-700">Tarik napas</p>
                            <h4 class="mt-1 text-xl font-extrabold text-slate-900 sm:text-2xl">Tarik napas lembut melalui hidung</h4>
                        </div>
                    </div>
                    <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                        Tutup mulut dengan santai, lalu tarik napas perlahan melalui hidung. Bila terasa nyaman, hitung pelan “satu, dua” dalam hati. Tidak perlu menarik napas terlalu dalam atau terburu-buru.
                    </p>
                    <div class="mt-5 flex items-center gap-3 rounded-xl border border-teal-100 bg-white/90 p-4">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-teal-100 text-teal-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M4 12h4l2-5 4 10 2-5h4" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <p class="text-sm font-medium leading-6 text-slate-700">Biarkan napas masuk dengan alami. Jangan memaksakan volume atau kecepatannya.</p>
                    </div>
                </div>

                <div data-tutorial-step="2" class="tutorial-step" hidden>
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-teal-600 text-lg font-extrabold text-white shadow-lg shadow-teal-600/20">03</div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[.15em] text-teal-700">Hembuskan napas</p>
                            <h4 class="mt-1 text-xl font-extrabold text-slate-900 sm:text-2xl">Hembuskan melalui bibir mengerucut</h4>
                        </div>
                    </div>
                    <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                        Kerucutkan bibir seperti hendak meniup lilin dengan lembut. Hembuskan napas perlahan melalui celah bibir. Usahakan hembusan lebih panjang daripada tarikan napas, misalnya menghitung “satu, dua, tiga, empat” bila nyaman.
                    </p>
                    <div class="mt-5 flex items-center gap-3 rounded-xl border border-teal-100 bg-white/90 p-4">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-teal-100 text-teal-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M4 12c2.5-3 5-3 7.5 0s5 3 8.5 0M7 8.5c1.5-1.5 3-1.5 4.5 0M7 15.5c1.5 1.5 3 1.5 4.5 0" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                        <p class="text-sm font-medium leading-6 text-slate-700">Hembuskan dengan lembut. Jangan meniup kuat-kuat dan jangan menahan napas.</p>
                    </div>
                </div>

                <div data-tutorial-step="3" class="tutorial-step" hidden>
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-teal-600 text-lg font-extrabold text-white shadow-lg shadow-teal-600/20">04</div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[.15em] text-teal-700">Ulangi dengan nyaman</p>
                            <h4 class="mt-1 text-xl font-extrabold text-slate-900 sm:text-2xl">Kembali ke ritme napas yang tenang</h4>
                        </div>
                    </div>
                    <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                        Ulangi tarikan lembut melalui hidung dan hembusan perlahan melalui bibir mengerucut sesuai kenyamanan. Beristirahatlah bila perlu. Hentikan latihan jika terasa pusing atau semakin tidak nyaman.
                    </p>
                    <div class="mt-5 flex items-center gap-3 rounded-xl border border-teal-100 bg-white/90 p-4">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-teal-100 text-teal-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M20 11a8 8 0 1 0 2 5M20 4v7h-7" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <p class="text-sm font-medium leading-6 text-slate-700">Latihan ini perlu terasa ringan. Tidak perlu mengejar jumlah hitungan atau durasi tertentu.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" data-tutorial-prev disabled class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-40">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="m15 18-6-6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Sebelumnya
                </button>
                <button type="button" data-tutorial-next class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-teal-600/20 transition hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-teal-200">
                    Langkah berikutnya
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
            <p class="mt-3 text-center text-xs text-slate-400" data-tutorial-live aria-live="polite">Ikuti satu langkah demi satu langkah sesuai kenyamanan.</p>
        </div>

        <aside class="space-y-4">
            <div class="rounded-2xl border border-teal-100 bg-teal-50/80 p-5">
                <div class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-teal-600 text-white">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M12 8v4l2.5 2.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <div>
                        <h4 class="font-extrabold text-slate-900">Fokus selama latihan</h4>
                        <p class="text-xs text-teal-800">Ingat tiga hal sederhana</p>
                    </div>
                </div>
                <ul class="mt-4 space-y-3 text-sm leading-6 text-slate-700">
                    <li class="flex gap-2"><span class="mt-0.5 font-bold text-teal-700">01</span><span>Rilekskan bahu dan leher.</span></li>
                    <li class="flex gap-2"><span class="mt-0.5 font-bold text-teal-700">02</span><span>Fokus pada hembusan napas yang perlahan.</span></li>
                    <li class="flex gap-2"><span class="mt-0.5 font-bold text-teal-700">03</span><span>Gunakan hitungan hanya bila terasa nyaman.</span></li>
                </ul>
            </div>

            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5">
                <div class="flex items-start gap-3">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M12 9v4m0 4h.01M10.3 3.9 2.6 17.2A1.8 1.8 0 0 0 4.2 20h15.6a1.8 1.8 0 0 0 1.6-2.8L13.7 3.9a2 2 0 0 0-3.4 0Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <div>
                        <h4 class="font-extrabold text-amber-900">Perhatikan keamanan</h4>
                        <p class="mt-2 text-sm leading-6 text-amber-900/90">Jangan menahan napas atau memaksakan tarikan dan hembusan. Teknik ini merupakan edukasi umum; tanyakan kepada dokter atau fisioterapis paru apakah sesuai dengan kondisi Anda.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-rose-200 bg-rose-50 p-5">
                <h4 class="font-extrabold text-rose-900">Kapan harus mencari bantuan?</h4>
                <p class="mt-2 text-sm leading-6 text-rose-900/90">Jika sesak berat, memburuk, atau disertai nyeri dada, bibir membiru, kebingungan, atau hampir pingsan, hentikan latihan dan segera cari pertolongan medis darurat.</p>
            </div>

            <p class="px-1 text-xs leading-5 text-slate-400">
                Materi: <a class="font-semibold text-teal-700 underline decoration-teal-300 underline-offset-2" href="https://www.lung.org/lung-health-diseases/wellness/breathing-exercises" target="_blank" rel="noopener noreferrer">American Lung Association – Breathing Exercises</a> · <a class="font-semibold text-teal-700 underline decoration-teal-300 underline-offset-2" href="https://medlineplus.gov/ency/patientinstructions/000053.htm" target="_blank" rel="noopener noreferrer">MedlinePlus – Pursed-Lip Breathing</a>
            </p>
        </aside>
    </div>
</section>

<style>
    #tutorial-fokus-panik [hidden] { display: none !important; }
    #tutorial-fokus-panik button:focus-visible,
    #tutorial-fokus-panik a:focus-visible {
        outline: 3px solid rgba(13, 148, 136, .45);
        outline-offset: 3px;
    }
</style>

<script>
(function () {
    const root = document.getElementById('tutorial-fokus-panik');
    if (!root || root.dataset.initialized === 'true') return;
    root.dataset.initialized = 'true';

    const steps = Array.from(root.querySelectorAll('[data-tutorial-step]'));
    const previousButton = root.querySelector('[data-tutorial-prev]');
    const nextButton = root.querySelector('[data-tutorial-next]');
    const count = root.querySelector('[data-tutorial-count]');
    const progress = root.querySelector('[data-tutorial-progress]');
    const liveText = root.querySelector('[data-tutorial-live]');
    let currentStep = 0;

    const messages = [
        'Persiapkan posisi duduk yang nyaman.',
        'Tarik napas perlahan melalui hidung, tanpa memaksakan.',
        'Hembuskan perlahan melalui bibir yang mengerucut.',
        'Ulangi dengan nyaman dan beristirahat bila diperlukan.'
    ];

    function renderStep() {
        steps.forEach(function (step, index) {
            step.hidden = index !== currentStep;
        });

        count.textContent = 'Langkah ' + (currentStep + 1) + ' dari ' + steps.length;
        progress.style.width = (((currentStep + 1) / steps.length) * 100) + '%';
        previousButton.disabled = currentStep === 0;

        if (currentStep === steps.length - 1) {
            nextButton.innerHTML = 'Ulangi tutorial <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M20 11a8 8 0 1 0 2 5M20 4v7h-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            liveText.textContent = 'Tutorial selesai. Anda dapat mengulanginya kapan saja.';
        } else {
            nextButton.innerHTML = 'Langkah berikutnya <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            liveText.textContent = messages[currentStep];
        }
    }

    previousButton.addEventListener('click', function () {
        if (currentStep > 0) {
            currentStep -= 1;
            renderStep();
        }
    });

    nextButton.addEventListener('click', function () {
        currentStep = currentStep === steps.length - 1 ? 0 : currentStep + 1;
        renderStep();
    });

    renderStep();
})();
</script>


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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/pasien/edukasi.blade.php ENDPATH**/ ?>