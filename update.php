<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // Query untuk memperbarui data di database
    $query = "UPDATE pengguna SET nama='$nama', umur='$umur' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect kembali ke halaman utama jika sukses
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Ambil data pengguna berdasarkan ID dari URL
    $id = $_GET['id'];
    $query = "SELECT * FROM pengguna WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body>
    <div class="w-full min-h-screen py-24 px-5 text-center bg-[url('img/bg2.jpg')] bg-cover">
        <h1 class="text-4xl mb-5 font-bold text-teal-600 md:text-5xl">Edit Pengguna</h1>
        <div class="w-72 md:w-fit h-auto py-10 bg-blue-200/50 backdrop-blur p-2 rounded-xl font-semibold md:text-black flex flex-col items-center mx-auto">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" >
                <label for="nama" class="text-lg block md:inline md:text-xl">Nama : </label>
                <input type="text" class="font-light p-2 rounded-lg mb-3" name="nama" value="<?php echo $user['nama']; ?>" required>
                <br>
                <label for="umur" class="text-lg block md:inline md:text-xl">Umur : </label>
                <input type="number" name="umur" class="font-light p-2 rounded-lg mb-3" value="<?php echo $user['umur']; ?>" required><br>
                <input type="submit" value="Simpan" class="p-2 bg-teal-500 rounded-lg hover:-translate-y-1 transition duration-300 hover:bg-sky-950 hover:text-white md:text-xl">
            </form>
        </div>
    </div>
    <footer class="text-center h-auto text-sm font-semibold  md:text-xl">
        <div class="h-fit bg-slate-400 p-5">
            <span class="block text-2xl md:text-3xl mb-2">Realtime Clock</span>
            <span id="clock" onload="clocks()" class="text-transparent font-extrabold text-4xl md:text-7xl bg-gradient-to-r from-green-800 to-sky-700 bg-clip-text"></span>
        </div>
        <span class="w-full bg-slate-500 text-white block p-1">Dibuat oleh Muhammad Rizki Bahtiar | Mei 2023</span>
    </footer>


 <script>
     function clocks() {
     var date = new Date();
     let jam = date.getHours();
     let menit = date.getMinutes();
     let detik = date.getSeconds();
     const clock = document.querySelector("span#clock");
     clock.innerHTML = jam + " : " + menit + " : " + detik;
     setInterval(clocks, 1000);
     }
     
     clocks();
 </script>
</body>
</html>
