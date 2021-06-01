@extends('admin.session')

<!DOCTYPE html>
<html>
<head>
	@include('admin.head')
	<title>Admin Kopikimo</title>
</head>
<body class="container">
@include('admin.header')

<h1 class="text-center">Admin Kopikimo</h1>

<center>
	<div>
		<a href="/admin/products"><button>PRODUCTS</button></a><br><br>
		<a href="/admin/orders"><button>ORDERS</button></a><br>
	</div>
</center>

</body>
</html>
