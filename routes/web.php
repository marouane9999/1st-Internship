<?php

use App\Http\Controllers\ParticipantController;
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

Auth::routes();

Route::group(['prefix'=>'/participants'], function (){
    Route::get('/', [App\Http\Controllers\ParticipantController::class, 'index'])->name('participants.index');
    Route::get('/create', [App\Http\Controllers\ParticipantController::class, 'create'])->name('participants.create');
    Route::post('/store', [App\Http\Controllers\ParticipantController::class, 'store'])->name('participants.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ParticipantController::class, 'edit'])->name('participants.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ParticipantController::class, 'update'])->name('participants.update');
    Route::get('/show/{id}', [App\Http\Controllers\ParticipantController::class, 'show'])->name('participants.show');
    Route::get('/delete/{id}', [App\Http\Controllers\ParticipantController::class, 'destroy'])->name('participants.delete');
});
Route::group(['prefix'=>'/vols'], function (){
    Route::get('/', [App\Http\Controllers\VolController::class, 'index'])->name('vols.index');
    Route::get('/create', [App\Http\Controllers\VolController::class, 'create'])->name('vols.create');
    Route::post('/store', [App\Http\Controllers\VolController::class, 'store'])->name('vols.store');
    Route::get('/edit/{id}', [App\Http\Controllers\VolController::class, 'edit'])->name('vols.edit');
    Route::post('/update/{id}', [App\Http\Controllers\VolController::class, 'update'])->name('vols.update');
    Route::get('/show/{id}', [App\Http\Controllers\VolController::class, 'show'])->name('vols.show');
    Route::get('/delete/{id}', [App\Http\Controllers\VolController::class, 'delete'])->name('vols.delete');
});
Route::group(['prefix'=>'/hebergements'], function (){
    Route::get('/', [App\Http\Controllers\HebergementController::class, 'index'])->name('hebergements.index');
    Route::get('/create', [App\Http\Controllers\HebergementController::class, 'create'])->name('hebergements.create');
    Route::post('/store', [App\Http\Controllers\HebergementController::class, 'store'])->name('hebergements.store');
    Route::get('/edit/{id}', [App\Http\Controllers\HebergementController::class, 'edit'])->name('hebergements.edit');
    Route::post('/update/{id}', [App\Http\Controllers\HebergementController::class, 'update'])->name('hebergements.update');
    Route::get('/show/{id}', [App\Http\Controllers\HebergementController::class, 'show'])->name('hebergements.show');
    Route::get('/delete/{id}', [App\Http\Controllers\HebergementController::class, 'delete'])->name('hebergements.delete');


});
Route::group(['prefix'=>'/restaurations'], function (){
    Route::get('/', [App\Http\Controllers\RestaurationController::class, 'index'])->name('restaurations.index');
    Route::get('/create', [App\Http\Controllers\RestaurationController::class, 'create'])->name('restaurations.create');
    Route::post('/store', [App\Http\Controllers\RestaurationController::class, 'store'])->name('restaurations.store');
    Route::get('/edit/{id}', [App\Http\Controllers\RestaurationController::class, 'edit'])->name('restaurations.edit');
    Route::post('/update/{id}', [App\Http\Controllers\RestaurationController::class, 'update'])->name('restaurations.update');
    Route::get('/delete/{id}', [App\Http\Controllers\RestaurationController::class, 'delete'])->name('restaurations.delete');
    Route::get('/show/{id}', [App\Http\Controllers\RestaurationController::class, 'show'])->name('restaurations.show');






});


;





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

