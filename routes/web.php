<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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


Route::middleware('auth')->group(function () {
   Route::get('/books', [BookController::class, 'index'])->name('book');
   Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
   Route::post('/books', [BookController::class, 'store'])->name('book.store');
   Route::get('/books/{id}/edit', [BookController::class,'edit'])->name('book.edit');
   Route::match(['put', 'patch'], '/books/{id}',[BookController::class, 'update'])->name('book.update');
   Route::delete('/books/{id}', [BookController::class,'destroy'])->name('book.destroy');
   Route::get('/books/print', [BookController::class, 'print'])->name('book.print');
   Route::get('/books/export', [BookController::class, 'export'])->name('book.export');
   Route::post('/books/import', [BookController::class, 'import'])->name('book.import');
});

Route::middleware('auth')->group(function () {
   Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
   Route::get('/anggota/create', [BookController::class, 'create'])->name('anggota.create');
   // Route::post('/books', [BookController::class, 'store'])->name('book.store');
   // Route::get('/books/{id}/edit', [BookController::class,'edit'])->name('book.edit');
   // Route::match(['put', 'patch'], '/books/{id}',[BookController::class, 'update'])->name('book.update');
   // Route::delete('/books/{id}', [BookController::class,'destroy'])->name('book.destroy');
   // Route::get('/books/print', [BookController::class, 'print'])->name('book.print');
   // Route::get('/books/export', [BookController::class, 'export'])->name('book.export');
   // Route::post('/books/import', [BookController::class, 'import'])->name('book.import');
});

require __DIR__.'/auth.php';
