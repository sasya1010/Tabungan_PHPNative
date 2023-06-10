<?php

require 'functions.php';

if(isset($_POST["register"])) {

    if(registrasi($_POST) > 0) {
   
        echo "<script>
                alert('user baru berhasil di tambahkan');
                document.location.href = 'login.php';
                </script>";
    }
} else {
    echo mysqli_error($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="regist.css">
</head>
<body>
    
<div class="container">

    <form  action="" method="POST">
    <h1 class="title">Registrasi</h1>
        <div class="user">
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" placeholder="Masukan Username">
        </div>    
        <div class="password">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" placeholder="Masukan Password">
          </div>
          <div class="password1">
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
          </div>
          <div class="submit">
                <input type="submit" name="register" value="Daftar">
          </div>

 
    </form>
</div>

</body>
</html>