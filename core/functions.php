<?php
include 'koneksi.php';

function registrasi($data) {
    global $db;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($db);
}

function gantiPass($data){

	global $db;
	// membaca pass lama, dan baru dari form
	$username = $data["username"];
	$password = $data['password'];
	$newpassword = $data['newpassword'];
	$confirmnewpassword = $data['confirmnewpassword'];
	
	$result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
		// cek password
		$row = mysqli_fetch_assoc($result);
		// pengecekan apakah kata sandi lama = kata sandi baru
		if( password_verify($newpassword, $row["password"]) ) {
			// pengecekan input konfirmasi kata sandi baru
			if( $newpassword !== $confirmnewpassword ){
				echo "<script>
					alert('Konfirmasi Kata Sandi tidak sesuai!');
					</script>";
				return false;
			}
			echo "<script>
					alert('Kata Sandi sama dengan yang lama!');
					</script>";
		}else{
			// jika tidak sama maka masuk ke database
			// enkripsi password dan update database
			$password = password_hash($newpassword, PASSWORD_DEFAULT);
			$sql = "UPDATE user SET password = '$password' WHERE username = '$username'";
			$result = mysqli_query($db, $sql);
			if ($result) header("location:logout.php");
		}
}
