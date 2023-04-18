<!DOCTYPE html>
<link rel="icon" type="image/x-icon" href="{{ asset(env('THEME')) }}/images/logo.png" />
<head>
    <meta charset="UTF-8" />
    <script src="{{ asset('js/myjs/jquery.js') }}"></script>
    <script src="{{ asset('js/myjs/jquery-ui.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/tema/jquery-ui.css') }}">

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/reset.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/style.css" />
    <link rel="stylesheet" id="buttons" href="{{ asset(env('THEME')) }}/css/buttons.css" type="text/css" media="all" />
    <link rel='stylesheet' href='{{ asset(env('THEME')) }}/css/font-awesome.css' type='text/css' media='all' />
    <link rel="stylesheet"  href="/bootstrap/css/bootstrap.css">

    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/jquery.js"></script>
</head>
<!-- START BODY -->
<body >
<div id="soo"></div>
<!-- START BG SHADOW -->
<div class="bg-shadow">
    <!-- START WRAPPER -->
    <div id="wrapper" class="group">
        <!-- START HEADER -->
        <div id="header" class="group">
            <div class="group inner">
                <div id="sidebar-header" class="group">
                    <div id="logo" class="group">
                        <a href="{{ route('home') }}" title="Pink Rio"><img src="{{ asset(env('THEME')) }}/images/logo.png" title="" alt="" /></a>
                    </div>
                    <div class="widget-first widget yit_text_quote">
                        <blockquote class="text-quote-quote">&#8220;Сайт&#8221;</blockquote>
                    </div>
                </div>

                <div class="clearer"></div>
                <hr />
            @yield('navigation')
            </div>
        </div>
        <!-- END HEADER -->
        <div class="wrap_result"></div>
        <div id="primary" class="sidebar-{{ isset($bar) ? $bar : 'no'}}">
            <div class="inner group">
                @yield('content')
                @yield('bar')
            </div>
        </div>
        @yield('footer')
    </div>
</div>
</body>




