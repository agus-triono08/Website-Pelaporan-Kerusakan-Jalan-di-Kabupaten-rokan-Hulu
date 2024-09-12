<?php

session_start();
include 'db_connect.php';

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query untuk mengambil data nama berdasarkan user_id
    $queryUser = "SELECT nama_masyarakat FROM user_masyarakat WHERE id_masyarakat = ?";
    $stmt = $koneksi->prepare($queryUser);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mengambil data dari hasil query
        $row = $result->fetch_assoc();
        $response = array("nama_masyarakat" => $row["nama_masyarakat"]);
        echo json_encode($response);
    } else {
        echo json_encode(array("error" => "Tidak ada hasil"));
    }

    $stmt->close();
} else {
    echo json_encode(array("error" => "Parameter user_id tidak ditemukan"));
}

$koneksi->close();

?>
