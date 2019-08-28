<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('title') Dr Theiss - Uvek više</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="@yield('description', 'Kompanija "Dr Theiss" iz Nemačke, vodeći svetski proizvođač lekova na bazi bilja i fitoterapeutskih preparata.')" />
        <meta content="website" property="og:type" />
        <meta property="og:title" content="@yield('og-title', 'Dr Theiss - Uvek više')">
        <meta property="og:type" content="product">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:description" content="@yield('og-description', 'Kompanija "Dr Theiss" iz Nemačke, vodeći svetski proizvođač lekova na bazi bilja i fitoterapeutskih preparata.')">
        <meta property="og:image" content="@yield('og-image', asset('images/fb-share.jpg'))">
        <meta property="og:image:type" content="image/jpg">
        <meta property="og:image:width" content="400">
        <meta property="og:image:height" content="300">
        <link href="{{ asset('fav/favicon.ico') }}" rel="shortcut icon"/>
        <link href="{{ asset('fav/favicon.ico') }}" rel="shortcut icon"/>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('fav/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('fav/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('fav/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('fav/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('fav/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('fav/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('fav/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('fav/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon-180x180.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('fav/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('fav/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ asset('fav/favicon-16x16.png') }}" sizes="16x16">
        <link rel="manifest" href="{{ asset('fav/manifest.json')}}">
        <link rel="mask-icon" href="{{ asset('fav/safari-pinned-tab.svg')}}" color="#4d2d8e">
        <!-- Browser theme styling -->
        <meta content="#fff" name="msapplication-TileColor" />
        <meta content="{{ asset('fav/favicon144x144.ico') }}" name="msapplication-TileImage" />
        <meta content="#f39b00" name="theme-color" />

        <link rel="stylesheet" href="{{ asset('css/all-min.css') }}" charset="utf-8">

        <style>
            .actioncall{
                position: absolute;
                top: 27px;
                right: 200px;
            }
            .actioncall2{
                position: absolute;
                top: 27px;
                right: 500px;
            }
            .actioncall .button-button-xsmall{
                font-weight: 600;
            }
            .actioncall2 .button-button-xsmall{
                font-weight: 600;
                background: #e21e26;
            }
            .actioncall2 .button-button-xsmall:hover{
                background: #333;
            }
            .x2{
                background: #e21e26;
            }
            .x2:hover{
                background: #333;
            }
            @media (max-width: 991px){
                .actioncall{
                    right: 100px;
                }
                .actioncall2{
                    position: absolute;
                    top: 27px;
                    right: 400px;
                }
            }
            @media (max-width: 768px){
                .actioncall{
                    position: static;
                    padding-bottom: 15px;
                }
                .actioncall2{
                    position: static;
                    padding-bottom: 15px;
                }
            }
        </style>
        @yield('style')
    </head>
    <body>


    @yield('content')


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- App Js -->
    <script src="{{ asset('js/all-min.js') }}"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
        ga('create', 'UA-131353040-1', 'auto'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

     @yield('scripts')
    </body>
</html>
