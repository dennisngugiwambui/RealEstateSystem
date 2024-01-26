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
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/view_users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/permissions', [App\Http\Controllers\HomeController::class, 'permissions'])->name('permissions');

Route::get('/user_details/{id}', [App\Http\Controllers\HomeController::class, 'user_details'])->name('user_details');
Route::post('/usertype_change/{id}',[App\Http\Controllers\PageController::class, 'ChangeUsertype'])->name('usertype_change');

Route::post('/status_change/{id}', [App\Http\Controllers\PageController::class, 'status_change'])->name('status_change');
Route::post('/UserAparments',[App\Http\Controllers\PageController::class, 'UserAparments'])->name('UserAparments');

Route::get('/apartment_details/{id}', [App\Http\Controllers\HomeController::class, 'apartment_details'])->name('apartment_details');

Route::post('/ApartmentDetail', [App\Http\Controllers\PageController::class, 'ApartmentDetail'])->name('ApartmentDetail');
Route::post('/ApartmentImages/{id}', [App\Http\Controllers\PageController::class, 'ApartmentImages'])->name('ApartmentImages');

