<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_mobil = $_GET["id_mobil"];

$status = query("SELECT status FROM mobil WHERE id_mobil = $id_mobil")[0];

if ($status["status"] == 0) {
    $query = "UPDATE mobil SET
			status = '1'
			WHERE id_mobil = $id_mobil";
    mysqli_query($conn, $query);

} else if ($status["status"] == 1) {
    $query = "UPDATE mobil SET
			status = '0'
			WHERE id_mobil = $id_mobil";
    mysqli_query($conn, $query);

} else {
    echo "
		<script>
			alert('Error! Data gagal di update');
			document.location.href = 'pengembalian_mobil.php';
		</script>
	";
}

echo "
	<script>
		alert('Data berhasil di update');
		document.location.href = 'pengembalian_mobil.php';
	</script>
";
