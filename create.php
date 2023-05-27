<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO pengguna (nama, umur) VALUES ('$nama', '$umur')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect kembali ke halaman utama jika sukses
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
