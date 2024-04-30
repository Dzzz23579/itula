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
    <title>Halaman Depan</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Halaman Depan</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <p>Selamat datang di halaman depan.</p>
                <p><a href="logout.php">Logout</a></p>
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>
