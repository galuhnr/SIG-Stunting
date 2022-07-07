<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Profile;
use App\Http\Livewire\KabupatenController;
use App\Http\Livewire\TahunController;
use App\Http\Livewire\DesaController;
use App\Http\Livewire\PelayananKesehatanController;
use App\Http\Livewire\SanitasiJambanController;
use App\Http\Livewire\ASIEksklusifController;
use App\Http\Livewire\StuntingController;
use App\Http\Livewire\InfoStuntingController;
use App\Http\Livewire\FuzzyController;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;

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

Route::get('/', Login::class)->name('login');



Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');
Route::get('/fuzzy', FuzzyController::class)->name('fuzzy');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
 
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/grafik', Dashboard::class)->name('grafik');
    Route::get('/kabupaten-kota', KabupatenController::class)->name('kabupaten-kota');
    
    Route::get('/pelayanan-kesehatan-balita', PelayananKesehatanController::class)->name('pelayanan-kesehatan-balita');
    Route::get('/cakupan-ASI-Ekslusif', ASIEksklusifController::class)->name('ASI-eksklusif');
    Route::get('/stunting', StuntingController::class)->name('stunting');
    Route::get('/cakupan-desa-UCI', DesaController::class)->name('desaUCI');
    Route::get('/fasilitas-jamban-sehat', SanitasiJambanController::class)->name('jamban-sehat');
   
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');

    Route::get('/fasilitas-kesehatan', Profile::class)->name('faskes');
    Route::get('/tahun', TahunController::class)->name('tahun');
    Route::get('/informasi-stunting', InfoStuntingController::class)->name('info');
});

