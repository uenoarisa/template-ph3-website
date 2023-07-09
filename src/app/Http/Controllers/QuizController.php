<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Quizzes;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quizzes::all();
        return view('quizzes.index',compact('quizzes'));

    }
    public function show($id)
    {
        $quiz = Quizzes::with('questions.choices')->find($id);
        return view('quizzes.show',compact('quiz'));
    }
}
