<?php
include "koneksi.php";

switch ($_GET['action'])
{
    case 'simpan':
        $merek  = $_POST["merek"];
        $warna  = $_POST["warna"];
        $stok   = $_POST["stok"];
        $satuan = $_POST["satuan"];
        $harga  = $_POST["harga"];
        $sql = "INSERT into produk (merek, warna, stok, satuan, harga) VALUES 
                ('$merek','$warna','$stok','$satuan','$harga')"; 

        $hasil = mysqli_query($db,$sql);
        if ($hasil)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($db);
        }
    break;

    case 'ubah':
        $id     = $_POST["id"];
        $merek  = $_POST["merek"];
        $warna  = $_POST["warna"];
        $stok   = $_POST["stok"];
        $satuan = $_POST["satuan"];
        $harga  = $_POST["harga"];

        $sql = "UPDATE produk SET merek='$merek',warna='$warna',stok='$stok',satuan='$satuan',harga='$harga' WHERE id=$id"; 

        $hasil = mysqli_query($db,$sql);
        if ($hasil)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :" . mysqli_error($db);
        }
    break;

    case 'hapus':
        $id = $_GET['id'];
        $sql = "DELETE FROM produk WHERE id=$id";
        $hasil = mysqli_query($db, $sql);
        if ($hasil)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" . mysqli_error($db);
        }
    break;
}
?>