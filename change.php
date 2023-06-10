<?php
require 'functions.php';
$id = $_GET['id'];
$pk = query("SELECT * FROM pemasukan_perbulan WHERE id_bulan =$id")[0];

if( isset($_POST['submit'])){
    if(change($_POST) > 0) {
        echo "
            <script>
                alert('data changed successfully');
                document.location.href = 'data-perbulan1.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('data failed to change!');
                document.location.href = 'data-perbulan1.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Data</title>
 
<body>
<!--HEADER-->
<p></p>
	<h1 style="text-align: center; font-family: corbel;"><img src="img/logo-koin.png" width="40"> <b>Tabungan</b></h1>

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

<div class="container"> 
       <h3 class="title">Change Data</h3>
            <form action="" method="POST">
                <input type="hidden" name="id_bulan" value="<?= $pk["id_bulan"];?>">
        
                        <label  for="bulan">Bulan : </label>
                        <input type="text" name="bulan" id="bulan" required
                        value="<?= $pk["bulan"];?>">

                        <label  for="jumlah_pemasukan">Jumlah Pemasukan :</label>
                        <input  type="text" name="jumlah_pemasukan" id="jumlah_pemasukan"required
                        value="<?= $pk["jumlah_pemasukan"];?>">
                
                <div class="submit">
                       <input type="submit" name="submit" value="submit">
                </div>
            
            </form>
</div>  
</body>
</html>