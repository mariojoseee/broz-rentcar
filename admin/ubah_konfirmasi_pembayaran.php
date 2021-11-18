<?php
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_sewa = $_GET["id_sewa"];

$status = query("SELECT status FROM datasewa WHERE id_sewa = $id_sewa")[0];

if ($status["status"] == 0) {
    $query = "UPDATE datasewa SET
			status = '1'
			WHERE id_sewa = $id_sewa";
    mysqli_query($conn, $query);

} else if ($status["status"] == 1) {
    $query = "UPDATE datasewa SET
			status = '0'
			WHERE id_sewa = $id_sewa";
    mysqli_query($conn, $query);

} else {
    echo "
		<script>
			alert('Error! Data gagal di update');
			document.location.href = 'konfirmasi_pembayaran.php';
		</script>
	";
}

echo "
	<script>
		alert('Data berhasil di update');
		document.location.href = 'konfirmasi_pembayaran.php';
	</script>
";
