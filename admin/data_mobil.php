<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$data_mobil = query("SELECT * FROM mobil");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Broz Rent Car | Data Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->

  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.php">Broz Rent Car</a>

      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button>

      <!-- Navbar Search-->
      <form action="" method="post" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
          <input name="keyword" class="form-control" type="text" placeholder="Cari data . . ." aria-label="Search for..." autocomplete="off" />
          <button name="cari" class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
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
            <h1 class="mt-4">Data Mobil</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Spesifikasi Mobil</li>
            </ol>
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Database Mobil
            </div>
            <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th scope="col">Nopol</th>
                  <th scope="col">Merk</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Warna</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Transmisi</th>
                  <th scope="col">Mesin</th>
                  <th scope="col">Kursi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Pemilik</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php

$batas = 5;

// Menyimpan url halaman dengan fungsi get
$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn, "SELECT * FROM mobil");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_mobil = mysqli_query($conn, "SELECT * FROM mobil LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;

//TOMBOL CARI DITEKAN
if (isset($_POST["cari"])) {
    $data_mobil = cari_mobil($_POST["keyword"]);
}

foreach ($data_mobil as $row): ?>
                <tr>
                  <td><?=$row["nopol"];?></td>
                  <td><?=$row["merk"];?></td>
                  <td><?=$row["nama_mobil"];?></td>
                  <td><?=$row["warna"];?></td>
                  <td class="text-center"><img src="../img/<?=$row["gambar"];?>" width="130"></td>
                  <td><?=$row["tahun"];?></td>
                  <td><?=number_format($row["harga"], 0, ",", ".");?></td>

                  <td><?=$row["transmisi"];?></td>
                  <td><?=$row["mesin"];?></td>
                  <td><?=$row["kursi"];?></td>
                  <td>
                    <span class="text-white badge bg-<?=($row['status']) ? "success" : "danger"?>">
                    <?=($row['status']) ? "Tersedia" : "Tersewa"?>
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="detail_pemilik.php?id_pemilik=<?=$row["id_pemilik"];?>"><span class="badge bg-success"><?=$row["id_pemilik"];?></span></a>
                  </td>
                  <td class="text-center">
                    <a href="ubah_mobil.php?id_mobil=<?=$row["id_mobil"];?>"><span class="badge bg-warning text-dark">EDIT</span></a>
                    <a href="hapus_mobil.php?id_mobil=<?=$row["id_mobil"];?>" onclick="return confirm('Yakin ingin menghapus data tersebut?');"><span class="badge bg-danger">HAPUS</span></a>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>

            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link"
                  <?php if ($halaman > 1) {echo "href='?halaman=$previous'";}?>>Previous</a>
                </li>

                <?php for ($x = 1; $x <= $total_halaman; $x++) {?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php }?>

                <li class="page-item">
                  <a  class="page-link"
                  <?php if ($halaman < $total_halaman) {echo "href='?halaman=$next'";}?>>Next</a>
                </li>
              </ul>
            </nav>

            </div>
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
