$(".business_name").hide();
$(".vencat").hide();

//for occupation element
$('#role select[name="role"]').change(function() {

    if ($('#role select[name="role"] option:selected').val() == "artisan") {
        $(".business_name").show();
        $(".vencat").show();
    } else {
        $(".business_name").hide();
        $(".vencat").hide();
    }

});