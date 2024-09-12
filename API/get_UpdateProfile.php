<?php

session_start();
include 'db_connect.php';

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Pastikan parameter user_id adalah integer
    if (!filter_var($user_id, FILTER_VALIDATE_INT)) {
        echo json_encode(array("error" => "Parameter user_id harus berupa integer"));
        exit;
    }

    // Validasi input untuk username_masyarakat dan password_masyarakat
    if (isset($_POST['username_masyarakat']) && isset($_POST['password_masyarakat'])) {
        $username_masyarakat = $_POST['username_masyarakat'];
        $password_masyarakat = $_POST['password_masyarakat'];

        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password_masyarakat, PASSWORD_DEFAULT);

        // Update data dalam database
        $queryUpdate = "UPDATE user_masyarakat SET username_masyarakat = ?, password_masyarakat = ? WHERE id_masyarakat = ?";
        $stmt = $koneksi->prepare($queryUpdate);
        $stmt->bind_param("ssi", $username_masyarakat, $hashed_password, $user_id);
        if ($stmt->execute()) {
            echo json_encode(array("success" => "Data berhasil diupdate"));
        } else {
            echo json_encode(array("error" => "Gagal melakukan update data"));
        }
    } else {
        echo json_encode(array("error" => "Parameter username_masyarakat dan password_masyarakat diperlukan"));
    }
} else {
    echo json_encode(array("error" => "Parameter user_id tidak ditemukan"));
}

$koneksi->close();
?>
