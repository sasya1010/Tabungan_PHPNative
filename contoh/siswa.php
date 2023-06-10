<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAS XI RPL</title>
    <style type="text/css">
        ul{
            list-style-type: none;
            margin : 0px;
            padding: 0px
            ;
            overflow: hidden;
        }

        li{
            float: left;
        }
        li a{
            display: block;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }
    </style>
</head>
<body bgcolor= "BCCEF8">
<h2 style="text-align: center ; margin-bottom:30px; font-size: 33px; font-family: Times New Roman ;"><br>KAS KELAS XI RPL </h2>
    <nav class=a>
<ul>
    <li><a href = "index.php">&ensp; &ensp; Home </a></li>
    <li><a href = "siswa.php">&ensp; &ensp;Data Siswa </a></li>
    <li><a href = "pembayaran.php">&ensp; &ensp;Pembayaran </a></li>
        </ul>
        </nav>
 
        <style>
            .a {
                background-color : #98A8F8;
                font-size : 25px;
                
            }
        </style>
        
        <br>
       
        
    <br>
     <table border="1" cellpadding="8" cellspacling="5" >
        <div class="th">

        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th colspan="2"> Aksi</th>
            
        </tr>
</div>

<style>
    .th {
        font-size = 22px;
    }
    </style>
 
 <a href="siswa-tambah.php" style="font-size: 20px">Tambah Data</a>
 <br><br>
 

        <?php
        
        include "koneksi.php";
        $ambildata = mysqli_query($koneksi, "select * from namasiswa");
        while($tampil = mysqli_fetch_array($ambildata)){
            echo "
            <tr>
            <td>$tampil[no]</td>
            <td>$tampil[nisn]</td>
            <td>$tampil[nama_siswa]</td>
            <td>$tampil[jk]</td>
            <td><a href= 'dataubah.php?ds=$tampil[no]'>Edit </a></td>
            <td><a href='?ds=$tampil[no]'>Delete </a></td>
            </tr>";        
        }

        ?>
</table>

<?php
if (isset($_GET['ds'])){
    mysqli_query($koneksi, "DELETE FROM namasiswa WHERE no='$_GET[ds]'");

    echo "Data telah terhapus";
    echo "<meta http-equiv=refresh content=2;URL='siswa.php'>";
}

?>
    </body>
    </html>