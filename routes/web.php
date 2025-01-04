<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([RoleMiddleware::class . ':admin'])->group(function (){
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/kursuses', KursusController::class);
    Route::resource('admin/moduls', ModulController::class);
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/courses', [DashboardController::class, 'kursuses'])->name('dashboard.courses');
Route::get('/users', [DashboardController::class, 'users'])->name('dashboard.users');
Route::get('/payments', [DashboardController::class, 'payments'])->name('dashboard.payments');
Route::get('/reviews', [DashboardController::class, 'reviews'])->name('dashboard.reviews');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register_view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

