<?php
// KONEKSI KE DATABASE
$conn = mysqli_connect("localhost", "root", "", "rentcar");

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

//HAPUS DATA AKUN CUSTOMER
function f_hapusAkun($id_cst)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM customer WHERE id_cst = $id_cst");
    return mysqli_affected_rows($conn);
}

//HAPUS DATA TRANSAKSI CUSTOMER
function f_hapusTransaksi($id_sewa)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM datasewa WHERE id_sewa = $id_sewa");
    return mysqli_affected_rows($conn);
}

//HAPUS DATA MOBIL
function f_hapusMobil($id_mobil)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mobil WHERE id_mobil = $id_mobil");
    return mysqli_affected_rows($conn);
}

//HAPUS DATA PEMILIK MOBIL
function f_hapusPemilik($id_pemilik)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pemilikmobil WHERE id_pemilik = $id_pemilik");
    return mysqli_affected_rows($conn);
}

//UBAH DATA AKUN CUSTOMER
function f_ubahAkun($data)
{
    global $conn;

    $id_cst = $data["id_cst"];
    $nama_cst = htmlspecialchars($data["nama_cst"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $username = htmlspecialchars($data["username"]);

    $query = "UPDATE customer SET
			nama_cst = '$nama_cst',
			no_telp = '$no_telp',
			username = '$username'
			WHERE id_cst = $id_cst
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH DATA PEMILIK MOBIL
function f_ubahPemilik($data)
{
    global $conn;

    $id_pemilik = $data["id_pemilik"];
    $no_stnk = htmlspecialchars($data["no_stnk"]);
    $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "UPDATE pemilikmobil SET
			no_stnk = '$no_stnk',
			nama_pemilik = '$nama_pemilik',
			no_telp = '$no_telp',
			alamat = '$alamat'
			WHERE id_pemilik = $id_pemilik
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH STATUS PENGEMBALIAN MOBIL
function f_statusPengembalian($data)
{
    global $conn;

    $id_mobil = htmlspecialchars($data["id_mobil"]);

    $query = "UPDATE mobil SET
			status = '1'
			WHERE id_mobil = $id_mobil";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH STATUS KONFIRMASI PEMBAYARAN TRANSAKSI CUSTOMER
function f_statusKonfirmasiPembayaran($data)
{
    global $conn;

    $id_sewa = htmlspecialchars($data["id_sewa"]);

    $query = "UPDATE datasewa SET
			status = '1'
			WHERE id_sewa = $id_sewa";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH DATA MOBIL
function f_ubahMobil($data)
{
    global $conn;

    $id_mobil = $data["id_mobil"];
    $nopol = htmlspecialchars($data["nopol"]);
    $merk = htmlspecialchars($data["merk"]);
    $nama_mobil = htmlspecialchars($data["nama_mobil"]);
    $warna = htmlspecialchars($data["warna"]);

    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //CEK APAKAH ADMIN PILIH GAMBAR BARU ATAU TIDAK
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload_mobil();
    }

    $tahun = htmlspecialchars($data["tahun"]);
    $harga = htmlspecialchars($data["harga"]);
    $transmisi = htmlspecialchars($data["transmisi"]);
    $mesin = htmlspecialchars($data["mesin"]);
    $kursi = htmlspecialchars($data["kursi"]);
    $status = htmlspecialchars($data["status"]);
    $id_pemilik = htmlspecialchars($data["id_pemilik"]);

    $query = "UPDATE mobil SET
			nopol = '$nopol',
			merk = '$merk',
			nama_mobil = '$nama_mobil',
			warna = '$warna',
			gambar = '$gambar',
			tahun = '$tahun',
			harga = '$harga',
			transmisi = '$transmisi',
			mesin = '$mesin',
			kursi = '$kursi',
			status = '$status',
			id_pemilik = $id_pemilik
			WHERE id_mobil = $id_mobil";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH DATA TRANSAKSI
function f_ubahTransaksi($data)
{
    global $conn;

    $id_sewa = $data["id_sewa"];
    $no_ktp = htmlspecialchars($data["no_ktp"]);

    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //CEK APAKAH ADMIN PILIH GAMBAR BARU ATAU TIDAK
    if ($_FILES['bukti_ktp']['error'] === 4) {
        $bukti_ktp = $gambarLama;
    } else {
        $bukti_ktp = upload_ktp();
    }

    $tgl_sewa = htmlspecialchars($data["tgl_sewa"]);
    $lama_sewa = htmlspecialchars($data["lama_sewa"]);
    $status = htmlspecialchars($data["status"]);
    $id_cst = htmlspecialchars($data["id_cst"]);
    $id_mobil = htmlspecialchars($data["id_mobil"]);

    $query = "UPDATE datasewa SET
			no_ktp = '$no_ktp',
			bukti_ktp = '$bukti_ktp',
			tgl_sewa = '$tgl_sewa',
			lama_sewa = '$lama_sewa',
			status = '$status',
			id_cst = '$id_cst',
			id_mobil = '$id_mobil'
			WHERE id_sewa = $id_sewa";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//TAMBAH DATA MOBIL
function tambah_mobil($data)
{
    global $conn;

    $nopol = htmlspecialchars($data["nopol"]);
    $merk = htmlspecialchars($data["merk"]);
    $nama_mobil = htmlspecialchars($data["nama_mobil"]);
    $warna = htmlspecialchars($data["warna"]);

    //UPLOAD GAMBAR
    $gambar = upload_mobil();
    if (!$gambar) {
        return false;
    }

    $tahun = htmlspecialchars($data["tahun"]);
    $harga = htmlspecialchars($data["harga"]);
    $transmisi = htmlspecialchars($data["transmisi"]);
    $mesin = htmlspecialchars($data["mesin"]);
    $kursi = htmlspecialchars($data["kursi"]);
    $status = htmlspecialchars($data["status"]);
    $id_pemilik = htmlspecialchars($data["id_pemilik"]);

    // CEK NOMOR POLISI SUDAH ADA ATAU BELUM
    $result = mysqli_query($conn, "SELECT nopol FROM mobil WHERE nopol = '$nopol'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
			alert('Gagal! Nomor Polisi yang dimasukan telah terdaftar!')
		  </script>";
        return false;
    }

    $query = "INSERT INTO mobil VALUES
			('', '$nopol', '$merk', '$nama_mobil', '$warna', '$gambar', '$tahun',
			'$harga', '$transmisi', '$mesin', '$kursi', '$status', '$id_pemilik')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//TAMBAH DATA PEMILIK
function tambah_pemilik($data)
{
    global $conn;

    $no_stnk = htmlspecialchars($data["no_stnk"]);
    $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // CEK NO STNK SUDAH ADA ATAU BELUM
    $result = mysqli_query($conn, "SELECT no_stnk FROM pemilikmobil WHERE no_stnk = '$no_stnk'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('Gagal! No STNK yang dimasukan telah terdaftar!')
			  </script>";
        return false;
    }

    $query = "INSERT INTO pemilikmobil VALUES
			('', '$no_stnk', '$nama_pemilik', '$no_telp', '$alamat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UPLOAD GAMBAR MOBIL
function upload_mobil()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //CEK APAKAH TIDAK ADA GAMBAR YANG DIUPLOAD

    if ($error === 4) {
        echo "
			<script>
				alert('Error! Silahkan upload gambar!');
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
				alert('Error! Yang anda upload bukan gambar!');
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

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;

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

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;

}

//CARI DATA AKUN
function cari_akun($keyword)
{
    $query = " SELECT * FROM customer WHERE
			nama_cst LIKE '%$keyword%' OR
			no_telp LIKE '%$keyword%' OR
			username LIKE '%$keyword%' ";
    return query($query);
}

//CARI DATA MOBIL
function cari_mobil($keyword)
{
    $query = " SELECT * FROM mobil WHERE
			nopol LIKE '%$keyword%' OR
			merk LIKE '%$keyword%' OR
			nama_mobil LIKE '%$keyword%' OR
			warna LIKE '%$keyword%' OR
			tahun LIKE '%$keyword%' OR
			transmisi LIKE '%$keyword%' OR
			kursi LIKE '%$keyword%' OR
			id_pemilik LIKE '%$keyword%' ";
    return query($query);
}

//CARI DATA PEMILIK MOBIL
function cari_pemilik($keyword)
{
    $query = " SELECT * FROM pemilikmobil WHERE
			nama_pemilik LIKE '%$keyword%' OR
			no_telp LIKE '%$keyword%' OR
			alamat LIKE '%$keyword%' ";
    return query($query);
}

//REGISTRASI RAHASIA ADMIN
function registrasi($data)
{
    global $conn;

    $nip = htmlspecialchars($data["nip"]);
    $nama_admin = htmlspecialchars($data["nama_admin"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // CEK USERNAME SUDAH ADA ATAU BELUM
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('Gagal! Username yang digunakan telah terdaftar!')
			  </script>";
        return false;
    }

    // CEK KONFIRMASI PASSWORD
    if ($password !== $password2) {
        echo "<script>
				alert('Gagal! Konfirmasi password tidak sesuai');
			  </script>";
        return false;
    }

    // ENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    // INSERT USER BARU KE DATABASE
    mysqli_query($conn, "INSERT INTO admin VALUES
		('$nip', '$nama_admin', '$no_telp', '$username', '$password')");

    return mysqli_affected_rows($conn);

}
