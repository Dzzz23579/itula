<?php
session_start();

// Periksa apakah pengguna belum login, jika ya, redirect ke halaman login
if (!isset($_SESSION['session_username'])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Tambahkan stylesheet kustom jika diperlukan -->
    <style>
        /* Tambahkan gaya kustom di sini */
    </style>
</head>
<body>
    <!-- Navigasi atau menu -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">SI Akademik</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="jadwal.php">Jadwal Kuliah</a></li>
                <li><a href="pengumuman.php">Pengumuman</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Selamat datang, <?php echo $_SESSION['session_username']; ?>!</h2>
                <!-- Tambahkan konten dashboard di sini -->
            </div>
        </div>
    </div>

    <!-- Tambahkan script JavaScript jika diperlukan -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>
