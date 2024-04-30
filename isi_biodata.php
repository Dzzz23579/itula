<?php
session_start();

// Periksa apakah pengguna sudah login
if(!isset($_SESSION['reg_username'])) {
    header("Location: register.php");
    exit();
}

// Ambil username dari session
$reg_username = $_SESSION['reg_username'];

// Handle form submission for biodata
if(isset($_POST["submit"])){
    // Ambil data dari formulir
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    // Simpan informasi biodata ke dalam database
    $sql = "INSERT INTO biodata (username, nama, email) VALUES ('$reg_username', '$nama', '$email')";
    if(mysqli_query($koneksi, $sql)){
        // Redirect pengguna ke halaman pembuatan password
        header("Location: buat_password.php");
        exit();
    } else {
        $err = "Terjadi kesalahan. Silakan coba lagi.";
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
    <div id="biodata-form" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Isi Biodata</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <form id="biodata-form" class="form-horizontal" action="" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan"/>
                            <a href="register.php" class="btn btn-default">Batal</a>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>
