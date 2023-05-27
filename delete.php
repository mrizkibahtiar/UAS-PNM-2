<?php
include 'koneksi.php';

$id = $_GET['id'];

// Query untuk menghapus data dari database
$query = "DELETE FROM pengguna WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Redirect kembali ke halaman utama jika sukses
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
