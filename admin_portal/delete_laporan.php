
<?php
include('_secure.php');
include('include/db.php');

if (isset($_GET['id_laporan'])) {
    $id_laporan = $_GET['id_laporan'];
    $conn = $GLOBALS['db'];
    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM laporan_kerusakan_jalan WHERE id_laporan = ?");
    $stmt->bind_param("i", $id_laporan);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Laporan berhasil dihapus.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menghapus laporan.";
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: data_laporan_kerusakan_jalan.php");
    exit();
}
?>
