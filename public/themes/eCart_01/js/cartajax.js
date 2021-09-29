////////////open product varient modal///////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $('.productmodal').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var slug = $(this).closest('.inner').find('.slug').val();
        $.ajax({
            url: home + "productajax/"+slug,
            method: 'GET',
            beforeSend: function() {
                $("#loader").show();
             },
            success: function (response) {
                $("#loader").hide();
                $('#productvariant').modal('show');
                console.log(response);
                var html = '';
        html +=
            '<div class="row mt-5">'+
            '<div class="col-lg-6 col-md-12 col-12 pics text-center productdetails1">'+
            '<div class="wrap-gallery-article">'+
            '<div id="myCarouselArticle" class="carousel slide" data-ride="carousel">'+
            '<div class="carousel-inner" role="listbox">'+
            '<div class="carousel-item active">'+
            '<img class="outerdetailimg" src="'+response.product.image+'" alt="'+response.product.name+'">'+
            '</div>';
            var count_other_image = response.product.other_images.length;
            if( count_other_image > 0){
            $.each(response.product.other_images, function (i, e) {
            html += '<div class="carousel-item">'+
            '<img class="outerdetailimg" src="'+e.other_images+'" alt=" ">'+
            '</div>';
            });
            }
            html += '</div>'+
            '<a class="carousel-control-prev" href="#myCarouselArticle" role="button" data-slide="prev">'+
            '<em class="fa fa-angle-left text-dark font-weight-bold"></em>'+
            '</a>'+
            '<a class="carousel-control-next" href="#myCarouselArticle" role="button" data-slide="next">'+
            '<em class="fa fa-angle-right text-dark font-weight-bold"></em>'+
            '</a>'+
            '</div>'+
            '<br>'+
            '<div class="row hidden-xs " id="slider-thumbs">'+
            '<ul class="reset-ul d-flex flex-wrap list-thumb-gallery">'+
            '<li class="col-sm-3 col-3 thumb-gallery-smallimg">'+
            '<a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="0">'+
            '<img class="img-fluid" src="'+response.product.image+'" alt="'+response.product.name+'">'+
            '</a>'+
            '</li>';
            var count=1;
            $.each(response.product.other_images, function (i, e) {
            html += '<li class="col-sm-3 col-3 thumb-gallery-smallimg">'+
            '<a class="thumbnail thumbnailimg" data-target="#myCarouselArticle" data-slide-to="">'+
            '<img class="img-fluid" src="" alt="">'+
            '</a>'+
            '</li>';
            count++;
            });
            html += '</ul>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-6 col-md-12 col-12 productdetails2 ">'+
            '<aside class="add-to-fav" >'+
            '<button type="button" class="btn ';
            if(response.product.is_favorite  == true){
                html += 'saved';
            }
            else{
                html += 'save';
            }
            var tax_discounted_price1 = parseFloat(response.product.variants[0].discounted_price) + parseFloat(response.product.variants[0].discounted_price*response.product.tax_percentage/100);
            var tax_mrp_price1 = parseFloat(response.product.variants[0].price) + parseFloat(response.product.variants[0].price*response.product.tax_percentage/100);
            html += '"data-id='+response.product.id+' />'+
            '</aside>'+
            '<div class="text-left">'+
            '<p class="lead title-sec font-weight-bold">'+response.title+'</p>'+
            '<p></p>'+
            '<hr class="line1 ml-0">'+
            '<p class="mt-2 read-more desc">'+response.product.description+'</p>'+
            '<hr class="line1 ml-0"><p class="text-muted" id="price_mrp_'+response.product.id+'"><del>'+response.offer_price+': '+response.currency+' <span class="value">'+parseFloat(tax_discounted_price1).toFixed(2)+'</span></del></p>'+
            '<h5 class="font-weight-bold title-sec" id="price_offer_'+response.product.id+'">'+response.price+': '+response.currency+' <span class="value">'+parseFloat(tax_mrp_price1).toFixed(2)+'</span></h5>'+
            //'<small class="text-primary" id="price_savings_"'+response.product.id+'>'+response.you_save+': '+response.currency+' <span class="value"></span></small>'+
            '<div class="form product_data">'+
            //'<form action="/cart/add" class="addToCart" method="POST">'+
            //'@csrf'+
            '<input type="hidden" name="id" class="productmodal_id" value="'+response.product.id+'" data-id="'+response.product.id+'">'+
            '<input type="hidden" name="type" value="add">'+
            '<input type="hidden" name="child_id"  value="0" id="child_'+response.product.id+'">'+
            '<div class="row mt-4 productmodal_data">'+
            '<div class="button-container col productmodal_data">'+
            '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>'+
            '<input class="form-control qtyPicker qty productmodal_qty" id="qtyPicker_'+response.product.id+'"  type="number" name="qty" data-min="1" min="1" data-max="'+response.product.variants[0].stock+'" max="'+response.product.variants[0].stock+'" value="1" readonly>'+
            '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>'+
            '</div>'+
            '</div>'+
            '<div class="row mt-4">'+
            '<div class="form-group col">'+
            '<div class="btn-group-toggle variant" data-toggle="buttons">';
            var firstSelected = 'active';
            var checked = 'checked';
            $.each(response.product.variants, function (i, e) {
            html += '<button class="btn '+firstSelected+'" data-id="'+response.product.id+'" >'+
            '<span class="text-dark name">'+e.measurement+' '+e.measurement_unit_name+'</span><br>'+
            '<small> '+response.option_from+' '+e.discounted_price+' </small>';
            var tax_discounted_price = parseFloat(e.discounted_price) + parseFloat(e.discounted_price*response.product.tax_percentage/100);
            var tax_mrp_price = parseFloat(e.price) + parseFloat(e.price*response.product.tax_percentage/100);
            html += '<input type="radio" name="options"  class="productmodal_varient" id="option'+e.id+'" data-varient="'+e.id+'"  value="'+e.id+'" data-id="'+e.id+'" data-price="'+parseFloat(tax_discounted_price).toFixed(2)+'" data-tax="'+response.product.tax_percentage+'" data-mrp="'+parseFloat(tax_mrp_price).toFixed(2)+'"  autocomplete="off" '+checked+'>'+
            '</button>';
            if(firstSelected == 'active'){
            firstSelected = '' ;
            }
            if(checked == 'checked'){
            checked = '' ;
            }
            });
            html +='</div>'+
            '</div>'+
            '</div>'+
            '<div class="form-group">';
            var indicator1 = response.product.indicator;
            if(parseInt(indicator1) == 2){
            html += '<img src="'+response.nonvagimg+'" alt="Not Vegetarian Product">'+
            '<span class="text-left ml-1">'+response.not+'<strong>'+response.vegetarian+'</strong> '+response.v_product+'.</span>';
            }
            if(parseInt(indicator1) == 0){
            html += '<img src="'+response.vagimg+'" alt="Vegetarian Product">'+
            '<span class="text-left ml-1">'+response.this_is+' <strong>'+response.vegetarian+'</strong> '+response.v_product+'.</span>';
            }
            html += '</div>'+
            '<div class="form-group text-left add-to-cart1">'+
            '<button type="submit" name="submit" class="btn addtocart">'+
            '<em class="fa fa-shopping-cart"> <span class="text-uppercase ml-2">'+response.add_to_cart+'</span></em>'+
            '</button>'+
            // '<button class="buy-now btn btn-primary text-center text-uppercase text-white addtocart" type="submit" name="submit" value="buynow"> <span class="buy-now1">'+response.buy_now+'</span></button>'+
            '</div>'+
            //'</form>'+
            '</div>'+
              '</div>';
             html += '</div></div>';
            $('.productmodaldetails').html(html);
            },
        });
    });
});
////////////Add to cart Single product///////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $('.addtocart_single').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).closest('.product_data').find('.id').val();
        var varient = $(this).closest('.product_data').find('.varient').val();
        var qty = $(this).closest('.product_data').find('.qty').val();

        $.ajax({
             url: home + "cart/single/addajax",
            method: "POST",
           data: {
                'id': id,
                'varient': varient,
                'qty': qty,
            },
            success: function (response) {
                 if(response.login == "1"){
                $('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                 }else{
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
$(function() {
    $(document).on('click', '.addtocart', function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $('.productmodal_id').val();
        var varient = document.querySelector('input[name = "options"]:checked').value;
        var qty =  $(this).closest('.product_data').find('.qty').val();
        console.log(id);
        console.log(varient);
        console.log(qty);
        $.ajax({
            url: home + "cart/single/addajax",
            method: "POST",
            data: {
                'id': id,
                'varient': varient,
                'qty': qty,
            },
            success: function (response) {
            if(response.login == "1"){
                $('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));
                alertify.set('notifier', 'position', 'top-right');
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
$(function() {
    $(document).on('click', '.addtocart', function(e) {
        e.preventDefault();
 var data = {
            '_token': $('input[name=_token]').val(),

        };
        $.ajax({
            url: home + "cartajax",
            method: "GET",
           dataType: 'json',
            success: function (response) {
                $('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));
                var html = '';

                html += '<div class="cart_gallery">' +
                        '<div class="cart_close"> </div>' +
                        '<table id="myTable" class="table">' +
                        '<tbody>' +
                        '<tr>' +
                        '<td class="mini_cart-subtotal">' +
                        '<span class="mini_cart_close">' +
                        '<a href="#"><em class="fas fa-times"></em></a>' +
                        '</span>'+
                        '<span class="text-right innersubtotal">' ;
                        if (response.subtotal > 0) {
                        html +='<p class="product-name">' + response.total_msg + ' : ' +
                        '<span>' + response.currency + parseFloat(response.subtotal).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        if (response.tax_amount > 0) {
                        html +='<p class="product-name">' + response.tax_msg+ ' : ' +
                        '<span>'  + response.currency  + parseFloat(response.tax_amount).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        
                        if (response.coupon_discount > 0) {
                        html +='<p class="product-name">' + response.coupon_discount_msg + ' : ' +
                        '<span>-' + response.currency  + parseFloat(response.coupon_discount).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        
                        html +='</span>' +
                        '</td>' +
                        '</tr>';

                $.each(response.items, function (i, e) {

                    html += '<tr class="cart1price">' +
                            '<td class="text-right checktrash cart">' +
                            '<figure class="itemside">' +
                            '<div class="aside">' +
                            '<img src="' + e.item[0].image + '" class="img-sm" alt="">' +
                            '</div>' +
                            '<figcaption class="info minicartinfo">' +
                            '<a href="" class="title text-dark">' + e.item[0].name + '</a>' +
                            '<span class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</span><br/>' +
                            '<span class="price-wrap cartShow">' + e.qty + '</span>' +
                            '<form action="'+home+'cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditmini" >' +
                            //'@csrf'+

                            '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                            '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                            '<div class="button-container col pr-0 my-1">' +
                            '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                            '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="'+e.item[0].stock+'" max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>'+
                            '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                            '</div>' +
                            '</form>';
                    if (e.qty > 1) {


                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                            }else{
                                html += 'x<small class="text-muted">' + response.currency + e.item[0].discounted_price + ' </small>';
                            }
                            
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price = e.item[0].price + parseFloat(e.item[0].price * e.item[0].tax_percentage/100).toFixed(2);
                                html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                            }else{
                                html += 'x<small class="text-muted">' + response.currency + e.item[0].price+ ' </small>';
                            }
                            
                        }
                    }

                    html +=
                            '</figcaption>' +
                            '</figure>' +
                            '<div class="price-wrap">' +
                            '<var class="price">';
                            if (e.item[0].discounted_price > 0) {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                    html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                }
                                else{
                                    html += response.currency + parseFloat(e.item[0].discounted_price * e.qty).toFixed(2);
                                }
                                
                            } else {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = parseFloat(e.item[0].price) +  parseFloat(e.item[0].price * e.item[0].tax_percentage / 100);
                                    html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                }
                                else{
                                    html += response.currency + parseFloat(e.item[0].price * e.qty).toFixed(2);
                                }
                                
                            }

                    html += '</var>' +
                            '</div>' +
                            '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                            '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                            '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                            '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' + e.product_variant_id + '" ><em class="fas fa-trash-alt"></em></button>' +
                            '</td>' +
                            '</tr>';

                });

                html += '</tbody>' +
                        '<tfoot>' +
                        '<tr>' +
                        '<td colspan="" class="text-right checkoutbtn">' +
                        '<a href="" class="btn btn-primary">' + response.delete_all_msg + ' <em class="fa fa-trash"></em></a>';
                        if (response.subtotal >= response.min_order_amount) {
                        html += '<a href="'+home+'checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                        }else{
                        html +='<button class="btn btn-primary" disabled> ' + response.checkout_msg + '  <em class="fa fa-arrow-right"></em></button>';
                        }
                        html += '</td>' +
                        '<td colspan="" class="text-right mini_cart-subtotal ">';
                        if (response.saved_price > 0) {
                        html += '<p class="product-name text-right">' + response.saved_price_msg + ' : ' + response.currency + parseFloat(response.saved_price).toFixed(2) + '<span></span></p>';
                        }
                        html += '</td>' +
                        '</tr>' +
                        '</tfoot>' +
                        '</table>' +
                        '</div>';
                $('.mini_cart').html(html);

            },
        });
    });
});

///////////////////// GET Count of cart/////////////////////////////////
$(document).ready(function () {
    $('.addtocart_single').click(function (e) {
        e.preventDefault();


         var data = {
            '_token': $('input[name=_token]').val(),

        };

        $.ajax({
            url: home + "cartajax",
            method: "GET",
            dataType: 'json',
            success: function (response) {
$('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));

                console.log(response);
                var html = '';

                html += '<div class="cart_gallery">' +
                        '<div class="cart_close"> </div>' +
                        '<table id="myTable" class="table">' +
                        '<tbody>' +
                        '<tr>' +
                        '<td class="mini_cart-subtotal">' +
                        '<span class="mini_cart_close">' +
                        '<a href="#"><em class="fas fa-times"></em></a>' +
                        '</span>'+
                        '<span class="text-right innersubtotal">' ;
                        if (response.subtotal > 0) {
                        html +='<p class="product-name">' + response.total_msg + ' : ' +
                        '<span>' + response.currency + parseFloat(response.subtotal).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        if (response.tax_amount > 0) {
                        html +='<p class="product-name">' + response.tax_msg+ ' : ' +
                        '<span>'  + response.currency  + parseFloat(response.tax_amount).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        
                        if (response.coupon_discount > 0) {
                        html +='<p class="product-name">' + response.coupon_discount_msg + ' : ' +
                        '<span>-' + response.currency  + parseFloat(response.coupon_discount).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        
                        html +='</span>' +
                        '</td>' +
                        '</tr>';

                $.each(response.items, function (i, e) {

                    html += '<tr class="cart1price">' +
                            '<td class="text-right checktrash cart">' +
                            '<figure class="itemside">' +
                            '<div class="aside">' +
                            '<img src="' + e.item[0].image + '" class="img-sm" alt="">' +
                            '</div>' +
                            '<figcaption class="info minicartinfo">' +
                            '<a href="" class="title text-dark">' + e.item[0].name + '</a>' +
                            '<span class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</span><br/>' +
                            '<span class="price-wrap cartShow">' + e.qty + '</span>' +
                            '<form action="'+home+'cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditmini" >' +
                            //'@csrf'+

                            '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                            '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                            '<div class="button-container col pr-0 my-1">' +
                            '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                            '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="'+e.item[0].stock+'" max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>'+
                            '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                            '</div>' +
                            '</form>';
                    if (e.qty > 1) {


                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                            }else{
                                html += 'x<small class="text-muted">' + response.currency + e.item[0].discounted_price + ' </small>';
                            }
                            
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price = e.item[0].price + parseFloat(e.item[0].price * e.item[0].tax_percentage/100).toFixed(2);
                                html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                            }else{
                                html += 'x<small class="text-muted">' + response.currency + e.item[0].price+ ' </small>';
                            }
                            
                        }
                    }

                    html +=
                            '</figcaption>' +
                            '</figure>' +
                            '<div class="price-wrap">' +
                            '<var class="price">';
                    if (e.item[0].discounted_price > 0) {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                            html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                        }
                        else{
                            html += response.currency + parseFloat(e.item[0].discounted_price * e.qty).toFixed(2);
                        }
                        
                    } else {
                        if (e.item[0].tax_percentage > 0) {
                            var tax_price = parseFloat(e.item[0].price) +  parseFloat(e.item[0].price * e.item[0].tax_percentage / 100);
                            html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                        }
                        else{
                            html += response.currency + parseFloat(e.item[0].price * e.qty).toFixed(2);
                        }
                        
                    }

                    html += '</var>' +
                            '</div>' +
                            '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                            '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                            '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                            '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' + e.product_variant_id + '" ><em class="fas fa-trash-alt"></em></button>' +
                            '</td>' +
                            '</tr>';

                });

                html += '</tbody>' +
                        '<tfoot>' +
                        '<tr>' +
                        '<td colspan="" class="text-right checkoutbtn">' +
                        '<a href="" class="btn btn-primary">' + response.delete_all_msg + ' <em class="fa fa-trash"></em></a>';
                        if (response.subtotal >= response.min_order_amount) {
                        html += '<a href="'+home+'checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                        }else{
                        html +='<button class="btn btn-primary" disabled> ' + response.checkout_msg + '  <em class="fa fa-arrow-right"></em></button>';
                        }
                        html += '</td>' +
                        '<td colspan="" class="text-right mini_cart-subtotal ">';
                        if (response.saved_price > 0) {
                        html += '<p class="product-name text-right">' + response.saved_price_msg + ' : ' + response.currency + parseFloat(response.saved_price).toFixed(2) + '<span></span></p>';
                        }
                        html += '</td>' +
                        '</tr>' +
                        '</tfoot>' +
                        '</table>' +
                        '</div>';
                $('.mini_cart').html(html);
            },

        });
    });

});

// Delete Cart Data
$(function() {
    $(document).on('click', '.cartDelete', function(e) {

        e.preventDefault();

        var varient = $(this).data('varient');

        var data = {
            '_token': $('input[name=_token]').val(),
            'varient': varient,
        };



        $.ajax({
            url: home + "cart/remove/"+varient,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                               $('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));

               // console.log(response);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                var html = '';

                    html += '<div class="cart_gallery">' +
                            '<div class="cart_close"> </div>' +
                            '<table id="myTable" class="table">' +
                            '<tbody>' +
                            '<tr>' +
                            '<td class="mini_cart-subtotal">' +
                            '<span class="mini_cart_close">' +
                            '<a href="#"><em class="fas fa-times"></em></a>' +
                            '</span>'+
                            '<span class="text-right innersubtotal">' ;
                            if (response.subtotal > 0) {
                            html +='<p class="product-name">' + response.total_msg + ' : ' +
                            '<span>' + response.currency + parseFloat(response.subtotal).toFixed(2) + '</span>' +
                            '</p>';
                            }
                            if (response.tax_amount > 0) {
                            html +='<p class="product-name">' + response.tax_msg+ ' : ' +
                            '<span>'  + response.currency  + parseFloat(response.tax_amount).toFixed(2) + '</span>' +
                            '</p>';
                            }
                            
                            if (response.coupon_discount > 0) {
                            html +='<p class="product-name">' + response.coupon_discount_msg + ' : ' +
                            '<span>-' + response.currency  + parseFloat(response.coupon_discount).toFixed(2) + '</span>' +
                            '</p>';
                            }
                            
                            html +='</span>' +
                            '</td>' +
                            '</tr>';

                    $.each(response.items, function (i, e) {

                        html += '<tr class="cart1price">' +
                                '<td class="text-right checktrash cart">' +
                                '<figure class="itemside">' +
                                '<div class="aside">' +
                                '<img src="' + e.item[0].image + '" class="img-sm" alt="">' +
                                '</div>' +
                                '<figcaption class="info minicartinfo">' +
                                '<a href="" class="title text-dark">' + e.item[0].name + '</a>' +
                                '<span class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</span><br/>' +
                                '<span class="price-wrap cartShow">' + e.qty + '</span>' +
                                '<form action="'+home+'cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditmini" >' +
                                //'@csrf'+

                                '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                                '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                                '<div class="button-container col pr-0 my-1">' +
                                '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                                '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="'+e.item[0].stock+'" max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>'+
                                '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                                '</div>' +
                                '</form>';
                        if (e.qty > 1) {


                            if (e.item[0].discounted_price > 0) {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                    html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                                }else{
                                    html += 'x<small class="text-muted">' + response.currency + e.item[0].discounted_price + ' </small>';
                                }
                                
                            } else {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = e.item[0].price + parseFloat(e.item[0].price * e.item[0].tax_percentage/100).toFixed(2);
                                    html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                                }else{
                                    html += 'x<small class="text-muted">' + response.currency + e.item[0].price+ ' </small>';
                                }
                                
                            }
                        }

                        html +=
                                '</figcaption>' +
                                '</figure>' +
                                '<div class="price-wrap">' +
                                '<var class="price">';
                                if (e.item[0].discounted_price > 0) {
                                    if (e.item[0].tax_percentage > 0) {
                                        var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                        html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                    }
                                    else{
                                        html += response.currency + parseFloat(e.item[0].discounted_price * e.qty).toFixed(2);
                                    }
                                    
                                } else {
                                    if (e.item[0].tax_percentage > 0) {
                                        var tax_price = parseFloat(e.item[0].price) +  parseFloat(e.item[0].price * e.item[0].tax_percentage / 100);
                                        html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                    }
                                    else{
                                        html += response.currency + parseFloat(e.item[0].price * e.qty).toFixed(2);
                                    }
                                    
                                }

                        html += '</var>' +
                                '</div>' +
                                '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                                '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                                '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                                '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' + e.product_variant_id + '" ><em class="fas fa-trash-alt"></em></button>' +
                                '</td>' +
                                '</tr>';

                    });

                    html += '</tbody>' +
                            '<tfoot>' +
                            '<tr>' +
                            '<td colspan="" class="text-right checkoutbtn">' +
                            '<a href="" class="btn btn-primary">' + response.delete_all_msg + ' <em class="fa fa-trash"></em></a>';
                            if (response.subtotal >= response.min_order_amount) {
                            html += '<a href="'+home+'checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                            }else{
                            html +='<button class="btn btn-primary" disabled> ' + response.checkout_msg + '  <em class="fa fa-arrow-right"></em></button>';
                            }
                            html += '</td>' +
                            '<td colspan="" class="text-right mini_cart-subtotal ">';
                            if (response.saved_price > 0) {
                            html += '<p class="product-name text-right">' + response.saved_price_msg + ' : ' + response.currency + parseFloat(response.saved_price).toFixed(2) + '<span></span></p>';
                            }
                            html += '</td>' +
                            '</tr>' +
                            '</tfoot>' +
                            '</table>' +
                            '</div>';
                    $('.mini_cart').html(html);
            }
        });
    });

});

// Delete ALL DATA Cart Data
$(function() {
    $(document).on('click', '.cartDeleteallmini', function(e) {

        e.preventDefault();

        var varient = 'all';

        var data = {
            '_token': $('input[name=_token]').val(),
            'varient': varient,
        };



        $.ajax({
            url: home + "cart/remove/"+varient,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                               $('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));

                //console.log(response);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                var html = '';

                html += '<div class="cart_gallery">' +
                        '<div class="cart_close"> </div>' +
                        '<table id="myTable" class="table">' +
                        '<tbody>' +
                        '<tr>' +
                        '<td class="mini_cart-subtotal">' +
                        '<span class="mini_cart_close">' +
                        '<a href="#"><em class="fas fa-times"></em></a>' +
                        '</span>'+
                        '<span class="text-right innersubtotal">' ;
                        if (response.subtotal > 0) {
                        html +='<p class="product-name">' + response.total_msg + ' : ' +
                        '<span>' + response.currency + parseFloat(response.subtotal).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        if (response.tax_amount > 0) {
                        html +='<p class="product-name">' + response.tax_msg+ ' : ' +
                        '<span>'  + response.currency  + parseFloat(response.tax_amount).toFixed(2) + '</span>' +
                        '</p>';
                        }
                       
                        if (response.coupon_discount > 0) {
                        html +='<p class="product-name">' + response.coupon_discount_msg + ' : ' +
                        '<span>-' + response.currency  + parseFloat(response.coupon_discount).toFixed(2) + '</span>' +
                        '</p>';
                        }
                        
                        html +='</span>' +
                        '</td>' +
                        '</tr>';

                $.each(response.items, function (i, e) {

                    html += '<tr class="cart1price">' +
                            '<td class="text-right checktrash cart">' +
                            '<figure class="itemside">' +
                            '<div class="aside">' +
                            '<img src="' + e.item[0].image + '" class="img-sm" alt="">' +
                            '</div>' +
                            '<figcaption class="info minicartinfo">' +
                            '<a href="" class="title text-dark">' + e.item[0].name + '</a>' +
                            '<span class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</span><br/>' +
                            '<span class="price-wrap cartShow">' + e.qty + '</span>' +
                            '<form action="'+home+'cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditmini" >' +
                            //'@csrf'+

                            '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                            '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                            '<div class="button-container col pr-0 my-1">' +
                            '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                            '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="'+e.item[0].stock+'" max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>'+
                            '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                            '</div>' +
                            '</form>';
                    if (e.qty > 1) {


                        if (e.item[0].discounted_price > 0) {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                            }else{
                                html += 'x<small class="text-muted">' + response.currency + e.item[0].discounted_price + ' </small>';
                            }
                            
                        } else {
                            if (e.item[0].tax_percentage > 0) {
                                var tax_price = e.item[0].price + parseFloat(e.item[0].price * e.item[0].tax_percentage/100).toFixed(2);
                                html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                            }else{
                                html += 'x<small class="text-muted">' + response.currency + e.item[0].price+ ' </small>';
                            }
                            
                        }
                    }

                    html +=
                            '</figcaption>' +
                            '</figure>' +
                            '<div class="price-wrap">' +
                            '<var class="price">';
                            if (e.item[0].discounted_price > 0) {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                    html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                }
                                else{
                                    html += response.currency + parseFloat(e.item[0].discounted_price * e.qty).toFixed(2);
                                }
                                
                            } else {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = parseFloat(e.item[0].price) +  parseFloat(e.item[0].price * e.item[0].tax_percentage / 100);
                                    html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                }
                                else{
                                    html += response.currency + parseFloat(e.item[0].price * e.qty).toFixed(2);
                                }
                                
                            }

                    html += '</var>' +
                            '</div>' +
                            '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                            '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                            '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                            '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' + e.product_variant_id + '" ><em class="fas fa-trash-alt"></em></button>' +
                            '</td>' +
                            '</tr>';

                });

                html += '</tbody>' +
                        '<tfoot>' +
                        '<tr>' +
                        '<td colspan="" class="text-right checkoutbtn">' +
                        '<a href="" class="btn btn-primary">' + response.delete_all_msg + ' <em class="fa fa-trash"></em></a>';
                        if (response.subtotal >= response.min_order_amount) {
                        html += '<a href="'+home+'checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                        }else{
                        html +='<button class="btn btn-primary" disabled> ' + response.checkout_msg + '  <em class="fa fa-arrow-right"></em></button>';
                        }
                        html += '</td>' +
                        '<td colspan="" class="text-right mini_cart-subtotal ">';
                        if (response.saved_price > 0) {
                        html += '<p class="product-name text-right">' + response.saved_price_msg + ' : ' + response.currency + parseFloat(response.saved_price).toFixed(2) + '<span></span></p>';
                        }
                        html += '</td>' +
                        '</tr>' +
                        '</tfoot>' +
                        '</table>' +
                        '</div>';
                $('.mini_cart').html(html);
            }
        });
    });

});

 //edit cart quantity
 $(function() {
    $(document).on("submit", ".cartEditmini",function(e) {

    var URL = $(location).attr('href');
    $.ajax({
    async: true,
    type: "POST",
    url: $(this).attr('action'),
    data: $(this).closest('form').serialize(),
           dataType: 'json',
           success: function(response){
           $('.cart_count').html($('<span class="item_count" id="item_count">' + response.totalcart + '</span>'));
                    console.log(response);
                    var html = '';

                    html += '<div class="cart_gallery">' +
                            '<div class="cart_close"> </div>' +
                            '<table id="myTable" class="table">' +
                            '<tbody>' +
                            '<tr>' +
                            '<td class="mini_cart-subtotal">' +
                            '<span class="mini_cart_close">' +
                            '<a href="#"><em class="fas fa-times"></em></a>' +
                            '</span>'+
                            '<span class="text-right innersubtotal">' ;
                            if (response.subtotal > 0) {
                            html +='<p class="product-name">' + response.total_msg + ' : ' +
                            '<span>' + response.currency + parseFloat(response.subtotal).toFixed(2) + '</span>' +
                            '</p>';
                            }
                            if (response.tax_amount > 0) {
                            html +='<p class="product-name">' + response.tax_msg+ ' : ' +
                            '<span>'  + response.currency  + parseFloat(response.tax_amount).toFixed(2) + '</span>' +
                            '</p>';
                            }
                            
                            if (response.coupon_discount > 0) {
                            html +='<p class="product-name">' + response.coupon_discount_msg + ' : ' +
                            '<span>-' + response.currency  + parseFloat(response.coupon_discount).toFixed(2) + '</span>' +
                            '</p>';
                            }
                            
                            html +='</span>' +
                            '</td>' +
                            '</tr>';

                    $.each(response.items, function (i, e) {

                        html += '<tr class="cart1price">' +
                                '<td class="text-right checktrash cart">' +
                                '<figure class="itemside">' +
                                '<div class="aside">' +
                                '<img src="' + e.item[0].image + '" class="img-sm" alt="">' +
                                '</div>' +
                                '<figcaption class="info minicartinfo">' +
                                '<a href="" class="title text-dark">' + e.item[0].name + '</a>' +
                                '<span class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</span><br/>' +
                                '<span class="price-wrap cartShow">' + e.qty + '</span>' +
                                '<form action="'+home+'cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditmini" >' +
                                //'@csrf'+

                                '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                                '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                                '<div class="button-container col pr-0 my-1">' +
                                '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                                '<input class="form-control qtyPicker productmodal_qty"  type="number" name="qty" data-min="1" min="1" data-max="'+e.item[0].stock+'" max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>'+
                                '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                                '</div>' +
                                '</form>';
                        if (e.qty > 1) {


                            if (e.item[0].discounted_price > 0) {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                    html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                                }else{
                                    html += 'x<small class="text-muted">' + response.currency + e.item[0].discounted_price + ' </small>';
                                }
                                
                            } else {
                                if (e.item[0].tax_percentage > 0) {
                                    var tax_price = e.item[0].price + parseFloat(e.item[0].price * e.item[0].tax_percentage/100).toFixed(2);
                                    html += 'x<small class="text-muted">' + response.currency + tax_price + ' </small>';
                                }else{
                                    html += 'x<small class="text-muted">' + response.currency + e.item[0].price+ ' </small>';
                                }
                                
                            }
                        }

                        html +=
                                '</figcaption>' +
                                '</figure>' +
                                '<div class="price-wrap">' +
                                '<var class="price">';
                                if (e.item[0].discounted_price > 0) {
                                    if (e.item[0].tax_percentage > 0) {
                                        var tax_price = parseFloat(e.item[0].discounted_price) +  parseFloat(e.item[0].discounted_price * e.item[0].tax_percentage / 100);
                                        html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                    }
                                    else{
                                        html += response.currency + parseFloat(e.item[0].discounted_price * e.qty).toFixed(2);
                                    }
                                    
                                } else {
                                    if (e.item[0].tax_percentage > 0) {
                                        var tax_price = parseFloat(e.item[0].price) +  parseFloat(e.item[0].price * e.item[0].tax_percentage / 100);
                                        html += response.currency + parseFloat(tax_price * e.qty).toFixed(2);
                                    }
                                    else{
                                        html += response.currency + parseFloat(e.item[0].price * e.qty).toFixed(2);
                                    }
                                    
                                }

                        html += '</var>' +
                                '</div>' +
                                '<button class="btn btn-light btn-round btnEdit cartShow"><em class="fa fa-pencil-alt"></em></button>' +
                                '<button class="btn btn-light btn-round cartSave cartEdit"><em class="fas fa-check"></em></button>' +
                                '<button class="btn btn-light btn-round btnEdit cartEdit"><em class="fa fa-times"></em></button>' +
                                '<button type="submit" class="btn btn-light btn-round btnDelete cartDelete" data-varient="' + e.product_variant_id + '" ><em class="fas fa-trash-alt"></em></button>' +
                                '</td>' +
                                '</tr>';

                    });

                    html += '</tbody>' +
                            '<tfoot>' +
                            '<tr>' +
                            '<td colspan="" class="text-right checkoutbtn">' +
                            '<a href="" class="btn btn-primary">' + response.delete_all_msg + ' <em class="fa fa-trash"></em></a>';
                            if (response.subtotal >= response.min_order_amount) {
                            html += '<a href="'+home+'checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                            }else{
                            html +='<button class="btn btn-primary" disabled> ' + response.checkout_msg + '  <em class="fa fa-arrow-right"></em></button>';
                            }
                            html += '</td>' +
                            '<td colspan="" class="text-right mini_cart-subtotal ">';
                            if (response.saved_price > 0) {
                            html += '<p class="product-name text-right">' + response.saved_price_msg + ' : ' + response.currency + parseFloat(response.saved_price).toFixed(2) + '<span></span></p>';
                            }
                            html += '</td>' +
                            '</tr>' +
                            '</tfoot>' +
                            '</table>' +
                            '</div>';
                    $('.mini_cart').html(html);
        },

    });

    e.preventDefault();
    });
});


