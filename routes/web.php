<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [SearchController::class, 'index'])->name('search');

/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/

Route::view('/multiphase-compression', 'multiphase-compression')->name('multiphase-compression');
Route::view('/vapor-recovery', 'vapor-recovery')->name('vapor-recovery');
Route::view('/casing-gas-compression', 'casing-gas-compression')->name('casing-gas-compression');
Route::view('/case-studies', 'case-studies')->name('case-studies');
Route::view('/technology', 'technology')->name('technology');
Route::view('/insights', 'insights')->name('insights');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/perspectives', 'perspectives')->name('perspectives');
Route::view('/why-multiphase', 'why-multiphase')->name('why-multiphase');
Route::view('/contact', 'contact')->name('contact');
Route::view('/patented-technology', 'patented-technology')->name('patented-technology');
Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/technical-review', 'technical-review')->name('technical-review');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Case Study Pages
|--------------------------------------------------------------------------
*/

Route::view(
    '/case-studies/multiphasecommander-production-recovery',
    'case-studies.multiphasecommander-production-recovery'
)->name('case-studies.multiphasecommander-production-recovery');

Route::view(
    '/case-studies/vaporcommander-4-5-year-reliability',
    'case-studies.vaporcommander-4-5-year-reliability'
)->name('case-studies.vaporcommander-4-5-year-reliability');

Route::view(
    '/case-studies/vaporcommander-vcu-replacement',
    'case-studies.vaporcommander-vcu-replacement'
)->name('case-studies.vaporcommander-vcu-replacement');

Route::view(
    '/case-studies/allied-energy-vaporcommander-vru',
    'case-studies.allied-energy-vaporcommander-vru'
)->name('case-studies.allied-energy-vaporcommander-vru');

Route::view(
    '/case-studies/whitecap-vaporcommander-vru',
    'case-studies.whitecap-vaporcommander-vru'
)->name('case-studies.whitecap-vaporcommander-vru');

/*
|--------------------------------------------------------------------------
| Old Insight URL 301 Redirects
|--------------------------------------------------------------------------
| Old URLs stay working, but Google and users will see clean URLs.
|--------------------------------------------------------------------------
*/

Route::redirect(
    '/insights/fluidstream-vapor-recovery-fluidstream-style',
    '/insights/vapor-recovery-units-oil-gas',
    301
);

Route::redirect(
    '/insights/fluidstream-casing-gas-compression-long-form',
    '/insights/casing-gas-compression-well-optimization',
    301
);

Route::redirect(
    '/insights/fluidstream-multiphase-vs-conventional-long-form',
    '/insights/multiphase-vs-conventional-compression',
    301
);

Route::redirect(
    '/insights/fluidstream-vru-vs-flaring-complete',
    '/insights/vapor-recovery-vs-flaring',
    301
);

Route::redirect(
    '/insights/fluidstream-methane-reduction-story-white-sections',
    '/insights/methane-emissions-reduction-oil-gas',
    301
);

Route::redirect(
    '/insights/how-to-select-right-compression-applications-final-fixed',
    '/insights/how-to-select-vapor-recovery-unit-wet-gas',
    301
);

Route::redirect(
    '/insights/when-is-casing-gas-compressioncommander',
    '/insights/casing-gas-compression-economics',
    301
);

/*
|--------------------------------------------------------------------------
| Clean Insight Pages
|--------------------------------------------------------------------------
| Public URLs are clean.
| Blade file names stay unchanged, so no theme/design files need renaming.
|--------------------------------------------------------------------------
*/

/*
| Article 1
*/
Route::view(
    '/insights/vapor-recovery-units-oil-gas',
    'insights.fluidstream-vapor-recovery-fluidstream-style'
)->name('insights.fluidstream-vapor-recovery-fluidstream-style');

/*
| Article 2
*/
Route::view(
    '/insights/casing-gas-compression-well-optimization',
    'insights.fluidstream-casing-gas-compression-long-form'
)->name('insights.fluidstream-casing-gas-compression-long-form');

/*
| Article 3
*/
Route::view(
    '/insights/multiphase-vs-conventional-compression',
    'insights.fluidstream-multiphase-vs-conventional-long-form'
)->name('insights.fluidstream-multiphase-vs-conventional-long-form');

/*
| Article 4
*/
Route::view(
    '/insights/why-conventional-vrus-fail-wet-gas',
    'insights.why-conventional-vrus-fail-wet-gas'
)->name('insights.why-conventional-vrus-fail-wet-gas');

/*
| Article 5
*/
Route::view(
    '/insights/production-optimization-multiphase-compression',
    'insights.production-optimization-multiphase-compression'
)->name('insights.production-optimization-multiphase-compression');

/*
| Article 6
*/
Route::view(
    '/insights/multiphase-compression-liquid-loaded-gas-wells',
    'insights.multiphase-compression-liquid-loaded-gas-wells'
)->name('insights.multiphase-compression-liquid-loaded-gas-wells');

/*
| Article 7
*/
Route::view(
    '/insights/vapor-recovery-vs-flaring',
    'insights.fluidstream-vru-vs-flaring-complete'
)->name('insights.fluidstream-vru-vs-flaring-complete');

/*
| Article 8
*/
Route::view(
    '/insights/methane-emissions-reduction-oil-gas',
    'insights.fluidstream-methane-reduction-story-white-sections'
)->name('insights.fluidstream-methane-reduction-story-white-sections');

/*
| Article 9
*/
Route::view(
    '/insights/how-to-select-vapor-recovery-unit-wet-gas',
    'insights.how-to-select-right-compression-applications-final-fixed'
)->name('insights.how-to-select-right-compression-applications-final-fixed');

/*
| Article 10
*/
Route::view(
    '/insights/casing-gas-compression-economics',
    'insights.when-is-casing-gas-compressioncommander'
)->name('insights.when-is-casing-gas-compressioncommander');

/*
| Article 11
*/
Route::view(
    '/insights/why-conventional-compression-fails-wet-unstable-wells',
    'insights.why-conventional-compression-fails-wet-unstable-wells'
)->name('insights.why-conventional-compression-fails-wet-unstable-wells');

/*
| Article 12
*/
Route::view(
    '/insights/how-casing-gas-compression-increases-oil-production',
    'insights.how-casing-gas-compression-increases-oil-production'
)->name('insights.how-casing-gas-compression-increases-oil-production');

/*
| Article 13
*/
Route::view(
    '/insights/how-multiphase-compression-supports-production-recovery',
    'insights.how-multiphase-compression-supports-production-recovery'
)->name('insights.how-multiphase-compression-supports-production-recovery');

/*
|--------------------------------------------------------------------------
| Dynamic Sitemap
|--------------------------------------------------------------------------
| Domain comes from APP_URL in .env.
| Example:
| APP_URL=https://fluidstream.com
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim(config('app.url'), '/');
    $lastmod = now()->toDateString();

    $urls = [
        /*
        |--------------------------------------------------------------------------
        | Main Pages
        |--------------------------------------------------------------------------
        */

        ['path' => '/', 'changefreq' => 'weekly', 'priority' => '1.00'],
        ['path' => '/multiphase-compression', 'changefreq' => 'monthly', 'priority' => '0.90'],
        ['path' => '/vapor-recovery', 'changefreq' => 'monthly', 'priority' => '0.90'],
        ['path' => '/casing-gas-compression', 'changefreq' => 'monthly', 'priority' => '0.90'],
        ['path' => '/case-studies', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/technology', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/patented-technology', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/why-multiphase', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights', 'changefreq' => 'weekly', 'priority' => '0.85'],
        ['path' => '/perspectives', 'changefreq' => 'monthly', 'priority' => '0.70'],
        ['path' => '/about-us', 'changefreq' => 'monthly', 'priority' => '0.75'],
        ['path' => '/contact', 'changefreq' => 'monthly', 'priority' => '0.75'],
        ['path' => '/technical-review', 'changefreq' => 'monthly', 'priority' => '0.80'],

        /*
        |--------------------------------------------------------------------------
        | Case Studies
        |--------------------------------------------------------------------------
        */

        ['path' => '/case-studies/multiphasecommander-production-recovery', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/case-studies/vaporcommander-4-5-year-reliability', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/case-studies/vaporcommander-vcu-replacement', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/case-studies/allied-energy-vaporcommander-vru', 'changefreq' => 'monthly', 'priority' => '0.85'],
        ['path' => '/case-studies/whitecap-vaporcommander-vru', 'changefreq' => 'monthly', 'priority' => '0.85'],

        /*
        |--------------------------------------------------------------------------
        | Clean Insight URLs
        |--------------------------------------------------------------------------
        */

        ['path' => '/insights/vapor-recovery-units-oil-gas', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/casing-gas-compression-well-optimization', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/multiphase-vs-conventional-compression', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/why-conventional-vrus-fail-wet-gas', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/production-optimization-multiphase-compression', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/multiphase-compression-liquid-loaded-gas-wells', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/vapor-recovery-vs-flaring', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/methane-emissions-reduction-oil-gas', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/how-to-select-vapor-recovery-unit-wet-gas', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/casing-gas-compression-economics', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/why-conventional-compression-fails-wet-unstable-wells', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/how-casing-gas-compression-increases-oil-production', 'changefreq' => 'monthly', 'priority' => '0.80'],
        ['path' => '/insights/how-multiphase-compression-supports-production-recovery', 'changefreq' => 'monthly', 'priority' => '0.80'],

        /*
        |--------------------------------------------------------------------------
        | Legal Pages
        |--------------------------------------------------------------------------
        */

        ['path' => '/privacy-policy', 'changefreq' => 'yearly', 'priority' => '0.40'],
        ['path' => '/terms', 'changefreq' => 'yearly', 'priority' => '0.40'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

    foreach ($urls as $url) {
        $loc = $url['path'] === '/'
            ? $baseUrl . '/'
            : $baseUrl . $url['path'];

        $xml .= '    <url>' . PHP_EOL;
        $xml .= '        <loc>' . e($loc) . '</loc>' . PHP_EOL;
        $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
        $xml .= '        <changefreq>' . $url['changefreq'] . '</changefreq>' . PHP_EOL;
        $xml .= '        <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
        $xml .= '    </url>' . PHP_EOL;
    }

    $xml .= '</urlset>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

/*
|--------------------------------------------------------------------------
| Dynamic Robots.txt
|--------------------------------------------------------------------------
| Domain comes from APP_URL in .env.
|--------------------------------------------------------------------------
*/

Route::get('/robots.txt', function () {
    $baseUrl = rtrim(config('app.url'), '/');

    $robots = "User-agent: *\n";
    $robots .= "Allow: /\n\n";
    $robots .= "Disallow: /search\n\n";
    $robots .= "Sitemap: {$baseUrl}/sitemap.xml\n";

    return response($robots, 200)
        ->header('Content-Type', 'text/plain; charset=UTF-8');
})->name('robots');