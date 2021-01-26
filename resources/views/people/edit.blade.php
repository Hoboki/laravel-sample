@extends('layout')
@section('title', 'ユーザー編集')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ユーザー編集フォーム</h2>
        <form method="post" action="{{ route('people.update', [$person->id]) }}"onSubmit="return checkSubmit()">     
            @csrf
            @method('PUT')
            <input type="hidden" name='id' value='{{ $person->id }}'>
            <div class="form-group">
                <label for="name">
                    ユーザー名
                </label>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ $person->name }}"
                    type="string"
                >
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn b
                btn-secondary" href="{{ route('people.show', [$person->id]) }}">
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