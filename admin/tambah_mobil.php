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
    if (tambah_mobil($_POST) > 0) {
        echo "
			<script>
				alert('Data Mobil Berhasil di Tambahkan');
				document.location.href = 'data_mobil.php';
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
            <h1 class="mt-4">Tambah Data Mobil</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Form Tambah Data Mobil</li>
            </ol>
            <div class="mb-4 dropdown-divider"></div>

            <form action="" method="post" enctype="multipart/form-data" class="row g-4" style="max-width: 2000px;">
              <div class="col-md-3 ">
                <label for="nopol" class="form-label fw-bold">* Nomor Polisi</label>
                <input type="text" name="nopol" class="form-control" id="nopol" placeholder="Masukan nomor polisi" required />
              </div>

              <div class="col-md-4 ">
                <label for="merk" class="form-label fw-bold">* Merk Mobil</label>
                <input type="text" name="merk" class="form-control" id="merk" placeholder="Masukan merk mobil" required />
              </div>

              <div class="col-md-5 ">
                <label for="nama_mobil" class="form-label fw-bold">* Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" id="nama_mobil" placeholder="Masukan nama mobil" required />
              </div>

              <div class="col-md-3 ">
                <label for="warna" class="form-label fw-bold">* Warna</label>
                <input type="text" name="warna" class="form-control" id="warna" placeholder="Masukan warna mobil" required />
              </div>

              <div class="col-md-5 ">
                <label for="gambar" class="form-label fw-bold">* Gambar</label>
                <input type="file" name="gambar" class="form-control" id="gambar" required />
              </div>

              <div class="col-md-4 ">
                <label for="tahun" class="form-label fw-bold">* Tahun</label>
                <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Masukan tahun pembuatan mobil" required />
              </div>

              <div class="col-md-4 ">
                <label for="harga" class="form-label fw-bold">* Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukan harga mobil per hari" required />
              </div>

              <div class="col-md-4 ">
              <label class="form-label fw-bold">* Jenis Transmisi</label>
              <select class="form-select" name="transmisi" aria-label="Default select example" >
                <option selected>Pilih jenis transmisi mobil</option>
                <option value="Otomatis">Otomatis</option>
                <option value="Manual">Manual</option>
              </select>
              </div>

              <div class="col-md-4 ">
                <label for="mesin" class="form-label fw-bold">* Kapasitas Mesin</label>
                <input type="text" name="mesin" class="form-control" id="mesin" placeholder="Masukan kapasitas mesin" required />
              </div>

              <div class="col-md-4 ">
                <label for="kursi" class="form-label fw-bold">* Kursi</label>
                <input type="number" name="kursi" class="form-control" id="kursi" placeholder="Masukan jumlah kursi mobil" required />
              </div>

              <div class="col-md-4 ">
              <label class="form-label fw-bold">* Status Mobil</label>
              <select class="form-select" name="status" aria-label="Default select example" >
                <option selected>Pilih status mobil</option>
                <option value="1">Tersedia</option>
                <option value="0">Tersewa</option>
              </select>
              </div>

              <div class="col-md-4 ">
                <label for="id_pemilik" class="form-label fw-bold">* ID Pemilik</label>
                <input type="number" name="id_pemilik" class="form-control" id="id_pemilik" placeholder="Masukan id pemilik mobil" required />
              </div>

              <div class="mb-4 d-grid ">
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
