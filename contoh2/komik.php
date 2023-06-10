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
          <form class="d-flex"> 
          <button type="button" class="btn btn-outline-primary">login</button>
          <button type="button" class="btn btn-outline-primary">logout</button>
          </form>
        </div>
      </div>
    </nav>

   <h1 align=  "center">Daftar komik</h1>
  <a href="tambahdatakomik1.php">TAMBAH DATA </a>
   <br></br>
   <!--tabel-->
   <table border="1" cellpadding="10" cellspacling="0">
    <tr align ="center" bgcolor="02c6c6">
        <th>No.</th>
        <th>id_komik</th>
        <th>judul_komik</th>
        <th>penulis_komik</th>
        <th>stok_komik</th>
        <th colspan="2">aksi</th>
    </tr>
    <?php 
    include "koneksikomik1.php";
    $no=1;
    $ambildata = mysqli_query($koneksikomik1,"select * from komik");
    while ($tampil = mysqli_fetch_array($ambildata)){
      echo"
      <tr>
      <td>$no</td>
      <td>$tampil[id_komik]</td>
      <td>$tampil[judul_komik]</td>
      <td>$tampil[penulis_komik]</td>
      <td>$tampil[stok_komik]</td>
      <td><a href='?kode=$tampil[id_komik]'>hapus</a></td>
      <td><a href='komikubah.php?kode=$tampil[id_komik]'> ubah </a></td>
      </tr>";
      $no++;
    }
    ?>

</table>
</body>
</html>
<?php
if(isset($_GET['kode'])){

 mysqli_query($koneksikomik1,"delete from komik where id_komik='$_GET[kode]'");
 echo "data telah terhapus";
 echo"<meta http-equev=refresh content=2;URL=komik.php'>"; 
}
?>
