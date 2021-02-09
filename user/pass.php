<?php
include '../core/koneksi.php';
require '../core/function-user.php';

session_start();
if( !isset($_SESSION["login"]) ) {
  echo("<script>location.href = '../login-user.php';</script>");
  exit;
}

if(isset($_POST["ganti"])) {
    if( gantiPass($_POST) > 0 ) {
        echo "<script>
                alert('user berhasil di Ubah');
            </script>";
    } else{
        echo mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/vendor/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/layout.css"> <!-- End layout styles -->
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <title>Ganti Password</title>
</head>
<body>

<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" style="background-image: url('../assets/images/background.jpg');">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5 rounded">
                <h4 class="text-center">Ubah Kata Sandi</h4>
                <h6 class="font-weight-light text-center">Anda Masuk Sebagai <?php echo $_SESSION['membername'];?></h6>
                <form class="pt-3" method="post" action="">
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" name="membername" value="<?php echo $_SESSION['membername'];?>" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg"  placeholder="Kata Sandi Lama" name="memberpass" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Kata Sandi Baru" name="membernewpass" required>
                  </div><div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Ulangi Kata Sandi Baru" name="confirmmembernewpass"  required>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" name="ganti"><i class="fas fa-user-edit"></i> Ubah Kata Sandi</button>
                  </div>            
                    <div class="text-center mt-4 font-weight-light"> Tidak jadi ubah kata sandi ? <a href="index.php" class="text-success">Kembali</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/vendor/jquery/off-canvas.js"></script>
    <script src="../assets/vendor/jquery/misc.js"></script>
    <!-- endinject -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
</body>
</html>