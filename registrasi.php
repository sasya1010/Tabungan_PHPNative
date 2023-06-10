<?php 
require 'functions.php';

if (isset($_POST["register"])){

    if(registrasi($_POST) > 0){
        echo "<script>
            alert('User Added!');
            </script>";
    }
    else {
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
    <title>Registrasi</title>
</head>
<body>

<h3>Halaman Registrasi</h3>

<form action="" method="POST">

<ul>
    <li><label for="username">Username  :  </label>
    <input type="text" name="username" id="username"></li>
    <li><label for="password">Password  :  </label>
    <input type="password" name="password" id="password"></li>
    <li><label for="password2">Confirm Password : </label>
    <input type="password" name="password2" id="password2"></li>
    <li><input type="submit" name="register" value="Add"></li>
</ul>

</form>
    
</body>
</html>