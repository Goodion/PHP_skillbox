$(document).ready(function () {
    
    $('#fileUploadForm').on('submit', function(e) {

        e.preventDefault();
        var $message = $('#message');
        var $form = $(this),
        formData = new FormData($form.get(0));
        
        $.ajax({
            type: $form.attr('method'),
            enctype: 'multipart/form-data',
            url: $form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(json){
                if(json){
                  $message.replaceWith(json);
                } 
            }
        });
    });

});
