<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// AMBIL DATA DI URL
$id_cst = $_GET["id_cst"];

// QUERY DATA CUSTOMER BERDASARKAN ID
$cst = query("SELECT * FROM customer WHERE id_cst = $id_cst")[0];

// CEK APAKAH TOMBOL UBAH DATA SUDAH DITEKAN ATAU BELUM
if (isset($_POST["update"])) {
    // CEK APAKAH DATA BERHASIL DIUBAH ATAU TIDAK
    if (f_ubahAkun($_POST) >= 0) {
        echo "
			<script>
				alert('Data akun berhasil diubah');
        document.location.href = 'akun_cst.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('Error! Data akun gagal diubah');
        document.location.href = 'akun_cst.php';
			</script>
		";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Broz Rent Car | Edit Data Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.php">Broz Rent Car</a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button>
    </nav>

      <!-- Navbar-->
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Utama</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <div class="sb-sidenav-menu-heading">Database</div>
              <a class="nav-link collapsed mb-1" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-car-side"></i></div>
                Data Mobil
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="tambah_mobil.php">• Tambah Data Mobil</a>
                  <a class="nav-link" href="data_mobil.php">• Data Spesifikasi Mobil</a>
                </nav>
              </div>
              <a class="nav-link collapsed mb-1" href="" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Data Customer
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="akun_cst.php">• Akun Customer</a>
                  <a class="nav-link" href="transaksi_cst.php">• Transaksi Customer</a>
                </nav>
              </div>
              <a class="nav-link collapsed mb-1" href="" data-bs-toggle="collapse" data-bs-target="#collapsePemilik" aria-expanded="false" aria-controls="collapsePemilik">
                <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                Data Pemilik Mobil
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePemilik" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="tambah_pemilik.php">• Tambah Data Pemilik</a>
                  <a class="nav-link" href="data_pemilik.php">• Data Pemilik Mobil</a>
                </nav>
              </div>
            </div>
          </div>
            <div>
              <div class="small">~Made by : Start Bootstrap</div>
            </div>
        </nav>
      </div>

      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-5">
            <h1 class="mt-4">Edit Data Akun Customer</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="akun_cst.php">Akun Customer</a></li>
              <li class="breadcrumb-item active">Form Edit Akun Customer</li>
            </ol>

            <form action="" method="post" class="row g-4" style="max-width: 2000px;">
              <input type="hidden" name="id_cst" value="<?=$cst["id_cst"];?>">
              <div class=" mb-1 input-group-lg">
                <label for="nama_cst" class="form-label fs-5">Nama Lengkap</label>
                <input type="text" name="nama_cst" class="form-control" id="nama_cst" placeholder="Masukan nama lengkap" value="<?=$cst["nama_cst"];?>" required />
              </div>
              <div class="input-group-lg">
                <label for="no_telp" class="form-label fs-5">Nomor Telephone</label>
                <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Masukan nomor telephone" value="<?=$cst["no_telp"];?>" required />
              </div>
              <div class="mb-3 input-group-lg">
                <label for="username" class="form-label fs-5">Username</label>
                <input type="email" name="username" class="form-control" id="username" placeholder="Masukan alamat email" value="<?=$cst["username"];?>" required />
              </div>
              <div class="d-grid input-group-lg">
                <button type="submit" name="update" class="btn btn-primary">Ubah Data</button>
              </div>
            </form>

          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
  </body>
</html>
