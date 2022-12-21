<?php

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
    return view('welcome');
});

Route::get('/login_page', [App\Http\Controllers\AuthController::class, 'index']);
Route::get('/notes',[App\Http\Controllers\NoteController::class, 'index']);
Route::get('/fetch_notes',[App\Http\Controllers\NoteController::class, 'fetch']);
Route::post('/view_note',[App\Http\Controllers\NoteController::class, 'getNote']);
Route::post('/edit',[App\Http\Controllers\NoteController::class, 'edit']);