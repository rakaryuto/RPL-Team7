<?php session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: /admin/login");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
	
    @yield('title')
</head>
<body class="container">
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="/admin" class="navbar-brand">
                <img src="{{ asset('asset/logo-brand.svg') }}" alt="logo" srcset="">
            </a>
            <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
            </button>
            <div class="nav-left collapse navbar-collapse" id ="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a href="/admin" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/products" class="nav-link">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/orders" class="nav-link">ORDERS</a>
                    </li>
                </ul>
            </div>
            <div class="nav-right collapse navbar-collapse justify-content-end" id ="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item ">
                        <a href="/admin/logout" class="nav-link">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </nav>        
    </header>
    
    @yield('content')

</body>
</html>


