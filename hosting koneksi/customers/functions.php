<?php
// KONEKSI DATABASE
$conn = mysqli_connect("sql307.epizy.com", "epiz_30320118", "o7ixUlKOV1d0ia", "epiz_30320118_rentcar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// REGISTRASI AKUN CUSTOMER
function registrasi($data)
{
    global $conn;

    $nama_cst = htmlspecialchars($data["nama_cst"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // CEK USERNAME SUDAH ADA ATAU BELUM
    $result = mysqli_query($conn, "SELECT username FROM customer WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('Username yang digunakan telah terdaftar!')
			  </script>";
        return false;
    }

    // CEK KONFIRMASI PASSWORD
    if ($password !== $password2) {
        echo "<script>
				alert('Konfirmasi password tidak sesuai');
			  </script>";
        return false;
    }

    // ENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    // INSERT USER BARU KE DATABASE
    mysqli_query($conn, "INSERT INTO customer VALUES
		('', '$nama_cst', '$no_telp', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

//TAMBAH DATA BOOKING
function f_booking($data)
{
    global $conn;

    $no_ktp = htmlspecialchars($data["no_ktp"]);

    //UPLOAD GAMBAR
    $bukti_ktp = upload_ktp();
    if (!$bukti_ktp) {
        return false;
    }

    $tgl_sewa = htmlspecialchars($data["tgl_sewa"]);
    $lama_sewa = htmlspecialchars($data["lama_sewa"]);
    $id_cst = htmlspecialchars($data["id_cst"]);
    $id_mobil = htmlspecialchars($data["id_mobil"]);

    $query = "INSERT INTO datasewa VALUES
			('', '$no_ktp', '$bukti_ktp', '$tgl_sewa', '$lama_sewa', '0', NULL, '$id_cst', '$id_mobil')";
    mysqli_query($conn, $query);

    mysqli_query($conn, "UPDATE mobil SET status = '0' where id_mobil = '$id_mobil'");

    return mysqli_affected_rows($conn);
}

//UPLOAD BUKTI KTP
function upload_ktp()
{
    $namaFile = $_FILES['bukti_ktp']['name'];
    $ukuranFile = $_FILES['bukti_ktp']['size'];
    $error = $_FILES['bukti_ktp']['error'];
    $tmpName = $_FILES['bukti_ktp']['tmp_name'];

    //CEK APAKAH TIDAK ADA GAMBAR YANG DIUPLOAD

    if ($error === 4) {
        echo "
			<script>
				alert('Error! Silahkan upload bukti ktp!');
			</script>";
        return false;
    }

    //CEK APAKAH YANG DIUPLOAD ADALAH GAMBAR (CEK EKSTENSI)
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
			<script>
				alert('Error! Tipe ekstensi harus .jpg, .jpeg, .png!');
			</script>";
        return false;
    }

    //CEK JIKA UKURANNYA TERLALU BESAR
    if ($ukuranFile > 3000000) {
        echo "
			<script>
				alert('Error! Ukuran gambar tidak boleh melebihi 3 MB!');
			</script>";
        return false;
    }

    //LOLOS PENGECEKAN, GAMBAR SIAP DI UPLOAD

    //GENERATE NAMA GAMBAR BARU
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

//TAMBAH BUKTI PEMBAYARAN
function f_buktiBayar($data)
{
    global $conn;

    $id_sewa = htmlspecialchars($data["id_sewa"]);

    //UPLOAD GAMBAR
    $bukti_bayar = upload_buktiBayar();
    if (!$bukti_bayar) {
        return false;
    }

    mysqli_query($conn, "UPDATE datasewa SET bukti_bayar = '$bukti_bayar' WHERE id_sewa = '$id_sewa'");

    return mysqli_affected_rows($conn);
}

//UPLOAD BUKTI PEMBAYARAN
function upload_buktiBayar()
{
    $namaFile = $_FILES['bukti_bayar']['name'];
    $ukuranFile = $_FILES['bukti_bayar']['size'];
    $error = $_FILES['bukti_bayar']['error'];
    $tmpName = $_FILES['bukti_bayar']['tmp_name'];

    //CEK APAKAH TIDAK ADA GAMBAR YANG DIUPLOAD

    if ($error === 4) {
        echo "
			<script>
				alert('Error! Silahkan upload bukti pembayaran!');
			</script>";
        return false;
    }

    //CEK APAKAH YANG DIUPLOAD ADALAH GAMBAR (CEK EKSTENSI)
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
			<script>
				alert('Error! Tipe ekstensi harus .jpg, .jpeg, .png!');
			</script>";
        return false;
    }

    //CEK JIKA UKURANNYA TERLALU BESAR
    if ($ukuranFile > 3000000) {
        echo "
			<script>
				alert('Error! Ukuran gambar tidak boleh melebihi 3 MB!');
			</script>";
        return false;
    }

    //LOLOS PENGECEKAN, GAMBAR SIAP DI UPLOAD

    //GENERATE NAMA GAMBAR BARU
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}
