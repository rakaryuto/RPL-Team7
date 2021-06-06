<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Custom CSS -->
    @yield('head','<link rel="stylesheet" href="{{ asset('css/style.css') }}">')

    <title>@yield('title','Kopikimo')</title>
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('index') }}" class="navbar-brand">
                <img src="{{ asset('asset/logo-brand.svg') }}" alt="logo" srcset="">
            </a>
            <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars"
                    class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                    </path>
                </svg>
            </button>


            
            <div class="nav-left collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-center">
                    @hasSection('navbuttons')
                        @yield('navbuttons')
                    @else
                        <li class="nav-item">
                            <a href="{{ route('index').'#landing' }}" class="nav-link">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('index').'#testimonials' }}" class="nav-link">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('index').'#menu' }}" class="nav-link">MENU</a>
                        </li>
                    @endif
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('myOrders') }}" class="nav-link">MY ORDERS</a>
                        </li>
                    @endauth
                </ul>
            </div>



            <div class="nav-right collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a href="{{ route('cart') }}" class="nav-link"><img src="{{ asset('asset/Vector.svg') }}" alt="" srcset=""></a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">LOG IN</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">REGISTER</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">{{ ucwords(Auth::user()->name) }}'s
                            Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">LOG OUT</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    {{-- CONTENT --}}
    @yield('content')
    {{-- CONTENT --}}


</body>

<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

</html>