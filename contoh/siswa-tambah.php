<h3>Tambah Data</h3>
<a href= "siswa.php">Lihat Semua Data</a>
<form action="" method="post">
    <table>
        <tr>
            <td> No </td>
            <td><input type ="text" name="no"></td>
        </tr>
        <tr>
            <td> NISN </td>
            <td> <input type="text" name="nisn"> </td>
        </tr>
        <tr>
            <td> Nama Siswa </td>
            <td> <input type="text" name="nama_siswa"> </td>
        </tr>
        <tr>
            <td> Jenis Kelamin </td>
            <td> <input type="text" name="jk"> </td>
        </tr>
        <tr> 
            <td></td>
            <td><input type="submit" value= "simpan" name= "proses"></td>
        </tr>
</table>
</form>

<?php
include "koneksi.php";
if(isset($_POST['proses'])){
    mysqli_query($koneksi, "insert into namasiswa set 
    no= '$_POST[no]',
    nisn = '$_POST[nisn]',
    nama_siswa= '$_POST[nama_siswa]',
    jk = '$_POST[jk]'");

    echo "Data Baru telah di simpan !";
}

?>


