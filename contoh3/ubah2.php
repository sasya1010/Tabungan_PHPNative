


<?php
//koneksi
require 'functions.php';
//ambil data dari url

$id = $_GET['id'];
//query
$nilai = query("SELECT * FROM 1nilai WHERE idnilai =$id")[0];
//cek apakahh tombol submit sudah ditekan atau belum
if( isset($_POST['submit'])){

    //cek apakah data berhasil di ubah atau tidak
    if(ubah2($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di ubah');
                document.location.href = 'nilai.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('data gagal di ubah');
                document.location.href = 'nilai.php';
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
        .uts{
            display: flex;
            flex-wrap: wrap;
            width: 60% ;
        }
        .uts label{
            width: 95%;
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin: 5px 0;
        }
        .pas{
            display: flex;
            flex-wrap: wrap;
            width: 60%;
        }
        .pas label{
            width: 95%;
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin: 5px 0;
        }
        .pat{
            display: flex;
            flex-wrap: wrap;
            width: 60%;
        }
        .pat label{
            width: 95%;
            color: black;
            font-size: 20px;
            font-weight: 400;
            margin: 5 0px;
        }
        .uts input,.pas input,.pat input {
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
            width: 40%;
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
</head>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="main.css?v<?= time()?>">
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
    <div class="title">
    <h2>Ubah data</h2>
    </div>
        <form action="" method="POST">
            <input type="hidden" name="idnilai" value="<?php echo $nilai["idnilai"]?>">
            
                    <input type="hidden" name="nisn" id="nisn" required
                    value="<?php echo $nilai["nisn"];?>">
                <div class="uts">
                    <label for="UTS">UTS :</label>
                    <input type="text" name="UTS" id="UTS"required
                    value="<?php echo $nilai["UTS"];?>">
              </div>
              <div class="pas">
                    <label for="PAS">PAS :</label>
                    <input type="text" name="PAS" id="PAS"required
                    value="<?php echo $nilai["PAS"];?>">
              </div>
              <div class="pat">
                    <label for="PAT">PAT :</label>
                    <input type="text" name="PAT" id="PAT"required
                    value="<?php echo $nilai["PAT"];?>">
             </div>
             <div class="submit">
                    <input type="submit" name="submit" value="submit">
            </div>
</div>              

        </form>
    <script src="main.js"></script>
</body>
</html>