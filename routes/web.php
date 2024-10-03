<?php


use App\Filament\Pages\FrontendSettings;
use App\Livewire\Contact;
use App\Livewire\LandingPage;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantRegisterController;
use App\Filament\Resources\FeaturePackageResource;



//Route::get('/', \App\Livewire\LandingPage::class)->name('index');
// Route untuk halaman utama yang mengarahkan ke negara dan bahasa default
Route::get('/', function() {
    return redirect('/id/en'); // Redirect ke negara dan bahasa default
});

// Route untuk LandingPage dengan country_code dan language_code
Route::get('/{country_code}/{language_code}', LandingPage::class)->name('landing.page');
Route::middleware(['web'])
    ->group(function () {
        Filament::registerPages([
            FrontendSettings::class,
        ]);
    });
//Route::get('{country_code}/{language}', SubscriptionPackages::class)
//    ->name('index');

//
//Route::get('{country_code}/{language}', function ($country_code, $language) {
//    // Ambil negara berdasarkan kode
//    $language_code = $language;
//    $country = Country::where('country_code', $country_code)->first();
//
//    // Cek apakah negara ditemukan
//    if (!$country) {
//        abort(404, 'Country not found'); // Tampilkan halaman 404 jika negara tidak ditemukan
//    }
//
//    // Ambil paket langganan berdasarkan negara
//    $packages = SubscriptionPackage::with('prices')->whereHas('prices', function($query) use ($country) {
//        $query->where('country_id', $country->id);
//    })->get();
//
//
//    // Mengirim data ke view
//    return view('index', compact('packages', 'country', 'language_code'));
//})
//    ->name('index');

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/{country_code}/{language}', [LanguageController::class, 'showPackages'])->name('index');


//Route::get('/', [LanguageController::class, 'showSelection'])->name('language.selection');
//Route::post('/set-country-language', [LanguageController::class, 'setCountryLanguage'])->name('set.country.language');

Route::get('/register-travel', [TenantRegisterController::class, 'showForm']);
Route::post('/register-travel', [TenantRegisterController::class, 'register']);

Route::domain('{subdomain}.ummro.com')->group(function () {
    Route::get('/', function () {
        // Logic untuk halaman travel di subdomain
        return 'Selamat datang di subdomain travel umroh!';
    });
});



