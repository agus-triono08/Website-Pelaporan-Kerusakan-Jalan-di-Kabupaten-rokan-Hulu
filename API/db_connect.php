<?php
$host = 'localhost';
$user = 'id22180243_agustriono';
$password = 'Agus2708_';
$database = 'id22180243_db_pelaporankerusakanjalan_rohul';

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

