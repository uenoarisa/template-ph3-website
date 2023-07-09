<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;

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
});

require __DIR__.'/auth.php';

Route::get('/top',[TopController::class,'test'])
->name('index');

Route::get('/user',[UserController::class,'index'])
->name('user');

Route::get('/quizzes',[QuizController::class,'index'])
->name('quiz');

// Route::get('/quizzes',[QuizController::class,'show'])
// ->name('quiz_show');

Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quiz_show');
