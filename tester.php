<?php

require 'Paginator.php';
include 'section-top.php';

$Paginator = new Paginator('images/portfolio');
$Paginator->getData();
?>

<body>

<?php 

echo $Paginator->createLinks(3, 'pagination');

?>

</body>
</html>
