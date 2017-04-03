<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}">

    <title>{{ config('app.name', 'MyLar') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<section id="container" >
    <header class="header dark-bg">

        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>

        <a href="{{ url('/') }}" class="logo">
            <span>{{ config('app.name', 'MyLar') }}</span>
        </a>

        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li class="dropdown">

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"> {{ auth()->user()->name }} </span>
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li>
                            <a href="{{ url('logout') }}">
                                <i class="fa fa-key"></i> Log Out
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </div>

    </header>

    @include('manage.sidebar')
    
    @yield('content')
    
</section>

<script src="{{ mix('js/app.js') }}"></script>

@yield('scripts')

</body>
</html>
