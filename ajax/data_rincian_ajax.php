<?php 
require '../functions.php';

$keyword = $_GET["keyword"];

$query =  "SELECT * FROM pemasukan_rincian
	WHERE
	nama LIKE '%$keyword%' OR
	bulan LIKE '%$keyword%' OR
	minggu LIKE '%$keyword%' OR
	nominal LIKE '%$keyword%'
        ";
$idk = query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
</head>
<body>
<table border="1" cellspacing="0" cellpadding="10">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Bulan</th>
				<th>Minggu</th>
				<th>Nominal</th>
				<th>Change</th>
				<th>Delete</th>
			</tr>
			<?php $i = 1; ?>
         	<?php foreach( $idk as $row) :?>
			</tr>
			<tr>
            	<td><?= $i; ?></td>
            	<td><?= $row["nama"];?></td>
            	<td><?= $row["bulan"];?></td>
				<td><?= $row["minggu"];?></td>
				<td><?= $row["nominal"];?></td>
            	<td>
                	<div>
                	<a href="change2.php?id=<?=  $row["id"];?>">Change</a> |
                	<a href="delete2.php?id=<?= $row["id"];?>" 
                	onclick="return confirm('Are you sure want to delete this data?');">Delete</a>
                	</div>
        		</td>
       		</tr>
			<?php $i++?>
    		<?php endforeach;?>
		</table>
		</body>
</html>