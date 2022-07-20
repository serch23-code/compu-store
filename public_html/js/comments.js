$(document).ready(function () {
    $("#insert").hide();
    $(document).on('click', '#add-comments', (e) => {
        $.ajax({
            url: '../php/controller/comments.php?option=insertCom',
            type: 'POST',
            beforeSend: function () {
                $("#insert").show();
            },
            success: function () {
                console.log("exitoso");
                $("#insert").hide();
            }
        })
    });
});