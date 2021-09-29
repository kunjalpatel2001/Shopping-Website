////////////open product varient modal///////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $(".productmodal").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var slug = $(this).closest(".inner").find(".slug").val();
        console.log(slug);
        $.ajax({
            url: home + "productajax/" + slug,
            method: "GET",
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                $("#loader2").show();
            },
            success: function (response) {
                $("#loader2").hide();
                $("#productvariant").modal("show");
                // console.log(response);
                var html = "";
                html +=
                    '<div class="row">' +
                    '<div class="col-lg-6 col-md-6 col-12">' +
                    '<div class="modal_tab">' +
                    '<div class="tab-content product-details-large">' +
                    '<div class="tab-pane fade show active" id="tab1" role="tabpanel">' +
                    '<div class="modal_tab_img">' +
                    '<a href="product-detail.html"><img src="' +
                    response.product.image +
                    '" alt=""></a>' +
                    "</div>" +
                    "</div>" +
                    '<div class="tab-pane fade show" id="tab2" role="tabpanel">' +
                    '<div class="modal_tab_img">' +
                    '<a href="product-detail.html"><img src="' +
                    response.product.image +
                    '" alt=""></a>' +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    '<div class="modal_tab_button">' +
                    '<ul class="nav product_navactive owl-carousel" role="tablist">';
                var count_other_image = response.product.other_images.length;

                if (count_other_image > 0) {
                    for (var i = 0; i < count_other_image; i++) {
                        html +=
                            "<li>" +
                            '<a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img  src="' +
                            response.product.other_images[i] +
                            '" alt=""></a>' +
                            "</li>";
                        html +=
                            "<li>" +
                            '<a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab1" aria-selected="false"><img  src="' +
                            response.product.other_images[i] +
                            '" alt=""></a>' +
                            "</li>";
                    }
                }
                html += "</ul>" + "</div>" + "</div>" + "</div>";
                var tax_discounted_price1 =
                    parseFloat(response.product.variants[0].discounted_price) +
                    parseFloat(
                        (response.product.variants[0].discounted_price *
                            response.product.tax_percentage) /
                            100
                    );
                var tax_mrp_price1 =
                    parseFloat(response.product.variants[0].price) +
                    parseFloat(
                        (response.product.variants[0].price *
                            response.product.tax_percentage) /
                            100
                    );
                html +=
                    '<div class=" col-lg-6 col-md-6 col-12">' +
                    '<div class="product_details_right">' +
                    '<form action="#">' +
                    "<h1><a>" +
                    response.title +
                    "</a></h1>" +
                    '<div class="product_ratting">' +
                    "<ul>" +
                    '<li><a href="javascript:void(0)"><em class="fas fa-star"></em></a></li>' +
                    '<li><a href="javascript:void(0)"><em class="fas fa-star"></em></a></li>' +
                    '<li><a href="javascript:void(0)"><em class="fas fa-star"></em></a></li>' +
                    '<li><a href="javascript:void(0)"><em class="fas fa-star"></em></a></li>' +
                    '<li><a href="javascript:void(0)"><em class="fas fa-star"></em></a></li>' +
                    "<ul>" +
                    "</div>" +
                    '<div class="price_box">' +
                    '<span class="current_price" id="price_offer_' +
                    response.product.id +
                    '"> ' +
                    response.currency +
                    '<span class="value">' +
                    parseFloat(tax_discounted_price1).toFixed(2) +
                    "</span></span>" +
                    '<span class="old_price" id="price_mrp_' +
                    response.product.id +
                    '"> ' +
                    response.currency +
                    '<span class="value">' +
                    parseFloat(tax_mrp_price1).toFixed(2) +
                    "</span></span>" +
                    "</div>" +
                    '<div class="product_desc">' +
                    "<p>" +
                    response.product.description +
                    "</p>" +
                    "</div>" +
                    '<div class="form product_data productmodal_data">' +
                    '<input type="hidden" name="id" class="productmodal_id" value="' +
                    response.product.id +
                    '" data-id="' +
                    response.product.id +
                    '">' +
                    '<input type="hidden" name="type" value="add">' +
                    '<input type="hidden" name="child_id" class="productmodal_varient"  value="0" id="child_' +
                    response.product.id +
                    '">' +
                    '<div class="product-variant1">' +
                    '<div class="product-variant__label">Available in:</div>' +
                    '<div class="btn-group-toggle variant" data-toggle="buttons">';
                var firstSelected = 'active';
                var checked = 'checked';
                $.each(response.product.variants, function (i, e) {
                    html +=
                        '<button class="btn ' +
                        firstSelected +
                        '" data-id="' +
                        response.product.id +
                        '">' +
                        e.measurement +
                        " " +
                        e.measurement_unit_name;
                    var tax_discounted_price =
                        parseFloat(e.discounted_price) +
                        parseFloat(
                            (e.discounted_price *
                                response.product.tax_percentage) /
                                100
                        );
                    var tax_mrp_price =
                        parseFloat(e.price) +
                        parseFloat(
                            (e.price * response.product.tax_percentage) / 100
                        );
                    html +=
                        '<input type="radio" hidden name="options"  class="productmodal_varient" id="option' +
                        e.id +
                        '" data-varient="' +
                        e.id +
                        '"  value="' +
                        e.id +
                        '" data-id="' +
                        e.id +
                        '" data-price="' +
                        parseFloat(tax_discounted_price).toFixed(2) +
                        '" data-tax="' +
                        response.product.tax_percentage +
                        '" data-mrp="' +
                        parseFloat(tax_mrp_price).toFixed(2) +
                        '"  autocomplete="off" ' +
                        checked +
                        ">" +
                        "</button>";
                    if (firstSelected == 'active') {
                        firstSelected = '';
                    }
                    if (checked == 'checked') {
                        checked = '';
                    }
                });

                html +=
                    "</div>" +
                    "</div>" +
                    '<div class="product_variant quantity productmodal_data">' +
                    "<label>quantity</label>" +
                    '<input class="qtyPicker qty productmodal_qty" id="qtyPicker_' +
                    response.product.id +
                    '"  type="number" name="qty" data-min="1" min="1" data-max="' +
                    response.product.variants[0].stock +
                    '" max="' +
                    response.product.variants[0].stock +
                    '" value="1">' +
                    '<button class="btn btn-primary  outline-inward addtocart" name="submit" type="submit"><em class="fas fa-shopping-cart pr-2"></em>add to cart</button>' +
                    '<li class=" btn ';
                if (response.product.is_favorite == true) {
                    html += "saved";
                } else {
                    html += "save";
                }
                html +=
                    '" data-id=' +
                    response.product.id +
                    "> </li>" +
                    "</div>" +
                    "</div>" +
                    '<div class="product_meta">' +
                    '<span>Category: <a href="#">Vegetables</a></span>' +
                    "</div>" +
                    "</form>" +
                    '<div class="priduct_social">' +
                    "<ul>" +
                    '<li><a class="facebook" href="#" title="facebook"><em class="fab fa-facebook-f"></em> Like</a></li>' +
                    '<li><a class="twitter" href="#" title="twitter"><em class="fab fa-twitter"></em> tweet</a> </li>' +
                    '<li><a class="pinterest" href="#" title="pinterest"><em class="fab fa-pinterest"></em> save</a></li>' +
                    '<li><a class="google-plus" href="#" title="google +"><em class="fab fa-google-plus"></em> share</a></li>' +
                    '<li><a class="linkedin" href="#" title="linkedin"><em class="fab fa-linkedin"></em> linked</a></li>' +
                    "<ul>" +
                    "</div>" +
                    "</div>";
                html += "</div></div>";
                $(".productmodaldetails").html(html);
            },
        });
    });
});
////////////Add to cart Single product///////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $(".addtocart_single").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).closest(".product_data").find(".id").val();
        var varient = $(this).closest(".product_data").find(".varient").val();
        var qty = $(this).closest(".product_data").find(".qty").val();

        $.ajax({
            url: home + "cart/single/addajax",
            method: "POST",
            cache: false,
            dataType: "json",
            
            data: {
                id: id,
                varient: varient,
                qty: qty,
            },
            success: function (response) {
                if (response.login == "1") {
                    $(".cart_count").html(
                        $(
                            '<span class="item_count" id="item_count">' +
                                response.totalcart +
                                "</span>"
                        )
                    );
                    alertify.set("notifier", "position", "top-right");
                    alertify.success(response.status);
                } else {
					window.location = home;
                    $('#myModal').each(function(){
                    $(this).modal('show');
                });
                }
                //console.log(response);
            },
        });
    });
});
////////////Add to cart varient product///////////////////////////////////////////////////////////////////
$(function () {
    $(document).on("click", ".addtocart", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var id = $(".productmodal_id").val();
        var varient = document.querySelector('input[name = "options"]:checked').value;
        var qty = $(this).closest(".product_data").find(".qty").val();
        console.log(id);
        console.log(varient);
        console.log(qty);
        $.ajax({
            url: home + "cart/single/addajax",
            method: "POST",
            data: {
                id: id,
                varient: varient,
                qty: qty,
            },
            success: function (response) {
                if (response.login == "1") {
                    $(".cart_count").html(
                        $(
                            '<span class="item_count" id="item_count">' +
                                response.totalcart +
                                "</span>"
                        )
                    );
                    alertify.set("notifier", "position", "top-right");
                    alertify.success(response.status);
                    console.log(response);
                } else {
                    $('#myModal').each(function(){
                    $(this).modal('show');
					
                });
				$('#productvariant').each(function(){
                    $(this).modal('hide');
					
                });
                }
            },
        });
    });
});
////////////Add to cart varient product///////////////////////////////////////////////////////////////////
$(function () {
    $(document).on("click", ".addtocart", function (e) {
        e.preventDefault();

        var data = {
            _token: $("input[name=_token]").val(),
        };
        $.ajax({
            url: home + "cartajax",
            method: "GET",
            dataType: "json",
            success: function (response) {
                var html = "";

                html +=
                    '<div class="cart_gallery">' +
                    '<div class="cart_close"> </div>' +
                    '<table id="myTable" class="table">' +
                    "<tbody>" +
                    "<tr>" +
                    '<td class="mini_cart-subtotal">' +
                    '<span class="mini_cart_close">' +
                    '<a href="#"><em class="fas fa-times"></em></a>' +
                    "</span>" +
                    '<span class="text-right innersubtotal">';
                if (response.subtotal > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.total_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.subtotal).toFixed(2) +
                        "</span>" +
                        "</p>";
                }
                if (response.tax_amount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.tax_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.tax_amount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                if (response.coupon_discount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.coupon_discount_msg +
                        " : " +
                        "<span>-" +
                        response.currency +
                        parseFloat(response.coupon_discount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                html += "</span>" + "</td>" + "</tr>";

                $.each(response.items, function (i, e) {
                    html +=
                        '<tr class="cart1price">' +
                        '<td class="text-right checktrash cart">' +
                        '<figure class="itemside">' +
                        '<div class="aside">' +
                        '<img src="' +
                        e.item[0].image +
                        '" class="img-sm" alt="">' +
                        "</div>" +
                        '<figcaption class="info minicartinfo">' +
                        '<a href="" class="title text-dark">' +
                        e.item[0].name +
                        "</a>" +
                        '<span class="small text-muted">' +
                        e.item[0].measurement +
                        " " +
                        e.item[0].unit +
                        "</span><br/>" +
                        '<span class="price-wrap cartShow">' +
                        e.qty +
                        "</span>" +
                        '<form action="' +
                        home +
                        "cart/update/" +
                        e.product_id +
                        '" method="POST" class="cartEdit cartEditmini" >' +
                        //'@csrf'+

                        '<input type="hidden" name="child_id" value="' +
                        e.product_variant_id +
                        '">' +
                        '<input type="hidden" name="product_id" value="' +
                        e.product_id +
                        '">' +
                        '<div class="button-container col pr-0 my-1">' +
                        '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                        '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="' +
                        e.item[0].stock +
                        '" max="' +
                        e.item[0].stock +
                        '" value="' +
                        e.qty +
                        '" readonly>' +
                        '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                        "</div>" +
                        "</form>";
                    if (e.qty > 1) {
                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    parseFloat(e.item[0].discounted_price) +
                                    parseFloat(
                                        (e.item[0].discounted_price *
                                            e.item[0].tax_percentage) /
                                            100
                                    );
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].discounted_price +
                                    " </small>";
                            }
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    e.item[0].price +
                                    parseFloat(
                                        (e.item[0].price *
                                            e.item[0].tax_percentage) /
                                            100
                                    ).toFixed(2);
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].price +
                                    " </small>";
                            }
                        }
                    }

                    html +=
                        "</figcaption>" +
                        "</figure>" +
                        '<div class="price-wrap">' +
                        '<var class="price">';
                    if (e.item[0].discounted_price > 0) {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].discounted_price) +
                                parseFloat(
                                    (e.item[0].discounted_price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(
                                    e.item[0].discounted_price * e.qty
                                ).toFixed(2);
                        }
                    } else {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].price) +
                                parseFloat(
                                    (e.item[0].price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(e.item[0].price * e.qty).toFixed(2);
                        }
                    }

                    html +=
                        "</var>" +
                        "</div>" +
                        '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                        '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                        '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                        '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' +
                        e.product_variant_id +
                        '" ><em class="fas fa-trash-alt"></em></button>' +
                        "</td>" +
                        "</tr>";
                });

                html +=
                    "</tbody>" +
                    "<tfoot>" +
                    "<tr>" +
                    '<td colspan="" class="text-right checkoutbtn">' +
                    '<a href="" class="btn btn-primary">' +
                    response.delete_all_msg +
                    ' <em class="fa fa-trash"></em></a>';
                if (response.subtotal >= response.min_order_amount) {
                    html +=
                        '<a href="' +
                        home +
                        'checkout/summary" class="btn btn-primary">' +
                        response.checkout_msg +
                        ' <em class="fa fa-arrow-right"></em></a>';
                } else {
                    html +=
                        '<button class="btn btn-primary" disabled> ' +
                        response.checkout_msg +
                        '  <em class="fa fa-arrow-right"></em></button>';
                }
                html +=
                    "</td>" +
                    '<td colspan="" class="text-right mini_cart-subtotal ">';
                if (response.saved_price > 0) {
                    html +=
                        '<p class="product-name text-right">' +
                        response.saved_price_msg +
                        " : " +
                        response.currency +
                        parseFloat(response.saved_price).toFixed(2) +
                        "<span></span></p>";
                }
                html += "</td>" + "</tr>" + "</tfoot>" + "</table>" + "</div>";
                $(".mini_cart").html(html);
            },
        });
    });
});

///////////////////// GET Count of cart/////////////////////////////////
$(document).ready(function () {
    $(".addtocart_single").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var data = {
            _token: $("input[name=_token]").val(),
        };

        $.ajax({
            url: home + "cartajax",
            method: "GET",
            dataType: "json",
            success: function (response) {
                $(".cart_count").html(
                    $(
                        '<span class="item_count" id="item_count">' +
                            response.totalcart +
                            "</span>"
                    )
                );

                console.log(response);
                var html = "";

                html +=
                    '<div class="cart_gallery">' +
                    '<div class="cart_close"> </div>' +
                    '<table id="myTable" class="table">' +
                    "<tbody>" +
                    "<tr>" +
                    '<td class="mini_cart-subtotal">' +
                    '<span class="mini_cart_close">' +
                    '<a href="#"><em class="fas fa-times"></em></a>' +
                    "</span>" +
                    '<span class="text-right innersubtotal">';
                if (response.subtotal > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.total_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.subtotal).toFixed(2) +
                        "</span>" +
                        "</p>";
                }
                if (response.tax_amount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.tax_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.tax_amount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                if (response.coupon_discount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.coupon_discount_msg +
                        " : " +
                        "<span>-" +
                        response.currency +
                        parseFloat(response.coupon_discount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                html += "</span>" + "</td>" + "</tr>";

                $.each(response.items, function (i, e) {
                    html +=
                        '<tr class="cart1price">' +
                        '<td class="text-right checktrash cart">' +
                        '<figure class="itemside">' +
                        '<div class="aside">' +
                        '<img src="' +
                        e.item[0].image +
                        '" class="img-sm" alt="">' +
                        "</div>" +
                        '<figcaption class="info minicartinfo">' +
                        '<a href="" class="title text-dark">' +
                        e.item[0].name +
                        "</a>" +
                        '<span class="small text-muted">' +
                        e.item[0].measurement +
                        " " +
                        e.item[0].unit +
                        "</span><br/>" +
                        '<span class="price-wrap cartShow">' +
                        e.qty +
                        "</span>" +
                        '<form action="' +
                        home +
                        "cart/update/" +
                        e.product_id +
                        '" method="POST" class="cartEdit cartEditmini" >' +
                        //'@csrf'+

                        '<input type="hidden" name="child_id" value="' +
                        e.product_variant_id +
                        '">' +
                        '<input type="hidden" name="product_id" value="' +
                        e.product_id +
                        '">' +
                        '<div class="button-container col pr-0 my-1">' +
                        '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                        '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="' +
                        e.item[0].stock +
                        '" max="' +
                        e.item[0].stock +
                        '" value="' +
                        e.qty +
                        '" readonly>' +
                        '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                        "</div>" +
                        "</form>";
                    if (e.qty > 1) {
                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    parseFloat(e.item[0].discounted_price) +
                                    parseFloat(
                                        (e.item[0].discounted_price *
                                            e.item[0].tax_percentage) /
                                            100
                                    );
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].discounted_price +
                                    " </small>";
                            }
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    e.item[0].price +
                                    parseFloat(
                                        (e.item[0].price *
                                            e.item[0].tax_percentage) /
                                            100
                                    ).toFixed(2);
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].price +
                                    " </small>";
                            }
                        }
                    }

                    html +=
                        "</figcaption>" +
                        "</figure>" +
                        '<div class="price-wrap">' +
                        '<var class="price">';
                    if (e.item[0].discounted_price > 0) {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].discounted_price) +
                                parseFloat(
                                    (e.item[0].discounted_price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(
                                    e.item[0].discounted_price * e.qty
                                ).toFixed(2);
                        }
                    } else {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].price) +
                                parseFloat(
                                    (e.item[0].price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(e.item[0].price * e.qty).toFixed(2);
                        }
                    }

                    html +=
                        "</var>" +
                        "</div>" +
                        '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                        '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                        '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                        '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' +
                        e.product_variant_id +
                        '" ><em class="fas fa-trash-alt"></em></button>' +
                        "</td>" +
                        "</tr>";
                });

                html +=
                    "</tbody>" +
                    "<tfoot>" +
                    "<tr>" +
                    '<td colspan="" class="text-right checkoutbtn">' +
                    '<a href="" class="btn btn-primary">' +
                    response.delete_all_msg +
                    ' <em class="fa fa-trash"></em></a>';
                if (response.subtotal >= response.min_order_amount) {
                    html +=
                        '<a href="' +
                        home +
                        'checkout/summary" class="btn btn-primary">' +
                        response.checkout_msg +
                        ' <em class="fa fa-arrow-right"></em></a>';
                } else {
                    html +=
                        '<button class="btn btn-primary" disabled> ' +
                        response.checkout_msg +
                        '  <em class="fa fa-arrow-right"></em></button>';
                }
                html +=
                    "</td>" +
                    '<td colspan="" class="text-right mini_cart-subtotal ">';
                if (response.saved_price > 0) {
                    html +=
                        '<p class="product-name text-right">' +
                        response.saved_price_msg +
                        " : " +
                        response.currency +
                        parseFloat(response.saved_price).toFixed(2) +
                        "<span></span></p>";
                }
                html += "</td>" + "</tr>" + "</tfoot>" + "</table>" + "</div>";
                $(".mini_cart").html(html);
            },
        });
    });
});

// Delete Cart Data
$(function () {
    $(document).on("click", ".cartDelete", function (e) {
        e.preventDefault();

        var varient = $(this).data("varient");

        var data = {
            _token: $("input[name=_token]").val(),
            varient: varient,
        };

        $.ajax({
            url: home + "cart/remove/" + varient,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $(".cart_count").html(
                    $(
                        '<span class="item_count" id="item_count">' +
                            response.totalcart +
                            "</span>"
                    )
                );

                // console.log(response);
                alertify.set("notifier", "position", "top-right");
                alertify.success(response.status);
                var html = "";

                html +=
                    '<div class="cart_gallery">' +
                    '<div class="cart_close"> </div>' +
                    '<table id="myTable" class="table">' +
                    "<tbody>" +
                    "<tr>" +
                    '<td class="mini_cart-subtotal">' +
                    '<span class="mini_cart_close">' +
                    '<a href="#"><em class="fas fa-times"></em></a>' +
                    "</span>" +
                    '<span class="text-right innersubtotal">';
                if (response.subtotal > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.total_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.subtotal).toFixed(2) +
                        "</span>" +
                        "</p>";
                }
                if (response.tax_amount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.tax_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.tax_amount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                if (response.coupon_discount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.coupon_discount_msg +
                        " : " +
                        "<span>-" +
                        response.currency +
                        parseFloat(response.coupon_discount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                html += "</span>" + "</td>" + "</tr>";

                $.each(response.items, function (i, e) {
                    html +=
                        '<tr class="cart1price">' +
                        '<td class="text-right checktrash cart">' +
                        '<figure class="itemside">' +
                        '<div class="aside">' +
                        '<img src="' +
                        e.item[0].image +
                        '" class="img-sm" alt="">' +
                        "</div>" +
                        '<figcaption class="info minicartinfo">' +
                        '<a href="" class="title text-dark">' +
                        e.item[0].name +
                        "</a>" +
                        '<span class="small text-muted">' +
                        e.item[0].measurement +
                        " " +
                        e.item[0].unit +
                        "</span><br/>" +
                        '<span class="price-wrap cartShow">' +
                        e.qty +
                        "</span>" +
                        '<form action="' +
                        home +
                        "cart/update/" +
                        e.product_id +
                        '" method="POST" class="cartEdit cartEditmini" >' +
                        //'@csrf'+

                        '<input type="hidden" name="child_id" value="' +
                        e.product_variant_id +
                        '">' +
                        '<input type="hidden" name="product_id" value="' +
                        e.product_id +
                        '">' +
                        '<div class="button-container col pr-0 my-1">' +
                        '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                        '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="' +
                        e.item[0].stock +
                        '" max="' +
                        e.item[0].stock +
                        '" value="' +
                        e.qty +
                        '" readonly>' +
                        '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                        "</div>" +
                        "</form>";
                    if (e.qty > 1) {
                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    parseFloat(e.item[0].discounted_price) +
                                    parseFloat(
                                        (e.item[0].discounted_price *
                                            e.item[0].tax_percentage) /
                                            100
                                    );
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].discounted_price +
                                    " </small>";
                            }
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    e.item[0].price +
                                    parseFloat(
                                        (e.item[0].price *
                                            e.item[0].tax_percentage) /
                                            100
                                    ).toFixed(2);
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].price +
                                    " </small>";
                            }
                        }
                    }

                    html +=
                        "</figcaption>" +
                        "</figure>" +
                        '<div class="price-wrap">' +
                        '<var class="price">';
                    if (e.item[0].discounted_price > 0) {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].discounted_price) +
                                parseFloat(
                                    (e.item[0].discounted_price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(
                                    e.item[0].discounted_price * e.qty
                                ).toFixed(2);
                        }
                    } else {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].price) +
                                parseFloat(
                                    (e.item[0].price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(e.item[0].price * e.qty).toFixed(2);
                        }
                    }

                    html +=
                        "</var>" +
                        "</div>" +
                        '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                        '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                        '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                        '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' +
                        e.product_variant_id +
                        '" ><em class="fas fa-trash-alt"></em></button>' +
                        "</td>" +
                        "</tr>";
                });

                html +=
                    "</tbody>" +
                    "<tfoot>" +
                    "<tr>" +
                    '<td colspan="" class="text-right checkoutbtn">' +
                    '<a href="" class="btn btn-primary">' +
                    response.delete_all_msg +
                    ' <em class="fa fa-trash"></em></a>';
                if (response.subtotal >= response.min_order_amount) {
                    html +=
                        '<a href="' +
                        home +
                        'checkout/summary" class="btn btn-primary">' +
                        response.checkout_msg +
                        ' <em class="fa fa-arrow-right"></em></a>';
                } else {
                    html +=
                        '<button class="btn btn-primary" disabled> ' +
                        response.checkout_msg +
                        '  <em class="fa fa-arrow-right"></em></button>';
                }
                html +=
                    "</td>" +
                    '<td colspan="" class="text-right mini_cart-subtotal ">';
                if (response.saved_price > 0) {
                    html +=
                        '<p class="product-name text-right">' +
                        response.saved_price_msg +
                        " : " +
                        response.currency +
                        parseFloat(response.saved_price).toFixed(2) +
                        "<span></span></p>";
                }
                html += "</td>" + "</tr>" + "</tfoot>" + "</table>" + "</div>";
                $(".mini_cart").html(html);
            },
        });
    });
});

// Delete ALL DATA Cart Data
$(function () {
    $(document).on("click", ".cartDeleteallmini", function (e) {
        e.preventDefault();

        var varient = "all";

        var data = {
            _token: $("input[name=_token]").val(),
            varient: varient,
        };

        $.ajax({
            url: home + "cart/remove/" + varient,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $(".cart_count").html(
                    $(
                        '<span class="item_count" id="item_count">' +
                            response.totalcart +
                            "</span>"
                    )
                );

                //console.log(response);
                alertify.set("notifier", "position", "top-right");
                alertify.success(response.status);
                var html = "";

                html +=
                    '<div class="cart_gallery">' +
                    '<div class="cart_close"> </div>' +
                    '<table id="myTable" class="table">' +
                    "<tbody>" +
                    "<tr>" +
                    '<td class="mini_cart-subtotal">' +
                    '<span class="mini_cart_close">' +
                    '<a href="#"><em class="fas fa-times"></em></a>' +
                    "</span>" +
                    '<span class="text-right innersubtotal">';
                if (response.subtotal > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.total_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.subtotal).toFixed(2) +
                        "</span>" +
                        "</p>";
                }
                if (response.tax_amount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.tax_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.tax_amount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                if (response.coupon_discount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.coupon_discount_msg +
                        " : " +
                        "<span>-" +
                        response.currency +
                        parseFloat(response.coupon_discount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                html += "</span>" + "</td>" + "</tr>";

                $.each(response.items, function (i, e) {
                    html +=
                        '<tr class="cart1price">' +
                        '<td class="text-right checktrash cart">' +
                        '<figure class="itemside">' +
                        '<div class="aside">' +
                        '<img src="' +
                        e.item[0].image +
                        '" class="img-sm" alt="">' +
                        "</div>" +
                        '<figcaption class="info minicartinfo">' +
                        '<a href="" class="title text-dark">' +
                        e.item[0].name +
                        "</a>" +
                        '<span class="small text-muted">' +
                        e.item[0].measurement +
                        " " +
                        e.item[0].unit +
                        "</span><br/>" +
                        '<span class="price-wrap cartShow">' +
                        e.qty +
                        "</span>" +
                        '<form action="' +
                        home +
                        "cart/update/" +
                        e.product_id +
                        '" method="POST" class="cartEdit cartEditmini" >' +
                        //'@csrf'+

                        '<input type="hidden" name="child_id" value="' +
                        e.product_variant_id +
                        '">' +
                        '<input type="hidden" name="product_id" value="' +
                        e.product_id +
                        '">' +
                        '<div class="button-container col pr-0 my-1">' +
                        '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                        '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="' +
                        e.item[0].stock +
                        '" max="' +
                        e.item[0].stock +
                        '" value="' +
                        e.qty +
                        '" readonly>' +
                        '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                        "</div>" +
                        "</form>";
                    if (e.qty > 1) {
                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    parseFloat(e.item[0].discounted_price) +
                                    parseFloat(
                                        (e.item[0].discounted_price *
                                            e.item[0].tax_percentage) /
                                            100
                                    );
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].discounted_price +
                                    " </small>";
                            }
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    e.item[0].price +
                                    parseFloat(
                                        (e.item[0].price *
                                            e.item[0].tax_percentage) /
                                            100
                                    ).toFixed(2);
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].price +
                                    " </small>";
                            }
                        }
                    }

                    html +=
                        "</figcaption>" +
                        "</figure>" +
                        '<div class="price-wrap">' +
                        '<var class="price">';
                    if (e.item[0].discounted_price > 0) {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].discounted_price) +
                                parseFloat(
                                    (e.item[0].discounted_price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(
                                    e.item[0].discounted_price * e.qty
                                ).toFixed(2);
                        }
                    } else {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].price) +
                                parseFloat(
                                    (e.item[0].price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(e.item[0].price * e.qty).toFixed(2);
                        }
                    }

                    html +=
                        "</var>" +
                        "</div>" +
                        '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                        '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                        '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                        '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' +
                        e.product_variant_id +
                        '" ><em class="fas fa-trash-alt"></em></button>' +
                        "</td>" +
                        "</tr>";
                });

                html +=
                    "</tbody>" +
                    "<tfoot>" +
                    "<tr>" +
                    '<td colspan="" class="text-right checkoutbtn">' +
                    '<a href="" class="btn btn-primary">' +
                    response.delete_all_msg +
                    ' <em class="fa fa-trash"></em></a>';
                if (response.subtotal >= response.min_order_amount) {
                    html +=
                        '<a href="' +
                        home +
                        'checkout/summary" class="btn btn-primary">' +
                        response.checkout_msg +
                        ' <em class="fa fa-arrow-right"></em></a>';
                } else {
                    html +=
                        '<button class="btn btn-primary" disabled> ' +
                        response.checkout_msg +
                        '  <em class="fa fa-arrow-right"></em></button>';
                }
                html +=
                    "</td>" +
                    '<td colspan="" class="text-right mini_cart-subtotal ">';
                if (response.saved_price > 0) {
                    html +=
                        '<p class="product-name text-right">' +
                        response.saved_price_msg +
                        " : " +
                        response.currency +
                        parseFloat(response.saved_price).toFixed(2) +
                        "<span></span></p>";
                }
                html += "</td>" + "</tr>" + "</tfoot>" + "</table>" + "</div>";
                $(".mini_cart").html(html);
            },
        });
    });
});

//edit cart quantity
$(function () {
    $(document).on("submit", ".cartEditmini", function (e) {
        var URL = $(location).attr("href");
        $.ajax({
            async: true,
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).closest("form").serialize(),
            dataType: "json",
            success: function (response) {
                $(".cart_count").html(
                    $(
                        '<span class="item_count" id="item_count">' +
                            response.totalcart +
                            "</span>"
                    )
                );
                console.log(response);
                var html = "";

                html +=
                    '<div class="cart_gallery">' +
                    '<div class="cart_close"> </div>' +
                    '<table id="myTable" class="table">' +
                    "<tbody>" +
                    "<tr>" +
                    '<td class="mini_cart-subtotal">' +
                    '<span class="mini_cart_close">' +
                    '<a href="#"><em class="fas fa-times"></em></a>' +
                    "</span>" +
                    '<span class="text-right innersubtotal">';
                if (response.subtotal > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.total_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.subtotal).toFixed(2) +
                        "</span>" +
                        "</p>";
                }
                if (response.tax_amount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.tax_msg +
                        " : " +
                        "<span>" +
                        response.currency +
                        parseFloat(response.tax_amount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                if (response.coupon_discount > 0) {
                    html +=
                        '<p class="product-name">' +
                        response.coupon_discount_msg +
                        " : " +
                        "<span>-" +
                        response.currency +
                        parseFloat(response.coupon_discount).toFixed(2) +
                        "</span>" +
                        "</p>";
                }

                html += "</span>" + "</td>" + "</tr>";

                $.each(response.items, function (i, e) {
                    html +=
                        '<tr class="cart1price">' +
                        '<td class="text-right checktrash cart">' +
                        '<figure class="itemside">' +
                        '<div class="aside">' +
                        '<img src="' +
                        e.item[0].image +
                        '" class="img-sm" alt="">' +
                        "</div>" +
                        '<figcaption class="info minicartinfo">' +
                        '<a href="" class="title text-dark">' +
                        e.item[0].name +
                        "</a>" +
                        '<span class="small text-muted">' +
                        e.item[0].measurement +
                        " " +
                        e.item[0].unit +
                        "</span><br/>" +
                        '<span class="price-wrap cartShow">' +
                        e.qty +
                        "</span>" +
                        '<form action="' +
                        home +
                        "cart/update/" +
                        e.product_id +
                        '" method="POST" class="cartEdit cartEditmini" >' +
                        //'@csrf'+

                        '<input type="hidden" name="child_id" value="' +
                        e.product_variant_id +
                        '">' +
                        '<input type="hidden" name="product_id" value="' +
                        e.product_id +
                        '">' +
                        '<div class="button-container col pr-0 my-1">' +
                        '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                        '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="' +
                        e.item[0].stock +
                        '" max="' +
                        e.item[0].stock +
                        '" value="' +
                        e.qty +
                        '" readonly>' +
                        '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                        "</div>" +
                        "</form>";
                    if (e.qty > 1) {
                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    parseFloat(e.item[0].discounted_price) +
                                    parseFloat(
                                        (e.item[0].discounted_price *
                                            e.item[0].tax_percentage) /
                                            100
                                    );
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].discounted_price +
                                    " </small>";
                            }
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price =
                                    e.item[0].price +
                                    parseFloat(
                                        (e.item[0].price *
                                            e.item[0].tax_percentage) /
                                            100
                                    ).toFixed(2);
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    tax_price +
                                    " </small>";
                            } else {
                                html +=
                                    'x<small class="text-muted">' +
                                    response.currency +
                                    e.item[0].price +
                                    " </small>";
                            }
                        }
                    }

                    html +=
                        "</figcaption>" +
                        "</figure>" +
                        '<div class="price-wrap">' +
                        '<var class="price">';
                    if (e.item[0].discounted_price > 0) {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].discounted_price) +
                                parseFloat(
                                    (e.item[0].discounted_price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(
                                    e.item[0].discounted_price * e.qty
                                ).toFixed(2);
                        }
                    } else {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price =
                                parseFloat(e.item[0].price) +
                                parseFloat(
                                    (e.item[0].price *
                                        e.item[0].tax_percentage) /
                                        100
                                );
                            html +=
                                response.currency +
                                parseFloat(tax_price * e.qty).toFixed(2);
                        } else {
                            html +=
                                response.currency +
                                parseFloat(e.item[0].price * e.qty).toFixed(2);
                        }
                    }

                    html +=
                        "</var>" +
                        "</div>" +
                        '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                        '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                        '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                        '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' +
                        e.product_variant_id +
                        '" ><em class="fas fa-trash-alt"></em></button>' +
                        "</td>" +
                        "</tr>";
                });

                html +=
                    "</tbody>" +
                    "<tfoot>" +
                    "<tr>" +
                    '<td colspan="" class="text-right checkoutbtn">' +
                    '<a href="" class="btn btn-primary">' +
                    response.delete_all_msg +
                    ' <em class="fa fa-trash"></em></a>';
                if (response.subtotal >= response.min_order_amount) {
                    html +=
                        '<a href="' +
                        home +
                        'checkout/summary" class="btn btn-primary">' +
                        response.checkout_msg +
                        ' <em class="fa fa-arrow-right"></em></a>';
                } else {
                    html +=
                        '<button class="btn btn-primary" disabled> ' +
                        response.checkout_msg +
                        '  <em class="fa fa-arrow-right"></em></button>';
                }
                html +=
                    "</td>" +
                    '<td colspan="" class="text-right mini_cart-subtotal ">';
                if (response.saved_price > 0) {
                    html +=
                        '<p class="product-name text-right">' +
                        response.saved_price_msg +
                        " : " +
                        response.currency +
                        parseFloat(response.saved_price).toFixed(2) +
                        "<span></span></p>";
                }
                html += "</td>" + "</tr>" + "</tfoot>" + "</table>" + "</div>";
                $(".mini_cart").html(html);
            },
        });

        e.preventDefault();
    });
});
