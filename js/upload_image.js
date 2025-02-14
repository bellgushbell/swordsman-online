$(document).ready(function() {
    $('#upload').on('change', function(e) {
        e.preventDefault();
        
        var formData = new FormData();
        formData.append('upload_title', $('#upload')[0].files[0]);

        $.ajax({
            url: '../../database/upload_image.php', // Change this to your server-side upload handler
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle success response
                console.log( response.filePath);
                $('#preview').attr('src', response.filePath).show();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error response
                console.error('Image upload failed:', textStatus, errorThrown);
            }
        });
    });
});