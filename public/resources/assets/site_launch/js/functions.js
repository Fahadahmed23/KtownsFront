setInterval(function () {
    var target = new Date("November 15 2017 12:00:00 GMT+0100"); //replace with YOUR DATE
    var now = new Date();
    var difference = Math.floor((target.getTime() - now.getTime()) / 1000);

    var seconds = fixIntegers(difference % 60);
    difference = Math.floor(difference / 60);

    var minutes = fixIntegers(difference % 60);
    difference = Math.floor(difference / 60);

    var hours = fixIntegers(difference % 24);
    difference = Math.floor(difference / 24);

    var days = difference;

    $(".countdown #seconds").html(seconds);
    $(".countdown #minutes").html(minutes);
    $(".countdown #hours").html(hours);
    $(".countdown #days").html(days);


}, 1000);
function fixIntegers(integer) {
    if (integer < 0)
        integer = 0;
    if (integer < 10)
        return "0" + integer;
    return "" + integer;
}

jQuery(document).ready(function () {
    // This button will increment the value
    $('.qtyplus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('name');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('name');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });

});     