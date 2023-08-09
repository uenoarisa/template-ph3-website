<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>POSSE クイズ一覧画面</title>
    <!-- スタイルシート読み込み -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <!-- Google Fonts読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com"   crossorigin>
    <script src="{{asset('js/modal.js')}}" defer></script>
  <head>
  <body>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      一覧表示
    </h2>
    <a href="{{route('question.create')}}"><button>設問作成</button></a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

     
    @foreach ($quizzes as $quiz)
        <h2>{{ $quiz->name }}</h2>
        @foreach ($quiz->questions as $question)
            <div>
                @if($question->trashed())
                    <span class="text-danger">削除済み</span>
                @else
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                @endif
                <p>{{ $question->text }}</p>
                <ul>
                    @foreach ($question->choices as $choice)
                        <li>{{ $choice->text }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endforeach


      {{ $quizzes->links() }}
</body>
</html>
