<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;

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
    return view('admin.dashboard');
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


Route::get('/dash', [UserController::class, 'dash'])
    ->name('admin.dash');

Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])
    ->name('admin.dashboard');
    // 他の管理画面のルートを追加
    Route::get('quizzes/create', [QuizController::class, 'create'])->name('quiz.create');

    Route::get('quizzes/',[QuizController::class,'index'])
    ->name('quiz.index');

    Route::get('quizzes/{id}', [QuizController::class, 'show'])->name('quiz.show');

    Route::get('quizzes/{id}/edit', [QuizController::class, 'edit'])
    ->name('quiz.edit');

    Route::put('quizzes/{id}', [QuizController::class, 'update'])
    ->name('quiz.update');

    Route::delete('quizzes/{id}', [QuizController::class, 'destroy'])
    ->name('quiz.destroy');

    Route::post('quizzes/store', [QuizController::class, 'store'])->name('quiz.store');

    Route::get('questions/',[QuizController::class,'question_index'])
    ->name('question.index');

    Route::get('questions/create', [QuizController::class, 'question_create'])->name('question.create');

    // Route::delete('quizzes/{id}', [QuizController::class, 'destroy'])
    // ->name('quiz.destroy');

    Route::post('questions/store', [QuizController::class, 'question_store'])->name('question.store');

    Route::delete('questions/{id}', [QuizController::class, 'question_destroy'])
    ->name('questions.destroy');

    Route::get('questions/{id}/edit', [QuizController::class, 'question_edit'])
    ->name('questions.edit');

    Route::put('questions/{id}', [QuizController::class, 'question_update'])
    ->name('questions.update');

});
