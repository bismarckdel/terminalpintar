<?php

use Illuminate\Support\Facades\Route;

// Rute "Catch-all" untuk SPA
// Ini akan menangani '/', '/admin', '/admin/students', dll.
Route::get('/{any?}', function () {
    return view('welcome'); // Selalu muat shell Vue utama
})->where('any', '.*'); // Memastikan 'any' bisa berisi '/'