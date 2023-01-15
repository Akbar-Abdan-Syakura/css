<?php

require 'koneksi.php';
$id_pengadaan = $_GET["id_pengadaan"];

if( hapus_pengadaan($id_pengadaan) > 0 ){
	echo "<script>alert('Pengajuan berhasil dihapus');
	document.location.href = 'pengadaan_requester.php';
	</script>";
}	else {
	echo "<script>alert('Pengajuan Gagal dihapus');
	document.location.href = 'pengadaan_requester.php';
	</script>";
	}

?>