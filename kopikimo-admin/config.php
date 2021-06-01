<?php 
	$conn = mysqli_connect("localhost", "root", "", "kopikimo_db");

	if( !$conn ){
		die("Gagal terhubung dengan database: " . mysqli_connect_error());
	}
?>
