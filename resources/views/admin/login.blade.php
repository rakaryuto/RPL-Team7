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

	<title>Login</title>

</head>

<body class="container">

<h1 class="text-center">Admin Kopikimo</h1>

<center><img src="{{ asset('asset/logo-brand.svg') }}" alt="logo" srcset=""></center><br>

<form class="text-center" method="POST">
	@csrf

	<label for="password"> <h4>Password</h4> </label><br>
	<input type="password" name="password" style="height: 3em; padding: 1em"><br><br>
	<input type="submit" value="Login" name="login">

</form>
</body>
</html>
