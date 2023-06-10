<?php
require 'functions.php';

$id = $_GET["id"];

if( delete($id) > 0){
     echo  "<script>
                alert('data deleted successfully');
                document.location.href = 'data-perbulan1.php';
            </script>
        ";
}else{
    echo  "<script>
                alert('data failed to delete');
                document.location.href = 'data-perbulan1.php';
            </script>
        ";
}
?>