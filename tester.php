<?php 
include 'helper.php';

$directories = getImageDirectories("images/portfolio");

foreach($directories as $d) {
    if($d != "Before and After") {
        echo $d . "<br/>";
    }
    
}