$(function () {
    $(document).on('click', '#close-btn', function() {
        $('.alert').fadeOut(500);
        return false;
    });
});