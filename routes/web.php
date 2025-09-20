<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
       'name' => 'Andreas'
    ]);
});

Route::get('/halo',function () {
    return redirect()->route('hello');
});

Route::get('/hello', function () {
    return 'Hello';
})->name('hello');

Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name;
});

Route::fallback(function () {
    return 'Page not found';
});

