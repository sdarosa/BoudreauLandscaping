<?php

function getAllImageNames($path) {
    //'images/portfolio/thumbnails'
    $directory = $path;
    $files =  scandir($directory);

    for($x=0; $x < count($files); $x++) {
        $file_extension = strtolower(substr($files[$x], -3));
        if(($file_extension !== 'jpg') && ($file_extension !== 'png') && ($file_extension !== 'gif')) {    
            unset($files[$x]);              
        }
    }   
    $files = array_values($files); //normalize the array (delete the indexes that have no values)
    return $files;
}

function imageResize($image, $new_filename, $dest_path) {      
    //check if gd extension is loaded
    if(!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error('gd is not loaded', E_USER_WARNING);
        return false;
    }
    //get image size info
    list($width_orig, $height_orig, $image_type) = getimagesize($image);
    switch($image_type) {
        case 1:
            $im = imagecreatefromgif($image);
            break;
        case 2:
            $im = imagecreatefromjpeg($image);
            break;
        case 3:
            $im = imagecreatefrompng($image);
            break;
        default:
            trigger_error('unsupported filetype: ', E_USER_WARNING);
            break;            
    }
    
    $width = 400;
    $height = 300;
    $ratio_orig = $width_orig / $height_orig;
    if ($width/$height > $ratio_orig) {
       $width = $height*$ratio_orig;
    } else {
       $height = $width/$ratio_orig;
    }  
   
    $new_image = imagecreatetruecolor(400, 300);
    imagecopyresampled($new_image, $im, 0, 0, 0, 0, 400, 300, $width_orig, $height_orig); 
    
    //generate new file, and rename it to $new_filename
    switch($image_type) {
        case 1:
            imagegif($new_image, $dest_path . $new_filename);
            break;
        case 2:
            imagejpeg($new_image, $dest_path . $new_filename);
            break;
        case 3:
            imagepng($new_image, $dest_path . $new_filename);
            break;
        default:
            trigger_error('Failed to resize image', E_USER_WARNING);
            break;
    }  
    imagedestroy($im);
}

function deleteFiles($folderPath) {
    $oldfiles = glob($folderPath . '/*'); //get all the file names
    foreach($oldfiles as $f) {
        if(is_file($f)) {
            unlink($f); //delete file
        }
    }
}

function isDirEmpty($dir) {
    if(!is_readable($dir)) return null;
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
        return false;
        }
    }
    return true;
}

function imageFixOrientation($path) {
    //get image size info
    list($width_orig, $height_orig, $image_type) = getimagesize($path);
    switch($image_type) {
        case 1:
            $im = imagecreatefromgif($path);
            break;
        case 2:
            $im = imagecreatefromjpeg($path);
            break;
        case 3:
            $im = imagecreatefrompng($path);
            break;
        default:
            trigger_error('unsupported filetype: ', E_USER_WARNING);
            break;         
    }    
    
    $exif = exif_read_data($path);

    
    if(!empty($exif['Orientation'])) {
        switch($exif['Orientation']) {
            case 3:
                $im = imagerotate($im, 180, 0);
                break;
            case 6:
                $im = imagerotate($im, -90, 0);
                break;
            case 8:
                $im = imagerotate($im, 90, 0);
                break;
            default:
                return;
        }
        
        //generate new file, and rename it to $new_filename
        switch($image_type) {
            case 1:
                imagegif($im, $path);
                break;
            case 2:
                imagejpeg($im, $path);
                break;
            case 3:
                imagepng($im, $path);
                break;
            default:
                trigger_error('Failed to resize image', E_USER_WARNING);                
        }          
    } else {
        return;
    }

}



