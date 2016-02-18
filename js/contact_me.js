$(function() {   
    $('input,textarea').jqBootstrapValidation({
      preventSubmit: true,
      submitError: function($form, event, errors) {
      },
      submitSuccess: function($form, event) {
        event.preventDefault();
        //get values from the contact form
        var name = $('input#name').val();
        var phone = $('input#phone').val();
        var email = $('input#email').val();
        var message = $('textarea#message').val();      
        var firstName = name; //for success/failure message
        //if name has spaces in between...
        if(firstName.indexOf(' ') >= 0) {
          firstName = name.split(' ').slice(0, -1).join(' ');
        }
        $.ajax({
          url: './services/contact_me.php',
          type: 'POST',
          data: {
            name: name,
            phone: phone,
            email: email,
            message: message
          },
          cache: false,
          success: function() {
            //enable submit button and show success message
            $('#btnSubmit').attr('disabled', false);
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
            $('#success > .alert-success').append("<strong>Your message has been sent. </strong>");
            $('#success > .alert-success').append('</div>');
            //clear all fields
            $('#contactform').trigger('reset');
          },
          error: function() {
            //fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                .append("</button>");
            $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
            $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#contact').trigger("reset");
          }
        })
      },
      filter: function() {
        return $(this).is(":visible");
      }
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
  }
);
// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
