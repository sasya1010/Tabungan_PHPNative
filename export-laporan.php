<?php 

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-pemasukan.xls"); 


require 'functions.php';
$pemasukan = query("SELECT * FROM pemasukan_perbulan");
?>


<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN PEMASUKAN</p>

<table border="1" cellspacing="0" cellpadding="10" align="center">
			<tr bgcolor="a8a8a8">
				<th>No</th>
				<th>Bulan</th>
				<th>Jumlah Pemasukan</th>
			<?php $i = 1; ?>
         	<?php foreach( $pemasukan as $row) :?>
			</tr>
			<tr>
            	<td><?= $i; ?></td>
            	<td><?= $row["bulan"];?></td>
            	<td><?= $row["jumlah_pemasukan"];?></td>
       		</tr>
			<?php $i++?>
    		<?php endforeach;?>
		</table>






