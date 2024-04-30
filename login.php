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
    $reg_username   = $_POST["reg_username"];
    $reg_password   = $_POST["reg_password"];

    // Periksa jika username dan password kosong
    if($reg_username == '' || $reg_password == ''){
        $err = "Isi username dan password terlebih dahulu.";
    } else {
        // Tambahkan pendaftaran ke database
        $sql = "INSERT INTO login (username, password) VALUES ('$reg_username', '$reg_password')";
        if(mysqli_query($koneksi, $sql)){
            // Redirect ke halaman isi biodata setelah pendaftaran berhasil
            header("Location: isi_biodata.php");
            exit();
        } else {
            $err = "Terjadi kesalahan. Silakan coba lagi.";
        }
    }
}

// Handle form submission for login
if(isset($_POST["login"])){
    $username   = $_POST["username"];
    $password   = $_POST["password"];
    $ingataku   = isset($_POST["ingataku"]) ? $_POST["ingataku"] : 0;

    if($username == '' || $password == ''){
        $err = "Isi username dan password terlebih dahulu.";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1   = mysqli_query($koneksi, $sql1);
        $r1   = mysqli_fetch_assoc($q1);

        if(!$r1){
            $err = "Username tidak ditemukan.";
        } elseif($r1['password'] != md5($password)){
            $err = "Password salah.";
        }

        if(empty($err)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }
            // Redirect to the index page after successful login
            header("Location: index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login dan Masuk Ke Sistem</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <?php if(!empty($err)){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <?php echo $err; ?>
                    </div>
                <?php } ?>                
                <form id="loginform" class="form-horizontal" action="" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" placeholder="Username">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="ingataku" value="1"> Ingat Aku
                            </label>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <!-- Tombol login dengan lebar yang lebih besar -->
                            <input type="submit" name="login" class="btn btn-success btn-block" value="Login"/>
                        </div>
                        <div class="col-sm-12 text-center">
                            <!-- Tautan daftar dengan tulisan kecil -->
                            <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>
