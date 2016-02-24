<?php
require 'helper.php';

$global_path = 'images/portfolio/';
$folder = (!empty($_POST['folderName'])) ? $_POST['folderName'] : 'Testing';
$path = $global_path . $folder;
$files = getAllImageNames($path);

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes

//if folder specified does not exist, stop execution.
if(!file_exists($path)) return;

//Before and After have a different size of thumbnail, all others have by default 400 by 300
if($folder == "Before and After") {
    $width = 600;
    $height = 450;
} else {
    $width = 400;
    $height = 300;
}

//if folder 'thumbnails' does not exist, create one.
if(!file_exists($path . '/thumbnails')) {    
    mkdir($path . '/thumbnails');    
} else {
    //if directory exists then erase all files inside it.
    if(!isDirEmpty($path . '/thumbnails')) {
        deleteFiles($path . '/thumbnails');
    }
}

$x=0;
$modifiedFiles = array();
foreach($files as $f) {
    $extensionjpg = strtolower(substr($f, -3));
    $extensionjpeg = strtolower(substr($f, -4));
    if($extensionjpg == "jpg" || $extensionjpeg == "jpeg") {
        imageFixOrientation($path . '/' . $f);
        imageResize($path . '/' . $f, $f, $path . '/thumbnails/', $width, $height);
        $x++;
        array_push($modifiedFiles, $f);
    }  
}

$result = array(
    'folderName' => $folder,
    'fileCount' => $x,
    'fileNames' => $modifiedFiles
);

echo json_encode($result);

?>