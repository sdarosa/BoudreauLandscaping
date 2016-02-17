<?php
require 'helper.php';

$files = getAllImageNames('images/portfolio');

//extend the maximum execution time
ini_set('max_execution_time', 300); //5 minutes

if(!isDirEmpty('images/portfolio/thumbnails')) {    
    //delete contents on thumbnails folder
    deleteFiles('images/portfolio/thumbnails');
} 

//$x = 0;

foreach($files as $imgName) {
    imageResize('images/portfolio/' . $imgName, $imgName, 'images/portfolio/thumbnails/'); 
//    $x++;
//    if($x == 40) break;
}

$result = array(
    'filecount' => count($files),
    'filearray' => $files
);
echo json_encode($result);

?>