@extends('layout')
@section('title', '投稿')
@section('content')
<div id="app">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>投稿フォーム</h2>
        <h3>{{ $person->name }}</h3>
        <form method="POST" action="{{ route('posts.store', [$person->id]) }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name='person_id' value='{{ $person->id }}'>
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    type="text"
                    v-model="title"
                    placeholder="タイトルを入力"
                    required
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <div :style="displayObject"> @{{messageTitle}}</div>
                <label for="content">
                    内容
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4"
                    v-model="content"
                    placeholder="内容を入力"
                    required
                >{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <div :style="displayObject"> @{{messageContent}}</div>
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
</div>
<script>
new Vue({
    el:"#app",
    computed:{
        displayObject(){
            return {
                display: "block",
                color: "red"
            };
        }
    },
    data:{
        title: "",
        content: "",
        activeTitle: false,
        activeContent: false,
        messageTitle: "",
        messageContent: ""
    },
    watch: {
        title(value) {
            if (value.length == 0) {
                this.activeTitle = true;
                this.messageTitle = "入力してください";
            } else {
                this.activeTitle = false;
                this.messageTitle = "";
            }
        },
        content(value){
            if (value.length == 0) {
                this.activeContent = true;
                this.messageContent = "入力してください";
            } else {
                this.activeContent = false;
                this.messageContent = "";
            }
        }
    }
});
function checkSubmit(){
    if(window.confirm('作成してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection