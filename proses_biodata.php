<?php
session_start();

// Atur koneksi ke database
$host_db    = "localhost"; // Ganti dengan host database Anda
$user_db    = "root";      // Ganti dengan username database Anda
$pass_db    = "";          // Ganti dengan password database Anda
$nama_db    = "biodata";   // Ganti dengan nama database Anda
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

$err = "";

// Handle form submission for biodata
if(isset($_POST["submit_biodata"])){
    // Ambil data biodata dari formulir
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $nik_ktp = $_POST["nik_ktp"];
    $agama = $_POST["agama"];

    // Simpan data biodata ke dalam database
    $sql = "INSERT INTO biodata (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, nik_ktp, agama) 
            VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$nik_ktp', '$agama')";

    if(mysqli_query($koneksi, $sql)){
        // Jika penyimpanan berhasil, redirect ke halaman login
        header("Location: login.php");
        exit();
    } else {
        $err = "Gagal menyimpan biodata. Silakan coba lagi.";
    }
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
                <form id="biodataform" class="form-horizontal" action="proses_biodata.php" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" required>                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Rahasia">Rahasia</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input id="nik_ktp" type="text" class="form-control" name="nik_ktp" placeholder="NIK KTP" required>                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <input id="agama" type="text" class="form-control" name="agama" placeholder="Agama" required>                                        
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="submit_biodata" class="btn btn-primary" value="Simpan Biodata"/>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>
