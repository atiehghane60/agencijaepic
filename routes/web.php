<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(\App\Http\Controllers\SchedulerController::class)->group(function () {
    Route::get('/', 'index')->name('list');

    Route::get('/import', function () {
        return view('import');
    })->name('import');
    Route::post('/import', 'importFromFile');

    Route::get('/add', function () {
        return view('add');
    })->name('add_activity');
    Route::post('/add', 'store');

    Route::get('/urnik/{activity}', 'show')
        ->name('show')
        ->where('activity', '[0-9]+');
});
