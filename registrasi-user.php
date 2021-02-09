<?php
require 'core/function-user.php';

session_start();
if(isset($_SESSION["login"]) ) {
    echo("<script>location.href = 'user/index.php';</script>");
  exit;
}

if(isset($_POST["daftar"])) {
    if( registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
        echo("<script>location.href = 'index.php';</script>");
    } else{
        echo mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="icon" href="assets/images/icons/favicon.png">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body style="background-image: url('assets/images/background.jpg'">
    <div class="container mt-5 rounded bg-light">
    <h1 class="text-center">Daftar Akun Pembeli</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="membername">Username:</label>
                <input type="text" class="form-control" name="membername" id="membername">
            </div>
            <div class="form-group">
                <label for="memberpass">Password:</label>
                <input type="password" class="form-control" name="memberpass" id="memberpass">
            </div>
            <div class="form-group">
                <label for="memberpass2">Konfirmasi Password:</label>
                <input type="password" class="form-control" name="memberpass2" id="memberpass2">
            </div>
            <button type="submit" class="btn btn-primary" name="daftar"><i class="fas fa-folder-plus"></i> Daftar</button>
            <div class="mt-4 font-weight-light"> Tidak jadi daftar akun ? <a href="index.php" class="text-success">Kembali</a>
        </form>
    </div>
</body>
</html>