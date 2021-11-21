@extends('layout')
@section('title', 'ユーザー一覧')
@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <p>{{ Breadcrumbs::render('people') }}</p>
    </div>
    <div class="card col-10">
        <div class="card-header text-center">
            <h2>ユーザー一覧</h2>
            <div class="text-right">
                <a class="btn btn-outline-primary" href="{{ route('posts.index') }}" role="button">タイムライン</a>
            </div>
        </div>
        @if (session('err_msg'))
        <p class='text-danger'>
            {{ session('err_msg') }}
        </p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>ユーザー名</th>
                <th>投稿</th>
            </tr>
            @foreach($people as $person)
            <p hidden>{{ $count=0 }}</p>
            <tr>
                <td><a href="{{ route('people.show', [$person->id]) }}">{{ $person->name }}</a></td>
                <td>
                    @if ($person->posts != null)
                    @foreach($person->posts as $post)
                    <p hidden>{{ $count++ }}</p>
                    @if($count==4)
                    <a href="{{ route('people.show', [$person->id]) }}">・・・</a>
                    @break
                    @endif
                    <a href="{{ route('posts.show', [$person->id, $post->id]) }}">{{ $post->title }}</a>
                    <br/>
                    
                    @endforeach
                    @endif
                </td>

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