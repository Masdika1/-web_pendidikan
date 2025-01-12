<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\StudentKursusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentModulController;
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
    Route::resource('admin/certificates', CertificateController::class);
    Route::resource('/admin/lessons', LessonController::class);
    Route::resource('/admin/payments', PaymentController::class);
});

Route::middleware([RoleMiddleware::class . ':student'])->group(function (){
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
    Route::resource('/student/reviews', ReviewController::class);
    Route::get('payments/student', [StudentPaymentController::class, 'index'])->name('student.payments.studentPayments');
    Route::get('payments/student/create', [StudentPaymentController::class, 'create'])->name('student.payments.create');
    Route::post('payments/student', [StudentPaymentController::class, 'store'])->name('student.payments.store');
        // Menampilkan daftar kursus
    Route::get('student/kursuses', [StudentKursusController::class, 'index'])->name('student.kursuses.index');

    // Menampilkan detail kursus
    Route::get('student/kursuses/{kursus}', [StudentKursusController::class, 'show'])->name('student.kursuses.show');

    // Menampilkan profil pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Menampilkan form edit profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Mengupdate profil pengguna
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('student/moduls', [StudentModulController::class, 'index'])->name('student.moduls.index');
    Route::get('student/moduls/{id}', [StudentModulController::class, 'show'])->name('student.moduls.show');

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
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
