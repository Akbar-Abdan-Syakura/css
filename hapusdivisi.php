<?php

session_start();

if (!isset($_SESSION["username"])) {
	header("location: index.php");
	exit;
}

$role=$_SESSION["role"];

if ($role!=1) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}

$id_user=$_SESSION["id_user"];
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];


require 'koneksi.php';

$id_divisi = $_GET["id"];

if( hapus_divisi($id_divisi) > 0 ){
	echo "<script>alert('Divisi berhasil dihapus');
	document.location.href = 'divisi.php';
	</script>";
}	else {
	echo "<script>alert('Divisi Gagal dihapus');
	document.location.href = 'divisi.php';
	</script>";
	}

?>