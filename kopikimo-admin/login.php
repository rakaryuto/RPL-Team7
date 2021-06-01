<?php
session_start();
include('config.php');

if( isset($_SESSION["login"]) ) {
	header('Location: index.php');
}

if (isset($_POST["login"])) {

	$password = $_POST["password"];

	if($password == "4dm1nk0p1k1m0") {
		$_SESSION["login"] = true;
		echo "<script type='text/javascript'>
		alert('Login Sukses!');
		window.location.replace('index.php')
		</script>";
	}
	else {
		echo "<script type='text/javascript'>
			alert('Passowrd salah.');
			window.location.replace('login.php')
			</script>";
	}
	
}

?>

<!DOCTYPE html>
<html>

<head>
	<?php include('head.php') ?>
	<title>
		Login
	</title>
</head>

<body class="container">

<h1 class="text-center">Admin Kopikimo</h1>

<center><img src="Asset/S__7421961-removebg 1.svg" alt="logo" height="250" srcset=""></center><br>

<form class="text-center" method="POST">

	<label for="password"> <h4>Password</h4> </label><br>
	<input type="password" name="password" style="height: 3em; padding: 1em"><br><br>
	<input type="submit" value="Login" name="login">

</form>
</body>
</html>