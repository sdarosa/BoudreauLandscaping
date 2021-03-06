<?php require_once 'helper.php' ?>
<body>
<header>
        <nav class="navbar navbar-fixed-top">
        <div class="top-line"></div>
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#boudreaunavbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">
                <img class="logo img-responsive" alt="Boudreau Bros Logo" src="images/logo.jpg">  
              </a>
            </div>

            <div id="boudreaunavbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">                   
                    <li><a href="?action=index.php">HOME</a></li>                    
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SERVICES<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="?action=services.php#construction">Landscape Construction</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="?action=services.php#maintenance">Landscape Maintenance</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="?action=services.php#snowmanagement">Snow Management</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">WORK<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <?php
                            $directories = getImageDirectories("images/portfolio");
                            foreach($directories as $d) {
                                if($d != "Before and After") { ?>
                                    <li><a href="?action=galleries.php&type=<?php echo $d; ?>"><?php echo $d; ?></a></li>
                                    <li role="separator" class="divider"></li>                                    
                        <?php   }
                            }                          
                        ?>                       
                        <li><a href="?action=bef_after.php">Before and After</a></li>
                      </ul>
                    </li>                            
                    <li><a href="?action=about.php">ABOUT</a></li>
                    <li><a href="?action=contact.php">CONTACT</a></li>
                    <p class="navbar-text hidden-xs hidden-sm">
                        <a target="_blank" href="https://www.facebook.com/BoudreauBrosLandscaping/"><img src="images/facebook-28.png" /></a>
                        <a href="#"><img src="images/twitter-28.png" /></a>
                        <a href="#"><img src="images/pinterest-28.png" /></a>
                    </p>
                </ul>
            </div>
        </div>
    </nav>
        </header>