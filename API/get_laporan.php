<?php

// Ambil koneksi ke database
include 'db_connect.php';

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data laporan
$sql = "SELECT * FROM laporan_kerusakan_jalan ORDER BY nama_pelapor";
$result = $koneksi->query($sql);

// Jika ada hasil, kembalikan dalam format JSON
if ($result->num_rows > 0) {
    $response = array();
    while ($row = $result->fetch_assoc()) {
        // Buat objek laporan untuk setiap baris
        $laporan = array(
            'nama_pelapor' => $row['nama_pelapor'],
            'tgl_laporan' => $row['tgl_laporan'],
            'lokasi_laporan' => $row['lokasi_laporan'],
            'status_laporan' => $row['status_laporan'],
            'tingkat_kerusakan' => $row['tingkat_kerusakan'],
            'gambar_laporan' => $row['gambar_laporan']
        );
        // Tambahkan objek laporan ke dalam array response
        $response[] = $laporan;
    }
    echo json_encode($response);
} else {
    echo "0 results";
}
$koneksi->close();
?>