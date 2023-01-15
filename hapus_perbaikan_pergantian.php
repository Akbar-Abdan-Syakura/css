<?php

require 'koneksi.php';
$id_perbaikan_pergantian = $_GET["id_perbaikan_pergantian"];

if( hapus_perbaikan_pergantian($id_perbaikan_pergantian) > 0 ){
	echo "<script>alert('Pengajuan berhasil dihapus');
	document.location.href = 'perbaikan_pergantian_requester.php';
	</script>";
}	else {
	echo "<script>alert('Pengajuan Gagal dihapus');
	document.location.href = 'perbaikan_pergantian_requester.php';
	</script>";
	}

?>