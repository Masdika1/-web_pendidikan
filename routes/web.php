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
use App\Http\Controllers\StudentCertificateController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\InstructorKursusController;
use App\Http\Controllers\InstructorCertificateController;
use App\Http\Controllers\InstructorReviewController;
use App\Http\Controllers\InstructorUserStudentController;

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

Route::prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/userstudent', [InstructorUserStudentController ::class, 'index'])->name('userstudent.index');
});

Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::resource('userstudent', InstructorUserStudentController::class);
});

Route::middleware([RoleMiddleware::class . ':admin'])->group(function (){
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/kursuses', KursusController::class);
    Route::resource('admin/moduls', ModulController::class);
    Route::resource('admin/certificates', CertificateController::class);
    Route::resource('/admin/lessons', LessonController::class);
    Route::resource('/admin/payments', PaymentController::class);
    Route::get('admin/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('admin/enrollments/{id}', [EnrollmentController::class, 'show'])->name('enrollments.show');
    Route::get('admin/enrollments/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
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

    Route::get('student/certificates', [StudentCertificateController::class, 'index'])->name('student.sertifikat.index');
    Route::get('student/certificates/{id}', [StudentCertificateController::class, 'show'])->name('student.sertifikat.show');

    // Menampilkan profil pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Menampilkan form edit profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Mengupdate profil pengguna
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('student/moduls', [StudentModulController::class, 'index'])->name('student.moduls.index');
    Route::get('student/moduls/{id}', [StudentModulController::class, 'show'])->name('student.moduls.show');

});

Route::middleware([RoleMiddleware::class . ':instructor'])->group(function (){
    Route::get('/instructor/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');
    Route::get('/instructor/kursuses', [InstructorKursusController::class, 'index'])->name('instructor.kursuses.index'); // Menampilkan daftar kursus
    Route::get('/instructor/kursuses/create', [InstructorKursusController::class, 'create'])->name('instructor.kursuses.create'); // Form tambah kursus
    Route::post('/instructor/kursuses', [InstructorKursusController::class, 'store'])->name('instructor.kursuses.store'); // Simpan kursus baru
    Route::get('/instructor/kursuses/{id}', [InstructorKursusController::class, 'show'])->name('instructor.kursuses.show'); // Detail kursus
    Route::get('/instructor/kursuses/{id}/edit', [InstructorKursusController::class, 'edit'])->name('instructor.kursuses.edit'); // Form edit kursus
    Route::put('/instructor/kursuses/{id}/', [InstructorKursusController::class, 'update'])->name('instructor.kursuses.update'); // Update kursus
    Route::delete('kursuses/{id}', [InstructorKursusController::class, 'destroy'])->name('instructor.kursuses.destroy'); // Hapus kursus

    Route::get('/instructor/certificates', [InstructorCertificateController::class, 'index'])->name('instructor.certificates.index');
    Route::get('/instructor/certificates/create', [InstructorCertificateController::class, 'create'])->name('instructor.certificates.create');
    Route::post('/instructor/certificates/store', [InstructorCertificateController::class, 'store'])->name('instructor.certificates.store');
    Route::delete('/instructor/certificates/{id}', [InstructorCertificateController::class, 'delete'])->name('instructor.certificates.delete');
    Route::get('/instructor/certificates/{id}', [InstructorCertificateController::class, 'show'])
     ->name('instructor.certificates.show');

     Route::get('/instructor/reviews', [InstructorReviewController::class, 'index'])->name('instructor.reviews.index');
     Route::get('/instructor/reviews/{id}', [InstructorReviewController::class, 'show'])->name('instructor.reviews.show');
     Route::delete('/instructor/reviews/{id}', [InstructorReviewController::class, 'destroy'])->name('instructor.reviews.destroy');
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

