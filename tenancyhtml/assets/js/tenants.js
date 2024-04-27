$(".property_name").change(function() {
    let property_id = $(".property_name option:selected").attr("value");
    if (property_id != "") {
        $.ajax({
            url: "/fetch-free-units",
            method: "get",
            data: {
                property_id: property_id
            },
            success: function(result) {
                if (result == "") {
                    $(".units").html('<option style="display:none" value="">No Data Found</option>');
                } else {
                    $(".units").removeAttr('disabled');
                    $(".units").html('<option style="display:none" value="">Select units</option>');
                    $.each(result, function(key, value) {
                        $(".units").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            },
            error: function(err) {
                console.log(err);
            },
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }
});