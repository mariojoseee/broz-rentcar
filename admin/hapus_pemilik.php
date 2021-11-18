<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_pemilik = $_GET["id_pemilik"];

if (f_hapusPemilik($id_pemilik) > 0) {
    echo "
	<script>
		alert('Data berhasil di hapus');
		document.location.href = 'data_pemilik.php';
	</script>
";
} else {
    echo "
	<script>
		alert('Error! Data gagal di hapus');
		document.location.href = 'data_pemilik.php';
	</script>
";
}
