<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("location: index.php");
  exit;
}

$role = $_SESSION["role"];

if ($role != 2) {
  echo "Anda tidak punya akses pada halaman ini";
  exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$nama = $_SESSION["nama"];


require 'koneksi.php';

//Pagination

$jumlahdata = 10;
$jumlahuser = count(tampil_aset("SELECT * FROM aset WHERE status_aset ='1' "));
$jumlahhal = ceil($jumlahuser / $jumlahdata);

$halaktif = (isset($_GET["page"])) ? $_GET["page"] : 1;

$awaldata = ($jumlahdata * $halaktif) - $jumlahdata;

$aset = tampil_aset("SELECT * FROM aset 
INNER JOIN divisi ON aset.id_divisi = divisi.id_divisi 
INNER JOIN kondisi_aset ON aset.id_kondisi_aset = kondisi_aset.id_kondisi_aset 
INNER JOIN prioritas ON aset.id_prioritas = prioritas.id_prioritas 
INNER JOIN tahun_ekonomis ON aset.id_ekonomis = tahun_ekonomis.id_ekonomis 
INNER JOIN satuan ON aset.id_satuan = satuan.id_satuan
WHERE status_aset ='1' ORDER BY id_aset DESC LIMIT $awaldata, $jumlahdata");

if (isset($_POST["textcari"])) {

  $aset = cari_aset($_POST["textcari"]);
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

<body >
<form action="" method="post">
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="dashboard_requester.php">
      <img src="https://i1.wp.com/www.intens.co.id/home/wp-content/uploads/2019/09/logo_small.png?fit=240%2C77&ssl=1" class="img-fluid" alt="Sample image" width="100" height="100">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input type="text" class="form-control form-control-dark w-100 rounded-0 border-0" placeholder="Cari Aset" name="textcari">
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
              <a class="nav-link" href="dashboard_requester.php">
                <span data-feather="bar-chart" class="align-text-center"></span>
                Dashboard
              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="aset_requester.php?page=1">
                <span data-feather="folder" class="align-text-bottom"></span>
                Aset
              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="monitoring_requester.php?page=1">
                <span data-feather="monitor" class="align-text-bottom"></span>
                Kondisi Aset
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rekomendasi_requester.php?page=1">
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
                <li><a class="nav-link" href="pengadaan_requester.php"><span data-feather="plus-square" class="align-text-bottom" aria-current="page"></span> Pengadaan</a></li>
                <li><a class="nav-link" href="perbaikan_pergantian_requester.php"><span data-feather="tool" class="align-text-bottom" aria-current="page"></span> Perbaikan & Pergantian</a></li>
              </ul>
            </li>
          </ul>



        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Daftar Aset</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</a></li>
                <li class="breadcrumb-item active">Aset</a></li>
              </ol>
            </nav>

          </div>
        </div>
        <div class="d-flex justify-content-between"> 
        <a class="btn btn-outline-primary" role="button" href="tambahaset.php" style="margin-bottom: 8px"><i class="bi bi-plus-lg"></i> Tambah Aset</a>
         <a class="btn btn-outline-success" role="button" href="laporan-aset.php" style="margin-bottom: 8px"><i class="bi bi-file-earmark-ruled"></i> Export </a>
        </div>
        <div class="table-responsive">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php if ($halaktif > 1) : ?>
                <li class="page-item">
                  <a class="page-link" href="?page=<?= $halaktif - 1; ?>"><span data-feather="chevron-left" class="align-text-bottom" aria-current="page"></span></a>
                </li>
              <?php else : ?>
                <li class="page-item disabled">
                  <a class="page-link"><span data-feather="chevron-left" class="align-text-bottom" aria-current="page"></span></a>
                </li>
              <?php endif; ?>
              <?php
              for ($i = 1; $i <= $jumlahhal; $i++) : ?>
                <?php if ($i == $halaktif) : ?>
                  <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                  <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if ($halaktif < $jumlahhal) : ?>
                <li class="page-item">
                  <a class="page-link" href="?page=<?= $halaktif + 1; ?>"><span data-feather="chevron-right" class="align-text-bottom" aria-current="page"></span></a>
                </li>
              <?php else : ?>
                <li class="page-item disabled">
                  <a class="page-link"><span data-feather="chevron-right" class="align-text-bottom" aria-current="page"></span></a>
                </li>
              <?php endif; ?>
            </ul>
          </nav>

          <div class="card mb-4">
            <div class="card-header">
              <p></p>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Aset</th>
                    <th scope="col" class="text-center">Nama Aset</th>
                    <th scope="col" class="text-center">Merk</th>
                    <th scope="col" class="text-center">Type</th>
                    <th scope="col" class="text-center">Qty</th>
                    <th scope="col" class="text-center">Divisi</th>
                    <th scope="col" class="text-center">Tanggal Masuk</th>
                    <th scope="col" class="text-center">Kondisi</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <?php
                $no = 1 + (($_GET["page"]-1) * $jumlahdata);
                foreach ($aset as $ast) : ?>
                  <tbody>
                    <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <td class="text-center"><?= sprintf("%03d", $ast["id_aset"]); ?><?= sprintf("%03d", $ast["id_divisi"]); ?><?= date('Y', strtotime($ast["tanggal_masuk"])); ?></td>
                      <td class="text-center"><?= $ast["nama_aset"]; ?></td>
                      <td class="text-center"><?= $ast["merk"]; ?></td>
                      <td class="text-center"><?= $ast["type"]; ?></td>
                      <td class="text-center"><?= $ast["qty"]; ?> <?= $ast["satuan"]; ?></td>
                      <td class="text-center"><?= $ast["nama_divisi"]; ?></td>
                      <td class="text-center"><?= $ast["tanggal_masuk"]; ?></td>
                      <td class="text-center"><?= $ast["kondisi"]; ?></td>
                      <td class="text-center">
                        <a class="btn btn-outline-warning" role="button" href="detail_aset_requester.php?id_aset=<?= $ast["id_aset"]; ?>"><i class="bi bi-list"></i></a>
                        <a class="btn btn-outline-success" role="button" href="ubahaset.php?id_aset=<?= $ast["id_aset"]; ?>"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $ast['id_aset']; ?>"><i class="bi bi-trash3-fill"></i></button>
                      </td>
                    </tr>
                    <?php $no++; ?>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteModal<?= $ast['id_aset']; ?>" tabindex=" -1" aria-labelledby="hapusUsers" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="hapusUser">Hapus Aset </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Yakin akan Menghapus Aset <b><?= $ast["nama_aset"]; ?> <?= $ast["merk"]; ?> <?= $ast["type"]; ?> <?= $ast["SN"]; ?></b> ?
                          </div>
                          <div class="modal-footer">

                            <a class="btn btn-outline-danger" href="hapusaset.php?id_aset=<?= $ast["id_aset"]; ?>"><i class='bi bi-trash3-fill'></i> Hapus</a>
                            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancel</button>


                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Delete END -->
                  </tbody>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="css/dashboard.js"></script>
  <script src="css/sidebars.js"></script>
                </form>
</body>

</html>