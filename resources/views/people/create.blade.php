@extends('layout')
@section('title', 'テスト投稿')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ユーザー作成フォーム</h2>
        <form method="POST" action="{{ route('people.store') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="name">
                    ユーザー名
                </label>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    type="text"
                >
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('people.index') }}">
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