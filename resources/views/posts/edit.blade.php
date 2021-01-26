@extends('layout')
@section('title', 'ユーザー編集')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>投稿編集フォーム</h2>
        <form method="post" action="{{ route('posts.update', [$person->id, $post->id]) }}"onSubmit="return checkSubmit()">     
            @csrf
            @method('PUT')
            <input type="hidden" name='id' value='{{ $post->id }}'>
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $post->title }}"
                    type="string"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif

                
                <label for="content">
                    本文
                </label>
                <textarea class='form-control' name="content" id="content" rows="4">{{ $post->content }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn b
                btn-secondary" href="{{ route('posts.show', [$person->id, $post->id]) }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection