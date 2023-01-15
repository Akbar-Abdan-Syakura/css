<?php

// KONEKSI DATABASE
$host="localhost";
$user="root";
$password="";
$db="asetinte_aset";

$conn = mysqli_connect($host,$user,$password,$db);
if (!$conn){
	  die("Koneksi gagal:".mysqli_connect_error());
}

// AKHIR KONEKSI DATABASE

// WILAYAH USER
function  tampil_user($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data)
{

	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$id_divisi = $data["divisi"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["name"];
	$role = $data["role"];


	//Check Username
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>alert('Username Sudah Terdaftar');</script>";

		return false;
	}

	//Konfirm Pass
	if ($password !== $password2) {
		echo "<script>alert('password tidak sesuai');</script>";

		return false;
	}


	//tambah user ke Database
	mysqli_query($conn, "INSERT INTO users VALUES('','$id_divisi','$username','" . SHA1($password) . "','$nama','$role')");


	return mysqli_affected_rows($conn);
}

function lupa_password($data){

	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//Check Username
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

		//Konfirm Pass
		if ($password !== $password2) {
			echo "<script>alert('password tidak sesuai');</script>";
	
			return false;
		}

	if (mysqli_fetch_assoc($result) == 0) {
		echo "<script>alert('Username Tidak Terdaftar');</script>";

		return false;
		
	} 

	$query = "UPDATE users SET  
	passwords = '" . SHA1($password) . "' 
	WHERE username = $username
	";


	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);



	$query = "UPDATE users SET  
			passwords = '" . SHA1($password) . "' 
			WHERE username = $username
			";


			mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);



}

function ubah_user($data)
{

	global $conn;

	$id_user = $data["id_user"];
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$nama = htmlspecialchars($data["name"]);
	$id_divisi = htmlspecialchars($data["divisi"]);
	$role = htmlspecialchars($data["role"]);

	$query = "UPDATE users SET  
			username = '$username',
			passwords = '$password',
			nama = '$nama',
			id_divisi = '$id_divisi',
			role = '$role' 
			WHERE id_users = $id_user
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari_user($textcari)
{
	$query = "SELECT * FROM users INNER JOIN divisi ON users.id_divisi = divisi.id_divisi
				WHERE
				id_users LIKE '%$textcari%' OR
				nama LIKE '%$textcari%' OR
				username LIKE '%$textcari%'
				";

	return tampil_user($query);
}

function hapus_users($id_users)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM users WHERE id_users = $id_users");

	return mysqli_affected_rows($conn);
}

// AKHIR WILAYAH USER

// WILAYAH DIVISI

function  tampil_divisi($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah_divisi($data)
{

	global $conn;

	$nama_divisi = htmlspecialchars($data["nama_divisi"]);

	$query = "INSERT INTO divisi VALUES ('','$nama_divisi')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah_divisi($data)
{

	global $conn;

	$id_divisi = $data["id_divisi"];
	$nama_divisi = htmlspecialchars($data["nama_divisi"]);

	$query = "UPDATE divisi SET  
			nama_divisi = '$nama_divisi' 
			WHERE id_divisi = $id_divisi
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_divisi($id_divisi)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM divisi WHERE id_divisi = $id_divisi ");

	return mysqli_affected_rows($conn);
}

function cari_divisi($textcari)
{
	$query = "SELECT * FROM divisi 
				WHERE
				id_divisi LIKE '%$textcari%' OR
				nama_divisi LIKE '%$textcari%'";

	return tampil_divisi($query);
}

// AKHIR WILAYAH DIVISI


// ANTOHER

function  tampil_satuan($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function  tampil_ekonomis($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function  tampil_kondisi($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function  tampil_prioritas($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


// AKHIR ANOTHER

// WILAYAH ASET

function  tampil_aset($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah_aset($data)
{

	global $conn;
	
	
	$nama_aset = htmlspecialchars($data["nama_aset"]);
	$merk = htmlspecialchars($data["merk"]);
	$type = htmlspecialchars($data["type"]);
	$sn = htmlspecialchars($data["sn"]);
	$qty = htmlspecialchars($data["qty"]);
	$satuan = htmlspecialchars($data["satuan"]);
	$id_divisi = htmlspecialchars($data["id_divisi"]);
	$tanggal_masuk = date('Y-m-d');
	$keterangan = htmlspecialchars($data["keterangan"]);
	$real_harga = explode(".",$data["harga_aset"]);
	$harga_fix = join("",$real_harga);
	$harga_aset = htmlspecialchars($harga_fix);
	$prioritas = htmlspecialchars($data["prioritas"]);
	$tahun_ekonomis = htmlspecialchars($data["tahun_ekonomis"]);
	$tahun = tampil_ekonomis("SELECT tahun FROM tahun_ekonomis WHERE id_ekonomis = $tahun_ekonomis");
	$kondisi = htmlspecialchars($data["kondisi"]);
	$tanggal_habis = date('Y-m-d', strtotime($tanggal_masuk. $tahun[0]['tahun']));

	$query = "INSERT INTO aset VALUES 
	('','$nama_aset','$merk','$type','$sn','$qty','$satuan','$id_divisi','$tanggal_masuk','$tanggal_habis','$keterangan','$harga_aset','$prioritas','$tahun_ekonomis','$kondisi','1')";
	
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah_aset($data)
{

	global $conn;
	

	$id_aset = $data["id_aset"];
	$nama_aset = htmlspecialchars($data["nama_aset"]);
	$merk = htmlspecialchars($data["merk"]);
	$type = htmlspecialchars($data["type"]);
	$sn = htmlspecialchars($data["sn"]);
	$qty = htmlspecialchars($data["qty"]);
	$satuan = htmlspecialchars($data["satuan"]);
	$id_divisi = htmlspecialchars($data["id_divisi"]);
	$tanggal_masuk = htmlspecialchars($data["tanggal_masuk"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$real_harga = explode(".",$data["harga_aset"]);
	$harga_fix = join("",$real_harga);
	$harga_aset = htmlspecialchars($harga_fix);
	$prioritas = htmlspecialchars($data["prioritas"]);
	$tahun_ekonomis = htmlspecialchars($data["tahun_ekonomis"]);
	$tahun = tampil_ekonomis("SELECT tahun FROM tahun_ekonomis WHERE id_ekonomis = $tahun_ekonomis");
	$kondisi = htmlspecialchars($data["kondisi"]);
	$status = htmlspecialchars($data["status"]);
	$tanggal_habis = date('Y-m-d', strtotime($tanggal_masuk. $tahun[0]['tahun']));

	$query = "UPDATE aset SET  
			aset.nama_aset = '$nama_aset',
			merk = '$merk',
			aset.type = '$type',
			SN = '$sn',
			qty = '$qty',
			id_satuan = '$satuan',
			id_divisi = '$id_divisi',
			tanggal_masuk = '$tanggal_masuk',
			tanggal_habis = '$tanggal_habis',
			keterangan = '$keterangan',
			harga_aset = '$harga_aset',
			id_prioritas = '$prioritas',
			id_ekonomis = '$tahun_ekonomis',
			id_kondisi_aset = '$kondisi',
			status_aset = '$status'
			WHERE id_aset = $id_aset 
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_aset($id_aset)
{
	global $conn;

	mysqli_query($conn, "UPDATE aset SET status_aset = 0 WHERE id_aset = $id_aset");

	return mysqli_affected_rows($conn);
}

function cari_aset($textcari)
{
	$query = "SELECT * FROM aset 
	INNER JOIN divisi ON aset.id_divisi = divisi.id_divisi 
	INNER JOIN kondisi_aset ON aset.id_kondisi_aset = kondisi_aset.id_kondisi_aset 
	INNER JOIN prioritas ON aset.id_prioritas = prioritas.id_prioritas 
	INNER JOIN tahun_ekonomis ON aset.id_ekonomis = tahun_ekonomis.id_ekonomis 
	INNER JOIN satuan ON aset.id_satuan = satuan.id_satuan
				WHERE
				id_aset LIKE '%$textcari%' OR
				nama_aset LIKE '%$textcari%' OR
				merk LIKE '%$textcari%' OR
				type LIKE '%$textcari%' OR
				SN LIKE '%$textcari%' OR 
				nama_divisi LIKE '%$textcari%' OR 
				kondisi LIKE '%$textcari%'
				AND status_aset ='1'
				";

	return tampil_aset($query);
}

function cari_rekomendasi_aset($textcari)
{
	$query = "SELECT * FROM aset 
	INNER JOIN divisi ON aset.id_divisi = divisi.id_divisi 
	INNER JOIN kondisi_aset ON aset.id_kondisi_aset = kondisi_aset.id_kondisi_aset 
	INNER JOIN prioritas ON aset.id_prioritas = prioritas.id_prioritas 
	INNER JOIN tahun_ekonomis ON aset.id_ekonomis = tahun_ekonomis.id_ekonomis 
	INNER JOIN satuan ON aset.id_satuan = satuan.id_satuan
				WHERE
				id_aset LIKE '%$textcari%' OR
				nama_aset LIKE '%$textcari%' OR
				merk LIKE '%$textcari%' OR
				type LIKE '%$textcari%' OR
				SN LIKE '%$textcari%' OR 
				nama_divisi LIKE '%$textcari%' OR 
				kondisi LIKE '%$textcari%'
				AND status_aset = 1 AND 
				aset.id_kondisi_aset = 3 OR
				aset.id_kondisi_aset = 4 
				";

	return tampil_aset($query);
}

// AKHIR WILAYAH ASET

// WILAYAH PENGAJUAN PENGADAAN

function  tampil_pengadaan($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah_pengadaan($data)
{

	global $conn;

	$nama_aset = htmlspecialchars($data["nama_aset"]);
	$qty = htmlspecialchars($data["qty"]);
	$id_satuan = htmlspecialchars($data["satuan"]);
	$id_divisi = htmlspecialchars($data["divisi"]);
	$real_harga = explode(".",$data["harga_aset"]);
	$harga_fix = join("",$real_harga);
	$harga_aset = htmlspecialchars($harga_fix);
	$tanggal_pengadaan = date('Y-m-d');
	$keterangan = htmlspecialchars($data["keterangan"]);
	$status = "Menunggu Persetujuan";
	$active = 1;

	$query = "INSERT INTO form_pengadaan VALUES ('','$nama_aset','$qty','$id_satuan','$id_divisi','$harga_aset','$tanggal_pengadaan','$keterangan','$status','$active')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_pengadaan($id_pengadaan)
{
	global $conn;

	mysqli_query($conn, "UPDATE form_pengadaan SET active = 0 WHERE id_pengadaan = $id_pengadaan");

	return mysqli_affected_rows($conn);
}

function ubah_pengadaan($data)
{

	global $conn;
	

	$id_pengadaan = $data["id_pengadaan"];
	$nama_aset = htmlspecialchars($data["nama_aset"]);
	$qty = htmlspecialchars($data["qty"]);
	$id_satuan = htmlspecialchars($data["id_satuan"]);
	$id_divisi = htmlspecialchars($data["id_divisi"]);
	$harga_aset = htmlspecialchars($data["harga_aset"]);
	$tanggal_pengadaan = htmlspecialchars($data["tanggal_pengadaan"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$status = $data["status"];
	$active = htmlspecialchars($data["active"]);

	$query = "UPDATE form_pengadaan SET  
			nama_aset = '$nama_aset',
			qty = '$qty',
			id_satuan = '$id_satuan',
			id_divisi = '$id_divisi',
			tanggal_pengadaan = '$tanggal_pengadaan',
			keterangan = '$keterangan',
			harga_aset = '$harga_aset',
			status = '$status',
			active = '$active'
			WHERE id_pengadaan = $id_pengadaan ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// AKHIR WILAYAH PENGAJUAN PENGADAAN

// WILAYAH PENGAJUAN PERBAIKAN DAN PENGGANTIAN

function  tampil_perbaikan_pergantian($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah_perbaikan_pergantian($data)
{

	global $conn;

	$id_aset = htmlspecialchars($data["id_aset"]);
	$qty = htmlspecialchars($data["qty"]);
	$jenis_pengajuan = htmlspecialchars($data["jenis_pengajuan"]);
	$id_satuan = htmlspecialchars($data["id_satuan"]);
	$real_harga = explode(".",$data["harga_aset"]);
	$harga_fix = join("",$real_harga);
	$harga_aset = htmlspecialchars($harga_fix);
	$tanggal_pengajuan = date('Y-m-d');
	$keterangan = htmlspecialchars($data["keterangan"]);
	$status = "Menunggu Persetujuan";
	$active = 1;

	// Upload Gambar 
	$bukti = upload();
	if (!$bukti){
		return false;
	}


	$query = "INSERT INTO form_perbaikan_pergantian VALUES ('','$id_aset','$qty','$id_satuan','$jenis_pengajuan','$harga_aset','$tanggal_pengajuan','$keterangan','$bukti','$status','$active')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_perbaikan_pergantian($id_perbaikan_pergantian)
{
	global $conn;

	mysqli_query($conn, "UPDATE form_perbaikan_pergantian SET active = 0 WHERE id_perbaikan_pergantian = $id_perbaikan_pergantian");

	return mysqli_affected_rows($conn);
}

function ubah_perbaikan_pergantian($data)
{

	global $conn;
	

	$id_perbaikan_pergantian = $data["id_perbaikan_pergantian"];
	$id_aset = $data["id_aset"];
	$qty = htmlspecialchars($data["qty"]);
	$id_satuan = htmlspecialchars($data["id_satuan"]);
	$jenis_pengajuan = htmlspecialchars($data["jenis_pengajuan"]);
	$harga = htmlspecialchars($data["harga"]);
	$tanggal_pengajuan = htmlspecialchars($data["tanggal_pengajuan"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$bukti = htmlspecialchars($data["bukti"]);
	$status = $data["status"];
	$active = htmlspecialchars($data["active"]);

	$query = "UPDATE form_perbaikan_pergantian SET  
			id_aset = '$id_aset',
			qty = '$qty',
			id_satuan = '$id_satuan',
			jenis_pengajuan = '$jenis_pengajuan',
			harga = '$harga',
			tanggal_pengajuan = '$tanggal_pengajuan',
			keterangan = '$keterangan',
			bukti = '$bukti',
			status_pengajuan = '$status',
			active = '$active'
			WHERE id_perbaikan_pergantian = $id_perbaikan_pergantian ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){

	$nama_file = $_FILES ['bukti']['name'];
	$size_file = $_FILES ['bukti']['size'];
	$err = $_FILES ['bukti']['error'];
	$tmp = $_FILES ['bukti']['tmp_name'];

	//CEK UPLOAD GAMBAR
	if ( $err === 4){
		echo "<script>
		alert('Wajib Memasukan Bukti!');
		</script>";
		return false;
	}

	// CEK FILE APAKAH GAMBAR ??

	$cekfile = ['jpg','jpeg','png'];
	$ext_gambar = explode('.',$nama_file);
	$ext_gambar = strtolower(end($ext_gambar));
	if (!in_array($ext_gambar,$cekfile)){
		echo "<script>
		alert('Yang di Upload Bukan Gambar!');
		</script>";
		return false;

	}

	// CEK UKURAN FILE GAMBAR

	if ($size_file > 1500000){
		echo "<script>
		alert('Gambar Yang di upload Terlalu Besar!');
		</script>";
		return false;

	}


	// UPLOAD GAMBARRR !!
		//Generate Nama File Gambar

		$nama_file_baru = uniqid();
		$nama_file_baru .= '.';
		$nama_file_baru .= $ext_gambar;


	move_uploaded_file($tmp,'img/bukti/'. $nama_file_baru);

	return $nama_file_baru;

}


// AKHIR WILAYAH PENGAJUAN
