<?php

use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('contacts')->name('contacts.')->controller(contactController::class)->group(function () {
    Route::get('/', 'index')->name('index'); 
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{name}-{id}', 'edit')->name('edit'); 
    Route::post('/store/{id?}', 'store')->name('store'); 
    Route::delete('/destroy/{id}', 'destroy')->name('destroy'); 
    Route::get('/{name}-{id}', 'show')->name('show');
});

Route::get('/bad', function () {
    return 'Bad request';
})->name('bad');
