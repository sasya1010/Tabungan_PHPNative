<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<>h1>Hello Mom!</h1>');

$dompdf->stream("playerofcode",array("Attcahment"=>0));
?> 

