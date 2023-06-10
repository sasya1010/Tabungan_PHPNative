<?php
include "koneksikomik1.php";
$sql=mysqli_query($koneksikomik1, "select * from komik where id_komik= ' $_GET[kode]'");
$data=mysqli_fetch_array($sql);
?>

<!doctype html>
<html lang="en">
  <head>
  <body>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>peminjaman komik</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
    <!--navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #02c6c6;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="komik.php">komik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="peminjam.php">peminjam</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Link
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>
   
    <h1> Tambah data komik</h1>
    <form action="" method="post">
        <table>
        <tr>
                <td width="130">Id komik</td>
                <td><input type="text" name="id_komik" value="<?php echo $data['id_komik'];?> "></td>
</tr>
            <tr>
                <td>Judul komik</td>
                <td><input type="text" name="judul_komik"value="<?php echo $data['judul_komik'];?> "></td>
</tr>
<tr>
    <td> Penulis komik</td>
    <td><input type="text" name="penulis_komik"value="<?php echo $data['penulis_komik'];?> "></td>
</tr>
    <tr>
        <td>Stok komik</td>
        <td><input type="text" name="stok_komik"value="<?php echo $data['stok_komik'];?> "></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="ubah" name="proses"></td>
</tr>
        </table>

</form>
<a href ="komik.php">kembali</a>
    <?php
include "koneksikomik1.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksikomik1,"update  komik set
    judul_komik ='$_POST[judul_komik]',
    penulis_komik ='$_POST[penulis_komik]',
    stok_komik ='$_POST[stok_komik]'
    where id_komik ='$_GET[kode]' ");

    echo "data komik telah di ubah";
    echo"<meta http-equev=refresh content=1;URL=komik.php'>"; 
}

?>

