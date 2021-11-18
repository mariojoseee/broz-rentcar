<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require '../functions.php';

//NILAI ID CST PADA SAAT MELAKUKAN LOGIN
$id_cst = $_SESSION["id_cst"];

// AMBIL DATA DI URL
$id_sewa = $_GET["id_sewa"];

$data_sewa = query("SELECT customer.nama_cst, customer.no_telp, mobil.merk, mobil.transmisi, mobil.kursi, mobil.warna, mobil.tahun, mobil.mesin, mobil.nama_mobil, mobil.harga, mobil.gambar, datasewa.id_sewa, datasewa.tgl_sewa, datasewa.lama_sewa, (harga*lama_sewa) AS total_biaya, datasewa.status FROM customer
INNER JOIN datasewa ON datasewa.id_cst = customer.id_cst
INNER JOIN mobil ON datasewa.id_mobil = mobil.id_mobil WHERE datasewa.id_cst = $id_cst")[0];



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <!-- Custom Style -->
    <link rel="stylesheet" href="style.css" />

    <title>Broz Rent Car | Invoice</title>
  </head>

  <body>
    <div class="my-5 page" size="A4">
      <div class="p-5">
        <section class="top-content bb d-flex justify-content-between">
          <div class="logo">
            <img src="logo.png" alt="" class="img-fluid" />
          </div>
          <div class="top-left">
            <div class="graphic-path">
              <p>Invoice</p>
            </div>
            <div class="position-relative">
              <p>Invoice No. <span><?= $id_sewa ?></span></p>
            </div>
          </div>
        </section>

        <section class="store-user mt-5 mb-5 bb">
          <div class="col-10">
            <div class="row pb-3">
              <div class="col-7">
                <p>Supplier,</p>
                <h2>Broz Rent Car</h2>
                <p class="address">
                  Jalan Merkurius Blok A, <br>
                  Nomor 1877 MTVC2, <br> 
                  Tabanan - Bali
                </p>
                <div class="txn mt-2"></div>
              </div>
              <div class="col-5">
                <p>Customer,</p>
                <h2><?= $data_sewa["nama_cst"]; ?></h2>
                <p class="address">
                  No Telp. <?= $data_sewa["no_telp"]; ?><br>
                </p>
                <div class="txn mt-2"></div>
              </div>
            </div>
          </div>
        </section>

        <section class="product-area mt-4">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Deskripsi Mobil</td>
                <td>Harga</td>
                <td>Lama Sewa</td>
                <td>Total</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="media">
                    <img
                      class="mr-3 img-thumbnail"
                      src="../img/<?= $data_sewa["gambar"]; ?>" width="340"
                    >
                    <div class="media-body">
                      <p class="mt-0 title"><?= $data_sewa["merk"]; ?> <?= $data_sewa["nama_mobil"]; ?></p>
                      <p>* Jenis Transmisi : <?= $data_sewa["transmisi"]; ?> <br>
                         * Jumlah Kursi : <?= $data_sewa["kursi"]; ?> Kursi <br>
                         * Keluaran Tahun : <?= $data_sewa["tahun"]; ?> <br>
                         * Kapasitas Mesin : <?= $data_sewa["mesin"]; ?> <br><br>
                         Harga tidak termasuk : <br>
                         * BBM selama masa sewa
                      </p>
                    </div>
                  </div>
                </td>
                <td>Rp. <?=number_format($data_sewa["harga"],0,",",".") ?></td>
                <td><?= $data_sewa["lama_sewa"]; ?> Hari</td>
                <td>Rp. <?=number_format($data_sewa["total_biaya"],0,",",".") ?></td>
              </tr>
            </tbody>
          </table>
        </section>

        <section class="balance-info mt-4">
          <div class="row">
            <div class="col-8">
              <p class="m-0 font-weight-bold">Note:</p>
              <p>
            Silahkan membayar tagihan anda dengan cara transfer via <br> Bank BRI pada No. Rekening : 
            <strong>(1326-02-221369-04-1 a/n BROZ RENT CAR)</strong> untuk menyelesaikan pembayaran. <br>
            Bukti pembayaran bisa di upload pada menu Akun Saya.
              </p>
            </div>
            <div class="col-4">
              <table class="table border-0 table-hover">
                <tr>
                  <td>Sub Total:</td>
                  <td><?=number_format($data_sewa["total_biaya"],0,",",".") ?></td>
                </tr>
                <tr>
                  <td>Pajak:</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>Diskon:</td>
                  <td>0</td>
                </tr>
                <tfoot>
                  <tr>
                    <td>Total:</td>
                    <td>Rp. <?=number_format($data_sewa["total_biaya"],0,",",".") ?></td>
                  </tr>
                </tfoot>
              </table>

              <!-- Signature -->
              <div class="col-12 mt-4">
                <img src="signature.png" class="img-fluid" alt="" />
                <p class="text-center m-0">Broz Rent Car</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Cart BG -->
        <img src="cart.jpg" class="img-fluid cart-bg" alt="" />

        <footer>
          <hr />
          <p class="m-0 text-center font-weight-bold">
            BROZ RENT CAR
          </p>
          <div class="social pt-3">
            <span class="pr-4">
              <i class="fas fa-mobile-alt"></i>
              <span>+62 8121 2343 9096</span>
            </span>
            <span class="pr-3">
              <i class="fas fa-envelope"></i>
              <span>mariobroz@gmail.com</span>
            </span>
            <span class="pr-3">
              <i class="fab fa-facebook-f"></i>
              <span>brozrentcars</span>
            </span>
            <span class="pr-4">
              <i class="fab fa-youtube"></i>
              <span>brozrentcars</span>
            </span>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
