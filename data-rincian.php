<?php 
require 'functions.php';
$query = "SELECT * FROM  pemasukan_rincian";
$pemasukan = query($query);
?>


<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rincian Data</title>
</head>
<body>
	<!--HEADER-->
	<p></p>
	<h1 style="text-align: center; font-family: corbel;"><img src="img/logo-koin.png" width="40"><b>Tabungan </b></h1>

	<!--NAVBAR-->
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    	<a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
   			</button>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
        		<li class="nav-item"><a class="nav-link" href="data-perbulan.php">Data Perbulan</a></li>
         		<li class="nav-item"><a class="nav-link" href="data-rincian.php">Rincian Pemasukan</a></li>
      		</ul>
      <!--LOGIN-->
      		<form class="d-flex">
        	<button class="btn btn-outline-success" type="submit"><a href="login.php">Login</a></button>
      		</form>
    	</div>
  	</div>
	</nav>

	<!--POINT-->
	<p> </p>
	<h3 style="text-align: left;">Rincian</h3>
	<div class="table">
		<table border="1" cellspacing="0" cellpadding="10">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Bulan</th>
				<th>Minggu</th>
				<th>Nominal</th>
			</tr>
			<?php $i = 1; ?>
         	<?php foreach( $pemasukan as $row) :?>
			</tr>
			<tr>
            	<td><?= $i; ?></td>
            	<td><?= $row["nama"];?></td>
            	<td><?= $row["bulan"];?></td>
				<td><?= $row["minggu"];?></td>
				<td><?= $row["nominal"];?></td>
       		</tr>
			<?php $i++?>
    		<?php endforeach;?>
		</table>
</body>
</html>