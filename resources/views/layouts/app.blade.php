<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kopikimo</title>
    @yield('head')
</head>
<body>
    <h2>Navbar</h2>
    <a href="/">Home Page</a>
    <a href={{ route('menu') }}>Menu Page</a>
    <a href={{ route('cart') }}>Cart Page</a>
    @auth
        <a href={{ route('myOrders') }}>My Orders</a>
        <a href={{ route('dashboard') }}>Dashboard</a>
        <a href={{ route('logout') }}>Logout</a>
    @endauth
    @guest
        <a href={{ route('login') }}>Login Page</a>
        <a href={{ route('register') }}>Register Page</a>
    @endguest

    <hr>
    @yield('content')
    <hr>

    <h2>Footer</h2>
</body>
</html>