<?php
require_once './Paginator.php';

//setup the paginator
$action = (isset($_GET['action'])) ? basename($_GET['action']) : 'bef_after.php';
$limit = (isset($_GET['limit'])) ? $_GET['limit'] : 20;
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$links = (isset($_GET['links'])) ? $_GET['links'] : 5; 
$path = ('./images/portfolio/Before and After');
$Paginator = new Paginator($path);
$result = $Paginator->getData($limit, $page);
?>
<!-- page content -->
<div id="gallery-section">
    <div class="container" ng-controller="imgController">
        <h1><span class="red">BEFORE</span> AND <span class="red">AFTER</span></h1>                
        <div class="row">
            <?php for($i= 0; $i < count($result->data); $i++) { 
                $after = "after";
                $before = "before";
                $has_before = strpos($result->data[$i], $before); 
                $after_name = str_replace($before, $after, $result->data[$i]);                               
                if($has_before) {
            ?>            
                    <div class="col-md-6">
                        <a class="thumbnail" href="<?php echo $path. '/' . $result->data[$i] ?>" data-toggle="lightbox" data-gallery="multiimages">
                            <img class="img-responsive" src="<?php echo $path . '/thumbnails/' . $result->data[$i] ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="thumbnail" href="<?php echo $path. '/' . $after_name ?>" data-toggle="lightbox" data-gallery="multiimages">
                            <img class="img-responsive" src="<?php echo $path . '/thumbnails/' . $after_name ?>" alt="">
                        </a>
                    </div>
            <?php }} ?>
        </div>
        <?php echo $Paginator->createLinks($links, 'pagination', $action); ?>
    </div>
</div>