<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::view('/multiphase-compression', 'multiphase-compression');
Route::view('/vapor-recovery', 'vapor-recovery');
Route::view('/casing-gas-compression', 'casing-gas-compression');
Route::view('/case-studies', 'case-studies');
Route::view('/technology', 'technology');
Route::view('/insights', 'insights');
Route::view('/privacy-policy', 'privacy-policy');
Route::view('/terms', 'terms');
Route::view('/perspectives', 'perspectives');
Route::view('/multiphase-compression-technology', 'multiphase-compression-technology');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/case-studies/allied-energy-ii-multiphase-vapor-recovery', function () {
    return view('case-studies.allied-energy-ii-multiphase-vapor-recovery');
})->name('case-studies.allied-energy');

Route::get('/case-studies/4-5-years-of-reliable-vapor-recovery', function () {
    return view('case-studies.reliable-vapor-recovery');
})->name('case-studies.reliable-vapor-recovery');

Route::get('/case-studies/incremental-revenue-case-study', function () {
    return view('case-studies.incremental-revenue-case-study');
})->name('case-studies.incremental-revenue');
