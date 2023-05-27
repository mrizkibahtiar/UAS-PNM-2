<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "program";

// Buat koneksi ke database
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
