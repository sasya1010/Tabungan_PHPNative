<?php

require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) >0){
        echo"<script>

            alert('user baru berhasil di tambahkan')
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman Registrasi</title>
    <style>
        label{
            display : block;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <h1>Halaman Registrasi</h1>
<form action="" method="post">
    <table>
    <tr>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username" id="username">
        </li>
        <li>
             <label for="password">password :</label>
            <input type="password" name="password" id="password" id="password">
    </li>
            <label for="password2">komfirmasi password :</label>
            <input type="password" name="password2" id="password2" id="password2">
    </tr>
    <li>
        <button type="submit" name="register">Daftar</button>
    </li>
    </form>
    
</body>
</html>