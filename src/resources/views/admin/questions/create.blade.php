<!-- バリデーションエラー表示 -->
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('question.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="quiz_id">紐付けるクイズタイトル</label>
    <select name="quiz_id" id="quiz_id">
        @foreach ($quizzes as $quiz)
            <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
        @endforeach
    </select>

    <label for="question_text">設問のテキスト</label>
    <input type="text" name="question_text" id="question_text">

    <label for="supplement_text">補足のテキスト</label>
    <input type="text" name="supplement_text" id="question_text">

    <label for="image">写真</label>
    <input type="file" name="image" id="image">

    <label for="choice_1">選択肢1</label>
    <input type="text" name="choice_1" id="choice_1">

    <label for="choice_2">選択肢2</label>
    <input type="text" name="choice_2" id="choice_2">

    <label for="choice_3">選択肢3</label>
    <input type="text" name="choice_3" id="choice_3">

    <label for="correct_choice">正解の選択肢</label>
    <input type="radio" name="correct_choice" value="1"> 1
    <input type="radio" name="correct_choice" value="2"> 2
    <input type="radio" name="correct_choice" value="3"> 3

    <button type="submit">登録</button>
</form>


