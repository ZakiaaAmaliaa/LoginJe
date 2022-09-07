<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller;
use App\Http\Middleware;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;

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

//Admin
Auth::routes();
Route::get('/user', [usercontroller::class, 'index'])->middleware(['auth','isUser'])->name('user');
Route::get('/admin', [admincontroller::class, 'index'])->middleware(['auth', 'isAdmin'])->name('admin');

// Route::group(['Middleware' => ['isAdmin']], function () {
//     Route::get('/admin', [admincontroller::class, 'index'])->name('admin');
// });

// Route::group(['Middleware' => ['isUser']], function () {
//     Route::get('/user', [usercontroller::class, 'index'])->name('user');
// });

// Route::middleware(['auth', 'isUser'])->group(function(){
//     Route::get('/user', [App\Http\Controllers\usercontroller::class, 'index'])->name('user');
// });

// Route::middleware(['auth', 'isUser'])->group(function(){
//     Route::get('/user', [App\Http\Controllers\admincontroller::class, 'index'])->name('admin');
// });
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
