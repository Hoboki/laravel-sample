@extends('layout')
@section('title', 'ユーザー一覧')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>ユーザー一覧</h2>
        @if (session('err_msg'))
        <p class='text-danger'>
            {{ session('err_msg') }}
        </p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>ユーザー番号</th>
                <th>投稿</th>
                <th>登録日</th>
                <!-- <th></th> -->
            </tr>
            @foreach($people as $person)
            <tr>
                <td>{{ $person->name }}</td>
                <td>
                
                @if ($person->posts != null)
                    @foreach($person->posts as $post)
                        <a href="/person/{{ $person->id }}">{{ $post->title }}</a>
                        <br/>
                    @endforeach
                    @endif
                </td>
                <td>{{ $person->created_at }}</td>

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