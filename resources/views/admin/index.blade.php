@extends('layouts.adminapp')

@section('title')

<title>Admin Kopikimo</title>
	
@endsection

@section('content')

<h1 class="text-center">Admin Kopikimo</h1>

<center>
	<div>
		<a href="/admin/products"><button>PRODUCTS</button></a><br><br>
		<a href="/admin/orders"><button>ORDERS</button></a><br>
	</div>
</center>

@endsection
