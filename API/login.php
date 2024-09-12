<?php
session_start();
include 'db_connect.php';

$username = $_POST['username_masyarakat'];
$password = $_POST['password_masyarakat'];

if (!empty($username) && !empty($password)) {
    $queryLogin = "SELECT * FROM user_masyarakat WHERE username_masyarakat = ?";
    $stmt = $koneksi->prepare($queryLogin);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row['password_masyarakat'])) {
            // Simpan user_id dalam sesi
            $_SESSION['user_id'] = $row['id_masyarakat']; // Pastikan 'id_masyarakat' adalah kolom yang tepat untuk user ID di tabel Anda
            echo json_encode(array("message" => "Selamat Datang", "user_id" => $row['id_masyarakat']));
        } else {
            echo json_encode(array("error" => "Password Salah"));
        }
    } else {
        echo json_encode(array("error" => "Username Tidak Ditemukan"));
    }

    $stmt->close();
} else {
    echo json_encode(array("error" => "Username dan Password Harus Di Isi Lengkap"));
}

$koneksi->close();
?>
