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

Route::get('/participants', [App\Http\Controllers\ParticipantController::class, 'index'])->name('participants.index');
Route::get('/participant/create', [App\Http\Controllers\ParticipantController::class, 'create'])->name('participants.create');
Route::post('/participants/store', [App\Http\Controllers\ParticipantController::class, 'store'])->name('participants.store');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

