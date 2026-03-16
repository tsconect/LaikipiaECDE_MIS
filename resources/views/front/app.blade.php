<!doctype html>
<html lang="en">
<style>
    body{
        background-color: #fff;
        color: #000;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>LAIKIPIA COUNTY - CDF MANAGEMENT SYSTEM</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Laikipia Cdf management SYstem.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm "  >
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    Laikipia CDF Management System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->


                                <li class="nav-item  mr-3" >
                                    <a class="nav-link btn bg-white p-2" href="/">Bursary Application</a>
                                </li>

                                <li class="nav-item mr-3">
                                    <a class="nav-link btn bg-white p-2 " href="/bursary-status-query">Bursary Status</a>
                                </li>
                                <li class="nav-item mr-3">
                                    <a class="nav-link btn btn-warning p-2" href="/login">Login</a>
                                </li>

                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4 container d-flex h-100 mt-5">
            @yield('content')
        </main>

@yield('scripts')
    </div>
</body>



<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>

<script>
    function btn()
    {
        alert('clicked');
    }
</script>


<style>

    .hamburger-inner{
        background-color:white;
    }
    .hamburger-inner::before{
        background-color:white;
    }
    .hamburger-inner::after{
        background-color:white;
    }
    .logo-src{
        background:url("{{asset('assets/images/laikipia.png')}}");
    }
</style>
</html>

