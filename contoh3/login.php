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
                setcookie('id', $row['id'],time ()+120);
                setcookie('yes', hash('sha256',$row['username']),time()+120);
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
    <link rel="stylesheet" href="login.css?v=<?php echo time();?>">
</head>
<body background="245.jpg">
    

    

    <?php if (isset($error)): ?>
        <script>
                alert('Password atau Username Salah');
                document.location.href = 'login.php';
        </script>"
    <?php endif;?>
    <form class="box" action="" method="post">
        <h1>LOGIN</h1>
 
        <label for="username">Username :</label>
            <input type="text" name="username" id="username" placeholder="Username">
        
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" placeholder="Password">
      
            <input type="checkbox" name="remember" id="rememer">
            <label  for="remember">Remember me</label>
        
            <input type="submit" name="login" value="Login">
      
    <p>Belum mempunyai akun?</p>
    <a href="regist.php">Register</a>
    </form>
</body>
</html>