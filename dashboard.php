<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dist/output.css">
    <title>Javascript Simple CRUD</title>
    <style>
        .edit-button, .delete-button {
            padding: 0 5px; 
            background-color: #14b8a6; 
            border-radius: 5px;
            transition: 350ms;
            font-weight: bolder;
        }

        .edit-button:hover, .delete-button:hover {
            color: white;
            background-color: #082f49;
        }
    </style>
</head>
<body>
 <div class="w-full min-h-screen py-24 px-5 text-center bg-[url('img/bg2.jpg')] bg-cover relative">
    <h1 class="text-3xl font-bold text-teal-600 md:text-5xl">Selamat Datang😊</h1>
    <p class="text-lg mb-5 font-semibold md:text-3xl">Website ini dibuat untuk penugasan UAS</p>
    <div class="w-full md:w-fit h-auto py-10 bg-blue-200/50 backdrop-blur p-2 rounded-xl font-semibold md:text-black flex flex-col items-center mx-auto">
        <h2 class="text-xl font-bold text-teal-600 mb-2">Sistem Data Pengguna</h2>
        <form action="create.php" method="POST">
            <label for="nama" class="text-lg block md:inline">Nama : </label>
            <input type="text" name="nama" class="p-2 rounded-lg mb-3" required>
            <br>
            <label for="umur" class="text-lg block md:inline">Umur : </label>
            <input type="number" name="umur" class="p-2 rounded-lg mb-3" required><br>
            <input type="submit" value="Tambah" class="p-2 bg-teal-500 rounded-lg hover:-translate-y-1 transition duration-300 hover:bg-sky-950 hover:text-white">
        </form>

        <table class="mb-3 p-2 mt-3 font-light">
            <tr class="border-[1px] border-black mb-5s">
                <th class="border-[1px] border-black font-normal p-2">ID</th>
                <th class="border-[1px] border-black font-normal p-2">Nama</th>
                <th class="border-[1px] border-black font-normal p-2">Umur</th>
                <th class="border-[1px] border-black font-normal p-2">Aksi</th>
            </tr>
            <?php
            include 'koneksi.php';

            // Ambil data pengguna dari database
            $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id) AS row_num FROM pengguna";
            $result = mysqli_query($koneksi, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='border: 1px solid black;'>";
                echo "<td class='besarrr' style='border: 1px solid black;'>".$row['row_num']."</td>";
                echo "<td style='border: 1px solid black; padding: .5rem;'>".$row['nama']."</td>";
                echo "<td style='border: 1px solid black;'>".$row['umur']."</td>";
                echo "<td style='padding: 1rem;'>
                    <a href='update.php?id=".$row['id']."' class='edit-button'>Edit</a>
                    <a href='delete.php?id=".$row['id']."' class='delete-button' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                </td>";
                echo "</tr>";
            }         
            ?>
        </table>
        
        <a href="logout.php" class=" p-2 bg-teal-500 rounded-lg hover:-translate-y-1 transition duration-300 hover:bg-sky-950 hover:text-white">logout</a>
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
