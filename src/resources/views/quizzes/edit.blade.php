<form method="POST" action= "{{route('post.update',$post->id)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="title">クイズ</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$quiz->question}}">
    </div>
    <div class="form-group">
      @foreach ($quiz->choices as $choice)
        <label for="body">選択肢</label>
        <textarea class="form-control" id="body" name="body" rows="3">{{$quiz->$choice}}</textarea>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">更新</button>