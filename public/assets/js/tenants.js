$(".propname").change(function() {
    let propid = $(".propname option:selected").attr("value");
    if (propid != "") {
        $.ajax({
            url: "/tenants/fetch-units",
            method: "get",
            data: {
                propid: propid
            },
            success: function(result) {
                if (result == "") {
                    $(".units").html('<option style="display:none" value="">No Data Found</option>');
                } else {
                    console.log(result);
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