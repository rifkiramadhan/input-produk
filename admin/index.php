<?php
include "../core/koneksi.php";

session_start();
if( !isset($_SESSION["login"]) ) {
    echo("<script>location.href = '../login.php';</script>");
  exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <!-- assets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../assets/images/icons/favicon.png">
    <script>
        $(document).ready(function(){
            var method = '';
            $("#form-modal").on("hide.bs.modal", function () {
                $("#form").trigger("reset");
            });

            $("#form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '../core/service.php?action='+method,
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#form-modal').modal('hide');
                        $("#table").load("index.php #table");
                    }
                });
            });

            $(document).on("click",".hapus", function(){
                $.ajax({
                    url: '../core/service.php?action=hapus&id='+$(this).attr("value"),
                    type: 'get',
                    success: function(data) {
                        $("#table").load("index.php #table");
                    }
                });
            });

            $(document).on("click",".ubah", function(){
                $("input[name=id]").val($(this).attr("value"));
                $("input[name=merek]").val($(this).closest("tr").find("td:eq(1)").text());
                $("input[name=warna]").val($(this).closest("tr").find("td:eq(2)").text());
                $("input[name=stok]").val($(this).closest("tr").find("td:eq(3)").text());
                $("select[name=satuan]").val($(this).closest("tr").find("td:eq(4)").text());
                $("input[name=harga]").val($(this).closest("tr").find("td:eq(5)").text());

                $('#form-modal').modal('show');
                method = 'ubah';
            });
            
            $("#tambah").click(function(){
                method = 'simpan';
            }); 
        });
        
        </script>
<?php
  //membuat format rupiah dengan PHP
  function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.'); return $hasil_rupiah;
  }

    // Set session limit
    if(isset($_POST['records-limit'])){
        $_SESSION['records-limit'] = $_POST['records-limit'];
    }
    
    $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
    
    // Nomor halaman pagination saat ini
    $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
    $paginationStart = ($page - 1) * $limit;

    // Mendapatkan total records
    $total_pages_sql = "SELECT COUNT(*) FROM produk";
    $result = mysqli_query($db,$total_pages_sql);
    $allRecrods = mysqli_fetch_array($result)[0];
    
    // Calculate total pages membulatkan
    $totalPages = ceil($allRecrods / $limit);

    // Prev + Next
    $prev = $page - 1;
    $next = $page + 1;

    // pencarian dan pagination
    // kondisi pencarian atau pagination
    if (isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $query_condition = "WHERE merek LIKE '%".$cari."%'";
    }else{
      $query_condition = " LIMIT $paginationStart , $limit;";
    }
    
  ?>
  <style>
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }
    .container{
    flex: 1 0 auto;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    input[type=number] {
    -moz-appearance: textfield;
    }
  </style>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5">
    <div class="container">
        <img src="../assets/images/icons/favicon.png" alt="icon" width="30" height="30">
      <a class="navbar-brand ml-2" href="index.php">Daftar Harga | PT. GI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Barang" name="cari" aria-label="Search">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Cari" />
          </form>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> <?php echo $_SESSION['username'];?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="pass.php"><i class="fa fa-cog"></i> Ubah Password ...</a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item bg bg-danger text-center text-white" href="logout.php">Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end Navigation -->
  
    <div class="container table-responsive">
        <h2 class="text-center"><u>List Produk</u></h2>
        <button type="button" id="tambah" class="btn btn-primary mb-2" data-toggle="modal" data-target="#form-modal">
        <i class="fa fa-plus-circle"></i> Tambah Produk
        </button>
        <table class="table table-striped" id="table">
            <thead >
                <tr>
                <th>No</th>
                <th>Merek</th>
                <th>Warna</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <?php
                $sql = "SELECT * FROM produk ". $query_condition;
                $hasil = mysqli_query($db,$sql);
                foreach ($hasil as $key => $data) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $data['merek'] ?></td>
                            <td><?php echo $data['warna']?></td>
                            <td><?php echo $data['stok']?></td>
                            <td><?php echo $data['satuan']?></td>
                            <td><?php echo rupiah($data['harga'])?></td>
                            <td>
                                <button type="button" class="btn btn-warning ubah" value="<?php echo $data['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i> Ubah</button>
                                <button type="button" class="btn btn-danger hapus" value="<?php echo $data['id']?>"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
        </table>
                <!-- Pagination -->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
            </li>
            <?php for($i = 1; $i <= $totalPages; $i++ ): ?>
            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
            </li>
            <?php endfor; ?>
            <li class="page-item <?php if($page >= $totalPages) { echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($page >= $totalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
            </li>
        </ul>
        </nav>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" id="form">
                <input type="hidden" name="id">
                <div class="modal-content">
                    <div class="modal-header bg bg-dark text-light">
                        <h5 class="modal-title" id="ModalLabel">Isi Data Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="merek">Merek:</label>
                            <input type="text" name="merek" placeholder="Masukkan merek" class="form-control" id="" aria-describedby="" required>
                        </div>
                        <div class="form-group">
                            <label for="warna">Warna:</label>
                            <input type="text" name="warna" placeholder="Masukkan warna" class="form-control" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="number" name="stok" placeholder="Masukkan jumlah stok tersedia" class="form-control" id="" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan:</label>
                            <select name="satuan" class="form-control" id="exampleFormControlSelect1">
                            <option value="">-Pilih Satuan-</option>
                            <option value="Box">Box</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Sachet">Sachet</option>
                            <option value="Unit">Unit</option>
                            <option value="Karung">Karung</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="harga" name="harga" placeholder="Masukkan harga hanya angka" class="form-control" id="" min="0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal Form -->
<!-- Footer -->
<footer class="bg-dark text-white p-5">
        <div class="row">
            <div class="col-md-3">
                <h5>LAYANAN PELANGGAN</h5>
                <ul>
                    <li>Pusat Bantuan</li>
                    <li>Cara Pembelian</li>
                    <li>Pengiriman</li>
                    <li>Cara Pengembalian</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>TENTANG KAMI</h5>
                <p>
                    Belanja Online atau biasa dikenal dengan Toko online atau 
                    Online Shop merupakan tempat pembelian barang dan jasa melalui 
                    media Internet. ... Belanja Online atau Toko online adalah salah 
                    satu bentuk perdagangan elektronik (Ecommerce) digunakan untuk 
                    kegiatan transaksi penjual ke penjual ataupun penjual ke konsumen.
                </p>
            </div>
            <div class="col-md-3">
                <h5>MITRA KERJASAMA</h5>
                <ul>
                    <li>GOJEK</li>
                    <li>GRAB</li>
                    <li>JNE</li>
                    <li>PT. POS Indonesia</li>
                    <li>TIKI</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>HUBUNGI KAMI</h5>
                <ul>
                    <li>021-791-86894</li>
                    <li>riifkiramadhan2@gmail.com</li>
                </ul>
            </div>
    
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div>
    </footer>
    <div class="copyright text-center text-white font-weight-bold bg-secondary p-2">
        <p>Developed by Arcademy Rifki Ramadhan <i class="fa fa-copyright"></i> 2021</p>
    </div>
</body>
</html>