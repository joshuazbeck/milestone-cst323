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

Route::get('/', [\App\Http\Controllers\BlogController::class, 'list']);
Route::get('/edit/{post}', [\App\Http\Controllers\BlogController::class, 'edit']);
Route::get('/view/{post}', [\App\Http\Controllers\BlogController::class, 'view']);
Route::get('/like/{post}', [\App\Http\Controllers\BlogController::class, 'like']);
Route::get('/blog/add', [\App\Http\Controllers\BlogController::class, 'add']);
Route::post('/saveblog', [\App\Http\Controllers\BlogController::class, 'store']);
Route::get('/update/{id}', [\App\Http\Controllers\BlogController::class, 'update']);
Route::get('/delete/{id}', [\App\Http\Controllers\BlogController::class, 'delete']);
