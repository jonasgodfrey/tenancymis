$('#catform').on('submit', function(e) {
    e.preventDefault();

    let name = $('#catname').val();

    $.ajax({
        url: '/settings/addpropertycat',
        method: "POST",
        data: {
            catname: name,
        },
        success: function(result) {
            Swal.fire(
                'success',
                result,
                'success'
            )
            $('#catname').val('');
        },
        error: function(err) {
            Swal.fire(
                'Error',
                err,
                'error'
            )
        },
        headers: {
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
        }
    });
});

$('#typeform').on('submit', function(e) {
    e.preventDefault();

    let name = $('#typename').val();
    let category = $('#pt_catname').val();

    console.log(name, category)
    $.ajax({
        url: '/settings/addpropertytype',
        method: "POST",
        data: {
            typename: name,
            catname: category,
        },
        success: function(result) {
            Swal.fire(
                'success',
                result,
                'success'
            );
            $('#typename').val('');
            $('#pt_catname').val('');
        },
        error: function(err) {
            Swal.fire(
                'Error',
                err,
                'error'
            )

        },
        headers: {
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
        }
    });
});

$('#unitform').on('submit', function(e) {
    e.preventDefault();

    let name = $('#unitname').val();
    let category = $('#ut_catname').val();

    $.ajax({
        url: '/settings/addunitname',
        method: "POST",
        data: {
            unitname: name,
            catname: category,
        },
        success: function(result) {
            Swal.fire(
                'success',
                result,
                'success'
            )
            $('#unitname').val('');
            $('#ut_catname').val('');
            e.clear()
        },
        error: function(err) {
            Swal.fire(
                'Error',
                err,
                'error'
            )
        },
        headers: {
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
        }
    });
});