import $ from 'jquery'

$(document).ready(function() {
    $(document).on('click', '#delete-image-btn', function() {
        let image = $(this);
        let imageId = image.val(); // Get the image id from the button's value attribute
        let confirmed = confirm('Удалить изображение?');
        if (confirmed) {
            $.ajax({
                url: `/admin/houses/images/${imageId}`,
                method: 'DELETE',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
                success: function(response) {
                    image.parent().remove();
                },
                error: function(xhr) {
                    //image.parent().remove(); // Remove the image element from the DOM
                    alert('неуспешный неуспех');
                }
            });
        }
    });
});