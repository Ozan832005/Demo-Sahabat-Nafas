<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactMessageController;

use App\Models\Setting;

Route::get('/', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    return view('landing', compact('settings'));
})->name('landing');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::post('/admin/users', [AdminController::class, 'createUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/therapy/history', [AdminController::class, 'therapyHistory'])->name('admin.therapy.history');
    Route::post('/admin/therapy', [AdminController::class, 'storeTherapy'])->name('admin.therapy.store');
    Route::get('/admin/therapy/{therapy}/edit', [AdminController::class, 'editTherapy'])->name('admin.therapy.edit');
    Route::put('/admin/therapy/{therapy}', [AdminController::class, 'updateTherapy'])->name('admin.therapy.update');
    Route::delete('/admin/therapy/{therapy}', [AdminController::class, 'deleteTherapy'])->name('admin.therapy.destroy');
    Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::post('/admin/contact/send', [AdminController::class, 'sendContact'])->name('admin.contact.send');
    Route::delete('/admin/messages/{message}', [AdminController::class, 'deleteMessage'])->name('admin.messages.destroy');
    Route::put('/admin/messages/{message}/read', [AdminController::class, 'markAsRead'])->name('admin.messages.read');
    Route::get('/admin/site', [AdminController::class, 'site'])->name('admin.site');
    Route::post('/admin/site', [AdminController::class, 'updateSite'])->name('admin.site.update');
});

Route::middleware(['auth', 'perawat'])->group(function () {
    Route::get('/perawat/dashboard', [PerawatController::class, 'dashboard'])->name('perawat.dashboard');
    Route::get('/perawat/riwayat-terapi', [PerawatController::class, 'riwayatTerapi'])->name('perawat.riwayat-terapi');
    Route::post('/perawat/riwayat-terapi/note', [PerawatController::class, 'storeNote'])->name('perawat.riwayat-terapi.note');
    Route::get('/perawat/edukasi', [PerawatController::class, 'edukasi'])->name('perawat.edukasi');
    Route::get('/perawat/profile', function () {
        return view('perawat.profile');
    })->name('perawat.profile');
    Route::put('/perawat/profile', [PerawatController::class, 'updateProfile'])->name('perawat.profile.update');
});

Route::middleware(['auth', 'pasien'])->group(function () {
    Route::get('/pasien/dashboard', [PasienController::class, 'dashboard'])->name('pasien.dashboard');
    Route::get('/pasien/terapi', [PasienController::class, 'terapi'])->name('pasien.terapi');
    Route::post('/pasien/terapi/store', [PasienController::class, 'storeTerapi'])->name('pasien.terapi.store');
    Route::get('/pasien/riwayat-terapi', [PasienController::class, 'riwayatTerapi'])->name('pasien.riwayat-terapi');
    Route::get('/pasien/terapi/{therapy}/edit', [PasienController::class, 'editTerapi'])->name('pasien.terapi.edit');
    Route::put('/pasien/terapi/{therapy}', [PasienController::class, 'updateTerapi'])->name('pasien.terapi.update');
    Route::delete('/pasien/terapi/{therapy}', [PasienController::class, 'deleteTerapi'])->name('pasien.terapi.destroy');
    Route::get('/pasien/edukasi', [PasienController::class, 'edukasi'])->name('pasien.edukasi');
    Route::get('/pasien/catatan', [PasienController::class, 'catatan'])->name('pasien.catatan');
    Route::get('/pasien/notifikasi', [PasienController::class, 'notifikasi'])->name('pasien.notifikasi');
    Route::get('/pasien/profile', function () {
        return view('pasien.profile');
    })->name('pasien.profile');
    Route::put('/pasien/profile', [PasienController::class, 'updateProfile'])->name('pasien.profile.update');
});