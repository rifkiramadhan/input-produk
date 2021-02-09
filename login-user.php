<?php
include 'core/koneksi.php';
session_start();

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil Nama pengguna berdasarkan id
	$result = mysqli_query($db, "SELECT membername FROM member WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['membername']) ) {
		$_SESSION['login'] = true;
	}
}


if( isset($_SESSION["login"]) ) {
    $membername = $_POST["membername"];
	$_SESSION['membername'] = $membername;
	echo("<script>location.href = 'user/index.php';</script>");
	exit;
}


if( isset($_POST["login"]) ) {
	$membername = $_POST["membername"];
	$memberpass = $_POST["memberpass"];

	$result = mysqli_query($db, "SELECT * FROM member WHERE membername = '$membername'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($memberpass, $row["memberpass"]) ) {
			// set session
            $_SESSION["login"] = true;
            $_SESSION['membername'] = $membername;
            

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['membername']), time()+60);
			}
			echo("<script>location.href = 'user/index.php';</script>");
			exit;
		}
	}
	$error = true;
}

if( isset($error) ) :
	echo "<script>
                alert('Nama pengguna atau Kata sandi salah');
            </script>";
endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Masuk | SPPTK</title>
	<meta charset="UTF-8">
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
	<link rel="icon" href="assets/images/icons/favicon.png">

</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/background.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">

				<span class="login100-form-title p-b-41">
				<i class="fas fa-money-check"></i> Masuk Pembelian
				</span>
					<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="">

						<div class="wrap-input100 validate-input" data-validate = "Masukkan Nama Pengguna">
							<input class="input100" type="text" name="membername" placeholder="Nama Pengguna">
							<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Masukkan Kata Sandi">
							<input class="input100" type="password" name="memberpass" placeholder="Kata Sandi">
							<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						</div>

						<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="login">
							<i class="fas fa-sign-in-alt mr-2"></i> Masuk 					
						</button>
						</div>
						<div class="text-center mt-4 font-weight-light"> Tidak jadi masuk ? <a href="index.php" class="text-success">Kembali</a>
						</div>			
					<div class="text-center mt-4 font-weight-light"> Belum punya akun ? <a href="registrasi-user.php" class="text-success">Daftar</a>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>