

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Pengaturan Situs</h1>
        <p class="text-gray-500 mt-1">Kelola konten landing page, slider, kontak, dan media sosial</p>
    </div>

    <div id="toastNotification" class="fixed top-6 right-6 z-[200] hidden">
        <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 p-4 flex items-center gap-4 min-w-[320px] animate-slideIn">
            <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-circle-check text-white text-xl"></i>
            </div>
            <div class="flex-1">
                <h4 class="font-bold text-gray-800">Berhasil!</h4>
                <p class="text-sm text-gray-500">Pengaturan situs telah diperbarui</p>
            </div>
            <button onclick="closeToast()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
    </div>

    <form action="<?php echo e(route('admin.site.update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?php echo csrf_field(); ?>
        
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-images text-white"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Gambar Slider</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700">Slider 1</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 hover:border-emerald-400 transition-all cursor-pointer group">
                        <input type="file" name="slider_image_1" accept="image/*" class="hidden" id="slider1" onchange="previewImage(this, 'preview1')">
                        <label for="slider1" class="block text-center cursor-pointer">
                            <div id="preview1" class="w-full h-32 bg-gray-50 rounded-lg flex items-center justify-center mb-3 overflow-hidden group-hover:bg-gray-100 transition-all">
                                <?php if(!empty($settings['slider_image_1'])): ?>
                                    <img src="<?php echo e(asset('storage/' . $settings['slider_image_1'])); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fa-solid fa-upload text-gray-400 text-3xl group-hover:text-emerald-500 transition-colors"></i>
                                <?php endif; ?>
                            </div>
                            <p class="text-sm text-gray-500 group-hover:text-gray-700 transition-colors">Klik untuk upload</p>
                        </label>
                    </div>
                </div>
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700">Slider 2</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 hover:border-emerald-400 transition-all cursor-pointer group">
                        <input type="file" name="slider_image_2" accept="image/*" class="hidden" id="slider2" onchange="previewImage(this, 'preview2')">
                        <label for="slider2" class="block text-center cursor-pointer">
                            <div id="preview2" class="w-full h-32 bg-gray-50 rounded-lg flex items-center justify-center mb-3 overflow-hidden group-hover:bg-gray-100 transition-all">
                                <?php if(!empty($settings['slider_image_2'])): ?>
                                    <img src="<?php echo e(asset('storage/' . $settings['slider_image_2'])); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fa-solid fa-upload text-gray-400 text-3xl group-hover:text-emerald-500 transition-colors"></i>
                                <?php endif; ?>
                            </div>
                            <p class="text-sm text-gray-500 group-hover:text-gray-700 transition-colors">Klik untuk upload</p>
                        </label>
                    </div>
                </div>
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700">Slider 3</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 hover:border-emerald-400 transition-all cursor-pointer group">
                        <input type="file" name="slider_image_3" accept="image/*" class="hidden" id="slider3" onchange="previewImage(this, 'preview3')">
                        <label for="slider3" class="block text-center cursor-pointer">
                            <div id="preview3" class="w-full h-32 bg-gray-50 rounded-lg flex items-center justify-center mb-3 overflow-hidden group-hover:bg-gray-100 transition-all">
                                <?php if(!empty($settings['slider_image_3'])): ?>
                                    <img src="<?php echo e(asset('storage/' . $settings['slider_image_3'])); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fa-solid fa-upload text-gray-400 text-3xl group-hover:text-emerald-500 transition-colors"></i>
                                <?php endif; ?>
                            </div>
                            <p class="text-sm text-gray-500 group-hover:text-gray-700 transition-colors">Klik untuk upload</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-address-book text-white"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Informasi Kontak</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="contact_email" value="<?php echo e($settings['contact_email'] ?? ''); ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="email@sahabatnafas.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Telepon</label>
                    <input type="text" name="contact_phone" value="<?php echo e($settings['contact_phone'] ?? ''); ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="+62 812 3456 7890">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">WhatsApp</label>
                    <input type="text" name="contact_whatsapp" value="<?php echo e($settings['contact_whatsapp'] ?? ''); ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="+62 812 3456 7890">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat</label>
                    <textarea name="contact_address" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none resize-none" placeholder="Jl. Contoh Alamat No. 123, Kota"><?php echo e($settings['contact_address'] ?? ''); ?></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-share-nodes text-white"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Media Sosial</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                    <div class="w-10 h-10 bg-black rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fa-brands fa-tiktok text-white"></i>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">TikTok</label>
                        <input type="url" name="social_tiktok" value="<?php echo e($settings['social_tiktok'] ?? ''); ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none text-sm" placeholder="https://tiktok.com/@username">
                    </div>
                </div>
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fa-brands fa-facebook-f text-white"></i>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                        <input type="url" name="social_facebook" value="<?php echo e($settings['social_facebook'] ?? ''); ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none text-sm" placeholder="https://facebook.com/page">
                    </div>
                </div>
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fa-brands fa-instagram text-white"></i>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                        <input type="url" name="social_instagram" value="<?php echo e($settings['social_instagram'] ?? ''); ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none text-sm" placeholder="https://instagram.com/@username">
                    </div>
                </div>
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                    <div class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fa-brands fa-youtube text-white"></i>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">YouTube</label>
                        <input type="url" name="social_youtube" value="<?php echo e($settings['social_youtube'] ?? ''); ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none text-sm" placeholder="https://youtube.com/channel">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="relative overflow-hidden group bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-10 py-4 rounded-xl font-bold flex items-center gap-3 shadow-lg hover:shadow-emerald-500/30 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); ">
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shine"></span>
                <i class="fa-solid fa-floppy-disk text-lg"></i>
                <span style="color: #04671b; ">Simpan Pengaturan</span>
            </button>
        </div>
    </form>
</div>

<style>
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes shine {
        to { transform: translateX(100%); }
    }
    .animate-slideIn { animation: slideIn 0.4s ease-out forwards; }
    .animate-shine { animation: shine 0.8s ease-in-out; }
</style>

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function showToast() {
        const toast = document.getElementById('toastNotification');
        toast.classList.remove('hidden');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 5000);
    }

    function closeToast() {
        const toast = document.getElementById('toastNotification');
        toast.classList.add('hidden');
    }

    <?php if(session('success')): ?>
        showToast();
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\admin\site.blade.php ENDPATH**/ ?>