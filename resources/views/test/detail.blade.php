@extends('layout')
@section('title', 'テスト詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <h2>{{ $test->title }}</h2>
  <span>作成日：{{ $test->created_at }}</span>
  <span>更新日：{{ $test->updated_at }}</span>
  <p>{{ $test->content }}</p>

  </div>
</div>
@endsection