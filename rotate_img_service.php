<?php
require 'helper.php';

$files = getAllImageNames('images/portfolio');

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes
$x=0;
foreach($files as $f) {
    $extensionjpg = strtolower(substr($f, -3));
    $extensionjpeg = strtolower(substr($f, -4));
    if($extensionjpg == "jpg" || $extensionjpeg == "jpeg") {
        imageFixOrientation("images/portfolio/" . $f);
    }    
    $x++;       
}

$result = array(
    "fileCount" => $x,
    "fileArray" => $files
);

echo json_encode($result);