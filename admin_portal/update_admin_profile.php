<?php
include('_secure.php');
include('include/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $hashed_password = password_hash($admin_password, PASSWORD_BCRYPT);

    $conn = $GLOBALS['db'];
    $sql = "UPDATE admin_login SET Adm_Name = ?, Adm_Password = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $admin_name, $hashed_password, $admin_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to update profile";
        $_SESSION['message_type'] = "danger";
    }

    header("Location: data_profil_admin.php");
}
