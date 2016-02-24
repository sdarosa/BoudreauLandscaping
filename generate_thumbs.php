<?php
require 'helper.php';

$global_path = 'images/portfolio/';
$folder = isset($_POST['folderName']) ? $_POST['folderName'] : 'Testing';
$path = $global_path . $folder;
$width = 400;
$height = 300;
$files = getAllImageNames($path);

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes

if(!file_exists($path . '/thumbnails')) {
    echo "directory thumbnails doesn't exist";
    mkdir($path . '/thumbnails');
    if(file_exists($path . '/thumbnails')) {
        echo "directory created successfully.";
    }
}

foreach($files as $imgName) {
    if(!file_exists($path . '/thumbnails/' . $imgName)) {
        imageResize($path . '/' . $imgName, $imgName, $path . '/thumbnails/', $width, $height); 
    }    
}

$result = array(
    'filecount' => count($files),
    'filearray' => $files
);
echo json_encode($result);

?>