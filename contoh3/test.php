<?php

header('Content-Type : application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment;filename="Data Siswa.docx"');
header('Cache-Control: max-age=0');

require 'vendor/autoload.php';
include_once('siswa.php');
$htmlContent = ob_get_clean();

$doc = new DOMDocument();
$doc->loadHTML($htmlContent);
$containerTable = $doc->getElementById('table-wrap');
$containerTable->setAttribute('style','text-align: center');
$doc->getElementById('table-siswa')
    ->setAttribute('border','1');

$resultContainer =$doc->saveHTML($containerTable);

echo $resultContainer;
