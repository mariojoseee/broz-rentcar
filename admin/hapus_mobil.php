<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_mobil = $_GET["id_mobil"];

if (f_hapusMobil($id_mobil) > 0) {
    echo "
	<script>
		alert('Data berhasil di hapus');
		document.location.href = 'data_mobil.php';
	</script>
";
} else {
    echo "
	<script>
		alert('Error! Data gagal di hapus');
		document.location.href = 'data_mobil.php';
	</script>
";
}
