<?php
    include "koneksi.php";

    // Proses login
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
        $cocok = mysqli_num_rows($login);
        $r = mysqli_fetch_array($login);
        if ($cocok > 0) {
            $_SESSION['username'] = $r['username'];
            header('location:index.php');
        } else {
            echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses'); window.location=('index.php')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Membuat Form Login</title>
    <style>
        /* Tampilan untuk registrasi */
        .registration-form {
            display: none; /* Sembunyikan formulir registrasi secara default */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <form method="POST" action="index.php">
        <label>Username</label><br>
        <input type="text" name="username"><br>
        <label>Password</label><br>
        <input type="password" name="password"><br>
        <button name="login">Log in</button>
    </form>

    <!-- Tautan Registrasi -->
    <p>Belum punya akun? <a href="#" id="show-registration">Daftar di sini</a></p>

    <!-- Formulir Registrasi -->
    <div class="registration-form">
        <h2>Registrasi</h2>
        <form action="proses_registrasi.php" method="POST">
            <label>NIM:</label><br>
            <input type="text" name="nim" required><br>
            
            <label>Nama Mahasiswa:</label><br>
            <input type="text" name="nama_mahasiswa" required><br>
            
            <label>Jenis Kelamin:</label><br>
            <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required>
            <label for="laki">Laki-laki</label>
            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
            <label for="perempuan">Perempuan</label><br>
            
            <label>Alamat:</label><br>
            <textarea name="alamat" required></textarea><br>
            
            <button>Daftar</button>
        </form>
    </div>
</div>

<!-- Script JavaScript untuk menampilkan formulir registrasi saat tautan diklik -->
<script>
    const showRegistrationLink = document.getElementById("show-registration");
    const registrationForm = document.querySelector(".registration-form");

    showRegistrationLink.addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah tautan dari navigasi standar
        registrationForm.style.display = "block"; // Menampilkan formulir registrasi
    });
</script>

</body>
</html>
