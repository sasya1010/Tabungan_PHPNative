<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM daftarsiswa 
            WHERE 
            nama LIKE  '$keyword%' OR 
            nisn LIKE  '$keyword%' OR
            kelas LIKE  '$keyword%'
            ORDER BY nama ASC"
            ;
$siswa = query($query);





?>
<table class="table" >
    <thead>
            <tr> 
            
                <th>No.</th>
                <th>Nisn</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
                
        
    
        <?php $i = 1; ?>
        <?php foreach( $siswa as $row) :?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $i; ?></td>
            
            <td><?= $row["nisn"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["kelas"];?></td>
            <td>
                <div>
                <a href="ubah.php?id=<?=  $row["idsiswa"];?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["idsiswa"];?>" 
                onclick="return confirm('apakah yakin untuk menghapus data ini?');">hapus</a>
                </div>
        </td>
       
    
        
           
    </tr>
    <?php $i++?>
    <?php endforeach;?>

    </tbody>
</table>