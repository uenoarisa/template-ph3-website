
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
    <a href="{{route('quiz.create')}}"><button>新規作成</button></a>
    <div class="mx-auto px-6">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      
      @foreach ($quizzes as $quiz)
      <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            @if($quiz->trashed())
                <span class="text-danger">削除済み</span>
                <a href="{{route('quiz.show', ['id' => $quiz -> id])}}">
            <h3 class="p-4">
              {{ $quiz->name }}
            </h3>
            </a>
            <hr>
            @else
            
        <a href="{{route('quiz.show', ['id' => $quiz -> id])}}">
            <h3 class="p-4">
              {{ $quiz->name }}
            </h3>
        </a>
        <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-primary"><button type="submit" class="btn btn-danger">編集</button></a>
        <form method="POST" action= "{{route('quiz.destroy', $quiz->id)}}" id="deleteform" onClick="delete_alert(event);return false;">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger" id="modal">削除</button>
        </form>
      </div>
        <!-- @foreach ($quiz->questions as $question)
          <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h3 class="p-4">
              {{ $question->text }}
            </h3>
          </div>
        @endforeach -->
        <hr class="w-full">
        @endif
      @endforeach
      <div class="">
        {{ $quizzes->links() }}
      </div>

    </div>
    </body>
    </html>

