@extends('layouts.adminapp')

@section('title')

<title>Admin Kopikimo</title>
	
@endsection

@section('content')
<section class="container">
	<h1 class="text-center">Admin Kopikimo</h1>
	
	<div class="d-flex flex-column">
		<a href="/admin/products" class="btn btn-dark mt-3">PRODUCTS</a>
		<a href="/admin/orders" class="btn btn-dark mt-3">ORDERS</a>
	</div>
</section>


@endsection
