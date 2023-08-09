<form method="POST" action= "{{route('questions.update',$question->id)}}" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @method('put')
    <label for="quiz_id">紐付けるクイズタイトル</label>
    <select name="quiz_id" id="quiz_id">
        @foreach ($quizzes as $quiz)
            <option value="{{ $quiz->id }}" {{ $quiz->id == $question->quiz_id ? 'selected' : '' }}>{{ $quiz->name }}</option>
        @endforeach
    </select>

    <label for="question_text">設問のテキスト</label>
    <input type="text" name="question_text" value="{{ $question->text }}">

    <label for="supplement_text">補足のテキスト</label>
    <input type="text" name="supplement_text" value="{{ $question->supplement }}">

    <label for="image">写真</label>
    <input type="file" name="image" id="image">

    @foreach ($question->choices as $i => $choice)
    <input type="radio" name="correct_choice" value="{{ $choice->id }}" {{ $choice->is_correct == 1 ? 'checked' : '' }}>
    <label for="choice_{{ $i + 1 }}">選択肢{{$i+1}}</label>
    <input type="text" name="choice_{{ $choice -> id }}" id="choice_{{ $i + 1 }}" value="{{ $choice->text }}">
    @endforeach

    
    <button type="submit" class="btn btn-primary">更新</button>
</form>