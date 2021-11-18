<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_cst = $_GET["id_cst"];

if (f_hapusAkun($id_cst) > 0) {
    echo "
	<script>
		alert('Data berhasil di hapus');
		document.location.href = 'akun_cst.php';
	</script>
";
} else {
    echo "
	<script>
		alert('Error! Data gagal di hapus');
		document.location.href = 'akun_cst.php';
	</script>
";
}
