<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// AMBIL DATA DI URL
$id_mobil = $_GET["id_mobil"];

// QUERY DATA MOBIL BERDASARKAN ID
$mobil = query("SELECT * FROM mobil WHERE id_mobil = $id_mobil")[0];

// CEK APAKAH TOMBOL UBAH DATA SUDAH DITEKAN ATAU BELUM
if (isset($_POST["update"])) {
    // CEK APAKAH DATA BERHASIL DIUBAH ATAU TIDAK
    if (f_ubahMobil($_POST) >= 0) {
        echo "
			<script>
				alert('Data mobil berhasil diubah');
        document.location.href = 'data_mobil.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('Error! Data mobil gagal diubah');
        document.location.href = 'data_mobil.php';
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
            <h1 class="mt-4">Edit Data Mobil</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="data_mobil.php">Data Mobil</a></li>
              <li class="breadcrumb-item active">Form Edit Data Mobil</li>
            </ol>

            <form action="" method="post" enctype="multipart/form-data" class="row g-4" style="max-width: 2000px;">
              <input type="hidden" name="id_mobil" value="<?=$mobil["id_mobil"];?>">
              <input type="hidden" name="gambarLama" value="<?=$mobil["gambar"];?>">

              <div class="col-md-3 ">
                <label for="nopol" class="form-label fw-bold">* Nomor Polisi</label>
                <input type="text" name="nopol" class="form-control" id="nopol" placeholder="Masukan nomor polisi" value="<?=$mobil["nopol"];?>" required />
              </div>

              <div class="col-md-4 ">
                <label for="merk" class="form-label fw-bold">* Merk Mobil</label>
                <input type="text" name="merk" class="form-control" id="merk" placeholder="Masukan merk mobil" value="<?=$mobil["merk"];?>"required />
              </div>

              <div class="col-md-5 ">
                <label for="nama_mobil" class="form-label fw-bold">* Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" id="nama_mobil" placeholder="Masukan nama mobil" value="<?=$mobil["nama_mobil"];?>" required />
              </div>

              <div class="col-md-4 mt-4">
                <label for="warna" class="form-label fw-bold">* Warna</label>
                <input type="text" name="warna" class="form-control" id="warna" placeholder="Masukan warna mobil" value="<?=$mobil["warna"];?>" required />
              </div>

              <div class="col-md-5 mt-4">
                <label for="gambar" class="form-label fw-bold">* Gambar</label> <br>
                <input type="file" name="gambar" class="form-control" id="gambar" />
              </div>

              <div class="col-md-3">
                <img src="../img/<?=$mobil['gambar'];?>" width="180">
              </div>

              <div class="col-md-3">
                <label for="tahun" class="form-label fw-bold">* Tahun</label>
                <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Masukan tahun pembuatan mobil" value="<?=$mobil["tahun"];?>" required />
              </div>

              <div class="col-md-3">
                <label for="harga" class="form-label fw-bold">* Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukan harga mobil per hari" value="<?=$mobil["harga"];?>" required />
              </div>

              <div class="col-md-6 ">
              <label class="form-label fw-bold">* Jenis Transmisi</label>
              <select class="form-select" name="transmisi" aria-label="Default select example">
                <?php if ($mobil["transmisi"] == "Otomatis") {?>
                <option value="Otomatis"> Otomatis</option>
                <option value="Manual"> Manual</option>
                <?php } else {?>
                <option value="Manual"> Manual</option>
                <option value="Otomatis"> Otomatis</option>
                <?php }?>
              </select>
              </div>

              <div class="col-md-3 ">
                <label for="mesin" class="form-label fw-bold">* Kapasitas Mesin</label>
                <input type="text" name="mesin" class="form-control" id="mesin" placeholder="Masukan kapasitas mesin" value="<?=$mobil["mesin"];?>" required />
              </div>

              <div class="col-md-3 ">
                <label for="kursi" class="form-label fw-bold">* Kursi</label>
                <input type="number" name="kursi" class="form-control" id="kursi" placeholder="Masukan jumlah kursi mobil" value="<?=$mobil["kursi"];?>" required />
              </div>

              <div class="col-md-3 ">
              <label class="form-label fw-bold">* Status Mobil</label>
              <select class="form-select" name="status" aria-label="Default select example">
                <?php if ($mobil["status"] == "0") {?>
                <option value="0"> Tersewa</option>
                <option value="1"> Tersedia</option>
                <?php } else {?>
                <option value="1"> Tersedia</option>
                <option value="0"> Tersewa</option>
                <?php }?>
              </select>
              </div>

              <div class="col-md-3 ">
                <label for="id_pemilik" class="form-label fw-bold">* ID Pemilik</label>
                <input type="number" name="id_pemilik" class="form-control" id="id_pemilik" placeholder="Masukan id pemilik mobil" value="<?=$mobil["id_pemilik"];?>" required />
              </div>

              <div class="mb-4 d-grid ">
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
