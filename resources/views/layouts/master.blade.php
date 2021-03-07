<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          media="none" onload="this.media='all'">
    <link rel="stylesheet" href="/css/main.css">
    <title>@yield('title', 'Home') - larablog6</title>
</head>
<body class="page-index">
@include('partials.message')
<div class="container">
    <header class="mainHeader">
        <div class="wrapper flex">
            <a href="{{ url('/') }}" class="logo">larablog6</a>
            <nav>
                <ul>
                    <li><a href="{{ route('about') }}" {!! request()->routeIs('about') ? 'class="is-active"' : '' !!}>About
                            me</a></li>
                    @auth
                        <li><a href="#logout">Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">RSS <i class="fa fa-rss-square"></i></a></li>
                </ul>
            </nav>
            <form action="#" class="search">
                <div class="form-fieldset">
                    <input type="text" class="form-field" placeholder="Search...">
                </div>
            </form>
        </div>
    </header>
    <section class="mainContent">
        @yield('content')
    </section>
    <footer class="mainFooter">
        <div class="wrapper">
            <p>&copy; {{ date('Y') }} larablog6</p>
            <nav>
                <ul>
                    <li><a href="{{ route('about') }}">About me</a></li>
                    @guest
                        <li><a href="{{ route('logout') }}">Login</a></li>
                    @endguest
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">RSS</a></li>
                </ul>
            </nav>
            <p class="author">All rights reserved <a href="{{url('/')}}">larablog6</a></p>
        </div>
    </footer>
</div>
</body>
@auth
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
    <script>
        document.querySelector("a[href='#logout']").addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector("#logout-form").submit();
        }, false)
    </script>
@endauth
</html>

