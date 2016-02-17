<?php require 'helper.php'; ?>
<?php include 'section-top.php';
      include 'section-header.php';
?> 
        
        <!-- page content -->
        <div id="gallery-section">
            <div class="container" ng-controller="imgController">
                <h1>ALL <spam class="red">WORK</spam></h1>                
                <div class="row"> 
                    <?php $files = getAllImageNames('images/portfolio/thumbnails');  ?>
                    <?php foreach($files as $img_path) {  ?>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="images/portfolio/<?php echo $img_path; ?>" data-toggle="lightbox" data-gallery="multiimages">
                            <img class="img-responsive" src="images/portfolio/thumbnails/<?php echo $img_path; ?>" alt="">
                        </a>
                        </div>       
                    <?php } ?>
                </div>
            </div>
        </div>
        
<?php include 'section-footer.php'; ?>   
        
 