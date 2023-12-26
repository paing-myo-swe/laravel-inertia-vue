<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', [ LoginController::class, 'create'])->name('login');
Route::post('/login', [ LoginController::class, 'store']);


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return inertia('Home');
    });

    Route::get('/users', function (Request $request) {
        return inertia('Users/Index', [
            'users' => User::query()
                ->when($request->search, function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name
                ]),
            'filters' => $request->only(['search'])
        ]);
    })->name('users.index');

    Route::get('/users/create', function () {
        return inertia('Users/Create');
    })->name('users.create');

    Route::post('/users', function (Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create($data);

        return redirect()->route('users.index');
    })->name('users.store');

    Route::get('/settings', function () {
        return inertia('Settings');
    });

    Route::post('/logout', [ LoginController::class, 'destroy']);

});