<html>

<head>
      <link rel="icon" href="img/logo.png">
  <title>Sistem Informasi Manajemen Aset</title>
  <!-- Load file CSS Bootstrap -->
  <!-- CSS BOOTSTRAP -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <!-- END CSS -->
</head>

<?php

require 'koneksi.php';

if(isset($_POST["change"])){
	
	if(lupa_password($_POST) > 0 ){
		echo "<script>
    alert('Password Berhasil di Ubah')
	document.location.href = 'divisi.php';
	</script>";
	
	}else {
		echo "<script>alert('Password Gagal di Ubah');
	</script>";
		
	}
	
}

?>

<body style="background-color: #eee;">
  <form action="" method="post">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-10">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5 ">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-5 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-success">Change Password</p>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <div class="form-outline flex-fill mb-0">
                      <span id="username" class="form-text">Username</span>
                      <input type="text" id="username" name="username" class="form-control" required />
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <div class="form-outline flex-fill mb-0">
                      <span id="Password" class="form-text">Password</span>
                      <input type="password" id="password" name="password" class="form-control" required />
                    </div>
                    <br>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <div class="form-outline flex-fill mb-0">
                      <span id="Password" class="form-text">Confirm Password</span>
                      <input type="password" id="password" name="password2" class="form-control" required />
                    </div>
                    <br>
                  </div>
                  <div class="text-start">
                    <button type="submit" name="change" class="btn btn-success w-100">Change Password</button>
                    <br>
                    <p></p>
                    <a href="login.php" type="submit" class="btn btn-danger w-100">Log in</a>
                  </div>

                </div>
                <div class="col-md-8 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="img/intens.jpg" class="img-fluid" alt="Sample image" width="500" height="500">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


</html>