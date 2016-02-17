<?php include 'section-top.php';
      include 'section-header.php';
?> 
        
        <!-- main section -->        
        <div id="about-section">
            <div class="container">
                <h1>CONTACT <spam class="red">US</spam></h1>
                <img src="images/contact-img.jpg" class="img-responsive img-thumbnail"/>
                <div class="row">                   
                    <div class="col-md-5">                        
                        <p><span class="red">Address:</span> 20 Pratt Street. Fitchburg, MA 01420</p>
                    </div>                    
                    <div class="col-md-3">
                        <p><span class="red">Phone: </span>(978) 627-0232</p>
                    </div>
                    <div class="col-md-4">
                        <p><span class="red">&nbsp;&nbsp;email:</span> info@boudreaubros.com</p>
                    </div>
                </div>                
            </div>
        </div>
        
        <div id="contactform-section">
            <div class="container">
                <h1>GET YOUR <span class="red">PROJECT</span> STARTED</h1>
                <form name="contactform" id="contactform">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" >
                            </div>
                            <div class="form-group">
                                <label>email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="john@email.com" >
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="555-123-456" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Message:</label>
                                <textarea class="form-control" name="message" id="message" placeholder="Tell us about your project..." rows="9"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger"><strong>Send Message</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
<?php include 'section-footer.php'; ?>