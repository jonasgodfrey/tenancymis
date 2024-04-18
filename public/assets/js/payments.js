$(".property_name").change(function() {
    let property_id = $(".property_name option:selected").attr("value");
    if (property_id != "") {
        $.ajax({
            url: "/fetch-unit",
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
$(".units").change(function() {
    let unit_id = $(".units option:selected").attr("value");
    if (unit_id != "") {
        $.ajax({
            url: "/fetch-tenant",
            method: "get",
            data: {
                unit_id: unit_id
            },
            success: function(result) {
                if (result == "") {
                    $(".tenant").html('<option style="display:none" value="">No Tenant Found</option>');
                } else {
                    $(".tenant").removeAttr('disabled');
                    $(".tenant").html('<option value="' + result.id + '">' + result.first_name + ' ' + result.last_name + '</option>');
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