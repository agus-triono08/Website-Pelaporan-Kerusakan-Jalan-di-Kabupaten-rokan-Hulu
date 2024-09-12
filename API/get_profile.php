<?php

session_start();
include 'db_connect.php';

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query untuk mengambil data nama berdasarkan user_id
    $queryUser = "SELECT * FROM user_masyarakat WHERE id_masyarakat = ?";
    $stmt = $koneksi->prepare($queryUser);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika ada hasil, kembalikan dalam format JSON
if ($result->num_rows > 0) {
    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo "0 results";
}
} else {
    echo json_encode(array("error" => "Parameter user_id tidak ditemukan"));
}
$koneksi->close();
?>