

<?php
//koneksi
require 'functions.php';
//ambil data dari ulr
$id = $_GET['id'];// pastikan bahwa GET disimpan di simpan sebelum query 
                  // dan bila GET disimpan di dalam sebuah function maka GET tidak akan berjalan
                  // hours wasted = 72+

//query
$sws = query("SELECT * FROM daftarsiswa WHERE idsiswa =$id")[0];

//cek apakahh tombol submit sudah ditekan atau belum
if( isset($_POST['submit'])){
  
  //cek apakah data berhasil di ubah atau tidak
    if(ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di ubah');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('data gagal di ubah');
                document.location.href = 'index.php';
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
    <title>Ubah Data Siswa</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="main.css?v<?= time();?>">
 <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        .container{
            width: 50%;
            max-width: 650px;
            padding: 28px;
            margin: 0 28px;
            border-radius: 10px;
            
        }
        .title{
            font-size: 26px;
            font-weight: 600;
            text-align: left;
            padding-bottom: 6px;
            color: black;
            border-bottom: solid 1px black;
         
        }
        .nisn{
            display: flex;
            flex-wrap: wrap;
            width: 60% ;
        }
        .nisn label{
            width: 95%;
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin: 5px 0;
        }
        .nama{
            display: flex;
            flex-wrap: wrap;
            width: 60%;
        }
        .nama label{
            width: 95%;
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin: 5px 0;
        }
        .kelas{
            display: flex;
            flex-wrap: wrap;
            width: 60%;
        }
        .kelas label{
            width: 95%;
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin: 5 0px;
        }
        .nisn input,.nama input,.kelas input {
            height: 40px;
            width: 95%;
            border-radius: 7px;
            outline: none;
            border: 1px solid grey;
            padding: 0 10px;
        }
        .submit input{
            margin-top: 40px;
        }
        .submit input{
            display: block;
            width: 30%;
            margin-top: 10px;
            font-size: 20px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background-color: rgba(63, 114, 76, 0.5);
            cursor: pointer;
        }
        .submit input :hover{
            background: rgba(56, 204, 93, 0.7);
            color: rgba(255, 255, 255);
        }
        @media(max-width: 600px){
        .container{
            min-width: 280px;

        }
        .nisn{
            margin-bottom: 12px;
            width: 100%;
        }
    }

 </style>
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
    <br><br>

    
<div class="container"> 
       <h1 class="title">Ubah data</h1>
            <form action="" method="POST">
                <input type="hidden" name="idsiswa" value="<?= $sws["idsiswa"];?>">
                <div class="nisn">
                        <label  for="nisn">Nisn :</label>
                        <input type="text" name="nisn" id="nisn" required
                        value="<?= $sws["nisn"];?>">
                </div>
                <div class="nama">
                        <label  for="nama">Nama :</label>
                        <input  type="text" name="nama" id="nama"required
                        value="<?= $sws["nama"];?>">
                </div>
                <div class="kelas">
                        <label  for="kelas">Kelas :</label>
                        <input type="text" name="kelas" id="kelas"required
                        value="<?= $sws["kelas"];?>">
                </div>
                <div class="submit">
                       <input type="submit" name="submit" value="submit">
                </div>
            
            </form>
</div>  
    
    <script src="main.js"></script>
</body>
</html>