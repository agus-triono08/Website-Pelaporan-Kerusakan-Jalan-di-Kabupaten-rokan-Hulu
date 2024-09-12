<?php
include('_secure.php');
include('include/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_masyarakat = $_POST['id_masyarakat'];
    $username_masyarakat = $_POST['username_masyarakat'];
    $nik_masyarakat = $_POST['nik_masyarakat'];
    $nama_masyarakat = $_POST['nama_masyarakat'];
    $alamat_masyarakat = $_POST['alamat_masyarakat'];
    $notlpn_masyarakat = $_POST['notlpn_masyarakat'];
    $tgl_daftar = $_POST['tgl_daftar'];
    $conn = $GLOBALS['db'];
    $sql = "UPDATE user_masyarakat SET username_masyarakat = ?, nik_masyarakat = ?, nama_masyarakat = ?, alamat_masyarakat = ?, notlpn_masyarakat = ?, tgl_daftar = ? WHERE id_masyarakat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $username_masyarakat, $nik_masyarakat, $nama_masyarakat, $alamat_masyarakat, $notlpn_masyarakat, $tgl_daftar, $id_masyarakat);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data masyarakat updated successfully";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to update data masyarakat";
        $_SESSION['message_type'] = "danger";
    }

    header("Location: data_masyarakat.php");
}
