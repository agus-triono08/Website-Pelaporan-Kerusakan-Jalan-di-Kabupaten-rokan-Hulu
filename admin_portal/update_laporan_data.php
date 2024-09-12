<?php
include('_secure.php');
include('include/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_laporan = $_POST['id_laporan'];
    $nama_pelapor = $_POST['nama_pelapor'];
    $tingkat_kerusakan = $_POST['tingkat_kerusakan'];
    $catatan_laporan = $_POST['catatan_laporan'];
    $lokasi_laporan = $_POST['lokasi_laporan'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $tgl_laporan = $_POST['tgl_laporan'];
    $status_laporan = $_POST['status_laporan'];
    $conn = $GLOBALS['db'];
    $sql = "UPDATE laporan_kerusakan_jalan SET nama_pelapor = ?, tingkat_kerusakan = ?, catatan_laporan = ?, lokasi_laporan = ?, longitude = ?, latitude = ?, tgl_laporan = ?, status_laporan = ? WHERE id_laporan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $nama_pelapor, $tingkat_kerusakan, $catatan_laporan, $lokasi_laporan, $longitude, $latitude, $tgl_laporan, $status_laporan, $id_laporan);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Laporan updated successfully";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to update laporan";
        $_SESSION['message_type'] = "danger";
    }

    header("Location: data_laporan_kerusakan_jalan.php");
}
