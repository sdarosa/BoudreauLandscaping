<?php
require 'helper.php';

$path = 'images/portfolio/Walls';
$width = 400;
$height = 300;
$files = getAllImageNames($path);

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes

if(!isDirEmpty($path . '/thumbnails')) {    
    //delete contents on thumbnails folder
    deleteFiles($path . '/thumbnails');
} 



foreach($files as $imgName) {
    imageResize($path . '/' . $imgName, $imgName, $path . '/thumbnails/', $width, $height); 
}

$result = array(
    'filecount' => count($files),
    'filearray' => $files
);
echo json_encode($result);

?>