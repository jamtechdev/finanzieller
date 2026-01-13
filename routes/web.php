<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
});

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/datenschutzerklarung', function () {
    return view('datenschutzerklarung');
})->name('datenschutzerklarung');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
