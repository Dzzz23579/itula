<?php
session_start();

// Atur koneksi ke database
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "login";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

$err = "";

// Handle form submission for registration
if(isset($_POST["register"])){
    // Redirect pengguna ke halaman pembuatan biodata
    header("Location: isi_biodata.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
    <div id="registerbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Registrasi Akun</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <form id="registerform" class="form-horizontal" action="" method="post" role="form">       
                    <!-- Input field untuk username dan password dihapus -->
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="register" class="btn btn-primary" value="Daftar"/>
                            <a href="login.php" class="btn btn-default">Batal</a>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>
