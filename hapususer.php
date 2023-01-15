<?php

require 'koneksi.php';
$id_users = $_GET["id"];

if( hapus_users($id_users) > 0 ){
	echo "<script>alert('User berhasil dihapus');
	document.location.href = 'user.php';
	</script>";
}	else {
	echo "<script>alert('User Gagal dihapus');
	document.location.href = 'user.php';
	</script>";
	}

?>