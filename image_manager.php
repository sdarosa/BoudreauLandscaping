<?php include 'section-top.php'; ?>
<?php require 'helper.php'; ?>

<body>
    <div class="container">
        <h1>Image Manager</h1>  
        <hr/>
        <h3 class="blue">Rotates Images</h3>
        <p><strong>Description:</strong> Rotates images in specified folder if orientation is not correct. It will also update its thumbnails.</p>    
        <p class="bg-warning"><strong>Note:</strong> The global folder is 'images/portfolio/' You just need to specify its subfolder (i.e. 'Before and After') which must exist.</p>
        <div class="form-group">
            <label>Folder Name:</label>            
            <input type="text" class="form-control" id="rotatefoldername" placeholder="Testing">
        </div>
        <button type="button" id="imageorientationcorrector" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">
            Correct Image Orientation</button>
        <br/>
        <div id="imageorientationalert" class="alert" role="alert">
            <p class="imageorientationresult"></p>
        </div>
        
        <hr/>
        
        <h3 class="blue">Generate Thumbnails</h3>  
        <p><strong>Description:</strong> Creates thumbnails of all new images in a specified folder.</p>
        <p class="bg-warning"><strong>Note:</strong> The global folder is 'images/portfolio/' You just need to specify its subfolder (i.e. 'Before and After') which must exist.</p>
        <div class="form-group">            
            <label>Folder Name:</label>            
            <input type="text" class="form-control" id="thumbnailpath" placeholder="Testing">
        </div>
        <div class="form-group">
            <label>Width (400px if not specified)</label>
            <input type="text" class="form-control" id="thumbnailwidth" placeholder="400">
        </div>
        <div class="form-group">
            <label>Height (300px if not specified)</label>
            <input type="text" class="form-control" id="thumbnailheight" placeholder="300">
        </div>            
        <button type="button" id="thumbgenerator" class="btn btn-primary" value="Generate Thumbnails" data-loading-text="Loading..." autocomplete="off">
            Generate Thumbnails</button>
        <br/>
        <div id="alertsection" class="alert" role="alert"> 
            <p class="result"></p>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#thumbgenerator').click(function() {
                var $btn = $(this).button('loading');     
                var $folderName = $('#thumbnailpath').val();
                var $thumbWidth = $('#thumbnailwidth').val();
                var $thumbHeight = $('#thumbnailheight').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'generate_thumbs.php',
                    data: {
                        folderName : $folderName,
                        thumbWidth : $thumbWidth,
                        thumbHeight : $thumbHeight
                    },
                    success: function(data) {    
                        $('#alertsection').removeClass('alert-danger');
                        $('#alertsection').addClass('alert-success');
                        if(data.fileCount != 0) {
                            $('.result').text('Successfully created ' + data.fileCount + ' thumbnail(s) on ' + data.folderName + '/thumbnails folder.');
                        } else {
                            $('.result').text('All thumbnails already exist. No new thumbnails created on ' + data.folderName + '/thumbnails folder.');
                        }                        
                        var x;
                        for(x in data.fileNames) {
                            $('.result').append('<br/>' + data.fileNames[x]);
                        }
                        $btn.button('reset');
                    },
                    error: function(err) {
                        $('#alertsection').removeClass('alert-success');
                        $('#alertsection').addClass('alert-danger');
                        $('.result').text('Error trying to create thumbnails: ' + err.status + ': ' + err.statusText + '. ' + err.responseText);  
                        $btn.button('reset');
                    }
                });                
            });
            
            $('#imageorientationcorrector').click(function() {
               var $btn = $(this).button('loading');
               var $folderName = $('#rotatefoldername').val();
               $.ajax({
                   type: 'POST',
                   dataType: 'json',
                   url: 'rotate_img_service.php',
                   data: {
                       folderName : $folderName
                   },
                   success: function(data) {
                       $('#imageorientationalert').removeClass('alert-danger');
                       $('#imageorientationalert').addClass('alert-success');
                       $('.imageorientationresult').text('Successfully processed ' + data.fileCount + ' images on folder ' + data.folderName + '.');
                       var x;
                       for(x in data.fileNames) {
                            $('.imageorientationresult').append('<br/>' + data.fileNames[x]);
                       }
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