// @ts-nocheck


var years = 0;
var majorMonths = 0;
var majorWeeks = 0;
var monthsRemaining = 0
var weeksRemaining = 0
var daysRemaining = 0
var isAmountValid = false;

$('#amount').on('input', function (e) {

    console.log(e.target.value);
    let lease_amount = $('#lease_amount').val();

    console.log(lease_amount);

    if ($('#payment_duration_id').val() == 1) {

        if (lease_amount / 12 > e.target.value) {
            $("#amount_error").show();
            $("#duration").val("");
            $("#amount_error").text("Minimum amount is " + formatMoney(lease_amount / 12))
        } else {
            $("#amount_error").hide();
            var amountPermonth = lease_amount / 12;
            if (parseInt(e.target.value / amountPermonth) < 12) {
                months = parseInt(e.target.value / amountPermonth);
                $("#duration").val(months + " month(s)")
                monthsRemaining = months;

            } else {
                var months = parseInt(e.target.value / amountPermonth);

                console.log(months, "no of months");
                years = parseInt(months / 12);
                monthsRemaining = months % 12;

                var yearsRemainingTxt = years == 1 ? years + " year " : years <= 0 ? "" : years + " years ";
                var monthsRemainingText = monthsRemaining == 1 ? monthsRemaining + "month" : monthsRemaining <= 0 ? "" : monthsRemaining + "months";

                $("#duration").val(yearsRemainingTxt + monthsRemainingText);
                $("#total_months").val(yearsRemainingTxt + monthsRemainingText);

            }

            var validAmount = e.target.value - $('#discount').val();

            $("#amount_paid").val(validAmount);
            isAmountValid = validAmount >= 0 ? true : false;

            console.log($('#ayment_update_type').val());

            calculateDueDate();

            // if ($('#payment_update_type').val() == 'update') {
            //     calculateDueDate();
            // }
        }
    } else if ($('#payment_duration_id').val() == 2) {

        if (lease_amount / 4 > e.target.value) {
            $("#amount_error").show();
            $("#duration").val("");
            $("#amount_error").text("Minimum amount is " + formatMoney(lease_amount / 4))
        } else {
            $("#amount_error").hide();
            var amountPerWeek = lease_amount / 4;
            if (parseInt(e.target.value / amountPerWeek) < 4) {
                calculateDueDate();
                $("#duration").val(parseInt(e.target.value / amountPerWeek) + " Week(s)")
            } else {
                var weeks = parseInt(e.target.value / amountPerWeek);
                majorMonths = parseInt(weeks / 4);
                weeksRemaining = weeks % 4;

                console.log(months, "my months: ");
                console.log(weeks, "my months: ");
                console.log(amountPerWeek, "my months: ");

                var monthsRemainingTxt = majorMonths == 1 ? majorMonths + " month " : majorMonths <= 0 ? "" : majorMonths + "months ";
                var weeksRemainingText = weeksRemaining == 1 ? weeksRemaining + " week" : (weeksRemaining <= 0 ? "" : weeksRemaining + " weeks");

                $("#duration").val(monthsRemainingTxt + weeksRemainingText);
                $("#total_months").val(monthsRemainingTxt + weeksRemainingText)

            }

            var validAmount = e.target.value - $('#discount').val();

            $("#amount_paid").val(validAmount);
            isAmountValid = validAmount >= 0 ? true : false;

            console.log($('#ayment_update_type').val());

            console.log(months, "anothe month thingy");

            calculateDueDate();

            // if ($('#payment_update_type').val() == 'update') {
            //     calculateDueDate();
            // }
        }
    } else if ($('#payment_duration_id').val() == 3) {

        if (lease_amount / 7 > e.target.value) {
            $("#amount_error").show();
            $("#duration").val("");
            $("#amount_error").text("Minimum amount is " + formatMoney(lease_amount / 7))
        } else {
            $("#amount_error").hide();
            var amountPerDay = lease_amount / 7;
            if (parseInt(e.target.value / amountPerDay) < 7) {
                calculateDueDate();
                $("#duration").val(parseInt(e.target.value / amountPerDay) + " Day(s)")
            } else {
                var days = parseInt(e.target.value / amountPerDay);
                majorWeeks = parseInt(days / 7);
                daysRemaining = days % 7;

                console.log(majorWeeks, "my months: ");
                console.log(days, "my months: ");
                console.log(daysRemaining, "my months: ");

                var weeksRemainingTxt = majorWeeks == 1 ? majorWeeks + " week " : majorWeeks <= 0 ? "" : majorWeeks + " weeks ";
                var daysRemainingText = weeksRemaining == 1 ? weeksRemaining + " day" : (weeksRemaining <= 0 ? "" : weeksRemaining + " days");

                $("#duration").val(weeksRemainingTxt + daysRemainingText);
            }

            var validAmount = e.target.value - $('#discount').val();

            $("#amount_paid").val(validAmount);
            isAmountValid = validAmount >= 0 ? true : false;

            console.log($('#ayment_update_type').val());

            console.log(months, "anothe month thingy");

            calculateDueDate();

            // if ($('#payment_update_type').val() == 'update') {
            //     calculateDueDate();
            // }
        }
    } else if ($('#payment_duration_id').val() == 4) {

        console.log(lease_amount);

        if (+lease_amount > e.target.value) {
            $("#amount_error").show();
            $("#duration").val("");
            $("#amount_error").text("Minimum amount is " + formatMoney(+lease_amount))
        } else {
            $("#amount_error").hide();
            var amountPerDay = lease_amount;
            if (parseInt(e.target.value / amountPerDay) < 1) {
                calculateDueDate();
                $("#duration").val(parseInt(e.target.value / amountPerDay) + " Day(s)")
            } else {
                var days = parseInt(e.target.value / amountPerDay);
                daysRemaining = parseInt(days);
                daysRemaining = days;

                var daysRemainingText = daysRemaining == 1 ? daysRemaining + " day" : (daysRemaining <= 0 ? "" : daysRemaining + " days");

                $("#duration").val(daysRemainingText);
                $("#total_months").val(daysRemainingText);
            }

            var validAmount = e.target.value - $('#discount').val();

            $("#amount_paid").val(validAmount);
            isAmountValid = validAmount >= 0 ? true : false;

            console.log($('#ayment_update_type').val());

            console.log(months, "anothe month thingy");

            calculateDueDate();

            // if ($('#payment_update_type').val() == 'update') {
            //     calculateDueDate();
            // }
        }
    }
});

$('#discount').on('input', function (e) {
    $("#amount_paid").val($('#amount').val() - e.target.value)
});


$('#start_date').on('input', function (e) {
    calculateDueDate();
});

function calculateDueDate() {

    console.log(majorMonths, "Alot major month");
    if (isAmountValid) {

        if ($('#payment_duration_id').val() == 1) {

            var totalMonths = (years * 12) + monthsRemaining;
            var startDate = new Date($('#start_date').val())
            var numberOfMonthsToAdd = totalMonths;
            var result = new Date(startDate.setMonth(startDate.getMonth() + numberOfMonthsToAdd));

            result = formatDate(result);

            $("#due_date").val(result)
        } else if ($('#payment_duration_id').val() == 2) {

            console.log(majorMonths, "major month remainiig");

            var totalMonth = majorMonths;
            var totalDaysToAddd = weeksRemaining * 7;
            var startDate = new Date($('#start_date').val())

            var result = new Date(startDate.setMonth(startDate.getMonth() + totalMonth));
            result = new Date(result.setDate(result.getDate() + totalDaysToAddd))

            result = formatDate(result);

            $("#total_days").val(totalDaysToAddd)
            $("#due_date").val(result)
        } else if ($('#payment_duration_id').val() == 3) {

            console.log(majorWeeks, "major weeks remainiig");

            var totalMonth = majorWeeks;
            var totalDaysToAddd = (majorWeeks * 7) + daysRemaining;
            var startDate = new Date($('#start_date').val())

            var result = new Date(startDate.setDate(startDate.getDate() + totalDaysToAddd));

            result = formatDate(result);

            $("#total_days").val(totalDaysToAddd)
            $("#due_date").val(result)
        } else if ($('#payment_duration_id').val() == 4) {

            console.log(majorWeeks, "major weeks remainiig");

            var totalDaysToAddd = daysRemaining;
            var startDate = new Date($('#start_date').val())

            var result = new Date(startDate.setDate(startDate.getDate() + totalDaysToAddd));

            result = formatDate(result);

            $("#total_days").val(totalDaysToAddd)
            $("#due_date").val(result)
        }
    }
}


$(".property_name").change(function () {
    let property_id = $(".property_name option:selected").attr("value");
    if (property_id != "") {
        $.ajax({
            url: "/fetch-unit",
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
$(".units").change(function () {
    let unit_id = $(".units option:selected").attr("value");
    if (unit_id != "") {
        $.ajax({
            url: "/fetch-tenant",
            method: "get",
            data: {
                unit_id: unit_id
            },
            success: function (result) {
                if (result == "") {
                    $(".tenant").html('<option style="display:none" value="">No Tenant Found</option>');
                } else {
                    console.log(result);
                    $('#paymentDetailsDiv').show();
                    $('#lease_amount').val(result.lease_amount);
                    $('#unit_payment').val(result.lease_amount + " - " + result.payment_duration);
                    $('#start_date').val(result.end_date);
                    $('#tenant_id').val(result.tenant_id);
                    $('#startDateLabel').html(result.start_date != undefined ? 'Last Due Date' : 'Start Date');
                    if (result.start_date != undefined) {
                        $('#start_date').attr('readonly', true);
                    } else {
                        $('#start_date').attr('readonly', false);
                    }
                    $('#payment_duration_id').val(result.payment_duration_id);
                    $(".tenant").removeAttr('disabled');
                    $(".tenant").html('<option value="' + result.id + '">' + result.first_name + ' ' + result.last_name + '</option>');
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