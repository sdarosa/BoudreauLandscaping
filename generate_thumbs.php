<?php
require 'helper.php';

$folder = (!empty($_POST['folderName'])) ? $_POST['folderName'] : 'Testing';
$width = (!empty($_POST['thumbWidth'])) ? $_POST['thumbWidth'] : 400;
$height = (!empty($_POST['thumbHeight'])) ? $_POST['thumbHeight'] : 300;
$global_path = 'images/portfolio/';
$path = $global_path . $folder;
$files = getAllImageNames($path);

//Before and After have a different size of thumbnail, all others have by default 400 by 300
if($folder == "Before and After") {
    $width = 600;
    $height = 450;
}

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes

//if folder specified does not exist, stop execution.
if(!file_exists($path)) return;

//if folder 'thumbnails' does not exist, create one.
if(!file_exists($path . '/thumbnails')) {    
    mkdir($path . '/thumbnails');    
}
//create new thumbnails
$x = 0;
$newFiles = array();
foreach($files as $imgName) {
    if(!file_exists($path . '/thumbnails/' . $imgName)) {
        imageResize($path . '/' . $imgName, $imgName, $path . '/thumbnails/', $width, $height);
        array_push($newFiles, $imgName);
        $x++;
    }    
}

$result = array(
    'folderName' => $folder,
    'fileCount' => $x,
    'fileNames' => $newFiles
);
echo json_encode($result);

?>