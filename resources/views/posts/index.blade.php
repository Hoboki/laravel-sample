@extends('layout')
@section('title', '投稿一覧')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>投稿一覧</h2>
        @if (session('err_msg'))
        <p class='text-danger'>
            {{ session('err_msg') }}
        </p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>タイトル</th>
                <th>投稿者</th>
                <th>投稿日</th>
                <th>更新日</th>
                <!-- <th></th>
                <th></th> -->
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>
                <a href="{{ route('posts.show', [$post->person_id, $post->id]) }}">{{ $post->title }}</a>
                </td>
                <td>
                <a href="{{ route('people.show', [$post->person_id]) }}">{{ $post->person->name }}</a>
                </td>
                <td>{{ $post->updated_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
function checkDelete(){
  if(window.confirm('削除してよろしいですか？')){
      return true;
  } else {
      return false;
  }
}
</script>
@endsection