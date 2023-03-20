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
<<<<<<<<< Temporary merge branch 1
    return to_route('participants.index');
});

Auth::routes();

Route::group(['prefix'=>'/participants'], function (){
    Route::get('/', [App\Http\Controllers\ParticipantController::class, 'index'])->name('participants.index');
    Route::get('/create', [App\Http\Controllers\ParticipantController::class, 'create'])->name('participants.create');
    Route::post('/store', [App\Http\Controllers\ParticipantController::class, 'store'])->name('participants.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ParticipantController::class, 'edit'])->name('participants.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ParticipantController::class, 'update'])->name('participants.update');
    Route::get('/show/{id}', [App\Http\Controllers\ParticipantController::class, 'show'])->name('participants.show');
    Route::get('/delete/{id}', [App\Http\Controllers\ParticipantController::class, 'destroy'])->name('participants.delete');

//    Route::get('/search', [App\Http\Controllers\ParticipantController::class, 'search'])->name('participants.search');

});



;





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<<<< Temporary merge branch 1
=========

Route::group(['prefix'=>'/vols'],function(){
    Route::get('/', [\App\Http\Controllers\VolController::class, 'index'])->name('vol');
    Route::get('/create', [\App\Http\Controllers\VolController::class, 'create'])->name('vol.create');
    Route::post('/store', [\App\Http\Controllers\VolController::class, 'store'])->name('vol.store');
    Route::get('/edit/{id}', [\App\Http\Controllers\VolController::class, 'edit'])->name('vol.edit');
    Route::post('/update/{id}', [\App\Http\Controllers\VolController::class, 'update'])->name('vol.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\VolController::class, 'delete'])->name('vol.delete');
});



