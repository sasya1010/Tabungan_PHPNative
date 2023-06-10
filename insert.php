<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert</title>
</head>
<body  style="background-image: url(img/bg.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;">
	<!--HEADER-->
	<p></p>
	<h1 style="text-align: center; font-family: corbel;"><img src="img/logo-koin.png" width="40"><b>Tabungan</b></h1>

	<!--NAVBAR-->
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
        		<li class="nav-item"><a class="nav-link" href="data-perbulan.php">Data Perbulan</a></li>
         		<li class="nav-item"><a class="nav-link" href="data-rincian.php">Rincian Pemasukan</a></li>
        		<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Export</a>
          			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="data-perbulan.php">Data Perbulan</a></li>
            			<li><a class="dropdown-item" href="data-rincian.php">Data Rincian</a></li>
          			</ul>
        		</li>
      		</ul>

      <!--LOGIN-->
      		<form class="d-flex">
        	<button class="btn btn-outline-success" type="submit">Login</button>
      		</form>
    	</div>
  	</div>
	</nav>


	<h3>Tambahkan Data Pemasukan</h3>
		<a href= "data-perbulan1.php">Kembali</a>
			<form action="" method="post">
    	<table>
        <tr>
            <td> Bulan </td>
            <td> <input type="text" name="bulan"> </td>
        </tr>
        <tr>
            <td> Jumlah Pemasukan </td>
            <td> <input type="text" name="jumlah_pemasukan"> </td>
        </tr>
        <tr> 
            <td></td>
            <td><input type="submit" value= "simpan" name= "proses"></td>
        </tr>
</table>
</form>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'tabungan');

if(isset($_POST['proses'])){
    mysqli_query($conn, "insert into pemasukan_perbulan set 
    bulan = '$_POST[bulan]',
    jumlah_pemasukan= '$_POST[jumlah_pemasukan]'");

    echo "Data Baru telah di simpan !";
}

?>

</body>
</html>