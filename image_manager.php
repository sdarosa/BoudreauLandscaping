<?php include 'section-top.php'; ?>
<?php require 'helper.php'; ?>
<?php
    //imageResize('images/portfolio/009.jpg', 400, '009_thumb.jpg');

?>
<body>
    <div class="container text-center">
        <h1>Image Manager</h1>  
        <hr/>
        <p>Rotates images whose orientation is not correct.</p>
        <button type="button" id="imageorientationcorrector" class="btn btn-default" data-loading-text="Loading..." autocomplete="off">
            Correct Image Orientation
        </button><br/>
        <div id="imageorientationalert" class="alert" role="alert">
            <p class="imageorientationresult"></p>
        </div>
        <hr/>
        <p>Generate thumbnails based on the existing images</p>
        <p>Note: The global folder is 'images/portfolio/' You just need to specify its subfolder (i.e. 'Before and After')</p>
        <input type="text" id="thumbnailpath" placeholder="Testing">
        <button type="button" id="thumbgenerator" class="btn btn-default" value="Generate Thumbnails" data-loading-text="Loading..." autocomplete="off">
            Generate Thumbnails
        </button><br/>
        <div id="alertsection" class="alert" role="alert"> 
            <p class="result"></p>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#thumbgenerator').click(function() {
                var $btn = $(this).button('loading');     
                var $folderName = $('#thumbnailpath').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'generate_thumbs.php',
                    data: {
                        folderName : $folderName
                    },
                    success: function(data) {    
                        $('#alertsection').removeClass('alert-danger');
                        $('#alertsection').addClass('alert-success');
                        $('.result').text('Successfully created ' + data.filecount + ' thumbnails');
                        $btn.button('reset');
                    },
                    error: function(err) {
                        $('#alertsection').removeClass('alert-success');
                        $('#alertsection').addClass('alert-danger');
                        $('.result').text('Error trying to create thumbnails: ' + err.status);  
                        $btn.button('reset');
                    }
                });                
            });
            
            $('#imageorientationcorrector').click(function() {
               var $btn = $(this).button('loading');
               $.ajax({
                   type: 'POST',
                   dataType: 'json',
                   url: 'rotate_img_service.php',
                   success: function(data) {
                       $('#imageorientationalert').removeClass('alert-danger');
                       $('#imageorientationalert').addClass('alert-success');
                       $('.imageorientationresult').text('Successfully processed ' + data.fileCount + ' images.');
                       $btn.button('reset');
                   },
                   error: function(err) {
                       $('#imageorientationalert').removeClass('alert-success');
                       $('#imageorientationalert').addClass('alert-danger');
                       $('.imageorientationresult').text('Error trying to rotate images.');
                       $btn.button('reset');
                   }
               });
            });                
        });
        
    </script>
    
</body>
</html>