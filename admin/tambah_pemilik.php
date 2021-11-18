<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// CEK APAKAH TOMBOL TAMBAH SUDAH DITEKAN ATAU BELUM
if (isset($_POST["tambah"])) {

    // CEK APAKAH DATA BERHASIL DITAMBAHKAN ATAU TIDAK
    if (tambah_pemilik($_POST) > 0) {
        echo "
			<script>
				alert('Data Mobil Berhasil di Tambahkan');
				document.location.href = 'data_pemilik.php';
			</script>
		";
    } else {
        echo "Error! Data gagal di tambahkan";
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
    <title>Broz Rent Car | Akun Customer</title>
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
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Cari data . . ." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile_admin.php">Settings</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>

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

              <div class="sb-sidenav-menu-heading">Laporan Konfirmasi</div>
              <a class="nav-link collapsed mb-1" href="" data-bs-toggle="collapse" data-bs-target="#collapseLaporan" aria-expanded="false" aria-controls="collapseLaporan">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Konfirmasi Data
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLaporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="konfirmasi_pembayaran.php">• Status Pembayaran</a>
                  <a class="nav-link" href="pengembalian_mobil.php">• Pengembalian Mobil</a>
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
          <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Pemilik Mobil</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Form Tambah Pemilik Mobil</li>
            </ol>
            <div class="mb-4 dropdown-divider"></div>

            <form action="" method="post" class="row g-4" style="max-width: 2000px;">
              <div class=" mb-1 input-group-lg">
                <label for="no_stnk" class="form-label fs-5">Nomor STNK Mobil</label>
                <input type="text" name="no_stnk" class="form-control" id="no_stnk" placeholder="Masukan nomor stnk mobil" required />
              </div>
              <div class=" mb-1 input-group-lg">
                <label for="nama_pemilik" class="form-label fs-5">Nama Lengkap</label>
                <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Masukan nama lengkap" required />
              </div>
              <div class="input-group-lg">
                <label for="no_telp" class="form-label fs-5">Nomor Telephone</label>
                <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Masukan nomor telephone" required />
              </div>
              <div class="mb-3 input-group-lg">
                <label for="alamat" class="form-label fs-5">Alamat Lengkap</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat lengkap" required />
              </div>
              <div class="d-grid input-group-lg mb-4">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
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
