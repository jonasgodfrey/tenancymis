$(".propname").change(function() {
    let propid = $(".propname option:selected").attr("value");
    if (propid != "") {
        $.ajax({
            url: "/fetch-unit",
            method: "get",
            data: {
                propid: propid
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
    let unitid = $(".units option:selected").attr("value");
    if (unitid != "") {
        $.ajax({
            url: "/fetch-tenant",
            method: "get",
            data: {
                unitid: unitid
            },
            success: function(result) {
                if (result == "") {
                    $(".tenant").html('<option style="display:none" value="">No Tenant Found</option>');
                } else {
                    $(".tenant").removeAttr('disabled');
                    $(".tenant").html('<option value="' + result.id + '">' + result.name + '</option>');
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