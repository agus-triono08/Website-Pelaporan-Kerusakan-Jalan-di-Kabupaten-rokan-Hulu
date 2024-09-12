<?php

include 'db_connect.php';

$username = $_POST['username_masyarakat'];
$password = $_POST['password_masyarakat'];
$nik = $_POST['nik_masyarakat'];
$nama = $_POST['nama_masyarakat'];
$alamat = $_POST['alamat_masyarakat'];
$no_telepon = $_POST['notlpn_masyarakat'];

$queryRegister = "SELECT * FROM user_masyarakat WHERE username_masyarakat = ?";
$stmt = $koneksi->prepare($queryRegister);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if (!empty($username) && !empty($password) && !empty($nik) && !empty($nama) && !empty($alamat) && !empty($no_telepon)) {
    if ($result->num_rows == 0) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $regis = "INSERT INTO user_masyarakat (username_masyarakat, password_masyarakat, nik_masyarakat, nama_masyarakat, alamat_masyarakat, notlpn_masyarakat)
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmtRegis = $koneksi->prepare($regis);
        $stmtRegis->bind_param("ssssss", $username, $hashed_password, $nik, $nama, $alamat, $no_telepon);
        $stmtRegis->execute();

        echo "Daftar Berhasil";
    } else {
        echo "Username Sudah Digunakan";
    }
} else {
    echo "Semua Data Harus Di Isi Lengkap";
}

$stmt->close();
$koneksi->close();

?>
