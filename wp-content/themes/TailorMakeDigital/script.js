jQuery(document).ready(function ($) {
    
    Stripe.setPublishableKey('pk_live_TEaiwBKYc0f2Ldv8TsslnuQH');

    /*
    $('.form').on('submit', function(e){
        e.preventDefault();
   
//        Stripe.card.createToken({
//        number: '4580 2601 0914 1093',
//        cvc: '310',
//        exp_month: '10',
//        exp_year: '20'
//        }, stripeResponseHandler);
    });
    */


//Handle stripe response
    function stripeResponseHandler(status, response) {

        // Grab the form: 
        var $form = $('.form');

        if (response.error) { // Problem!
            $('.loader').hide();
            $('#submitform').css('display', 'inline-block');
            alert(response.error.message);
            
            // Show the errors on the form
            //$form.find('.payment-errors').text(response.error.message);
            //$form.find('button').prop('disabled', false); // Re-enable submission

        } else { // Token was created!

            // Get the token ID:
            var token = response.id;
            
            
            $('#stripeToken').val(token);
            $.post("/index.php/ajax/checkout", $("#myform").serialize())
            .done(function (data) {
                if (data == 1) {
                    window.location.href = '/index.php/thanks';
                }

                else {
                    alert(data);
                    $('.loader').hide();
                    $('#submitform').css('display', 'inline-block');
                }
            });


        }
    }









});




