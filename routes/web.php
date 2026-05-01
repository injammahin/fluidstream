<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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
Route::view('/about-us', 'about-us')->name('about-us');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Case Study Pages
|--------------------------------------------------------------------------
*/

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

/*
|--------------------------------------------------------------------------
| Insight Pages
|--------------------------------------------------------------------------
| Article 1 to Article 13
*/

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

/*
|--------------------------------------------------------------------------
| New Insight Pages
|--------------------------------------------------------------------------
| Article 7 to Article 13
*/

Route::view(
    '/insights/fluidstream-vru-vs-flaring-complete',
    'insights.fluidstream-vru-vs-flaring-complete'
)->name('insights.fluidstream-vru-vs-flaring-complete');

Route::view(
    '/insights/fluidstream-methane-reduction-story-white-sections',
    'insights.fluidstream-methane-reduction-story-white-sections'
)->name('insights.fluidstream-methane-reduction-story-white-sections');

Route::view(
    '/insights/how-to-select-right-compression-applications-final-fixed',
    'insights.how-to-select-right-compression-applications-final-fixed'
)->name('insights.how-to-select-right-compression-applications-final-fixed');

Route::view(
    '/insights/when-is-casing-gas-compressioncommander',
    'insights.when-is-casing-gas-compressioncommander'
)->name('insights.when-is-casing-gas-compressioncommander');

Route::view(
    '/insights/why-conventional-compression-fails-wet-unstable-wells',
    'insights.why-conventional-compression-fails-wet-unstable-wells'
)->name('insights.why-conventional-compression-fails-wet-unstable-wells');

Route::view(
    '/insights/how-casing-gas-compression-increases-oil-production',
    'insights.how-casing-gas-compression-increases-oil-production'
)->name('insights.how-casing-gas-compression-increases-oil-production');

Route::view(
    '/insights/how-multiphase-compression-supports-production-recovery',
    'insights.how-multiphase-compression-supports-production-recovery'
)->name('insights.how-multiphase-compression-supports-production-recovery');
Route::view(
    'technical-review',
    'technical-review'
)->name('technical-review');