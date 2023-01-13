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
// Route::get('welcome', function() {
//     $data['users'] = App\Models\User::latest()->paginate(3);
//     return view('welcome', $data);
// });

// Route::get('welcome', ManajemenUserComponent::class);

//Front
Route::get('/', [HomeController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
Route::get('projects', [ProjectController::class, 'getProject']);
Route::get('teams', [TeamController::class, 'getTeam']);
Route::get('all-team', [TeamController::class, 'allTeam']);
Route::post('teams/ref-divisi', [TeamController::class, 'ref_divisi'])->name('team.ref-divisi');

Route::get('blog', [BlogController::class, 'getBlog']);
Route::get('blog/{slug}', [BlogController::class, 'show']);
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/store', [ContactController::class, 'store']);


// Back
Route::group(['middleware' => ['guest']], function () {
    Route::resource('admin-login', LoginController::class);
    Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');
});

Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', DashboardController::class);

        Route::resource('web-profile', WebProfileController::class);

        Route::resource('artikel', ArtikelController::class);
        Route::post('artikel/hapus', [ArtikelController::class, 'hapus'])->name('artikel.hapus');
        Route::post('artikel/checkJudul', [ArtikelController::class, 'checkJudul'])->name('artikel.checkJudul');

        Route::resource('project-back', ProjectBackController::class);
        Route::post('project-back/hapus', [ProjectBackController::class, 'hapus'])->name('project-back.hapus');
        Route::post('project-back/checkJudul', [ProjectBackController::class, 'checkJudul'])->name('project-back.checkJudul');
        Route::post('project-back/check-project-name', [ProjectBackController::class, 'checkProjectName'])->name('checkProjectName');
        Route::post('project-back/search-project', [ProjectBackController::class, 'searchProject'])->name('searchProject');
        Route::post('project-back/pagination', [ProjectBackController::class, 'projectPagination'])->name('projectPagination');

        Route::resource('contact-back', ContactBackController::class);
        Route::post('contact-back/hapus', [ContactBackController::class, 'hapus'])->name('contact-back.hapus');

        Route::resource('team-back', TeamBackController::class);
        Route::post('team-back/hapus', [TeamBackController::class, 'hapus'])->name('team-back.hapus');
        Route::post('team-back/generate-jabatan', [TeamBackController::class, 'generateJabatan'])->name('team-back.generate-jabatan');
        Route::post('team-back/generate-edit-jabatan', [TeamBackController::class, 'generateEditJabatan'])->name('team-back.generate-edit-jabatan');

        //Modul Ref Periode
        Route::resource('ref-periode', RefPeriodeController::class);
        Route::post('ref-periodes/check-tahun-mulai', [RefPeriodeController::class, 'checkTahunMulai'])->name('ref-periode.checkTahunMulai');
        Route::post('ref-periodes/check-tahun-akhir', [RefPeriodeController::class, 'checkTahunAkhir'])->name('ref-periode.checkTahunAkhir');

        //Modul Ref Divis
        Route::get('ref-divisi', [RefDivisiController::class, 'index'])->name('ref-divisi.index');
        Route::get('ref-divisi-induk/{id}/{ref_periode_id}', [RefDivisiController::class, 'RefDivisiInduk'])->name('ref-divisi.induk-modal');
        Route::get('ref-divisi-detail/{id}', [RefDivisiController::class, 'RefDivisiDetail'])->name('ref-divisi.detail-modal');
        Route::post('ref-divisi-store', [RefDivisiController::class, 'RefDivisiStore'])->name('ref-divisi.store-modal');
        Route::post('ref-divisi-update', [RefDivisiController::class, 'RefDivisiUpdate'])->name('ref-divisi.update-modal');
        Route::post('ref-divisi-delete', [RefDivisiController::class, 'RefDivisiDelete'])->name('ref-divisi.delete-modal');
        Route::post('ref-divisi-generate', [RefDivisiController::class, 'generateDivisi'])->name('ref-divisi.generate');
        Route::post('ref-divisi-generate-add-modal', [RefDivisiController::class, 'generateAddModal'])->name('ref-divisi.generate-add-modal');
        Route::post('ref-divisi-generate-edit-modal', [RefDivisiController::class, 'generateEditModal'])->name('ref-divisi.generate-edit-modal');

        Route::get('user-livewire', ManajemenUserComponent::class);
        Route::resource('manajemen-akun-user', UserController::class);
        Route::get('manajemen-akun-user/edit-password/{id}', [UserController::class, 'edit_password'])->name('edit_password');
        Route::post('manajemen-akun-user/update-password/{user}', [UserController::class, 'update_password'])->name('manajemen-akun.updatePassword');
        Route::post('manajemen-akun-user/checkEmail', [UserController::class, 'checkEmail'])->name('manajemen-akun-user.checkEmail');
        Route::get('user-setting', [ManajemenUserController::class, 'user_setting'])->name('user-setting');
        Route::post('user-setting/update', [ManajemenUserController::class, 'update-account'])->name('user-setting.update');
    });
});
