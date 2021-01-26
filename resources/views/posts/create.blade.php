@extends('layout')
@section('title', 'テスト投稿')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ユーザー作成フォーム</h2>
        <p>ユーザー名</p><nobr/><h3>{{ $person->name }}</h3>
        <form method="POST" action="{{ route('posts.store', [$person->id]) }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name='person_id' value='{{ $person->id }}'>
            <div class="form-group">
                <label for="name">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <label for="content">
                    内容
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4"
                >{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('people.show', [$person->id]) }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    作成する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('作成してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection