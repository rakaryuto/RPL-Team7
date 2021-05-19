<h2>Navbar</h2>
<a href="/">Home Page</a>
<a href="/menu">Menu Page</a>
<a href="/cart">Cart Page</a>
@auth
    <a href="#">My Orders</a>
    <a href="#">Dashboard</a>
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