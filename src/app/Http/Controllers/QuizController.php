<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Quizzes;
use \App\Models\Questions;
use \App\Models\Choices;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;

class QuizController extends Controller
{
    public function index()
    {
        // Paginator::useBootstrap();
        $quizzes = Quizzes::withTrashed()->paginate(20);
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
    public function create()
    {
        return view('admin.quizzes.create.create');
        // viewの後ろのquizzes.createはresources/viewsディレクトリ内にquizzesフォルダのcreate.blade.phpを表示する
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
        ]);

        Quizzes::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('quiz.index')->with('success', '新しいクイズのタイトルを作成しました！');
    }

    public function question_index(){
        $quizzes = Quizzes::with(['questions' => function ($query) {
            $query->withTrashed();
        }, 'questions.choices'])->withTrashed()->paginate(20);
        return view('admin.questions.index',compact('quizzes'));
    }

    public function question_create(){
        $quizzes = Quizzes::all();
        return view('admin.questions.create',compact('quizzes'));
    }

    public function question_store(Request $request){
        $quiz = Quizzes::with('questions.choices');
        // バリデーション
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question_text' => 'required|max:200',
            'supplement_text' => 'required|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'choice_1' => 'required|max:100',
            'choice_2' => 'required|max:100',
            'choice_3' => 'required|max:100',
            'correct_choice' => 'required|integer|between:1,3',
        ]);

        // クイズの設問を保存
        $quiz = Quizzes::findOrFail($request->input('quiz_id'));

        $question = new Questions([
            'text' => $request->input('question_text'),
            'supplement' => $request->input('supplement_text'),
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('question_image', 'public');
            $question->image = $imagePath;
        }

        $quiz->questions()->save($question);

        // 選択肢を保存
        $choicesData = [
            ['text' => $request->input('choice_1'), 'is_correct' => ($request->input('correct_choice') == 1 ? 1 : 0)],
            ['text' => $request->input('choice_2'), 'is_correct' => ($request->input('correct_choice') == 2 ? 1 : 0)],
            ['text' => $request->input('choice_3'), 'is_correct' => ($request->input('correct_choice') == 3 ? 1 : 0)],
        ];

        $choicesData[$request->input('correct_choice') - 1]['is_correct'] = 1;

        $choices = collect($choicesData)->map(function ($data) {
            return new Choices($data);
        });

        $question->choices()->saveMany($choices);
        return redirect()->route('question.index')->with('success', '新しい設問を作成しました！');
    }
    public function question_destroy($id){
    $question = Questions::findOrFail($id);
    $question->delete();

    return redirect()->route('question.index')->with('success', 'クイズを削除しました！');
    }

    public function question_edit($id) {
        $question = Questions::with(['choices'])->findOrFail($id);
        $quizzes = Quizzes::all();
        return view('admin.questions.edit', compact('question', 'quizzes'));
    }
    
    public function question_update(Request $request, $id) {
        $question = Questions::findOrFail($id);
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question_text' => 'required|max:200',
            'supplement_text' => 'required|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'choice_1' => 'required|max:100',
            'choice_2' => 'required|max:100',
            'choice_3' => 'required|max:100',
            'correct_choice' => 'required|integer|between:1,3',
        ]);
        
        $question->update([
            'quiz_id' => $request->input('quiz_id'),
            'text' => $request->input('question_text'),
            'supplement' => $request->input('supplement_text'),
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('question_images', 'public');
            $question->image = $imagePath;
            $question->save();
        }
    
        foreach ($question->choices as $choice) {
            $choice->update([
                'text' => $request->input('choice_' . $choice->id),
                'is_correct' => $request->input('correct_choice') == $choice->id ? 1 : 0,
            ]);
        }
    
        return redirect()->route('question.index')->with('success', '質問と選択肢を更新しました！');
    }
    
}
