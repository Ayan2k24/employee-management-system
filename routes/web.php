<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardTologinController;
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
//     return view('welcome');
// });

Route::prefix('auth')->controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerUser')->name('register');

    Route::get('login', 'login')->name('login')->middleware('loginMiddleware');
    Route::post('login', 'userLogin')->name('login');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('DashboardMiddleware');




