<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert 2</title>
</head>
<body>

	<h3>Tambahkan Data Rincian</h3>
		<a href= "data-rincian1.php">Kembali</a>
			<form action="" method="post">
    	<table>
        <tr>
            <td> Nama </td>
            <td> <input type="text" name="nama"> </td>
        </tr>
        <tr>
            <td> Bulan </td>
            <td> <input type="text" name="bulan"> </td>
        </tr>
        <tr>
            <td> Minggu </td>
            <td> <input type="text" name="minggu"> </td>
        </tr>
        <tr>
            <td> Nominal </td>
            <td> <input type="text" name="nominal"> </td>
        </tr>
        <tr> 
            <td></td>
            <td><input type="submit" value= "simpan" name= "proses"></td>
        </tr>
</table>
</form>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'tabungan');

if(isset($_POST['proses'])){
    mysqli_query($conn, "insert into pemasukan_rincian set
    nama = '$_POST[nama]',
    bulan = '$_POST[bulan]',
    minggu = '$_POST[minggu]',
    nominal= '$_POST[nominal]'");

    echo "Data Baru telah di simpan !";
}

?>


</body>
</html>