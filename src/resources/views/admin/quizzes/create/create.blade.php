<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規クイズの作成</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('quiz.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">問題タイトル</label>
                            <input type="text" name="name" id="title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>