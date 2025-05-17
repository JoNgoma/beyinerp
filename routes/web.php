<?php

use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['link' => \route('contacts.show', ['name' => 'Johnson', 'tel' => '24381567890', 'lib' => 'test', 'id' => 0])];
});

Route::prefix('contacts')->name('contacts.')->controller(contactController::class)->group(function () {
    Route::get('/', 'index')->name('index'); 
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store'); 
    Route::get('/{name}-{id}', 'show')->name('show');
});

Route::get('/bad', function () {
    return 'Bad request';
})->name('bad');
