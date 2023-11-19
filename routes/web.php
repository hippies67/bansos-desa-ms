<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\TeamController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;

use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\WebProfileController;
use App\Http\Controllers\Back\ArtikelController;
use App\Http\Controllers\Back\ProjectBackController;
use App\Http\Controllers\Back\ContactBackController;
use App\Http\Controllers\Back\TeamBackController;
use App\Http\Controllers\Back\RefPeriodeController;
use App\Http\Controllers\Back\RefDivisiController;
use App\Http\Controllers\Back\PendudukController;
use App\Http\Controllers\Back\JenisBantuanController;
use App\Http\Controllers\Back\BantuanController;
use App\Http\Controllers\Back\PenerimaBantuanController;
use App\Http\Controllers\Back\LogActivityController;
use App\Http\Controllers\Back\KonfirmasiAkunController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\ManajemenUserController;
use App\Http\Livewire\ManajemenUserComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Back
Route::group(['middleware' => ['guest']], function () {
    Route::resource('login', LoginController::class);
});


Route::get('/', function() {
    return redirect()->route('login.index');
});

// Konfirmasi Akun
Route::get('konfirmasi-akun/{user_id}', [KonfirmasiAkunController::class, 'konfirmasi_akun'])->name('konfirmasi-akun.update');

Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', DashboardController::class);

        // Penduduk
        Route::resource('penduduk', PendudukController::class);
        Route::post('penduduk/check-no-ktp', [PendudukController::class, 'checkNoKtp'])->name('penduduk.checkNoKtp');

        // Jenis Bantuan
        Route::resource('jenis-bantuan', JenisBantuanController::class);

        // Bantuan
        Route::resource('bantuan', BantuanController::class);

        // Penerimaan Bantuan
        Route::resource('penerima-bantuan', PenerimaBantuanController::class);

        // Log Activity
        Route::resource('log-activity', LogActivityController::class);

        // Konfirmasi Akun
        Route::resource('konfirmasi-akun', KonfirmasiAkunController::class);

        Route::resource('manajemen-akun-user', UserController::class);
        Route::get('manajemen-akun-user/edit-password/{id}', [UserController::class, 'edit_password'])->name('edit_password');
        Route::post('manajemen-akun-user/update-password/{user}', [UserController::class, 'update_password'])->name('manajemen-akun.updatePassword');
        Route::post('manajemen-akun-user/checkEmail', [UserController::class, 'checkEmail'])->name('manajemen-akun-user.checkEmail');
        Route::get('user-setting', [ManajemenUserController::class, 'user_setting'])->name('user-setting');
        Route::post('user-setting/update/{id}', [ManajemenUserController::class, 'update_account'])->name('user-setting.update');
    });
});
