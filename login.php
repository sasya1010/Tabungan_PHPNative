<?php 
session_start();
require 'functions.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['yes']) ){
    $id = $_COOKIE['id'];
    $yes  = $_COOKIE['yes'];

    $result = mysqli_query($conn, "SELECT username FROM  users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if ($yes === hash('sha256', $row['username']) ){
        $_SESSION['login'] = true;
    }
}



if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($select) === 1){
        $row = mysqli_fetch_assoc($select);
        if(password_verify($password, $row['password'])){
            $_SESSION["username"] = $row ['username'];
            $_SESSION["password"] = $row ['password'];
            if (isset($_POST['remember'])){
                setcookie('id', $row['id'],time ()+120);
                setcookie('yes', hash('sha256',$row['username']),time()+120);
            }
            header("Location:index1.php");
        } else {
            echo '<script>
                alert("Username dan Password Salah!!");
                document.location.href="login.php";
            </script>';
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
    <title>login</title>
</head>
<body>
    
<h1>Login</h1>
<form class="box" action="" method="post" autocomplete="off">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" placeholder="Username">
        
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" placeholder="Password">
      
            <input type="checkbox" name="remember" id="remember">
            <label  for="remember">Remember me</label>
        
            <input type="submit" name="login" value="Login">
    <p>Belum mempunyai akun?</p>
    <a href="registrasi.php">Register</a>
</form>
</body>
</html>