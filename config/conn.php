<?php
	$conn = mysqli_connect("localhost", "root", "", "database_smd");

	// cek koneksi
	if(mysqli_connect_errno()) {
		echo "Koneksi database gagal : ". mysqli_connect_errno();
	}

?>