$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    loadcart();
    loadwish();
});
function loadcart() {
    $.ajax({
        method: "GET",
        url: "/load-cart-data",
        success: function (response) {
            $(".cart-count").html("");
            $(".cart-count").html(response.count);
        },
    });
}

function loadwish() {
    $.ajax({
        method: "GET",
        url: "/load-wish-data",
        success: function (response) {
            $(".wish-count").html("");
            $(".wish-count").html(response.count);
        },
    });
}

$(".addToCart").click(function (e) {
    e.preventDefault();
    var product_id = $(this).closest(".product_data").find(".prod_id").val();
    var product_qty = $(this).closest(".product_data").find(".qty_input").val();
    $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
            product_id: product_id,
            product_qty: product_qty,
        },
        success: function (response) {
            swal(response.status);
            loadcart();
        },
    });
});

$(".addToWishlist").click(function (e) {
    e.preventDefault();
    var product_id = $(this).closest(".product_data").find(".prod_id").val();

    $.ajax({
        method: "POST",
        url: "/add-to-wishlist",
        data: {
            product_id: product_id,
        },
        success: function (response) {
            swal(response.status);
            loadwish();
        },
    });
});

$(".delete-cart-item").click(function (e) {
    e.preventDefault();
    var prod_id = $(this).closest(".product_data").find(".prod_id").val();
    $.ajax({
        method: "POST",
        url: "/cart-item-delete",
        data: {
            prod_id: prod_id,
        },
        success: function (response) {
            swal("", response.status, "success");
            window.location.reload();
        },
    });
});

$(".removeWishlist").click(function (e) {
    e.preventDefault();
    var prod_id = $(this).closest(".product_data").find(".prod_id").val();
    $.ajax({
        method: "POST",
        url: "/wishlist-item-delete",
        data: {
            prod_id: prod_id,
        },
        success: function (response) {
            swal("", response.status, "success");
            window.location.reload();
        },
    });
});

$(document).on("click", "#increase", function () {
    var qtyVal = $(this).parent().parent().parent().find(".qty_input").val();
    //console.log(qtyVal);
    var IncVal = $(this).parent().parent().parent().find(".qty_input");
    qtyVal = parseInt(qtyVal);
    var add = qtyVal + 1;
    IncVal.val(add);
    var prod_id = $(this).closest(".product_data").find(".prod_id").val();
    var prod_qty = add;

    $.ajax({
        method: "POST",
        url: "/update-cart",
        data: {
            prod_qty: prod_qty,
            prod_id: prod_id,
        },
        success: function (response) {
            window.location.reload();
        },
    });
});

$(document).on("click", "#decrease", function () {
    var qtyVal = $(this).parent().parent().parent().find(".qty_input").val();
    //console.log(qtyVal);
    var IncVal = $(this).parent().parent().parent().find(".qty_input");
    qtyVal = parseInt(qtyVal);
    if (qtyVal > 1) {
        var decr = qtyVal - 1;
    } else {
        var decr = 1;
    }
    IncVal.val(decr);
    var prod_id = $(this).closest(".product_data").find(".prod_id").val();
    var prod_qty = decr;

    $.ajax({
        method: "POST",
        url: "/update-cart",
        data: {
            prod_qty: prod_qty,
            prod_id: prod_id,
        },
        success: function (response) {
            window.location.reload();
        },
    });
});

$(document).on("click", "#increas", function () {
    var qtyVal = $(this).parent().parent().parent().find(".qty_input").val();
    //console.log(qtyVal);
    var IncVal = $(this).parent().parent().parent().find(".qty_input");
    qtyVal = parseInt(qtyVal);
    var add = qtyVal + 1;
    IncVal.val(add);
    var prod_id = $(this).closest(".product_data").find(".prod_id").val();
    var prod_qty = add;

    $.ajax({
        method: "POST",
        url: "/update-cart",
        data: {
            prod_qty: prod_qty,
            prod_id: prod_id,
        },
        success: function (response) {},
    });
});

$(document).on("click", "#decreas", function () {
    var qtyVal = $(this).parent().parent().parent().find(".qty_input").val();
    //console.log(qtyVal);
    var IncVal = $(this).parent().parent().parent().find(".qty_input");
    qtyVal = parseInt(qtyVal);
    if (qtyVal > 1) {
        var decr = qtyVal - 1;
    } else {
        var decr = 1;
    }
    IncVal.val(decr);
    var prod_id = $(this).closest(".product_data").find(".prod_id").val();
    var prod_qty = decr;

    $.ajax({
        method: "POST",
        url: "/update-cart",
        data: {
            prod_qty: prod_qty,
            prod_id: prod_id,
        },
        success: function (response) {
            window.location.reload();
        },
    });
});
