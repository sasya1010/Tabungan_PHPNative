<?php

$koneksikomik1 = mysqli_connect("localhost","root","","peminjaman_komik");
//check connection
if (mysqli_connect_errno()){
    echo "konesi database gagal : ".mysqli_connect_error();
}
?>