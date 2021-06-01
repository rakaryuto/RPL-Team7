<?php session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: /admin/login");
	exit;
}
?>
