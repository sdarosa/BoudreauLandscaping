$(function() {
    function resize() {
        //center the ciruclar images on the services section
        if($(window).width() < 750  ) {
            $('.responsivecenter').removeClass('vcenter').addClass('text-center');        
            $('.responsivecenterimg').removeClass('img-responsive');
        } else {
            $('.responsivecenter').addClass('vcenter').removeClass('text-center');        
            $('.responsivecenterimg').addClass('img-responsive');
        }
    }
    resize();
    jQuery(window).on('resize', function() {
        resize();
    });
});

$(document).ready(function() {
    $('.nav li.dropdown').hover(function() {
        if($(window).width() > 767) {
            $(this).addClass('open');
        }        
    }, function() {
        if($(window).width() > 767) {
            $(this).removeClass('open');
        }        
    });
    
    
    
    //delegate calls to the lightbox (gallery)
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
});



