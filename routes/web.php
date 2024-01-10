<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CourseWorkController;
use App\Http\Controllers\ManagerController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/courses', [CourseWorkController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseWorkController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseWorkController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [CourseWorkController::class, 'show'])->name('courses.show');
    Route::delete('/courses/{course}', [CourseWorkController::class, 'destroy'])->name('courses.destroy');

// Authors Routes
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/authors/update/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');

// Managers Routes
    Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
    Route::get('/managers/create', [ManagerController::class, 'create'])->name('managers.create');
    Route::post('/managers', [ManagerController::class, 'store'])->name('managers.store');
    Route::get('/managers/{manager}', [ManagerController::class, 'show'])->name('managers.show');
    Route::delete('/managers/{manager}', [ManagerController::class, 'destroy'])->name('managers.destroy');
});

require __DIR__.'/auth.php';
