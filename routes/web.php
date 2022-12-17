<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\WebsiteUser\LandingPage;
use App\Http\Livewire\WebsiteUser\InfoFaskes;
use App\Http\Livewire\WebsiteUser\TingkatRisiko\InfoTingkatRisiko17;
use App\Http\Livewire\WebsiteUser\TingkatRisiko\InfoTingkatRisiko18;
use App\Http\Livewire\WebsiteUser\TingkatRisiko\InfoTingkatRisiko19;
use App\Http\Livewire\WebsiteUser\TingkatRisiko\InfoTingkatRisiko20;
use App\Http\Livewire\WebsiteUser\TingkatRisiko\InfoTingkatRisiko21;

use App\Http\Livewire\WebsiteUser\InfoData\InfoPelayanan;
use App\Http\Livewire\WebsiteUser\InfoData\InfoSanitasi;
use App\Http\Livewire\WebsiteUser\InfoData\InfoDesa;
use App\Http\Livewire\WebsiteUser\InfoData\InfoASI;
use App\Http\Livewire\WebsiteUser\InfoData\InfoStunting;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;

use App\Http\Livewire\Admin\CRUD\KabupatenController;
use App\Http\Livewire\Admin\CRUD\TahunController;
use App\Http\Livewire\Admin\CRUD\DesaController;
use App\Http\Livewire\Admin\CRUD\PelayananController;
use App\Http\Livewire\Admin\CRUD\SanitasiController;
use App\Http\Livewire\Admin\CRUD\ASIController;
use App\Http\Livewire\Admin\CRUD\StuntingController;

use App\Http\Livewire\Admin\TingkatRisiko\TRController17;
use App\Http\Livewire\Admin\TingkatRisiko\TRController18;
use App\Http\Livewire\Admin\TingkatRisiko\TRController19;
use App\Http\Livewire\Admin\TingkatRisiko\TRController20;
use App\Http\Livewire\Admin\TingkatRisiko\TRController21;

use App\Http\Livewire\Admin\DashboardController;
use App\Http\Livewire\Admin\GrafikController;
use App\Http\Livewire\Admin\UserProfile;

use App\Http\Livewire\Peta\PetaController;
use App\Http\Livewire\Peta\PetaPrediksiController;


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

Route::get('/', LandingPage::class)->name('beranda');

Route::get('/beranda', LandingPage::class)->name('beranda');
Route::get('/fasilitas-kesehatan', InfoFaskes::class)->name('fasilitas-kesehatan');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');
Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/peta-stunting-2017', PetaController::class)->name('peta-stunting-2017');
Route::get('/peta-stunting-2018', PetaController::class)->name('peta-stunting-2018');
Route::get('/peta-stunting-2019', PetaController::class)->name('peta-stunting-2019');
Route::get('/peta-stunting-2020', PetaController::class)->name('peta-stunting-2020');
Route::get('/peta-stunting-2021', PetaController::class)->name('peta-stunting-2021');

Route::get('/peta-prediksi2019', PetaPrediksiController::class)->name('peta-prediksi2019');
Route::get('/peta-prediksi2020', PetaPrediksiController::class)->name('peta-prediksi2020');
Route::get('/peta-prediksi2021', PetaPrediksiController::class)->name('peta-prediksi2021');
Route::get('/peta-prediksi2022', PetaPrediksiController::class)->name('peta-prediksi2022');

Route::get('/grafik-tingkat-risiko', GrafikController::class)->name('grafik-tingkat-risiko');
Route::get('/grafik-pelayanan-kesehatan', GrafikController::class)->name('grafik-pelayanan-kesehatan');
Route::get('/grafik-sanitasi-layak', GrafikController::class)->name('grafik-sanitasi-layak');
Route::get('/grafik-desa-uci', GrafikController::class)->name('grafik-desa-uci');
Route::get('/grafik-asi-eksklusif', GrafikController::class)->name('grafik-asi-eksklusif');
Route::get('/grafik-stunting', GrafikController::class)->name('grafik-stunting');

Route::get('/info-tingkat-risiko2017', InfoTingkatRisiko17::class)->name('info-tingkat-risiko2017');
Route::get('/info-tingkat-risiko2018', InfoTingkatRisiko18::class)->name('info-tingkat-risiko2018');
Route::get('/info-tingkat-risiko2019', InfoTingkatRisiko19::class)->name('info-tingkat-risiko2019');
Route::get('/info-tingkat-risiko2020', InfoTingkatRisiko20::class)->name('info-tingkat-risiko2020');
Route::get('/info-tingkat-risiko2021', InfoTingkatRisiko21::class)->name('info-tingkat-risiko2021');

Route::get('/info-pelayanan-kesehatan', InfoPelayanan::class)->name('info-pelayanan-kesehatan');
Route::get('/info-sanitasi-layak', InfoSanitasi::class)->name('info-sanitasi-layak');
Route::get('/info-desa-uci', InfoDesa::class)->name('info-desa-uci');
Route::get('/info-asi', InfoASI::class)->name('info-asi');
Route::get('/info-stunting', InfoStunting::class)->name('info-stunting');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/peta2017', PetaController::class)->name('peta2017');
    Route::get('/peta2018', PetaController::class)->name('peta2018');
    Route::get('/peta2019', PetaController::class)->name('peta2019');
    Route::get('/peta2020', PetaController::class)->name('peta2020'); 
    Route::get('/peta2021', PetaController::class)->name('peta2021');

    Route::get('/prediksi2019', PetaPrediksiController::class)->name('prediksi2019');
    Route::get('/prediksi2020', PetaPrediksiController::class)->name('prediksi2020');
    Route::get('/prediksi2021', PetaPrediksiController::class)->name('prediksi2021');
    Route::get('/prediksi2022', PetaPrediksiController::class)->name('prediksi2022');

    Route::get('/grafik-tingkatrisiko', GrafikController::class)->name('grafik-tingkatrisiko');
    Route::get('/grafik-pelayanan', GrafikController::class)->name('grafik-pelayanan');
    Route::get('/grafik-sanitasi', GrafikController::class)->name('grafik-sanitasi');
    Route::get('/grafik-desauci', GrafikController::class)->name('grafik-desauci');
    Route::get('/grafik-asi', GrafikController::class)->name('grafik-asi');
    Route::get('/grafik-prevalensi-stunting', GrafikController::class)->name('grafik-prevalensi-stunting');
    
    Route::get('/tingkat-risiko2017', TRController17::class)->name('tingkat-risiko2017');
    Route::get('/tingkat-risiko2018', TRController18::class)->name('tingkat-risiko2018');
    Route::get('/tingkat-risiko2019', TRController19::class)->name('tingkat-risiko2019');
    Route::get('/tingkat-risiko2020', TRController20::class)->name('tingkat-risiko2020');
    Route::get('/tingkat-risiko2021', TRController21::class)->name('tingkat-risiko2021');
    
    Route::get('/pelayanan-kesehatan-balita', PelayananController::class)->name('pelayanan-kesehatan-balita');
    Route::get('/cakupan-ASI-Ekslusif', ASIController::class)->name('ASI-eksklusif');
    Route::get('/stunting', StuntingController::class)->name('stunting');
    Route::get('/cakupan-desa-UCI', DesaController::class)->name('desaUCI');
    Route::get('/fasilitas-jamban-sehat', SanitasiController::class)->name('jamban-sehat');

    Route::get('/kabupaten-kota', KabupatenController::class)->name('kabupaten-kota');
    Route::get('/user-profile', UserProfile::class)->name('user-profile');
    Route::get('/tahun', TahunController::class)->name('tahun');
    Route::get('/faskes', InfoFaskes::class)->name('faskes');

});

