// Delete Cart Data
$(function() {
    $(document).on('click', '.cartDeletepage', function(e) {
    
        e.preventDefault();

        var varient = $(this).data('varient');

        var data = {
            '_token': $('input[name=_token]').val(),
            'varient': varient,
        };
        $.ajax({
            url: "/cart/remove/"+varient,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                //console.log(response);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                var html = '';
                    if (response.subtotal > 0) {
                    if(response.subtotal < response.min_order_amount){
                    html += '<div class="row justify-content-center">' +
                            '<div class="col-md-9">' +
                            '<div class="alert alert-warning">' + response.you_must_have_to_purchase + ' ' + response.currency + ' ' + response.min_order_amount + ' ' + response.to_place_order + '</div>' +
                            '</div>' +
                            '</div>';
                    }
                    else if( response.shipping > 0){
                        if(response.subtotal > 0 && response.subtotal < response.min_amount){
                            html += ' <div class="row justify-content-center">' +
                                        '<div class="col-md-9">' +
                                        '<div class="alert alert-info">' + response.you_can_get_free_delivery_by_shopping_more_than + ' ' + response.currency + ' ' + response.min_amount + '</div>' +
                                        '</div>' +
                                        '</div>';
                        }
                    }
                    html += '<div class="row justify-content-center">' +
            '<main class="col-md-9">' +
                '<div class="card">' +
                    '<div class="table-responsive">' +
                       '<table id="myTable" class="table ">' +
                            '<thead>' +
                                '<tr class="cart1title">' +
                                    '<th scope="col">'+response.product+'</th>' +
                                    '<th scope="col">'+response.qty+'</th>' +
                                    '<th scope="col">'+response.price+'</th>' +
                                    '<th scope="col" class="text-right cartext"></th>' +
                                '</tr>' +
                            '</thead>' +
                            '<tbody>' ;
                    $.each(response.items, function (i, e) {
                        html += '<tr class="cart1price">' +
                                '<td>' +
                                '<a href="/product/'+e.item[0].slug+'">' +
                                '<figure class="itemside">' +
                                '<div class="aside">' +
                                '<img src="'+e.item[0].image+'" class="img-sm" alt="'+e.item[0].name+'">' +
                                '</div>' +
                                '<figcaption class="info">' +
                                '<a href="/product/'+e.item[0].slug+'" class="title text-dark">'+e.item[0].name+'</a>' +
                                '<p class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</p>' +
                                '</figcaption>' +
                                '</figure>' +
                                '</a>' +
                                '</td>' +
                                '<td class="cart">' +
                                '<div class="price-wrap cartShow">' + e.qty + '</div>' +
                                '<form action="/cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditpage">' +
                                //@csrf
                                '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                                '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                                '<div class="button-container col">' +
                                '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                                '<input class="form-control qtyPicker" type="number" name="qty" data-min="1" min="1" max="'+e.item[0].stock+'" data-max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>' +
                                '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                                '</div>' +
                                '</form>' +
                                '</td>' +
                                '<td>' +
                                '<div class="price-wrap">' +
                                '<var class="price">' ;
                                if (e.item[0].discounted_price > 0) {
                                html += response.currency + e.item[0].discounted_price * e.qty;
                                }else {
                                html += response.currency + e.item[0].price * e.qty;
                                }
                                html += '</var>';
                                if (e.qty > 1) {
                                if (e.item[0].discounted_price > 0) {
                                html += '<br><small class="text-muted"> ' + response.currency + e.item[0].discounted_price + ' each </small>';
                                }else{
                                html += '<br><small class="text-muted"> ' + response.currency + e.item[0].price+ ' each </small>';
                                }
                                }
                                html += '</div>' +
                                '</td>' +
                                '<td class="text-right checktrash">' +
                                '<button class="btn btn-light btn-round btnEdit cartShow"> <em class="fa fa-pencil-alt"></em></button>' +
                                '<button class="btn btn-light btn-round cartSave cartEdit"> <em class="fas fa-check"></em></button>' +
                                '<button class="btn btn-light btn-round btnEdit cartEdit"> <em class="fa fa-times"></em></button>' +
                                '<button class="btn btn-light btn-round cartDeletepage" data-varient="' + e.product_variant_id + '"><em class="fas fa-trash-alt"></em></button>' +
                                '</td>' +
                                '</tr>';
                    });
                    } else {
                      html+='<tr>' +
                                    '<td colspan="4" class="text-center">' +
                                        '<img src="'+response.empty_card_img+'" alt="No Items In Cart">' +
                                        '<br><br>' +
                                        '<a href="/shop" class="btn btn-primary"><em class="fa fa-chevron-left  mr-1"></em>'+response.continue_shopping+' </a>' +
                                   ' </td>' +
                                '</tr> '; 
                    }
                     html+= '</tbody>';
                     if (response.subtotal > 0) {
                         html+= '<tfoot>'+
                                    '<tr>'+
                                        '<td colspan="2"></td>'+
                                        '<td class="text-right" colspan="2">'+
                                            '<p class="product-name">' + response.subtotal_msg + '  : <span>' + response.currency + + response.subtotal + '</span></p>';
                                            if (response.tax_amount > 0) {
                                               html+= '<p class="product-name">' + response.tax_amount_msg + ' : <span>+ '  + response.currency + + response.tax_amount + '</span></p>';
                                            }
                                            if (response.shipping > 0) {
                                              html+= ' <p class="product-name">' + response.delivery_charge_msg + ' : <span>+ ' + response.currency + + response.shipping + '</span></p>';
                                           }
                                            if (response.coupon_discount > 0) {
                                              html+=  '<p class="product-name">' + response.coupon_discount_msg + ' : <span>- ' + response.currency + + response.coupon_discount + '</span></p>';
                                            }
                                            if (response.total > 0) {
                                           html+= '<p class="product-name">' + response.total_msg + ' : <span> ' + response.currency + + response.total + '</span></p>';
                                            }
                                         html+= '</td>'+
                                   ' </tr>'+
                                    '<tr>'+
                                       '<td class="continue-shopping"><strong><span><a href="/shop" class="btn btn-primary"><em class="fa fa-chevron-left mr-1"></em>'+response.continue_shopping+'</a></span></strong></td>'+
                                       '<td></td>'+
                               '<td colspan="2" class="text-right checkoutbtn">'+
                                                '<a href="" class="btn btn-primary cartDeleteallpage">' + response.delete_all_msg + '  <em class="fa fa-trash"></em></a>';
                                                 if (response.subtotal >= response.min_order_amount) {
                                                   html+= '<a href="/checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                                                 }else{
                                                   html+=  '<button class="btn btn-primary" disabled>' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></button>';
                                                 }
                                            html+= '</td></tr></tfoot></table></div></div></main></div>';
                                       
                       
                                        
                     }
              
            
            
              $('.cartpageajax').html(html);         
        }
        });
    });

});

// Delete ALL DATA Cart Data
$(function() {
    $(document).on('click', '.cartDeleteallpage', function(e) {
    
        e.preventDefault();

        var varient = 'all';

        var data = {
            '_token': $('input[name=_token]').val(),
            'varient': varient,
        };
        $.ajax({
            url: "/cart/remove/"+varient,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var html = '';
                    if (response.subtotal > 0) {
                    if(response.subtotal < response.min_order_amount){
                    html += '<div class="row justify-content-center">' +
                            '<div class="col-md-9">' +
                            '<div class="alert alert-warning">' + response.you_must_have_to_purchase + ' ' + response.currency + ' ' + response.min_order_amount + ' ' + response.to_place_order + '</div>' +
                            '</div>' +
                            '</div>';
                    }
                    else if( response.shipping > 0){
                        if(response.subtotal > 0 && response.subtotal < response.min_amount){
                            html += ' <div class="row justify-content-center">' +
                                        '<div class="col-md-9">' +
                                        '<div class="alert alert-info">' + response.you_can_get_free_delivery_by_shopping_more_than + ' ' + response.currency + ' ' + response.min_amount + '</div>' +
                                        '</div>' +
                                        '</div>';
                        }
                    }
                    html += '<div class="row justify-content-center">' +
            '<main class="col-md-9">' +
                '<div class="card">' +
                    '<div class="table-responsive">' +
                       '<table id="myTable" class="table ">' +
                            '<thead>' +
                                '<tr class="cart1title">' +
                                    '<th scope="col">'+response.product+'</th>' +
                                    '<th scope="col">'+response.qty+'</th>' +
                                    '<th scope="col">'+response.price+'</th>' +
                                    '<th scope="col" class="text-right cartext"></th>' +
                                '</tr>' +
                            '</thead>' +
                            '<tbody>' ;
                    $.each(response.items, function (i, e) {
                        html += '<tr class="cart1price">' +
                                '<td>' +
                                '<a href="/product/'+e.item[0].slug+'">' +
                                '<figure class="itemside">' +
                                '<div class="aside">' +
                                '<img src="'+e.item[0].image+'" class="img-sm" alt="'+e.item[0].name+'">' +
                                '</div>' +
                                '<figcaption class="info">' +
                                '<a href="/product/'+e.item[0].slug+'" class="title text-dark">'+e.item[0].name+'</a>' +
                                '<p class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</p>' +
                                '</figcaption>' +
                                '</figure>' +
                                '</a>' +
                                '</td>' +
                                '<td class="cart">' +
                                '<div class="price-wrap cartShow">' + e.qty + '</div>' +
                                '<form action="/cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditpage">' +
                                //@csrf
                                '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                                '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                                '<div class="button-container col">' +
                                '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                                '<input class="form-control qtyPicker" type="number" name="qty" data-min="1" min="1" max="'+e.item[0].stock+'" data-max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>' +
                                '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                                '</div>' +
                                '</form>' +
                                '</td>' +
                                '<td>' +
                                '<div class="price-wrap">' +
                                '<var class="price">' ;
                                if (e.item[0].discounted_price > 0) {
                                html += response.currency + e.item[0].discounted_price * e.qty;
                                }else {
                                html += response.currency + e.item[0].price * e.qty;
                                }
                                html += '</var>';
                                if (e.qty > 1) {
                                if (e.item[0].discounted_price > 0) {
                                html += '<br><small class="text-muted"> ' + response.currency + e.item[0].discounted_price + ' each </small>';
                                }else{
                                html += '<br><small class="text-muted"> ' + response.currency + e.item[0].price+ ' each </small>';
                                }
                                }
                                html += '</div>' +
                                '</td>' +
                                '<td class="text-right checktrash">' +
                                '<button class="btn btn-light btn-round btnEdit cartShow"> <em class="fa fa-pencil-alt"></em></button>' +
                                '<button class="btn btn-light btn-round cartSave cartEdit"> <em class="fas fa-check"></em></button>' +
                                '<button class="btn btn-light btn-round btnEdit cartEdit"> <em class="fa fa-times"></em></button>' +
                                '<button class="btn btn-light btn-round cartDeletepage" data-varient="' + e.product_variant_id + '"><em class="fas fa-trash-alt"></em></button>' +
                                '</td>' +
                                '</tr>';
                    });
                    } else {
                      html+='<tr>' +
                                    '<td colspan="4" class="text-center">' +
                                        '<img src="'+response.empty_card_img+'" alt="No Items In Cart">' +
                                        '<br><br>' +
                                        '<a href="/shop" class="btn btn-primary"><em class="fa fa-chevron-left  mr-1"></em>'+response.continue_shopping+' </a>' +
                                   ' </td>' +
                                '</tr> '; 
                    }
                     html+= '</tbody>';
                     if (response.subtotal > 0) {
                         html+= '<tfoot>'+
                                    '<tr>'+
                                        '<td colspan="2"></td>'+
                                        '<td class="text-right" colspan="2">'+
                                            '<p class="product-name">' + response.subtotal_msg + '  : <span>' + response.currency + + response.subtotal + '</span></p>';
                                            if (response.tax_amount > 0) {
                                               html+= '<p class="product-name">' + response.tax_amount_msg + ' : <span>+ '  + response.currency + + response.tax_amount + '</span></p>';
                                            }
                                            if (response.shipping > 0) {
                                              html+= ' <p class="product-name">' + response.delivery_charge_msg + ' : <span>+ ' + response.currency + + response.shipping + '</span></p>';
                                           }
                                            if (response.coupon_discount > 0) {
                                              html+=  '<p class="product-name">' + response.coupon_discount_msg + ' : <span>- ' + response.currency + + response.coupon_discount + '</span></p>';
                                            }
                                            if (response.total > 0) {
                                           html+= '<p class="product-name">' + response.total_msg + ' : <span> ' + response.currency + + response.total + '</span></p>';
                                            }
                                         html+= '</td>'+
                                   ' </tr>'+
                                    '<tr>'+
                                       '<td class="continue-shopping"><strong><span><a href="/shop" class="btn btn-primary"><em class="fa fa-chevron-left mr-1"></em>'+response.continue_shopping+'</a></span></strong></td>'+
                                       '<td></td>'+
                               '<td colspan="2" class="text-right checkoutbtn">'+
                                                '<a href="" class="btn btn-primary cartDeleteallpage">' + response.delete_all_msg + '  <em class="fa fa-trash"></em></a>';
                                                 if (response.subtotal >= response.min_order_amount) {
                                                   html+= '<a href="/checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                                                 }else{
                                                   html+=  '<button class="btn btn-primary" disabled>' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></button>';
                                                 }
                                            html+= '</td></tr></tfoot></table></div></div></main></div>';
                                       
                       
                                        
                     }
              
            
            
              $('.cartpageajax').html(html);         
        }
        });
    });

});

 //edit cart quantity
$(document).on("submit", ".cartEditpage",function(e) {
var URL = $(location).attr('href');
$.ajax({
async: true,
type: "POST",
url: $(this).attr('action'),
data: $(this).closest('form').serialize(),
       dataType: 'json',
       success: function (response) {
                //console.log(response);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                var html = '';
                    if (response.subtotal > 0) {
                    if(response.subtotal < response.min_order_amount){
                    html += '<div class="row justify-content-center">' +
                            '<div class="col-md-9">' +
                            '<div class="alert alert-warning">' + response.you_must_have_to_purchase + ' ' + response.currency + ' ' + response.min_order_amount + ' ' + response.to_place_order + '</div>' +
                            '</div>'+
                            '</div>';
                    }
                    else if( response.shipping > 0){
                        if(response.subtotal > 0 && response.subtotal < response.min_amount){
                            html += ' <div class="row justify-content-center">' +
                                        '<div class="col-md-9">' +
                                        '<div class="alert alert-info">' + response.you_can_get_free_delivery_by_shopping_more_than + ' ' + response.currency + ' ' + response.min_amount + '</div>' +
                                        '</div>' +
                                        '</div>';
                        }
                    }
                    html += '<div class="row justify-content-center">' +
            '<main class="col-md-9">' +
                '<div class="card">' +
                    '<div class="table-responsive">' +
                       '<table id="myTable" class="table ">' +
                            '<thead>' +
                                '<tr class="cart1title">' +
                                    '<th scope="col">'+response.product+'</th>' +
                                    '<th scope="col">'+response.qty+'</th>' +
                                    '<th scope="col">'+response.price+'</th>' +
                                    '<th scope="col" class="text-right cartext"></th>' +
                                '</tr>' +
                            '</thead>' +
                            '<tbody>' ;
                    $.each(response.items, function (i, e) {
                        html += '<tr class="cart1price">' +
                                '<td>' +
                                '<a href="/product/'+e.item[0].slug+'">' +
                                '<figure class="itemside">' +
                                '<div class="aside">' +
                                '<img src="'+e.item[0].image+'" class="img-sm" alt="'+e.item[0].name+'">' +
                                '</div>' +
                                '<figcaption class="info">' +
                                '<a href="/product/'+e.item[0].slug+'" class="title text-dark">'+e.item[0].name+'</a>' +
                                '<p class="small text-muted">' + e.item[0].measurement + ' ' + e.item[0].unit + '</p>' +
                                '</figcaption>' +
                                '</figure>' +
                                '</a>' +
                                '</td>' +
                                '<td class="cart">' +
                                '<div class="price-wrap cartShow">' + e.qty + '</div>' +
                                '<form action="/cart/update/' + e.product_id + '" method="POST" class="cartEdit cartEditpage">' +
                                //@csrf
                                '<input type="hidden" name="child_id" value="' + e.product_variant_id + '">' +
                                '<input type="hidden" name="product_id" value="' + e.product_id + '">' +
                                '<div class="button-container col">' +
                                '<button class="cart-qty-minus button-minus" type="button" id="button-minus" value="-">-</button>' +
                                '<input class="form-control qtyPicker" type="number" name="qty" data-min="1" min="1" max="'+e.item[0].stock+'" data-max="'+e.item[0].stock+'" value="' + e.qty + '" readonly>' +
                                '<button class="cart-qty-plus button-plus" type="button" id="button-plus" value="+">+</button>' +
                                '</div>' +
                                '</form>' +
                                '</td>' +
                                '<td>' +
                                '<div class="price-wrap">' +
                                '<var class="price">' ;
                                if (e.item[0].discounted_price > 0) {
                                html += response.currency + e.item[0].discounted_price * e.qty;
                                }else {
                                html += response.currency + e.item[0].price * e.qty;
                                }
                                html += '</var>';
                                if (e.qty > 1) {
                                if (e.item[0].discounted_price > 0) {
                                html += '<br><small class="text-muted"> ' + response.currency + e.item[0].discounted_price + ' each </small>';
                                }else{
                                html += '<br><small class="text-muted"> ' + response.currency + e.item[0].price+ ' each </small>';
                                }
                                }
                                html += '</div>' +
                                '</td>' +
                                '<td class="text-right checktrash">' +
                                '<button class="btn btn-light btn-round btnEdit cartShow"> <em class="fa fa-pencil-alt"></em></button>' +
                                '<button class="btn btn-light btn-round cartSave cartEdit cartEditpage"> <em class="fas fa-check"></em></button>' +
                                '<button class="btn btn-light btn-round btnEdit cartEdit"> <em class="fa fa-times"></em></button>' +
                                '<button class="btn btn-light btn-round cartDeletepage" data-varient="' + e.product_variant_id + '"><em class="fas fa-trash-alt"></em></button>' +
                                '</td>' +
                                '</tr>';
                    });
                    } else {
                      html+='<tr>' +
                                    '<td colspan="4" class="text-center">' +
                                        '<img src="'+response.empty_card_img+'" alt="No Items In Cart">' +
                                        '<br><br>' +
                                        '<a href="/shop" class="btn btn-primary"><em class="fa fa-chevron-left  mr-1"></em>'+response.continue_shopping+' </a>' +
                                   ' </td>' +
                                '</tr> '; 
                    }
                     html+= '</tbody>';
                     if (response.subtotal > 0) {
                         html+= '<tfoot>'+
                                    '<tr>'+
                                        '<td colspan="2"></td>'+
                                        '<td class="text-right" colspan="2">'+
                                            '<p class="product-name">' + response.subtotal_msg + '  : <span>' + response.currency + + response.subtotal + '</span></p>';
                                            if (response.tax_amount > 0) {
                                               html+= '<p class="product-name">' + response.tax_amount_msg + ' : <span>+ '  + response.currency + + response.tax_amount + '</span></p>';
                                            }
                                            if (response.shipping > 0) {
                                              html+= ' <p class="product-name">' + response.delivery_charge_msg + ' : <span>+ ' + response.currency + + response.shipping + '</span></p>';
                                           }
                                            if (response.coupon_discount > 0) {
                                              html+=  '<p class="product-name">' + response.coupon_discount_msg + ' : <span>- ' + response.currency + + response.coupon_discount + '</span></p>';
                                            }
                                            if (response.total > 0) {
                                           html+= '<p class="product-name">' + response.total_msg + ' : <span> ' + response.currency + + response.total + '</span></p>';
                                            }
                                         html+= '</td>'+
                                   ' </tr>'+
                                    '<tr>'+
                                       '<td class="continue-shopping"><strong><span><a href="/shop" class="btn btn-primary"><em class="fa fa-chevron-left mr-1"></em>'+response.continue_shopping+'</a></span></strong></td>'+
                                       '<td></td>'+
                               '<td colspan="2" class="text-right checkoutbtn">'+
                                                '<a href="" class="btn btn-primary cartDeleteallpage">' + response.delete_all_msg + '  <em class="fa fa-trash"></em></a>';
                                                 if (response.subtotal >= response.min_order_amount) {
                                                   html+= '<a href="/checkout/summary" class="btn btn-primary">' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></a>';
                                                 }else{
                                                   html+=  '<button class="btn btn-primary" disabled>' + response.checkout_msg + ' <em class="fa fa-arrow-right"></em></button>';
                                                 }
                                            html+= '</td></tr></tfoot></table></div></div></main></div>';
                                       
                       
                                        
                     }
              
            
            
              $('.cartpageajax').html(html);         
        }
       
});

e.preventDefault();
});