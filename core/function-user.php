<?php
include 'koneksi.php';

function registrasi($data) {
    global $db;
	$membername = strtolower(stripslashes($data["membername"]));
	$memberpass = mysqli_real_escape_string($db, $data["memberpass"]);
	$memberpass2 = mysqli_real_escape_string($db, $data["memberpass2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($db, "SELECT membername FROM member WHERE membername = '$membername'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $memberpass !== $memberpass2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$memberpass = password_hash($memberpass, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($db, "INSERT INTO member VALUES(Null, '$membername', '$memberpass')");
	return mysqli_affected_rows($db);
}

function gantiPass($data){

	global $db;
	// membaca pass lama, dan baru dari form
	$membername = $data["membername"];
	$memberpass = $data['memberpass'];
	$membernewpass = $data['membernewpass'];
	$confirmmembernewpass = $data['confirmmembernewpass'];
	
	$result = mysqli_query($db, "SELECT * FROM member WHERE membername = '$membername'");
		// cek password
		$row = mysqli_fetch_assoc($result);
		// pengecekan apakah kata sandi lama = kata sandi baru
		if( password_verify($membernewpass, $row["memberpass"]) ) {
			// pengecekan input konfirmasi kata sandi baru
			if( $membernewpass !== $confirmmembernewpass ){
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
			$memberpass = password_hash($membernewpass, PASSWORD_DEFAULT);
			$sql = "UPDATE member SET memberpass = '$memberpass' WHERE membername = '$membername'";
			$result = mysqli_query($db, $sql);
			if ($result) echo("<script>location.href = 'logout.php';</script>");
		}
}
