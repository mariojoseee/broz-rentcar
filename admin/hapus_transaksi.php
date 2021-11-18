<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_sewa = $_GET["id_sewa"];

if (f_hapusTransaksi($id_sewa) > 0) {
    echo "
	<script>
		alert('Data berhasil di hapus');
		document.location.href = 'transaksi_cst.php';
	</script>
";
} else {
    echo "
	<script>
		alert('Error! Data gagal di hapus');
		document.location.href = 'transaksi_cst.php';
	</script>
";
}
