<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'FashionablyLate')</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
  @yield('js')
</head>

<body class="@yield('body_class', 'body-default')">
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="/" class="header__logo-link"></a>
            FashionablyLate
        </a>
      </h1>
      @hasSection('header_button')
        <div class="header__button">
          @yield('header_button')
        </div>
      @endif
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>
