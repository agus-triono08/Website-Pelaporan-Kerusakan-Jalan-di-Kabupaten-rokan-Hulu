<?php

// Ambil koneksi ke database
include 'db_connect.php';

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mendapatkan data dari request POST dan membersihkan input
$gambar_laporan = $_POST['gambar_laporan'];
$nama_pelapor = $koneksi->real_escape_string($_POST['nama_pelapor']);
$tingkat_kerusakan = $koneksi->real_escape_string($_POST['tingkat_kerusakan']);
$catatan_laporan = $koneksi->real_escape_string($_POST['catatan_laporan']);
$lokasi_laporan = $koneksi->real_escape_string($_POST['lokasi_laporan']);
$longitude = $koneksi->real_escape_string($_POST['longitude']);
$latitude = $koneksi->real_escape_string($_POST['latitude']);
$tgl_laporan = $koneksi->real_escape_string($_POST['tgl_laporan']);

// Debugging: Log semua parameter
error_log("Received data: " . print_r($_POST, true));

// Periksa apakah direktori unggahan ada, jika tidak, buat direktori
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// Menyimpan gambar ke folder server
$image_name = time() . '.jpg';
$image_path = $upload_dir . $image_name;

// Decode base64 string dan simpan gambar ke path yang ditentukan
$decoded_image = base64_decode($gambar_laporan);
if ($decoded_image === false) {
    die("Gagal mendekode gambar");
}

if (!file_put_contents($image_path, $decoded_image)) {
    die("Gagal menyimpan gambar. Periksa izin direktori dan format base64.");
}

// Validasi apakah file gambar benar-benar disimpan
if (!file_exists($image_path)) {
    die("Gambar tidak ditemukan setelah penyimpanan.");
}

// Debugging: Log path gambar yang disimpan
error_log("Image saved to: " . $image_path);

// Menyusun query SQL dengan prepared statements
$sql = "INSERT INTO laporan_kerusakan_jalan (gambar_laporan, nama_pelapor, tingkat_kerusakan, catatan_laporan, lokasi_laporan, longitude, latitude, tgl_laporan) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Mempersiapkan statement
$stmt = $koneksi->prepare($sql);
if ($stmt === false) {
    die("Error dalam mempersiapkan statement: " . $koneksi->error);
}

// Mengikat parameter ke prepared statements
$stmt->bind_param("ssssssss", $image_path, $nama_pelapor, $tingkat_kerusakan, $catatan_laporan, $lokasi_laporan, $longitude, $latitude, $tgl_laporan);

// Debugging: Log statement yang akan dieksekusi
error_log("Executing statement: " . $stmt->error);

// Eksekusi statement
$result = $stmt->execute();

if ($result) {
    echo "Laporan berhasil disimpan";
} else {
    error_log("Error executing statement: " . $stmt->error);
    echo "Error: Gagal menyimpan laporan";
}

// Menutup statement dan koneksi
$stmt->close();
$koneksi->close();

?>
