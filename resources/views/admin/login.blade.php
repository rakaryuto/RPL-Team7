<!DOCTYPE html>
<html>

<head>
	@include('admin.head')
	<title>
		Login
	</title>
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
