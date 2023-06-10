<?php 

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-pemasukan.xls"); 


require 'functions.php';
$pemasukan = query("SELECT * FROM pemasukan_perbulan");
?>


<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN DETAIL DATA PEMASUKAN</p>

<table border="1" cellspacing="0" cellpadding="10" align="center">
			<tr  bgcolor="a8a8a8">
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






