<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>道頓堀クラス</title>
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
</head>
<body>
    <div class="container">
        <header id="header">
{{-- 元になるデータは@sectionで纏められている。@yieldでは、埋め込みを行う。 --}}
            @yield('header')
        </header>
        <main id="main">
            @yield('content')
        </main>
        <footer id="footer">
            <small>&copy; 2022 Kisiemon</small>
        </footer>
    </div>
</body>
</html>
