

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
                <div class="overflow-hidden rounded-2xl bg-slate-950 shadow-lg ring-1 ring-slate-900/10" style="aspect-ratio: 16 / 9;">
                    <iframe
                        class="h-full w-full"
                        src="https://www.youtube-nocookie.com/embed/9lwxl0zh-LY?rel=0"
                        title="Video Edukasi PPOK"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
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