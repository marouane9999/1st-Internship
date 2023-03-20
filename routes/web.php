<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return to_route('participants.index');
});

Route::resource('participants', \App\Http\Controllers\ParticipantController::class);

Auth::routes();




Route::group(['prefix'=>'/vols'],function(){
    Route::get('/', [\App\Http\Controllers\VolController::class, 'index'])->name('vol');
    Route::get('/create', [\App\Http\Controllers\VolController::class, 'create'])->name('vol.create');
    Route::post('/store', [\App\Http\Controllers\VolController::class, 'store'])->name('vol.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\VolController::class, 'edit'])->name('vol.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\VolController::class, 'update'])->name('vol.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\VolController::class, 'delete'])->name('vol.delete');
});



