<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stunting2017', 'App\Http\Livewire\PetaApiController@result1')->name('stunting2017');
Route::get('/stunting2018', 'App\Http\Livewire\PetaApiController@result2')->name('stunting2018');
Route::get('/stunting2019', 'App\Http\Livewire\PetaApiController@result3')->name('stunting2019');
Route::get('/stunting2020', 'App\Http\Livewire\PetaApiController@result4')->name('stunting2020');
Route::get('/stunting2021', 'App\Http\Livewire\PetaApiController@result5')->name('stunting2021');
Route::get('/tingkat-risiko', 'App\Http\Livewire\PetaApiController@result6')->name('tingkat-risiko');

Route::get('/prediksi2020', 'App\Http\Livewire\PetaApiController@result7')->name('prediksi2020');
Route::get('/prediksi2021', 'App\Http\Livewire\PetaApiController@result8')->name('prediksi2021');
Route::get('/prediksi2022', 'App\Http\Livewire\PetaApiController@result9')->name('prediksi2022');