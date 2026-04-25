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
Route::view('/patented-technology', 'patented-technology')->name('patented-technology');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/case-studies/multiphasecommander-production-recovery', function () {
    return view('case-studies.multiphasecommander-production-recovery');
})->name('case-studies.multiphasecommander-production-recovery');

Route::get('/case-studies/vaporcommander-4-5-year-reliability', function () {
    return view('case-studies.vaporcommander-4-5-year-reliability');
})->name('case-studies.vaporcommander-4-5-year-reliability');

Route::get('/case-studies/vaporcommander-vcu-replacement', function () {
    return view('case-studies.vaporcommander-vcu-replacement');
})->name('case-studies.vaporcommander-vcu-replacement');

Route::get('/case-studies/allied-energy-vaporcommander-vru', function () {
    return view('case-studies.allied-energy-vaporcommander-vru');
})->name('case-studies.allied-energy-vaporcommander-vru');

Route::get('/case-studies/whitecap-vaporcommander-vru', function () {
    return view('case-studies.whitecap-vaporcommander-vru');
})->name('case-studies.whitecap-vaporcommander-vru');
Route::view(
    '/insights/fluidstream-vapor-recovery-fluidstream-style',
    'insights.fluidstream-vapor-recovery-fluidstream-style'
)->name('insights.fluidstream-vapor-recovery-fluidstream-style');

Route::view(
    '/insights/fluidstream-casing-gas-compression-long-form',
    'insights.fluidstream-casing-gas-compression-long-form'
)->name('insights.fluidstream-casing-gas-compression-long-form');

Route::view(
    '/insights/fluidstream-multiphase-vs-conventional-long-form',
    'insights.fluidstream-multiphase-vs-conventional-long-form'
)->name('insights.fluidstream-multiphase-vs-conventional-long-form');

Route::view(
    '/insights/why-conventional-vrus-fail-wet-gas',
    'insights.why-conventional-vrus-fail-wet-gas'
)->name('insights.why-conventional-vrus-fail-wet-gas');

Route::view(
    '/insights/production-optimization-multiphase-compression',
    'insights.production-optimization-multiphase-compression'
)->name('insights.production-optimization-multiphase-compression');

Route::view(
    '/insights/multiphase-compression-liquid-loaded-gas-wells',
    'insights.multiphase-compression-liquid-loaded-gas-wells'
)->name('insights.multiphase-compression-liquid-loaded-gas-wells');