<?php
    //good luck to undersatnds this 

    //koneksi ke database
    // pastikan nama dari database benar benar sama dan pastikan juga user adalah root
    $conn =  mysqli_connect('localhost','root','','project');


    function query($query) {
        global $conn;
        $result = mysqli_query($conn,$query);
        //logika
        // menyiapkan wadah kosong yang kemudian di isi oleh while yang menampilkan nilai dari tabel 
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row; // menambahkan elemen baru di arkhir array
        }
        return $rows;
    }
    // 
    function tambah($data){

        $nisn   = htmlspecialchars( $data['nisn']);
        $nama   = htmlspecialchars( $data['nama']);
        $kelas  = htmlspecialchars( $data['kelas']);

       global $conn;
        $query = "INSERT INTO daftarsiswa VALUES ('','$nisn','$nama','$kelas')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    // 
    function tam($data){

        $nisn  = htmlspecialchars( $data['nisn']);
        $UTS   = htmlspecialchars( $data['UTS']);
        $PAS  =  htmlspecialchars( $data['PAS']);
        $PAT  =  htmlspecialchars( $data['PAT']);

       global $conn;
        $query = "INSERT INTO 1nilai VALUES ('','$nisn','$UTS','$PAS','$PAT')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function ubah($data){
        $id     = $data["idsiswa"];
        $nisn   = htmlspecialchars( $data['nisn']);
        $nama   = htmlspecialchars( $data['nama']);
        $kelas  = htmlspecialchars( $data['kelas']);
        global $conn;
        $query = "UPDATE daftarsiswa SET 
                nisn = '$nisn',
                nama = '$nama',
                kelas ='$kelas'
                 WHERE idsiswa =$id
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function ubah2($data){
        $id    = $data["idnilai"];
        $nisn  = htmlspecialchars( $data['nisn']);
        $UTS   = htmlspecialchars( $data['UTS']);
        $PAS   = htmlspecialchars( $data['PAS']);
        $PAT   = htmlspecialchars( $data['PAT']);

       global $conn;
        $query = "UPDATE 1nilai SET 
                 nisn ='$nisn',
                 UTS  ='$UTS',
                 PAS = '$PAS',
                 PAT = '$PAT'
                 WHERE idnilai =$id
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM daftarsiswa WHERE idsiswa= $id");
        return mysqli_affected_rows($conn);
    }
    function hapus2($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM 1nilai WHERE idnilai = $id");
        return mysqli_affected_rows($conn);
    }
    function cari($keyword){
        $query = "SELECT * FROM daftarsiswa WHERE 
        nama LIKE  '$keyword%' OR 
        nisn LIKE  '$keyword%' OR
        kelas LIKE  '$keyword%' 
        ";
        return query($query);
    }   
    function cari2($keyword){
        $query = "SELECT * FROM 1nilai 
                  WHERE
                  nisn LIKE '$keyword%' OR
                  UTS  LIKE  '$keyword%' OR
                  PAS  LIKE  '$keyword%' OR
                  PAT  LIKE  '$keyword%'
                  ";
    return query($query);
    }
    function registrasi($data){
        global $conn;

        $username = strtolower (stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn,$data["password"]) ;
        $password2 = mysqli_real_escape_string($conn,$data["password2"]) ;


        //CEK USERNAME SUDAH ADA ATAU BELUM 
        $result = mysqli_query($conn, "SELECT username FROM user 
                        WHERE username = '$username' ");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('username sudah terdaftar')
                    </script>";
            return false;
        }


        //cek konfirmasi passwrd
        if( $password !== $password2 ){
            echo "<script>
                    alert('konfirmasi password tidak sesuai');
                    </script>";
                    return false;
        }
            //enkripsi password 
            $password = password_hash($password,PASSWORD_DEFAULT);
            
           //tambahkan user ke 
           mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

           return mysqli_affected_rows($conn);
    }
?>




