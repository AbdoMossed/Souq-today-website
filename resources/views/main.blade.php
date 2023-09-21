<html lang="en" dir="{{ LaravelLocalization::getCurrentLocaleDirection('rtl') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | </title>
    <link rel="stylesheet" href="{{mix('css/souq.css')}}">
    @if ( Config::get('app.locale') == 'en')
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @endif

    @if ( Config::get('app.locale') == 'ar')
        <link rel="stylesheet" href="{{mix('css/rtl.css')}}">
    @endif
</head>
<body>
    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" ></a>
    <a href=""></a>
    <div class="main-souq">
        @include('header')
        @yield('content')
        @include('footer')
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/souq.js')}}"></script>
</body>
</html>