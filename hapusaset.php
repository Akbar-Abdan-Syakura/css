<?php

require 'koneksi.php';
$id_aset = $_GET["id_aset"];

if( hapus_aset($id_aset) > 0 ){
	echo "<script>alert('Aset berhasil dihapus');
	document.location.href = 'aset_requester.php';
	</script>";
}	else {
	echo "<script>alert('Aset Gagal dihapus');
	document.location.href = 'aset_requester.php';
	</script>";
	}

?>