<?php include('section-top.php');

      $action = (isset($_GET['action'])) ? basename($_GET['action']) : 'index.php';

      include('section-header.php');
      
      include('templates/' . $action);
      
      include('section-footer.php');
 
 ?>