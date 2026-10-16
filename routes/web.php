<?php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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
