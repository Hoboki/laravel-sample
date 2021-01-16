@extends('layout')
@section('title', '{{ $person->name }}')
@section('content')
<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
  <h2>{{ $person->name }}</h2>
  <table class="table table-striped">
    <tr>
        <th>タイトル</th>
        <th>投稿日</th>
        <th>更新日</th>
    </tr>
    @foreach($person->posts as $post)
    <tr>
        
        <td><a href="{{route('posts.show', [$post->person_id, $post->id])}}">{{ $post->title }}</a></td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        
    </tr>
    @endforeach
  </table>

  </div>
</div>
@endsection