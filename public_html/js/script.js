$(document).ready(function () {


});

function quantity_func() {
    var quantity = $("#quantity").val();
    if (quantity == "") {
        quantity = 0;
    }
    $("#quantity_span").text(quantity);
}

function price_func() {
    var find = ',';
    var re = new RegExp(find, 'g');
    var price = $("#price_limit").val().replace(re, '');
    if (price == "") {
        price = 0;
    }
    $("#price_span").text(price);
}

function total_price_func() {
    var find = ',';
    var re = new RegExp(find, 'g');
    var price = $("#price_limit").val().replace(re, '');
    if (price == "") {
        price = 0;
    }
    $("#price_span").text(price);
    var quantity = $("#quantity").val();
    var total_price = price * quantity;
    $('#total_price_span').text(total_price);
}

function PKC_func() {
    var quotation = $("#actual_quotation_span").text();
    var quantity = parseFloat($("#quantity").val());
    var total_price = quantity * quotation;
    $("#price_span").text(quotation);
    $("input[name=price_limit]").val(quotation);
    $('#total_price_span').text(total_price);
}

function limit_func() {
    var quotation = $("#actual_quotation_span").text();
    var quantity = 0;
    var total_price = quantity * quotation;
    $("#price_span").text("0");
    $("input[name=price_limit]").val(0);
    $('#total_price_span').text(total_price);
}