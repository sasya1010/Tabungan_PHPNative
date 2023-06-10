<?php
$conn =  mysqli_connect('localhost','root','','tabungan');
    function query($query) {
        global $conn;
        $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; 
    }
     return $rows;
    }
    function delete($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM pemasukan_perbulan WHERE id_bulan= $id");
        return mysqli_affected_rows($conn);
    }
    function delete2($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM pemasukan_rincian WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    function change($id){
        $ide     = $id["id_bulan"];
        $bulan  = htmlspecialchars( $id['bulan']);
        $jumlah_pemasukan   = htmlspecialchars( $id['jumlah_pemasukan']);
        global $conn;
        $query = "UPDATE pemasukan_perbulan SET 
                bulan = '$bulan',
                jumlah_pemasukan = '$jumlah_pemasukan'
                 WHERE id_bulan =$ide
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function change2($id){
        $ide     = $id["id"];
        $nama  = htmlspecialchars( $id['nama']);
        $bulan  = htmlspecialchars( $id['bulan']);
        $minggu  = htmlspecialchars( $id['minggu']);
        $nominal   = htmlspecialchars( $id['nominal']);
        
        global $conn;
        $query = "UPDATE pemasukan_rincian SET 
                nama = '$nama',
                bulan = '$bulan',
                minggu = '$minggu',
                nominal = '$nominal'
                 WHERE id =$ide
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function registrasi($id){
        global $conn;
        $username = strtolower (stripslashes($id["username"]));
        $password = mysqli_real_escape_string ($conn, $id["password"]);
        $password2 = mysqli_real_escape_string ($conn, $id["password2"]);

        if ($password!==$password2){
            echo "<script>
                alert('Confirm password does not match!');
                document.location.href='registrasi.php';
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        
        if (mysqli_fetch_assoc($result)){
            echo "<script> 
                alert('Username already Used!');
            </script>";
            return false;
        }

        mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
    function search($keyword){
        $query = "SELECT * FROM pemasukan_rincian
            WHERE
            nama LIKE '%$keyword%' OR
            bulan LIKE '%$keyword%' OR
            minggu LIKE '%$keyword%' OR
            nominal LIKE '%$keyword%'
            ";
        return query($query);
    }
    function search2($keyword){
        $query = "SELECT * FROM pemasukan_perbulan
            WHERE
            bulan LIKE '%$keyword%' OR
            jumlah_pemasukan LIKE '%$keyword%'";
        return query($query);
    }
?>