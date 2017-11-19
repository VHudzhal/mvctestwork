$(function() {
        $("#uploaded_image").change(function () {
            $("#load").html("<img src='../web/images_prev/ajax-loader.gif' alt='Loading' style='margin-top:25px;'>");
            $("#form").ajaxForm({
                target: '#load'
            }).submit();
        });
    });