<?php
include('_secure.php');
include('include/db.php');
include('include/function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_name = $_POST['new_admin_name'];
    $admin_password = $_POST['new_admin_password'];
    // Hash the password using bcrypt
    $hashed_password = password_hash($admin_password, PASSWORD_BCRYPT);


    $conn = $GLOBALS['db'];
    // Add your logic to insert the new admin data into your database
    $query = "INSERT INTO admin_login (Adm_Name, Adm_Password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $admin_name, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Admin profile added successfully.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to add admin profile.";
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: data_profil_admin.php");
    exit();
}
