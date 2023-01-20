$(".propname").change(function () {
    let propid = $(".propname option:selected").attr("value");
    if (propid != "") {
        $.ajax({
            url: "/fetch-free-units",
            method: "get",
            data: {
                propid: propid
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

$('#add-property-div').hide();

$('#show-add-unit').on('click', function (e) {
    $('#add-unit-div').toggle();
    $('#add-tenants-div').hide();

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
            $("#bizname").val(response.data.occupation)


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

$('#show-add-tenant').on('click', function (e) {
    $('#add-tenants-div').toggle();
    $('#add-unit-div').hide();

});
$(document).ready(function () {
    $('.alert').alert()

    $('.delete').click(function () {
        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            console.log(id);
            swal.fire({
                title: 'Are you sure?',
                text: "All units and tenants under this property would also be deleted !!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('property.delete')}}",
                        type: 'POST',
                        data: {
                            id: id
                        },
                    })
                        .done(function (response) {
                            console.log(response);
                            swal.fire('Deleted!', response, response
                                .status);
                            location.reload('2000');
                        })
                        .fail(function (error) {
                            console.log(error);
                            swal.fire('Oops...',
                                'Something went wrong when deleting !',
                                'error');
                        });
                }
            })
        });
    });
});