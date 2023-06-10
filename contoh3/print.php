<?php

use Dompdf\Dompdf;

require 'vendor/autoload.php';

require 'functions.php';
$siswa = query("SELECT * FROM daftarsiswa  ORDER BY nama ASC");

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <table border ="1" cellpadding="10" cellsapcing="0">
    <thead>
            <tr> 
            
                <th>No.</th>
                <th>Nisn</th>
                <th>Nama</th>
                <th>Kelas</th>
            
            </tr>';
            $i = 1;
            foreach( $siswa as $row) {
                $html .= '<tr>
                                <td>'. $i++ .'</td>
                                <td>'. $row["nisn"].'</td>
                                <td>'. $row["nama"].'</td>
                                <td>'. $row["kelas"].'</td>
                                </tr>' ;
            }
                
 $html.=' </table>
</body>
</html>';


$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream('DaftarSiswa.pdf');







