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

use App\Http\Livewire\Peta\PetaController17;
use App\Http\Livewire\Peta\PetaController18;
use App\Http\Livewire\Peta\PetaController19;
use App\Http\Livewire\Peta\PetaController20;
use App\Http\Livewire\Peta\PetaController21;

use App\Http\Livewire\TingkatRisiko\TRController17;
use App\Http\Livewire\TingkatRisiko\TRController18;
use App\Http\Livewire\TingkatRisiko\TRController19;
use App\Http\Livewire\TingkatRisiko\TRController20;
use App\Http\Livewire\TingkatRisiko\TRController21;

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
Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/peta2017', PetaController17::class)->name('peta2017');
    Route::get('/peta2018', PetaController18::class)->name('peta2018');
    Route::get('/peta2019', PetaController19::class)->name('peta2019');
    Route::get('/peta2020', PetaController20::class)->name('peta2020');
    Route::get('/peta2021', PetaController21::class)->name('peta2021');

    Route::get('/kabupaten-kota', KabupatenController::class)->name('kabupaten-kota');
    
    Route::get('/grafik', Dashboard::class)->name('grafik');
    
    Route::get('/tingkat-risiko2017', TRController17::class)->name('tingkat-risiko2017');
    Route::get('/tingkat-risiko2018', TRController18::class)->name('tingkat-risiko2018');
    Route::get('/tingkat-risiko2019', TRController19::class)->name('tingkat-risiko2019');
    Route::get('/tingkat-risiko2020', TRController20::class)->name('tingkat-risiko2020');
    Route::get('/tingkat-risiko2021', TRController21::class)->name('tingkat-risiko2021');
    
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

