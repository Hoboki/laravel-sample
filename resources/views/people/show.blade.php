@extends('layout')
@section('title')
user:{{ $routePerson->name }}
@endsection
@section('content')
<div class='row justify-content-center'>
  <div class='col-md-12'>
    <p>{{ Breadcrumbs::render('person', $person) }}</p>
    <h2>{{ $routePerson->name }}</h2>
    @if (session('err_msg'))
    <p class='text-danger'>
      {{ session('err_msg') }}
    </p>
  </div>
    @endif
    <div class="text-center">
      <form method="post" action="{{ route('people.destroy', [$routePerson]) }}" onSubmit="return checkDestroy()">
        @csrf
        @method('DELETE')
        <a class='btn btn-primary' href="{{ route('posts.create', [$person->id]) }}" role="button">
          作成する
        </a>
        <a class="btn btn-outline-primary" href="{{ route('people.edit', [$person->id]) }}" role="button">
          編集
        </a>  
        <button type='submit' class='btn btn-outline-danger' href="{{ route('people.destroy', [$routePerson]) }}" onclick=>
          削除
        </button>
      </form>
    </div>
    <span>登録日：{{ $person->created_at }}</span>
    <table class="table table-striped">
      <tr>
          <div class="col-md-2"><th>タイトル</th></div>
          <div class="col-md-2 col-md-offset-4"><th>投稿日</th><th>更新日</th></div>
      </tr>
      @foreach($person->posts as $post)
      <tr>
          <td><a href="{{route('posts.show', [$post->person_id, $post->id])}}">{{ $post->title }}</a></td>
          <td>{{ $post->created_at }}</td>
          <td>{{ $post->updated_at }}</td>
      </tr>
      @endforeach
    </table>
    <a class="btn btn-outline-primary" href="{{ route('people.index') }}" role="button">
          戻る
    </a>
</div>
<script>
function checkDestroy(){
  if(window.confirm('削除してよろしいですか？')){
      return true;
  } else {
      return false;
  }
}
</script>
@endsection