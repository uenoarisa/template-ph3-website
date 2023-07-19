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
    public function show(Quizzes $id)
    {
        $quiz = Quizzes::with('questions.choices')->find($id);
        return view('quizzes.show',compact('quiz'));
    }

    public function edit(Quizzes $id)
    {
        $quiz = Quizzes::with('questions.choices')->find($id);
        return view('quizzes.edit',compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'text' => 'required|max:255'
        ]);
        $quiz = Quizzes::find($id);
        $quiz->update($validated);
    }
}
