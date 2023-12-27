<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);


Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::post('/', 'store')->name('users.store');
        Route::get('/{user}/edit', 'edit')->name('users.edit');
        Route::patch('/{user}', 'update')->name('users.update');
    });
    

    Route::get('/settings', function () {
        return inertia('Settings');
    });

    Route::post('/logout', [LoginController::class, 'destroy']);
});