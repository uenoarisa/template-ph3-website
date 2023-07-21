<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Quizzes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;

class QuizController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $quizzes = Quizzes::paginate(20);
        return view('admin.quizzes.index',compact('quizzes'));

    }
    public function show($id)
    {
        $quiz = Quizzes::with('questions.choices')->find($id);
        return view('admin.quizzes.show',compact('quiz'));
    }

    public function edit($id)
    {
        $quiz = Quizzes::with('questions.choices')->find($id);
        return view('admin.quizzes.edit',compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);
        $quiz = Quizzes::find($id);
        $quiz->update($validated);
        return Redirect::route('quiz.index')->with('success', '更新されました！');
    }

    public function destroy($id)
    {
        $quiz = Quizzes::find($id);
        $quiz->delete();
        return Redirect::route('quiz.index')->with('success', '削除されました！');
    }
}
