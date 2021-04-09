@extends('layout')
@section('title', 'posts.show')
@section('content')
<div id="posts_show">
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <p>{{ Breadcrumbs::render('post', $person, $post) }}</p>
    <h2>
      {{ $post->title }}
      <like-component prop-is-liked='{{$liked}}' prop-person-id='{{$person->id}}' prop-post-id='{{$post->id}}'></like-component>
    </h2>
    @if (session('err_red'))
    <p class='text-danger'>
      {{ session('err_red') }}
    </p>
    @elseif (session('err_blue'))
    <p class='text-primary'>
      {{ session('err_blue') }}
    </p>
    @endif
    <span>投稿日：{{ $post->created_at }}</span>
    <span>更新日：{{ $post->updated_at }}</span>
    <br/>
    <br/>
    <p>{{ $post->content }}</p>
  </div>
  <div class='text-left'>
    <div class="text-center">
      <form method="post" action="{{ route('posts.destroy', [$person->id, $post->id]) }}" onSubmit="return checkDestroy()">
      
        @csrf
        @method('DELETE')
        <a class='btn btn-outline-secondary' href="{{ route('people.show', [$post->person_id]) }}">
          戻る
        </a>
        <a class="btn btn-outline-primary" href="{{ route('posts.edit', [$post->person_id, $post->id]) }}" role="button">
          編集
        </a>
        <button type='submit' class='btn btn-outline-danger' onclick=>
          削除
        </button>
      </form>
    </div>
  </div>
</div>
</div>
<script>
new Vue({
  el: '#posts_show',
})
function checkDestroy(){
  if(window.confirm('削除してよろしいですか？')){
      return true;
  } else {
      return false;
  }
}
</script>
@endsection