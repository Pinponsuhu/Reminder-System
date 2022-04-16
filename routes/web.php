<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavigateController;
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

Route::get('/', [NavigateController::class, 'dashboard']);
Route::get('/appointments/{status}', [NavigateController::class, 'appointments']);
Route::get('/{end}/appointments', [NavigateController::class, 'end_appointments']);
Route::get('/view/all/appointments', [NavigateController::class, 'all_appointment']);
Route::get('/search/all/appointments', [NavigateController::class, 'search_appointments']);
Route::get('/staff/details/{id}',[NavigateController::class,'user_details']);
Route::post('/update/details/{id}',[NavigateController::class,'staff_update']);
Route::post('/update/image/{id}',[NavigateController::class,'staff_image']);
Route::get('/success', [NavigateController::class, 'success']);
Route::get('/all/staffs', [NavigateController::class, 'all_staff']);
Route::post('/new/staffs', [NavigateController::class, 'add_staff']);
Route::get('/book/appointment/{token}',[NavigateController::class, 'verify_token']);
Route::post('/book/appointment/{token}',[NavigateController::class, 'store_appointment']);
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::get('/add/admin',[NavigateController::class, 'add_admin']);
Route::post('/login',[LoginController::class, 'logining']);
Route::post('/logout',[NavigateController::class, 'logout']);
Route::get('/change/password',[NavigateController::class, 'change_password']);
Route::post('/change/password',[NavigateController::class, 'store_password']);
Route::post('/change/status/{id}',[NavigateController::class, 'change_status']);
Route::post('/add/admin',[NavigateController::class, 'store_admin']);
Route::get('/all/admin',[NavigateController::class, 'all_admin']);
Route::get('/reset/password/{id}',[NavigateController::class, 'reset_password']);
Route::get('/delete/admin/{id}',[NavigateController::class, 'delete_admin']);
