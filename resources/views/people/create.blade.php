@extends('layout')
@section('title', 'ユーザー投稿')
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
                    v-model="name"
                required>
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
               <div :style="displayObject"> @{{message}}</div> 
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
new Vue({
    el:"#app",
    computed:{
        displayObject(){
            return {
                display: this .active ? "block" : "none",
                "font-weight": "bold",
                color: "red"
            };
        }
    },
    data:{
        name: "",
        active: false,
        maeesge: ""
    },
    watch: {
        name(value) {
            if (0 == value.length) {
                this.active = true;
                this.message = "入力してください";
            } else {
                this.active = false;
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