<?php 
session_start();

if(empty($_SESSION)){
	header("location:login.php");
	exit;
}
?><!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
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
        		<li class="nav-item"><a class="nav-link" href="data-perbulan1.php">Data Perbulan</a></li>
         		<li class="nav-item"><a class="nav-link" href="data-rincian1.php">Rincian Pemasukan</a></li>
          			</ul>
        		</li>
      		</ul>

      <!--LOGIN-->
      		<form class="d-flex">
			  <button class="btn btn-outline-success" type="submit"><a href="logout.php">Logout</a></button>';

      		</form>
    	</div>
  	</div>
	</nav>


	<!--POINT-->
	<div class="text-image" style="display: flex; align-items: center; margin: 75px 170px 0px 0px; ">
		 <div class="teks"  style="text-align: right;">
		 	<h1>Menabung</h1>
  			<blockquote class="blockquote">
    		<p>"Filosofi orang kaya dan miskin adalah bahwa orang kaya menginvestasikan uang dan menghabiskan sisanya, sementara orang miskin akan menghabiskan uang dan menginvestasikan sisanya."</p>
  			</blockquote>
  			<figcaption class="blockquote-footer">Robert T. Kiyosaki.</figcaption>
		</div>

		<div class="gambar"><img src="img/logo-tabungan.png" ></div>
		
	</div>


</body>
</html>