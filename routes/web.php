<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Routes cho khách
Route::get('/', [DepartmentController::class, 'index'])->name('home');
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');

// Routes cho người dùng đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::resource('staff', StaffController::class)->middleware('admin');
    Route::resource('departments', DepartmentController::class)->middleware('admin');
    // Route để user thường chỉnh sửa thông tin của mình
    Route::get('/my-profile', [StaffController::class, 'editMyProfile'])->name('staff.editMyProfile');
    Route::put('/my-profile', [StaffController::class, 'updateMyProfile'])->name('staff.updateMyProfile');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    // Các route khác chỉ dành cho admin
});
require __DIR__.'/auth.php';
