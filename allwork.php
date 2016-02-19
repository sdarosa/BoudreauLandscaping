<?php 
      require_once 'Paginator.php';
      include 'section-top.php';
      include 'section-header.php';
      
      //setup the paginator
      $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 20;
      $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
      $links = (isset($_GET['links'])) ? $_GET['links'] : 3; 
      $path = ('images/portfolio/all');
      $Paginator = new Paginator($path);
      $result = $Paginator->getData($limit, $page);
?> 
        
        <!-- page content -->
        <div id="gallery-section">
            <div class="container" ng-controller="imgController">
                <h1>ALL <span class="red">WORK</span></h1>                
                <div class="row">
                    <?php for($i=0; $i< count($result->data); $i++) { ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="<?php echo $path. '/' . $result->data[$i] ?>" data-toggle="lightbox" data-gallery="multiimages">
                            <img class="img-responsive" src="<?php echo $path . '/thumbnails/' . $result->data[$i] ?>" alt="">
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <?php echo $Paginator->createLinks($links, 'pagination'); ?>
            </div>
        </div>
        
        
        
<?php include 'section-footer.php'; ?>   
        
 