$(".bizname").hide();
$(".vencat").hide();

//for occupation element
$('#role select[name="role"]').change(function() {

    if ($('#role select[name="role"] option:selected').val() == "artisan") {
        $(".bizname").show();
        $(".vencat").show();
    } else {
        $(".bizname").hide();
        $(".vencat").hide();
    }

});