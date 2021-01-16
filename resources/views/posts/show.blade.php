@extends('layout')
@section('title', '{{ $post->title}}')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <h2>{{ $post->title }}</h2>
  <span>投稿日：{{ $post->created_at }}</span>
  <span>更新日：{{ $post->updated_at }}</span>
  <p>{{ $post->content }}</p>

  </div>
</div>
@endsection