
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
  一覧表示
</h2>

<div class="mx-auto px-6">
  @foreach ($quizzes as $quiz)
  <div class="mt-4 p-8 bg-white w-full rounded-2xl">
    <a href="{{route('quiz_show', ['id' => $quiz -> id])}}">
        <h3 class="p-4">
          {{ $quiz->name }}
        </h3>
    </a>
  </div>
  <hr class="w-full">
    @foreach ($quiz->questions as $question)
      <div class="mt-4 p-8 bg-white w-full rounded-2xl">
        <h3 class="p-4">
          {{ $question->text }}
        </h3>
      </div>
    @endforeach
  @endforeach
</div>


