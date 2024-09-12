<?php
include('_secure.php');
include('include/db.php');

if (isset($_GET['id_masyarakat'])) {
    $id_masyarakat = $_GET['id_masyarakat'];

    $stmt = $db->prepare("DELETE FROM user_masyarakat WHERE id_masyarakat = ?");
    $stmt->bind_param("i", $id_masyarakat);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data Masyarakat deleted successfully.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to delete Data Masyarakat.";
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
    $db->close();

    header("Location: data_masyarakat.php");
    exit();
}
