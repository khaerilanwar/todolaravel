<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
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



Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('/registrasi', [RegisterController::class, 'index']);
    Route::post('/registrasi', [RegisterController::class, 'registrasi']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'newTask']);
    Route::get('/tasks/tambah', [TaskController::class, 'add']);
    Route::get('/tasks/update/{task}', [TaskController::class, 'edit']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::get('/tasks/{task}', [TaskController::class, 'detail']);
    Route::patch('/tasks/{task}', [TaskController::class, 'updateStatus']);
    Route::delete("/tasks/{task}", [TaskController::class, 'deleteTask']);
    Route::get('/history', [TaskController::class, 'history']);

    // Route untuk Logout
    Route::delete('/logout', [LogOutController::class, 'index']);
});
