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

// Route::get('/', function () {
//     return view('Homepage.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Files', [App\Http\Controllers\PageController::class, 'Files']);



Route::get('/', [App\Http\Controllers\PageController::class, 'Homepage'])->name('homepage');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'Profile'])->name('profile');
Route::post('/upload-profile-image', [App\Http\Controllers\PageController::class, 'uploadProfileImage'])->name('upload.profile.image');
Route::post('/UserDetails', [App\Http\Controllers\PageController::class, 'userDetails'])->name('UserDetails');
Route::get('/book-property', [App\Http\Controllers\HomeController::class, 'PropertyBook'])->name('PropertyBook');
Route::post('/UserDelete/{id}', [App\Http\Controllers\PageController::class, 'deleteUserDetail'])->name('userDelete');
Route::get('/my-account', [\App\Http\Controllers\HomeController::class, 'UsersAccounts'])->name('account');
Route::get('/messages', [App\Http\Controllers\HomeController::class, 'Messaging'])->name('messaging');

