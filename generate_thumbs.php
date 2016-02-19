<?php
require 'helper.php';

$path = 'images/portfolio/patios_walkways';
$files = getAllImageNames($path);

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes

if(!isDirEmpty($path . '/thumbnails')) {    
    //delete contents on thumbnails folder
    deleteFiles($path . '/thumbnails');
} 

//$x = 0;

foreach($files as $imgName) {
    imageResize($path . '/' . $imgName, $imgName, $path . '/thumbnails/'); 
//    $x++;
//    if($x == 40) break;
}

$result = array(
    'filecount' => count($files),
    'filearray' => $files
);
echo json_encode($result);

?>