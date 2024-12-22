<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KursusController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/courses', [DashboardController::class, 'kursuses'])->name('dashboard.courses');
Route::get('/users', [DashboardController::class, 'users'])->name('dashboard.users');
Route::get('/payments', [DashboardController::class, 'payments'])->name('dashboard.payments');
Route::get('/reviews', [DashboardController::class, 'reviews'])->name('dashboard.reviews');
Route::resource('admin/users', UserController::class);
Route::resource('admin/kursuses', KursusController::class);
