<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">テスト</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{ route('posts.index') }}">タイムライン<span class="sr-only"></span></a>
      <a class="nav-item nav-link active" href="{{ route('people.index') }}">ユーザー一覧 <span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="{{ route('people.create') }}">ユーザー作成</a>
    </div>
  </div>
</nav>