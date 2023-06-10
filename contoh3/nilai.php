<?php

require '../functions.php';

$keyword = $_GET["keyword"];


$query = "SELECT * FROM 1nilai 
            WHERE
            nisn LIKE '$keyword%' OR
            UTS  LIKE  '$keyword%' OR
            PAS  LIKE  '$keyword%' OR
            PAT  LIKE  '$keyword%'
            ORDER BY idnilai ASC
";
$siswa = query($query);
?>
<table class="table">
<thead>
    <tr>

        <th>No. </th>
        <th>NISN</th>
        <th>Nama</th>
        <th>UTS</th>
        <th>PAS</th>
        <th>PAT</th>
        <th>Aksi</th>
        
    
   
    <?php $i = 1; ?>
    <!-- Sebagai perulangan untuk memanggil data didalam tabel -->
    <!-- Pastikan bahwa tidak ada kata yang typo/salah 
        hours wasted = 2+ -->
    <?php foreach( $siswa as $row) :?>
    </tr>
</thead>
<tbody>
    <tr>
        <td><?= $i; ?></td>
        
<!-- Pastikan bahwa isi dari arraynya sesuai dengan field di table
    hours wasted = 1+ -->
        <td><?= $row["nisn"];?></td>
        <td><?= @$row["nama"];?></td>
        <td><?= $row["UTS"];?></td>
        <td><?= $row["PAS"]?></td>
        <td><?= $row["PAT"];?></td>
        <td>
             <a href="ubah2.php?id=<?= $row['idnilai']?>">ubah</a> |
             <a href="hapus2.php?id=<?= $row["idnilai"];?>" 

             onclick="return confirm('apakah yakin untuk menghapus data ini?');">hapus</a>
       </td>

        
           
    </tr>
    <?php $i++?>
    <?php endforeach;?>
    <!--  -->
</tbody>

</table>