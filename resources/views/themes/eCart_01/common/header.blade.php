<!DOCTYPE HTML>
<html lang="en" dir="ltr" version="v2.1.0">

<head>
    <link rel="icon" type="image/x-icon" href="{{ _asset(Cache::get('favicon', 'images/favicon.ico')) }}" />
    <title>
        {{ ((isset($data['title']) && trim($data['title']) != "") ? $data['title']." | " : ''). Cache::get('app_name', get('name')) }}
    </title>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ValuePac">
    <meta name="copyright" content="">
    <meta name="keywords" content="{{ Cache::get('common_meta_keywords', '') }}">
    <meta name="description" content="{{ Cache::get('common_meta_description', '') }}">

    <link href="{{ theme('css/ui.css') }}" rel="stylesheet" type="text/css" />
   <!--   <link href="{{ theme('css/rtl_ui.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ theme('css/custom.css') }}" rel="stylesheet" type="text/css" />
   <!--   <link href="{{ theme('css/rtl_custom.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ theme('css/plugins.css') }}" rel="stylesheet" type="text/css" />
   <!--  <link href="{{ theme('css/rtl_responsive.css') }}" rel="stylesheet" type="text/css" /> -->
     <link href="{{ theme('css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ theme('css/stepper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ theme('css/calender.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ theme('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ theme('css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ theme('css/intlTelInput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ theme('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ theme('fonts/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ theme('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ theme('js/bootstrap.min.js') }}"></script>
    <script src="{{ theme('js/jquery-ui.min.js') }}"></script>
    <script src="{{ theme('js/intlTelInput.js') }}"></script>
    <script src="{{ theme('js/select2.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script>
        var home = "{{ get('home_url') }}";
        var profile_api_url = "{{ get('profile_api_url') }}";
        var jwt_secret_key = "{{ get('jwt_secret_key') }}";
    </script>
    <script src="{{ asset('js/script.js') }}"></script>

    <link href="{{ theme('css/cart.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="mobile_overlay"></div>
    <div class="mobile_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bar_open">
                        <a href="#"><i class="fas fa-bars"></i></a>
                    </div>
                    <div class="mobile_wrapper">
                        <div class="bar_close">
                            <a href="#"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="freeshipping">
                            <p>{{__('msg.you_can_get_free_delivery_by_shopping_more_than')}}
                                {{ get_price(Cache::get('min_amount')) }}</p>
                        </div>

                        @if(Cache::has('social_media') && is_array(Cache::get('social_media')) &&
                        count(Cache::get('social_media')))
                        <div class="header_social_icon text-center">
                            <ul>
                                @foreach(Cache::get('social_media') as $i => $c)
                                <li class="social-icon">
                                    <a target="_blank" href="{{ $c->link }}"><em class="fab {{ $c->icon }}"></em></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(trim(Cache::get('support_number', '')) != '')
                        <div class="header_call-support">
                            <p><a href="#">{{Cache::get('support_number')}}</a> Customer Support</p>
                        </div>
                        @endif
                        <div id="menu" class="text-left ">
                            <ul class="header_main_menu">
                                <li class="header_submenu_item active">
                                    <a href="{{ route('home') }}">{{__('msg.home')}}</a>

                                </li>

                                <li class="header_submenu_item">
                                    <a href="{{ route('contact') }}">{{__('msg.contact_us')}}s</a>
                                </li>

                                <li class="header_submenu_item">
                                    <a href="{{ route('shop') }}"> {{__('msg.Shop')}}</a>
                                </li>

                                <li class="header_submenu_item">
                                    <a href="#"> {{__('msg.more')}}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('page', 'about') }}">{{__('msg.about_us')}}</a></li>
                                        <li><a href="{{ route('page', 'faq') }}">{{__('msg.faq')}}</a></li>


                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope"></i> {{Cache::get('support_email')}}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!--offcanvas menu area end-->

    <header class="shadow-sm bg-white">
        <div class="main_header">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="freeshipping">
                                <p>{{__('msg.you_can_get_free_delivery_by_shopping_more_than')}}
                                    {{ get_price(Cache::get('min_amount')) }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header_social_icon text-right">
                                @if(Cache::has('social_media') && is_array(Cache::get('social_media')) &&
                                count(Cache::get('social_media')))
                                <ul>
                                    @foreach(Cache::get('social_media') as $i => $c)
                                    <li class="social-icon">
                                        <a target="_blank" href="{{ $c->link }}"><em
                                                class="fab {{ $c->icon }}"></em></a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="secondheader">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ _asset(Cache::get('web_logo')) }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-12 col-sm-12 col-12">
                            <div class="header_right">
                                <div class="header_search mobile_screen_none">
                                    <form action="{{ route('shop') }}">
                                        @php
                                        $categories = Cache::get('categories', []);
                                        @endphp
                                        <div class="header_hover_category">
                                            <select class="" name="category">
                                                <option selected>{{__('msg.select_category')}}</option>
                                                @foreach($categories as $i=>$c)
                                                <option value="{{ $c->slug }}">{{ $c->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class=" header_search_box">
                                            <input type="text" class="form-control"
                                                value="{{ isset($_GET['s']) ? trim($_GET['s']) : ''}}" name="s"
                                                placeholder="Search Product...">
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                    <div class="header_account_list register">
                                        @if(isLoggedIn())
                                        <ul>
                                            <li><a >Hello, {{ $user['name'] }} <em class="fas fa-chevron-down fa-xs"></em></a>
                                                <ul class="sub_menu myaccount">
                                                <li><a href="{{ route('my-account') }}" > <span class="my-profile-img"><img src="{{ $user['profile'] }}"></span><span class="side-menu account-profile ">{{__('msg.my_profile')}}</span></a></li>


                                                    <li><a href="{{ route('change-password') }}"><em class="fas fa-key"></em><span class="side-menu">{{__('msg.change_password')}}</span></a></li>
                                                    <li> <a href="{{ route('my-orders') }}"><em class="far fa-list-alt"></em><span class="side-menu">{{__('msg.my_orders')}}</span></a></li>
                                                    <li><a href="{{ route('notification') }}"><em class="fa fa-bell"></em><span class="side-menu">{{__('msg.notifications')}}</span></a></li>
                                                    <li> <a href="{{ route('favourite') }}"><em class="fa fa-heart"></em><span class="side-menu">{{__('msg.favourite')}}</span></a></li>
                                                    <li> <a href="{{ route('transaction-history') }}"><em class="fa fa-outdent"></em><span class="side-menu">{{__('msg.transaction_history')}}</span></a></li>
                                                    <li><a href="{{ route('addresses') }}"><em class="fa fa-wrench"></em><span class="side-menu">{{__('msg.manage_addresses')}}</span></a></li>
                                                    <li><a href="{{ route('logout') }}"><em class="fa fa-sign-out-alt"></em><span class="side-menu">{{__('msg.logout')}}</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        @else
                                        <li>
                                          <button class="login_btn" data-toggle="modal" data-target="#myModal">{{__('msg.login')}}</button>
                                        </li>

                                        @endif
                                    </div>
                                    <div class="header_account_list header_wishlist">
                                        @if(isLoggedIn())
                                        <a href="{{ route('favourite') }}"><i class="fas fa-heart fa-sm"></i></a>
                                        @endif
                                    </div>
                                </div>
                                @if(isLoggedIn())
                                    <div class="header_account_list  mini_cart_wrapper">

                                            @else
                                        <div class="header_account_list">
                                            @endif
                                            <a href="#"><i class="fas fa-shopping-cart fa-sm"></i></a>
                                            <span class="cart_count">
                                            @if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) &&
                                            count($data['cart']['cart']))
                                            <span class="item_count" id="item_count">{{ count($data['cart']['cart']) }}</span>
                                            @endif
                                            </span>
                                            <div class="mini_cart">
                                            @if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) &&
                                            count($data['cart']['cart']))
                                            <!--mini cart-->

                                                <div class="cart_gallery">
                                                    <div class="cart_close">


                                                    </div>
                                                    <table id="myTable" class="table ">
                                                        <tbody>
                                                            <tr>
                                                                <td class="mini_cart-subtotal">
                                                                    <span class="mini_cart_close">
                                                                        <a href="#"><em class="fas fa-times"></em></a>
                                                                    </span>

                                                                    @if(isset($data['cart']['cart']) &&
                                                                    is_array($data['cart']['cart']) &&
                                                                    count($data['cart']['cart']))
                                                                    <span class="text-right innersubtotal">
                                                                        <p class="product-name">{{__('msg.total')}} :
                                                                            <span>{{ get_price(sprintf("%0.2f",$data['cart']['total'])) ?? '-' }}</span>
                                                                        </p>


                                                                        @if(isset($data['cart']['coupon']['discount'])
                                                                        &&
                                                                        floatval($data['cart']['coupon']['discount']))
                                                                        <p class="product-name">{{__('msg.discount')}} :
                                                                            <span>-
                                                                                {{ get_price(sprintf("%0.2f",$data['cart']['coupon']['discount'])) ?? '-' }}</span>
                                                                        </p>
                                                                        @endif

                                                                    </span>
                                                                </td>
                                                                @endif
                                                            </tr>

                                                            @if(isset($data['cart']['cart']) &&
                                                            is_array($data['cart']['cart']) &&
                                                            count($data['cart']['cart']))
                                                            @foreach($data['cart']['cart'] as $p)
                                                            @if(isset($p->item[0]))

                                                            <tr class="cart1price">
                                                                <td class="text-right checktrash cart">
                                                                    <a
                                                                        href="">
                                                                        <figure class="itemside">
                                                                            <div class="aside">
                                                                                <img src="{{ $p->item[0]->image }}"
                                                                                    class="img-sm"
                                                                                    alt="{{ $p->item[0]->name ?? 'Product Image' }}">
                                                                            </div>
                                                                            <figcaption class="info minicartinfo">
                                                                                <a href=""
                                                                                    class="title text-dark">{{ $p->item[0]->name ?? '-' }}</a>
                                                                                <span
                                                                                    class="small text-muted">{{ get_varient_name($p->item[0]) ?? '-' }}</span>

                                                                                <br /><span
                                                                                    class="price-wrap cartShow">{{ $p->qty }}</span>
                                                                                <form
                                                                                    action="{{ route('cart-update', $p->product_id) }}"
                                                                                    method="POST" class="cartEdit cartEditmini">
                                                                                    @csrf
                                                                                    <input type="hidden" name="child_id"
                                                                                        value="{{ $p->product_variant_id }}">
                                                                                    <input type="hidden"
                                                                                        name="product_id"
                                                                                        value="{{ $p->product_id }}">
                                                                                    <div
                                                                                        class="button-container col pr-0 my-1">
                                                                                        <button
                                                                                            class="cart-qty-minus button-minus"
                                                                                            type="button"
                                                                                            id="button-minus"
                                                                                            value="-">-</button>
                                                                                        <input
                                                                                            class="form-control qtyPicker"
                                                                                            type="number" name="qty"
                                                                                            data-min="1" min="1"
                                                                                            max="{{ intval(getMaxQty($p->item[0])) }}"
                                                                                            data-max="{{ intval(getMaxQty($p->item[0])) }}"
                                                                                            value="{{ $p->qty }}"
                                                                                            readonly>
                                                                                        <button
                                                                                            class="cart-qty-plus button-plus"
                                                                                            type="button"
                                                                                            id="button-plus"
                                                                                            value="+">+</button>
                                                                                    </div>
                                                                                </form>
                                                                                @if(intval($p->qty) > 1)
                                                                                @if(intval($p->item[0]->discounted_price))
                                                                                x<small class="text-muted">
                                                                                    @if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0)
                                                                                        @php
                                                                                        $tax_price  =  $p->item[0]->discounted_price + ($p->item[0]->discounted_price * $p->item[0]->tax_percentage/100);
                                                                                        @endphp
                                                                                        {{ get_price($tax_price) }}</small>
                                                                                    @else
                                                                                        {{ get_price($p->item[0]->discounted_price) }}</small>
                                                                                    @endif
                                                                                @else
                                                                                x<small class="text-muted">
                                                                                    @if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0)
                                                                                        @php
                                                                                        $tax_price  =  $p->item[0]->price + ($p->item[0]->price * $p->item[0]->tax_percentage/100);
                                                                                        @endphp
                                                                                        {{ get_price($tax_price) }}</small>
                                                                                    @else
                                                                                        {{ get_price($p->item[0]->price) }}</small>
                                                                                    @endif
                                                                                    @endif
                                                                                @endif
                                                                            </figcaption>
                                                                        </figure>
                                                                    </a>
                                                                    <div class="price-wrap">
                                                                        <var class="price">
                                                                            @if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0)
                                                                                @if(intval($p->item[0]->discounted_price))
                                                                                @php
                                                                                    $tax_price  =  $p->item[0]->discounted_price + ($p->item[0]->discounted_price * $p->item[0]->tax_percentage/100);
                                                                                @endphp
                                                                                {{ get_price(sprintf("%0.2f", $tax_price * ($p->qty ?? 1) )) }}
                                                                                @else
                                                                                @php
                                                                                    $tax_price  =  $p->item[0]->price + ($p->item[0]->price * $p->item[0]->tax_percentage/100);
                                                                                @endphp
                                                                                {{ get_price(sprintf("%0.2f",$tax_price * ($p->qty ?? 1) )) }}
                                                                                @endif
                                                                            @else
                                                                                @if(intval($p->item[0]->discounted_price))
                                                                                {{ get_price(sprintf("%0.2f", $p->item[0]->discounted_price * ($p->qty ?? 1) )) }}
                                                                                @else
                                                                                {{ get_price(sprintf("%0.2f", $p->item[0]->price * ($p->qty ?? 1) )) }}
                                                                                @endif
                                                                            @endif
                                                                        </var>

                                                                    </div>

                                                                    <button
                                                                        class="btn btn-light btn-round btnEdit cartShow">
                                                                        <em class="fa fa-pencil-alt"></em></button>
                                                                    <button
                                                                        class="btn btn-light btn-round cartSave cartEdit cartEditmini">
                                                                        <em class="fas fa-check"></em></button>
                                                                    <button
                                                                        class="btn btn-light btn-round btnEdit cartEdit cartEditmini">
                                                                        <em class="fa fa-times"></em></button>
                                                                        <button
                                                                        class="btn btn-light btn-round cartDelete" data-varient="{{ $p->product_variant_id }}">
                                                                        <em class="fas fa-trash-alt"></em></button>

                                                                </td>


                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td colspan="4" class="text-center">
                                                                    <img src="{{ asset('images/empty-cart.png') }}"
                                                                        alt="No Items In Cart">
                                                                    <br><br>
                                                                    <a href="{{ route('shop') }}"
                                                                        class="btn btn-primary"><em
                                                                            class="fa fa-chevron-left  mr-1"></em>{{__('msg.continue_shopping')}}</a>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        </tbody>

                                                        <tfoot>
                                                            <tr>

                                                                @if(isset($data['cart']) && is_array($data['cart']) &&
                                                                count($data['cart']))

                                                                <td colspan="" class="text-right checkoutbtn">
                                                                    <a href=""
                                                                        class="btn btn-primary cartDeleteallmini">{{__('msg.delete_all')}}
                                                                        <em class="fa fa-trash"></em></a>
                                                                    @if(Cache::has('min_order_amount') &&
                                                                    intval($data['cart']['subtotal']) >=
                                                                    intval(Cache::get('min_order_amount')))
                                                                    <a href="{{ route('checkout') }}"
                                                                        class="btn btn-primary">{{__('msg.checkout')}}
                                                                        <em class="fa fa-arrow-right"></em></a>
                                                                    @else
                                                                    <button class="btn btn-primary"
                                                                        disabled>{{__('msg.checkout')}} <em
                                                                            class="fa fa-arrow-right"></em></button>
                                                                    @endif
                                                                </td>
                                                                <td colspan="" class="text-right mini_cart-subtotal ">
                                                                        @if(isset($data['cart']['saved_price']) && floatval($data['cart']['saved_price']))
                                                                            <p class="product-name text-right">{{__('msg.saved_price')}} : <span> {{ get_price(sprintf("%0.2f", $data['cart']['saved_price'])) }}</span></p>

                                                                        @endif
                                                                </td>
                                                                @endif

                                                            </tr>

                                                        </tfoot>



                                                    </table>
                                                </div>
                                                <!--mini cart end-->
                                                @else
                                                <div class="text-center">
                                                    <img src="{{ asset('images/empty-cart.png') }}"
                                                        alt="No Items In Cart">
                                                    <br><br>
                                                    <a href="{{ route('shop') }}"
                                                        class="btn btn-primary text-white"><em
                                                            class="fa fa-chevron-left  mr-1"></em>{{__('msg.continue_shopping')}}</a>
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center positionheader">
                        <div class="col-12 col-md-6 mobile_screen_block">
                            <div class="header_search">
                                <form action="#">
                                    <div class="header_hover_category">
                                        @php
                                        $categories = Cache::get('categories', []);
                                        @endphp
                                        <form action="{{ route('shop') }}">
                                            <select class="" name="category">
                                                <option selected>Select Category</option>
                                                @foreach($categories as $i => $c)
                                                <option value="{{ $c->slug }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>

                                    <div class="header_search_box">
                                        <input type="text" class="form-control"
                                            value="{{ isset($_GET['s']) ? trim($_GET['s']) : ''}}" name="s"
                                            placeholder="Search Product...">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="header_categories_menu">
                                @php
                                $categories = Cache::get('categories', []);
                                $maxProductToShow = 10;
                                $totalCategories = count($categories);
                                @endphp

                                <div class="categories_title">
                                    <h2 class="category_toggle">{{__('msg.all_categories')}}</h2>
                                    <i class="fas fa-chevron-down fa-xs"></i>
                                </div>

                                <div class="header_categories_toggle">
                                    <ul>
                                        @foreach($categories as $k=>$c)

                                        @if(isset($c->childs) && count((array)$c->childs))
                                        <li class="header_menu_item {{ $k >= $maxProductToShow ? 'hidden' : ''}}"><a
                                                href="{{ route('category', $k) }}">{{ $c->name }}<i
                                                    class="fas fa-plus fa-xs"></i></a>
                                            <ul class="header_categories_mega_menu">
                                                @foreach($c->childs as $child)

                                                <li><a
                                                        href="{{ route('shop', ['category' => $c->slug, 'sub-category' => $child->slug]) }}">{{ $child->name }}</a>
                                                </li>

                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                        <li class="{{ $k >= $maxProductToShow ? 'hidden' : ''}}"><a
                                                href="{{ route('category', $c->slug) }}">{{ $c->name }}</a></li>
                                        @endif
                                        @if(intval(--$maxProductToShow))
                                        @else
                                        @if($maxProductToShow == 0)
                                        <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More
                                                Categories</a>
                                        </li>
                                        @endif
                                        @endif
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--main menu start-->
                            <div class="main_menu header_menu_position">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="{{ route('home') }}">{{__('msg.home')}}</a>

                                        </li>
                                        <li><a href="{{ route('shop') }}"> {{__('msg.shop')}}</a></li>

                                        <li><a>{{__('msg.more')}} <em class="fas fa-chevron-down fa-xs"></em></a>
                                            <ul class="sub_menu">
                                                <li><a href="{{ route('page', 'about') }}">{{__('msg.about_us')}}</a></li>
                                                <li><a href="{{ route('page', 'faq') }}">{{__('msg.faq')}}</a></li>

                                            </ul>
                                        </li>

                                        <li><a href="{{ route('contact') }}"> {{__('msg.contact_us')}}</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3">
                            @if(trim(Cache::get('support_number', '')) != '')
                            <div class="header_call-support">
                                <p><a href="#">{{Cache::get('support_number')}}</a> {{__('msg.customer_support')}}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div>
        @include("themes.".get('theme').".parts.breadcrumb")
        @include("themes.".get('theme').".common.msg")
    </div>

    <div class="modal fade popup-dailogbox" id="productvariant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="container">

                    <span class="productmodaldetails">


                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ theme('js/plugins.js') }}"></script>
    <script src="{{ theme('js/home.js') }}"></script>

<script src="{{ theme('js/cartajax.js') }}"></script>
<script src="{{ theme('js/cartpageajax.js') }}"></script>
<div id='loader' style="display: none;">
    <img src="{{URL::asset('images/loading.gif')}}"  id="preloader">
</div>
