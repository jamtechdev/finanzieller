<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/datenschutzerklarung', function () {
    return view('datenschutzerklarung');
})->name('datenschutzerklarung');
