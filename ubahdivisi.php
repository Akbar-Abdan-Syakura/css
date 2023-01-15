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


$id_divisi = $_GET['id_divisi']; 


$divisi = tampil_divisi("SELECT * FROM divisi WHERE id_divisi = $id_divisi")[0];


if(isset($_POST["ubah"])){
	
	if(ubah_divisi($_POST) > 0 ){
		echo "<script>
    alert('Divisi Berhasil di Ubah')
	document.location.href = 'divisi.php';
	</script>";
	
	}else {
		echo "<script>alert('Divisi Gagal di Ubah');
	</script>";
		
	}
	
}
?>

<!doctype html>
<html lang="en">
  <head>
        <link rel="icon" href="img/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Sistem Informasi Manajemen Aset</title>

		<!-- CSS BOOTSTRAP -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<!-- END CSS --> 
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body style="background-color: #eee;">
 <form method="post" action="">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="dashboard_admin.php">
  <img src="https://i1.wp.com/www.intens.co.id/home/wp-content/uploads/2019/09/logo_small.png?fit=240%2C77&ssl=1"
  class="img-fluid" alt="Sample image" width="100" height="100"> 
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <a class="nav-link px-3" href="logout.php"><span data-feather="log-out" class="align-text-bottom" aria-current="page"></span> Log Out</a>
   </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="dashboard_admin.php">
                  <span data-feather="bar-chart" class="align-text-center"></span>
                  Dashboard
                </a>

              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="user.php">

                  <span data-feather="users" class="align-text-bottom"></span>
                  User
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="divisi.php">
                  <span data-feather="align-justify" class="align-text-bottom"></span>
                  Divisi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="monitoring_admin.php?page=1">
                  <span data-feather="monitor" class="align-text-bottom"></span>
                  Kondisi Aset
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="rekomendasi_admin.php?page=1">
                <span data-feather="package" class="align-text-bottom"></span>
                Rekomendasi Aset
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-current="page">
                <span data-feather="file" class="align-text-bottom"></span>
                Pengajuan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="nav-link" href="pengadaan_admin.php"><span data-feather="plus-square" class="align-text-bottom" aria-current="page"></span> Pengadaan</a></li>
                <li><a class="nav-link" href="perbaikan_pergantian_admin.php"><span data-feather="tool" class="align-text-bottom" aria-current="page"></span> Perbaikan & Pergantian</a></li>
              </ul>
            </li>
            </ul>
          </div>
        </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Divisi</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item active">Dashboard</li>
				<li class="breadcrumb-item active">Divisi</li>
				<li class="breadcrumb-item active" aria-current="page">Ubah Divisi</li>
			  </ol>
			</nav>

        </div>
      </div>
	  <div class="card">

  <div class="card-body">
  	<span id="iddivisi" class="form-text">Kode Divisi</span>
	<input type="text" class="form-control"	 value="<?= $divisi["id_divisi"];?>" name="id_divisi" readonly>
	<br>
	<span id="namadivisi" class="form-text">Nama Divisi</span>
	<input type="text" class="form-control" value="<?= $divisi["nama_divisi"];?>" name="nama_divisi" required>
	<br>
	<button type="submit" name="ubah" class="btn btn-outline-success"><i class="bi bi-save"></i> Ubah</button>
	<button type="reset" class="btn btn-outline-warning"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
	<a href="divisi.php" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Cancel</a>
  </div>
</div>

</form>

    </main>
  </div>
</div>



        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
		<script src="css/dashboard.js"></script>
  </body>
</html>
