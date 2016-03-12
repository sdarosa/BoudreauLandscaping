<?php include 'section-top.php'; ?>
<?php require 'helper.php'; ?>

<body>
    <div class="container">     
        
        <?php 
            $directories = getImageDirectories('images/portfolio/');            
        ?>
        
        <h3 class="blue">Generate Thumbnails</h3>  
        <p><strong>Description:</strong> Creates thumbnails of all new images in a specified folder.</p>
        <p class="bg-warning"><strong>Note:</strong> The global folder is 'images/portfolio/' You just need to specify its subfolder (i.e. 'Before and After') which must exist.</p>
        <div class="form-group">            
            <label>Folder Name:</label>  
            <select id="directoryDropdown" class="form-control">
                <?php for($i=0; $i<count($directories); $i++) { 
                    echo '<option value="' . $directories[$i] .  '">' . $directories[$i] . '</option>';
                } ?>
            </select> 
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
                var e = document.getElementById('directoryDropdown');
                var $folderName = e.options[e.selectedIndex].value;               
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
                        $('#alertsection').removeClass('alert-warning');
                        $('#alertsection').removeClass('alert-success');                       
                        if(data.errorMsg === null) {
                            if(data.fileCount != 0) {                               
                                $('#alertsection').addClass('alert-success');
                                $('.result').text('Successfully created ' + data.fileCount + ' thumbnail(s) on ' + data.folderName + '/thumbnails folder.');
                            } else {                                
                                $('#alertsection').addClass('alert-warning');
                                $('.result').text('All thumbnails already exist. No new thumbnails created on ' + data.folderName + '/thumbnails folder.');
                            }                        
                            var x;
                            for(x in data.fileNames) {
                                $('.result').append('<br/>' + data.fileNames[x]);
                            }
                        } else {
                            $('#alertsection').addClass('alert-warning');
                            $('.result').text(data.errorMsg);
                        }
                        $btn.button('reset');
                    },
                    error: function(err) {
                        $('#alertsection').removeClass('alert-success');
                        $('#alertsection').removeClass('alert-warning');
                        $('#alertsection').addClass('alert-danger');
                        $('.result').text('Error trying to create thumbnails. Make sure that the directory specified exists.');  
                        $btn.button('reset');
                    }
                });                
            });    
        });
        
    </script>
    
</body>
</html>