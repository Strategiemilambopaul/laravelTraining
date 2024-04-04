<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [postController::class, 'index'])->name('welcome');
Route::Post('/store', [postController::class, 'store'])->name('store');
Route::get('/create', [postController::class, 'create'])->name('create');
Route::get('/post/{id}', [postController::class, 'show'])->whereNumber('id')->name('article');
Route::get('/contact', [postController::class, 'contact'])->name('contact');
Route::get('/register', [postController::class, 'register'])->name('register');

