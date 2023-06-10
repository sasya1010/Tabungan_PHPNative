<?php
require 'functions.php';

$id = $_GET["id"];

if( delete2($id) > 0){
     echo  "<script>
                alert('data deleted successfully');
                document.location.href = 'data-rincian1.php';
            </script>
        ";
}else{
    echo  "<script>
                alert('data failed to delete');
                document.location.href = 'data-rincian1.php';
            </script>
        ";
}
?>