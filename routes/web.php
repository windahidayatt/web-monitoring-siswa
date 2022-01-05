<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, "login"])->middleware('guest');
Route::get('/login', [UserController::class, "login"])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, "authenticate"]);
Route::post('/logout', [UserController::class, "logout"]);

Route::get('/generate-administrator', [UserController::class, "generate_administrator"])->middleware('guest');

Route::get('/dashboard', [DashboardController::class, "index"])->middleware('auth');

Route::get('/pengguna/guru', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/detail-pengguna/guru', [TeacherController::class, 'show'])->middleware('auth');
Route::get('/add-pengguna/guru', [TeacherController::class, 'create'])->middleware('auth');
Route::post('/pengguna/guru', [TeacherController::class, 'store'])->middleware('auth');

Route::get('/pengguna/siswa', [StudentController::class, 'index'])->middleware('auth');
Route::get('/detail-pengguna/siswa', [StudentController::class, 'show'])->middleware('auth');
Route::get('/add-pengguna/siswa', [StudentController::class, 'create'])->middleware('auth');
Route::post('/pengguna/siswa', [StudentController::class, 'store'])->middleware('auth');

Route::get('/nilai', [GradeController::class, 'index'])->middleware('auth');
Route::get('/add-nilai', [GradeController::class, 'create'])->middleware('auth');
Route::post('/nilai', [GradeController::class, 'store'])->middleware('auth');

Route::get('/nilai/siswa', [GradeController::class, 'show'])->middleware('auth');
