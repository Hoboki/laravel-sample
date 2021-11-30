<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <title>@yield('title')</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
  <header>
  @include('header')
  </header>
    <div class="container">
    @yield('content')
    </div>
  <footer class="footer bg-dark  fixed-bottom">
  @include('footer')
  </footer>
</body>

@if(!Auth::check())
<script type="text/javascript">
window.onunload = function(){};//Firefoxにも適用する場合には記述する
history.forward();
</script>
@endif

</html>
