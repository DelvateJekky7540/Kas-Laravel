<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// 
Route::middleware(['cekLogin', 'role:admin'])->group(function () {

    // Validasi role admin lalu diarahkan ke dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Menampilkan data user
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');

    // Menambah user
    Route::post('/admin/user', [UserController::class, 'store'])->name('user.store');

    // Mengubah user
    Route::put('/admin/user/{user}', [UserController::class, 'update'])->name('user.update');

    // Menghapus user
    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

// 
Route::middleware(['cekLogin', 'role:user'])->group(function () {

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

});

// User 
Route::get('/user', [UserController::class, 'index'])->name('user.index');


// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');