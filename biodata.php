<?php
session_start();

// Periksa apakah pengguna belum login, jika ya, redirect ke halaman login
if (!isset($_SESSION['session_username'])) {
    header("location:login.php");
    exit();
}

// Proses penyimpanan biodata jika formulir disubmit
if(isset($_POST['submit'])) {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Simpan data ke database atau lakukan operasi lain sesuai kebutuhan
    // Contoh: menyimpan data ke tabel biodata
    // Kode disini
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Biodata</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
    <div id="biodatabox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Isi Biodata Anda</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <form id="biodataform" class="form-horizontal" action="" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input id="telepon" type="tel" class="form-control" name="telepon" placeholder="Nomor Telepon" required>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>
