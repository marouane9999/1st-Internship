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

//    Route::get('/search', [App\Http\Controllers\ParticipantController::class, 'search'])->name('participants.search');

});



;





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

