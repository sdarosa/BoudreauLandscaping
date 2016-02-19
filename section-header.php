<?php require 'helper.php' ?>
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
                      <a class="navbar-brand" href="index.html">
                        <img alt="Boudreau Bros Logo" src="images/logo.jpg">  
                      </a>
                    </div>
                    
                    <div id="boudreaunavbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">HOME</a></li>                           
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SERVICES<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="services.php#construction">Landscape Construction</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="services.php#maintenance">Landscape Maintenance</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="services.php#snowmanagement">Snow Management</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">WORK<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="allwork.php">All Work</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="patios_walkways.php">Patios and Walkways</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="work.php#steps">Steps</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="work.php#walls">Walls and Retaining Walls</a></li> 
                                <li role="separator" class="divider"></li>
                                <li><a href="work.php#beforeafter">Before and After</a></li>
                              </ul>
                            </li>                            
                            <li><a href="about.php">ABOUT</a></li>
                            <li><a href="contact.php">CONTACT</a></li>
                            <p class="navbar-text">
                                <a href="#"><img src="images/facebook-28.png" /></a>
                                <a href="#"><img src="images/twitter-28.png" /></a>
                                <a href="#"><img src="images/pinterest-28.png" /></a>
                            </p>
                        </ul>
                    </div>
                </div>
            </nav>
		</header>