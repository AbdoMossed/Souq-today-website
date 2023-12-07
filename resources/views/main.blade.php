<html lang="en" dir="{{ LaravelLocalization::getCurrentLocaleDirection('rtl') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title_Page}} </title>
    <link rel="icon" href="{{url('/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{url('/css/souq.css')}}">
    @if ( Config::get('app.locale') == 'en')
        <link rel="stylesheet" href="{{url('/css/app.css')}}">
    @endif

    @if ( Config::get('app.locale') == 'ar')
        <link rel="stylesheet" href="{{url('/css/rtl.css')}}">
    @endif
</head>
<body>
    <div class="main-souq">
        @include('header')
        @yield('content')
        @include('footer')
    </div>

    <script src="{{url('/js/app.js')}}"></script>
</body>
</html>