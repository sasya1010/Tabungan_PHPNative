<?php
session_start();
if(session_destroy());{
    echo "<script>
        alert('Are Your Sure Want To Log Out?');
        document.location.href='index.php';
    </script>";
}
?>