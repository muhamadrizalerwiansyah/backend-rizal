<?php

use App\Http\Controllers\AppsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login-apps', [AppsController::class, 'login'])->name('login-apps');
Route::get('employee-all', [AppsController::class, 'getAllEmployee'])->name('employee-all');
Route::post('superior-insert', [AppsController::class, 'create_superior'])->name('superior-insert');
Route::patch('superior-update/{id}', [AppsController::class, 'update_superior'])->name('superior-update');
Route::delete('employee-delete/{id}', [AppsController::class, 'delete'])->name('employee-delete');
Route::post('member-insert', [AppsController::class, 'create_member'])->name('member-insert');
Route::get('employee-export', [AppsController::class, 'export'])->name('employee-export');
