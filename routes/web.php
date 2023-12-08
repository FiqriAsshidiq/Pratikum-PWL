<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', function () {
    
})->middleware('auth');

Route::group(['middleware' => ['role:admin']], function () {
   // 
});

Route::group(['middleware' => ['permission:edit user']], function () {
   // 
});

Route::group(['middleware' => ['role:admin|user']], function () {
   // 
});

Route::group(['middleware' => ['permission:edit user|edit articles']], function () {
   // 
});

Route::group(['middleware' => ['role_or_permission:admin|edit user']], function () {
   // 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/roles', 'role')->name('role')->middleware(['role:pustakawan']);
});

require __DIR__.'/auth.php';
