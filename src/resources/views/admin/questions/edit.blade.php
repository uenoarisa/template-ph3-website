<form method="POST" action= "{{route('questions.update',$question->id)}}">
    @csrf

    @error('title')
      <div class="text-danger">{{ $message }}</div>
    @enderror

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

    <label for="correct_choice">正解の選択肢</label>
    @foreach ($question->choices as $choice)
        <input type="radio" name="correct_choice" value="{{ $choice->id }}" {{ $choice->is_correct ? 'checked' : '' }}>
        <label for="choice_{{ $choice->id }}">選択肢{{ $choice->id }}</label>
        <input type="text" name="choice_{{ $choice->id }}" value="{{ $choice->text }}">
        
        <br>
    @endforeach

    
    <button type="submit" class="btn btn-primary">更新</button>
</form>