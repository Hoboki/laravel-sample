<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <title>@yield('title')</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
  <header>
  @include('header')
  </header>
  <br>
  <div id="ap">
    <example-component></example-component>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
    <div class="container">
    @yield('content')
    </div>
  <footer class="footer bg-dark  fixed-bottom">
  @include('footer')
  </footer>
</body>
</html>