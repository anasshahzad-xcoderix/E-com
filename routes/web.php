<?php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    return view('home');
});


Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContactForm'])->name('contact.send');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/categories', [PageController::class, 'categories'])->name('categories');
Route::get('/daily-sale', [PageController::class, 'dailySale'])->name('daily-sale');
Route::get('/makers', [PageController::class, 'makers'])->name('makers');
Route::get('/help', [PageController::class, 'help'])->name('help');

/* Authentication Routes */

Route::get('/login', [SocialAuthController::class, 'showLogin'])->name('login');
Route::get('/auth/github', [SocialAuthController::class, 'redirect'])->name('github.login');
Route::get('/auth/github/callback', [SocialAuthController::class, 'callback']);
Route::post('/logout', [SocialAuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');