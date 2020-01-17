$(document).ready(function () {
    
    $('#send_message_form').on('submit', function(e) {

        e.preventDefault();
        var $message = $('#message');
        var $form = $(this);
        console.log( $form.serialize() );
        
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(json){
                if(json){
                    var result = $(json).find('#answer');
                    $message.replaceWith(result);
                } 
            }
        });
    });

});
