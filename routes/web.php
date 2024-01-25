<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
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
    $courseWorks = \App\Models\CourseWork::query()->paginate(10);
    return view('guest', compact('courseWorks'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/managers/create', [ManagerController::class, 'create'])->name('managers.create');
    Route::post('/managers', [ManagerController::class, 'store'])->name('managers.store');
    Route::get('/managers/edit/{manager}', [ManagerController::class, 'edit'])->name('managers.edit');
    Route::put('/managers/update/{manager}', [ManagerController::class, 'update'])->name('managers.update');
    Route::delete('/managers/{manager}', [ManagerController::class, 'destroy'])->name('managers.destroy');


    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/authors/update/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');

    Route::get('/courseWorks/edit/{coursework}', [CourseWorkController::class, 'edit'])->name('courseWorks.edit');
    Route::put('/courseWorks/update/{coursework}', [CourseWorkController::class, 'update'])->name('courseWorks.update');
    Route::delete('/courseWorks/{coursework}', [CourseWorkController::class, 'destroy'])->name('courseWorks.destroy');
    Route::get('/courseWorks/create', [CourseWorkController::class, 'create'])->name('courseWorks.create');
    Route::delete('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/courseWorks', [CourseWorkController::class, 'store'])->name('courseWorks.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/courseWorks', [CourseWorkController::class, 'index'])->name('courseWorks.index');
    Route::get('/courseWorks/{coursework}', [CourseWorkController::class, 'show'])->name('courseWorks.show');
    Route::get('/courseWorks/download/{id}', [CourseWorkController::class, 'download'])->name('courseWorks.download');
    Route::post('/comments/{courseWork}', [CommentController::class, 'store'])->name('comments.store');
// Authors Routes
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

// Managers Routes
    Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
    Route::get('/managers/{manager}', [ManagerController::class, 'show'])->name('managers.show');

});


require __DIR__.'/auth.php';
