$(".property_name").change(function () {
    let property_id = $(".property_name option:selected").attr("value");
    if (property_id != "") {
        $.ajax({
            url: "/fetch-free-units",
            method: "get",
            data: {
                property_id: property_id
            },
            success: function (result) {
                if (result == "") {
                    $(".units").html('<option style="display:none" value="">No Data Found</option>');
                } else {
                    $(".units").removeAttr('disabled');
                    $(".units").html('<option style="display:none" value="">Select units</option>');
                    $.each(result, function (key, value) {
                        $(".units").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }
});

function confirmDelete(id) {

    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    )

    Swal.fire({
        title: 'Confirm Delete',
        text: "Are you sure you want to delete this property? You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/property/delete",
                method: "post",
                data: {
                    property_id: id
                },
                success: function (result) {
                    if (result.status == 0) {
                        Swal.fire({
                            title: 'Deleted!',
                            message: result.message,
                            icon: 'success',
                            allowOutsideClick: false
                        }).then((result) => {
                            location.reload();
                          })
                    } else {
                        Swal.fire(
                            'Error',
                            result.message,
                            'error'
                        )
                    }
                },
                error: function (err) {
                    console.log(err);
                },
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
                }
            });

        }
    })
}


$('#show-add-tenant').on('click', function (e) {
    $('#add-tenants-div').toggle();

});

$('#add-property-div').hide();

$('#show-add-unit').on('click', function (e) {
    $('#add-property-div').toggle();

});
$('#assignment_type').on('change', function (e) {
    if (e.target.value == "new") {
        $('#newTenantDiv').show();
        $('#existingTenantDiv').hide();
        $('#otherFormDiv').show();
    } else if (e.target.value == "existing") {
        $('#newTenantDiv').hide();
        $('#otherFormDiv').show();
        $('#existingTenantDiv').show();
    } else {
        $('#newTenantDiv').hide();
        $('#otherFormDiv').hide();
        $('#existingTenantDiv').hide();
    }
});


$('#selected_user').on('change', function (e) {

    var userid = e.target.value;

    $.ajax({
        url: "/users/" + userid,
        type: 'GET',
        data: {
            id: e.target.value
        },
    })
        .done(function (response) {
            console.log(response);

            $("#mobile").val(response.data.phone)
            $("#email").val(response.data.email)
            $("#business_name").val(response.data.occupation)


            // swal.fire('Fetched!', response.message, response.status);
            // location.reload('2000');
        })
        .fail(function (error) {
            console.log(error);
            swal.fire('Oops...',
                'Something went wrong when deleting !',
                'error');
        });
});
