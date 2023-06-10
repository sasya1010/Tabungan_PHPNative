<?php
session_start();
require 'functions.php';
//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['yes']) ){
    $id = $_COOKIE['id'];
    $yes  = $_COOKIE['yes'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM  user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($yes === hash('sha256', $row['username']) ){
        $_SESSION['login'] = true;
    }

}

if ( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}




if (isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

   $result= mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){

        //cek password
         $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ){
            //session 
            $_SESSION["login"] = true;

            // cek remmember
            if (isset($_POST['remember'])){
                // cookie
                setcookie('id', $row['id'],time ()+60);
                setcookie('yes', hash('sha256',$row['username']),time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }   
$error = true;

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
  
h1{
	text-align: center;
	/*ketebalan font*/
	font-weight: 3600;
  color: white;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.form_login{
	/*membuat lebar form penuh*/
	box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
}


body{
	font-family: sans-serif;
	background: #008080;
}

.kotak_login{
	width: 350px;
	background: white;
	/*meletakkan form ke tengah*/
	margin: 80px auto;
	padding: 30px 20px;
}

.container {
  padding: 100px 350px;
}

.tombol_login{
	background: #bae1ff;
	color: black;
	font-size: 11pt;
	width: 100%;
	border: 1000;
	border-radius: 3px;
	padding: 10px 20px;
}


</style>
</head>
</style>
</head>

    

    

    <?php if (isset($error)): ?>
        <script>
                alert('Password atau Username Salah');
                document.location.href = 'login.php';
        </script>"
    <?php endif;?>
    <form class="box" action="" method="post" autocomplete="off">
        <h1>LOGIN</h1>
        <div class="kotak_login">

        <label for="username">Username :</label>
            <input type="text" name="username"class="form_login" id="username" placeholder="Username">
        
            <label for="password">Password :</label>
            <input type="password" name="password" class="form_login" id="password" placeholder="Password">
      
            <input type="checkbox" name="remember" id="remember">
            <label  for="rememer">Remember me</label>
        
            <input type="submit" name="login" class="tombol_login" value="Login">
      
    <p>Belum mempunyai akun?</p>
    <a href="registrasi.php">Register</a>
    </form>
</body>
</html>