<form method="POST" action= "{{route('quiz.update',$quiz->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="title">クイズ</label>
        <input type="text" class="form-control" id="title" name="name" value="{{ old('name', $quiz->name) }}">
    </div>
    @error('title')
      <div class="text-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">更新</button>
</form>