<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header>
    <div class=headerbox>
      <a href="/" class="ttl">Attendance Management</a>
      <div class=linkbox>
        <a href="/mypage">マイページ</a>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" class="logout" value="ログアウト">
        </form>
      </div>
    </div>
  </header>

  @yield('content')
  
</body>
</html>