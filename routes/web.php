<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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
//     return view('layouts.main');
// });


Auth::routes();
Route::get('/', function () {
    return redirect('dashboard');
});
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('signin', [LoginController::class, 'signin'])->name('signin');
Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('insert-employee', [DashboardController::class, 'create_superior'])->name('insert-employee');
    Route::post('insert-members', [DashboardController::class, 'create_member'])->name('insert-members');
    Route::get('create-employee', [DashboardController::class, 'add_employe'])->name('create-employee');
    Route::get('update-employee/{id}', [DashboardController::class, 'edit_superior'])->name('update-employee');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');