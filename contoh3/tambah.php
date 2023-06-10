<?php
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
//koneksi

require 'functions.php';
//cek apakahh tombol submit sudah ditekan atau belum
if( isset($_POST['submit'])){
   
    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'siswa.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'siswa.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="main.css?v=<?= time();?>">

<body>




<header>
 <nav>
    <h1>Daftar Nilai</h1>
        
        <div class="menu">
            <a  class="is-active" href="index.php">HOME</a>
            <a href="siswa.php">SISWA</a>
            <a href="nilai.php">NILAI</a>
            <a href="logout.php">LOGOUT</a>
        </div>
        <button class="hamburger">
            <span class="material-icons">menu</span>
        </button>
 </nav>
    <div class="mobile-menu">
        <a  class="is-active" href="index.php">HOME</a>
        <a href="siswa.php">SISWA</a>
        <a href="nilai.php">NILAI</a>
        <a href="logout.php">LOGOUT</a>
    </div>
</header>
<style>
    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;

    }
    body h1{
        text-align: center;
        padding: 11px 10px;

    }
    label{
        color: #fff;
    }
    .tambah{
        padding: 40px;
        width: 460px;
        height: 400px;
        position: absolute;
        background: #19191993  ;
        border-radius: 16px;
        top: 30%;
        left: 33%;
        text-align: center;
    }
    .tambah input[type = "text"]{
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        border: 2px solid #009789;
        outline: none;
        padding: 10px 8px;
        color: #fff;
        border-radius: 12px;
        transition: 0.55s;
    }
    .tambah input[type ="text"]:focus{
        width: 250px;
        border-color: cyan;
    }
    .tambah button{
        border: none;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #009789;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
    }
    .tambah button:hover{
        background: #009789;
    }
</style>

        <h1>Tambah data</h1>

        <form class="tambah" action="" method="POST">
            
                    <label for="nisn">Nisn :</label>
                    <input type="text" name="nisn" id="nisn" required>
               
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama"required>
          
                    <label for="kelas">Kelas :</label>
                    <input type="text" name="kelas" id="kelas"required>
                
                    <button type="submit" name="submit">Submit</button>
            

        </form>
    <script src="main.js"></script>
</body>
</html>