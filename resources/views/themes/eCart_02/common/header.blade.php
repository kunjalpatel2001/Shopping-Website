<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" version="v2.1.0">
   <head>
      <link rel="icon" type="image/x-icon" href="{{ _asset(Cache::get('favicon', 'images/favicon.ico')) }}" />
      <title>
         {{ ((isset($data['title']) && trim($data['title']) != "") ? $data['title']." | " : ''). Cache::get('app_name', get('name')) }}
      </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
	  <meta property="og:image:width" content="450"/>
	<meta property="og:image:height" content="298"/>
      <link href="{{ theme('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
      <link href="{{theme('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/semantic.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/plugin.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/owl-carousel.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/rtlcustom.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/intlTelInput.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/animate.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/switcherdemo.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ theme('css/custom.css') }}" rel="stylesheet" type="text/css" id="theme-link"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      <!-- Colors -->
      <link rel="alternate stylesheet" href="{{ theme('css/colors/blue.css') }}" title="blue">
      <link rel="alternate stylesheet" href="{{ theme('css/colors/gold.css') }}" title="gold">
      <link rel="alternate stylesheet" href="{{ theme('css/colors/pink.css') }}" title="pink">
      <link rel="alternate stylesheet" href="{{ theme('css/colors/green.css') }}" title="green">
      <link rel="alternate stylesheet" href="{{ theme('css/colors/red.css') }}" title="red">
      <link rel="alternate stylesheet" href="{{ theme('css/colors/orange.css') }}" title="orange">
      <link rel="alternate stylesheet" href="{{ theme('css/colors/yellow.css') }}" title="yellow">
      <script src="{{ theme('js/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ theme('js/bootstrap.min.js') }}"></script>
      <script src="{{ theme('js/jquery-ui.min.js') }}"></script>
      <script src="{{ theme('js/intlTelInput.js') }}"></script>
      <script src="{{ theme('js/select2.min.js') }}"></script>
      <script src="{{ asset('js/jquery.combostars.js') }}"></script>
      <link rel="alternate stylesheet" href="{{ theme('css/colors/purplish.css') }}" title="purplish">
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <!-- CSS -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <!-- Default theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <!-- Semantic UI theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <!-- Bootstrap theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         :root {
         --buttons: {{ Cache::get('color', '') }};
         --a-hover: {{ Cache::get('color', '') }};
         }     
      </style>
      <script>
         var home = "{{ get('home_url') }}";
         var profile_api_url = "{{  env("API_URL")  }}user-registration.php";
         var review_api_url = "{{  env("API_URL")  }}get-all-products.php";
         var jwt_secret_key = "{{ get('jwt_secret_key') }}";
      </script>
   </head>
   <body>
      {{-- main-content --}}
      <div id="wrapper">
      {{-- scroll-to-top --}}
      <a href="#" id="return-to-top"><em class="fas fa-chevron-up"></em></a>
      {{-- preloader --}}
      {{-- 
      <div class="loader">
         <img src="{{ _asset(Cache::get('loading')) }}">
      </div>
      --}}
      {{-- header --}}
      <!--header area start-->
      <!--offcanvas mobile menu area start-->
      <div class="mobile_menu">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="mobile_canvas_open">
                     <a href="javascript:void(0)"><em class="fas fa-bars"></em></a>
                  </div>
                  <div class="mobile_wrapper">
                     <div class="mobile_canvas_close">
                        <a href="javascript:void(0)"><em class="fas fa-times"></em></a>
                     </div>
                     @if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media')))
                     <div class="header_social_icon text-end">
                        <ul>
                           @foreach(Cache::get('social_media') as $i => $c)
                           <li><a href="{{ $c->link }}" target="_blank"><em class="fab {{ $c->icon }}"></em></a></li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                     @if(trim(Cache::get('support_number', '')) != '')
                     <div class="connect-with-us">
                        <p><a href="#">{{Cache::get('support_number')}}</a>
                           {{__('msg.customer_support')}}
                        </p>
                     </div>
                     @endif
                     <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                           <li class="menu-item-has-children active">
                              <a href="{{ route('home') }}>{{__('msg.Home')}}</a>
                                 </li>
                                 <li class="menu-item-has-children">
                              <a href="shop">{{__('msg.shop')}}</a>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="{{ route('blog') }}">{{__('msg.blog')}}</a>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="#">{{__('msg.more')}} </a>
                              <ul class="sub-menu">
                                 <li><a href="{{ route('about') }}">{{__('msg.about us')}}</a></li>
                                 <li><a href="{{ route('page', 'faq') }}">{{__('msg.faq')}}</a></li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="{{ route('contact') }}"> {{__('msg.contact us')}}</a>
                           </li>
                        </ul>
                     </div>
                     <div class="offcanvas_footer">
                        <span><a href="#"><em class="fas fa-envelope"></em>
                        {{__('msg.support@ekart.com')}}</a></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--offcanvas menu area end-->
      <header>
         <div class="main_header ">
            <div class="header_top ">
               <div class="container">
                  <div class="row align-items-center py-2">
                     <div class="col-lg-6 col-md-6">
                        <ul class="top_bar_left">
                           <li class="price-marquee">
                              <p>{{__('msg.you_can_get_free_delivery_by_shopping_more_than')}}
                                 {{ get_price(Cache::get('min_amount')) }}
                              </p>
                           </li>
                        </ul>
                     </div>
                     <div class="col-lg-6">
                        <div class="header_social_icon text-end">
                           @if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media')))
                           <ul>
                              @foreach(Cache::get('social_media') as $i => $c)
                              <li><a href="{{ $c->link }}" target="_blank"><em class="fab {{ $c->icon }}"></em></a></li>
                              @endforeach
                           </ul>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="middle_content">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                        <div class="logo">
                           <a href="{{ route('home') }}"><img src="{{ _asset(Cache::get('web_logo')) }}" alt="logo"></a>
                        </div>
                     </div>
                     <div class="col-lg-10 col-md-6 col-sm-7 col-12">
                        <div class="content_right_info">
                           <!--main menu start-->
                           <div class="main_menu_content main_menu_position">
                              <nav>
                                 <ul>
                                    <li>
                                       <a href="{{ route('home') }}" class="active">{{__('msg.home')}}
                                       <a>
                                    </li>
                                    <li class="mega_items_content"><a href="{{ route('shop') }}">{{__('msg.shop')}}</a>
                                    </li>
                                    <li><a href="{{ route('blog') }}">{{__('msg.blog')}}</a>
                                    </li>
                                    <li>
                                       <a>{{__('msg.more')}}<em class="fa fa-angle-down"></em></a>
                                       <ul class="sub_menu pages">
                                          <li><a href="{{ route('about') }}">{{__('msg.about us')}}</a></li>
                                          <li><a href="{{ route('page', 'faq') }}">{{__('msg.faq')}}</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a href="{{ route('contact') }}"> {{__('msg.contact us')}}</a>
                                    </li>
                                 </ul>
                              </nav>
                           </div>
                           <!--main menu end-->
                           <div class="header_account_area">
                              <div class="header_account_list register login-sec">
                                 @if(isLoggedIn())
                                 <ul>
                                    <li>
                                       <a >Hello, {{ $user['name'] }} <em class="fas fa-chevron-down fa-xs"></em></a>
                                       <ul class="sub_menu myaccount">
                                          <li><a href="{{ route('my-account') }}" > <span class="my-profile-img"><img src="{{ $user['profile'] }}"></span><span class="side-menu account-profile ">{{__('msg.my_profile')}}</span></a></li>
                                          <li><a href="{{ route('change-password') }}"><em class="fas fa-key"></em><span class="side-menu">{{__('msg.change_password')}}</span></a></li>
                                          <li><a href="{{ route('my-orders') }}"><em class="far fa-list-alt"></em><span class="side-menu">{{__('msg.my_orders')}}</span></a></li>
                                          <li><a href="{{ route('notification') }}"><em class="fa fa-bell"></em><span class="side-menu">{{__('msg.notifications')}}</span></a></li>
                                          <li><a href="{{ route('favourite') }}"><em class="fa fa-heart"></em><span class="side-menu">{{__('msg.favourite')}}</span></a></li>
                                          <li><a href="{{ route('transaction-history') }}"><em class="fa fa-outdent"></em><span class="side-menu">{{__('msg.transaction_history')}}</span></a></li>
                                          <li><a href="{{ route('addresses') }}"><em class="fa fa-wrench"></em><span class="side-menu">{{__('msg.manage_addresses')}}</span></a></li>
                                          <li><a href="{{ route('logout') }}"><em class="fa fa-sign-out-alt"></em><span class="side-menu">{{__('msg.logout')}}</span></a></li>
                                       </ul>
                                    </li>
                                 </ul>
                                 @else
                                 <em class="far fa-user fa-lg">
                                 <button data-bs-toggle="modal" data-bs-target="#myModal" data-tab="login">Login</button></em>
                                 @endif
                              </div>
                              <div class="header_account_list header_wishlist">
                                 <a href="{{ route('favourite') }}"><em class="far fa-heart"></em></a>
                              </div>
                              @if(isLoggedIn())
                              <div class="header_account_list  mini_cart_wrapper">
                                 @else
                                 <div class="header_account_list">
                                    @endif
                                    <a href="#"><i class="fab fa-opencart "></i>
                                    <span class="cart_count">
                                    @if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart']))
                                    <span class="item_count" id="item_count">{{ count($data['cart']['cart']) }}</span>
                                    @endif
                                    </span>
                                    </a>
                                    <div class="mini_cart">
                                       @if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart']))
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
                                                      @if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart']))
                                                      <span class="text-end innersubtotal">
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
                                                   <td class="text-end checktrash cart">
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
                                                      <em class="fas fa-pencil-alt"></em></button>
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
                                                   <td colspan="" class="text-end checkoutbtn">
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
                                                   <td colspan="" class="text-center mini_cart-subtotal ">
                                                      @if(isset($data['cart']['saved_price']) && floatval($data['cart']['saved_price']))
                                                      <p class="product-name text-center">{{__('msg.saved_price')}} : <span> {{ get_price(sprintf("%0.2f", $data['cart']['saved_price'])) }}</span></p>
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
            </div>
            <div class="header_bottom ">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-12 col-md-6 mobail_s_block">
                        <div class="searchbar_content">
                           <form action="{{ route('shop') }}">
                              <div class="category_hover_content">
                                 @php
                                 $categories = Cache::get('categories', []);
                                 @endphp
                                 <select class="" name="category">
                                    @foreach($categories as $i => $c)
                                    <option value="{{ $c->slug }}">{{ $c->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="search-box">
                                 <input placeholder="Search product..." type="text">
                                 <button type="submit"><span class="fas fa-search"></span></button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="categories_menu">
                           @php
                           $categories = Cache::get('categories', []);
                           $maxProductToShow = 10;
                           $totalCategories = count($categories);
                           @endphp
                           <div class="title_content">
                              <h2 class="categories_toggle">{{__('msg.all_categories')}}</h2>
                              <em
                                 class="fas fa-chevron-down fa-xs"></em>
                           </div>
                           <div class="categories_content_toggle">
                              <ul>
                                 @foreach($categories as $k=>$c)
                                 @if(isset($c->childs) && count((array)$c->childs))
                                 <li class="menu_item_content {{ $k >= $maxProductToShow ? 'hidden' : ''}}">
                                    <a href="{{ route('category', $k) }}">{{ $c->name }}<em
                                       class="fas fa-plus fa-xs"></em></a>
                                    <ul class="cate_mega_menu">
                                       @foreach($c->childs as $child)
                                       <li><a href="{{ route('shop', ['category' => $c->slug, 'sub-category' => $child->slug]) }}">{{ $child->name }}</a></li>
                                       @endforeach
                                    </ul>
                                 </li>
                                 @else
                                 <li class="menu_item_content {{ $k >= $maxProductToShow ? 'hidden' : ''}}"><a href="{{ route('category', $k) }}">{{ $c->name }}</a>
                                 </li>
                                 @endif
                                 @if(intval(--$maxProductToShow))
                                 @else
                                 @if($maxProductToShow == 0)
                                 <li><a href="#" id="more-btn"><em class="fa fa-plus" aria-hidden="true"></em>
                                    {{__('msg.more categories')}}</a>
                                 </li>
                                 @endif
                                 @endif
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="searchbar_content mobile_screen_none">
                           <form action="{{ route('shop') }}">
                              <div class="category_hover_content">
                                 @php
                                 $categories = Cache::get('categories', []);
                                 @endphp
                                 <select class="" name="category" style="width:200px;">
                                    <option selected>Select Category</option>
                                    @foreach($categories as $i => $c)
                                    <option value="{{ $c->slug }}">{{ $c->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="search-box">
                                 <input type="text" value="{{ isset($_GET['s']) ? trim($_GET['s']) : ''}}" name="s"
                                    placeholder="Search Product...">
                                 <button type="submit"><em class="fas fa-search"></em></button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        @if(trim(Cache::get('support_number', '')) != '')
                        <div class="connect-with-us">
                           <p><a href="#">{{Cache::get('support_number')}}</a>
                              {{__('msg.customer_support')}}
                           </p>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!--header area end-->
      <!-- modal area start-->
      <div class="modal fade" id="productvariant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="quick_view modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true"><em class="fas fa-times"></em></span>
               </button>
               <div class="modal_body product_details">
                  <div class="container productmodaldetails">
                     <span class="productmodaldetails">
                     </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id='loader2' style="display: none;">
         <img src="{{ _asset(Cache::get('loading')) }}"  id="preloader">
      </div>
      @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
      <script>
         $(function() {
         $('#myModal').modal('show');
         });
      </script>
      @endif
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
	 
      <script>
         @if(!empty(Session::get('suc')))
         swal("Success!", "{{Session::get('suc')}}", "success");
         @endif
         @if(!empty(Session::get('err')))
         swal("Error!", "{{Session::get('err')}}", "error");
         @endif
         

      </script>