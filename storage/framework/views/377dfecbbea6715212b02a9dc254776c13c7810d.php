<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" version="v2.1.0">
   <head>
      <link rel="icon" type="image/x-icon" href="<?php echo e(_asset(Cache::get('favicon', 'images/favicon.ico'))); ?>" />
      <title>
         <?php echo e(((isset($data['title']) && trim($data['title']) != "") ? $data['title']." | " : ''). Cache::get('app_name', get('name'))); ?>

      </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta http-equiv="pragma" content="no-cache" />
      <meta http-equiv="cache-control" content="max-age=604800" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="ValuePac">
      <meta name="copyright" content="">
      <meta name="keywords" content="<?php echo e(Cache::get('common_meta_keywords', '')); ?>">
      <meta name="description" content="<?php echo e(Cache::get('common_meta_description', '')); ?>">
	  <meta property="og:image:width" content="450"/>
	<meta property="og:image:height" content="298"/>
      <link href="<?php echo e(theme('css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
      <link href="<?php echo e(theme('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/semantic.min.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/plugin.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/owl-carousel.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/rtlcustom.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/intlTelInput.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/animate.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('fontawesome/css/all.min.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/switcherdemo.css')); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(theme('css/custom.css')); ?>" rel="stylesheet" type="text/css" id="theme-link"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      <!-- Colors -->
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/blue.css')); ?>" title="blue">
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/gold.css')); ?>" title="gold">
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/pink.css')); ?>" title="pink">
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/green.css')); ?>" title="green">
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/red.css')); ?>" title="red">
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/orange.css')); ?>" title="orange">
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/yellow.css')); ?>" title="yellow">
      <script src="<?php echo e(theme('js/jquery-3.5.1.min.js')); ?>"></script>
      <script src="<?php echo e(theme('js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(theme('js/jquery-ui.min.js')); ?>"></script>
      <script src="<?php echo e(theme('js/intlTelInput.js')); ?>"></script>
      <script src="<?php echo e(theme('js/select2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/jquery.combostars.js')); ?>"></script>
      <link rel="alternate stylesheet" href="<?php echo e(theme('css/colors/purplish.css')); ?>" title="purplish">
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
         --buttons: <?php echo e(Cache::get('color', '')); ?>;
         --a-hover: <?php echo e(Cache::get('color', '')); ?>;
         }     
      </style>
      <script>
         var home = "<?php echo e(get('home_url')); ?>";
         var profile_api_url = "<?php echo e(env("API_URL")); ?>user-registration.php";
         var review_api_url = "<?php echo e(env("API_URL")); ?>get-all-products.php";
         var jwt_secret_key = "<?php echo e(get('jwt_secret_key')); ?>";
      </script>
   </head>
   <body>
      
      <div id="wrapper">
      
      <a href="#" id="return-to-top"><em class="fas fa-chevron-up"></em></a>
      
      
      
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
                     <?php if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media'))): ?>
                     <div class="header_social_icon text-end">
                        <ul>
                           <?php $__currentLoopData = Cache::get('social_media'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li><a href="<?php echo e($c->link); ?>" target="_blank"><em class="fab <?php echo e($c->icon); ?>"></em></a></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                     <?php endif; ?>
                     <?php if(trim(Cache::get('support_number', '')) != ''): ?>
                     <div class="connect-with-us">
                        <p><a href="#"><?php echo e(Cache::get('support_number')); ?></a>
                           <?php echo e(__('msg.customer_support')); ?>

                        </p>
                     </div>
                     <?php endif; ?>
                     <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                           <li class="menu-item-has-children active">
                              <a href="<?php echo e(route('home')); ?>><?php echo e(__('msg.Home')); ?></a>
                                 </li>
                                 <li class="menu-item-has-children">
                              <a href="shop"><?php echo e(__('msg.shop')); ?></a>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="<?php echo e(route('blog')); ?>"><?php echo e(__('msg.blog')); ?></a>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="#"><?php echo e(__('msg.more')); ?> </a>
                              <ul class="sub-menu">
                                 <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('msg.about us')); ?></a></li>
                                 <li><a href="<?php echo e(route('page', 'faq')); ?>"><?php echo e(__('msg.faq')); ?></a></li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="<?php echo e(route('contact')); ?>"> <?php echo e(__('msg.contact us')); ?></a>
                           </li>
                        </ul>
                     </div>
                     <div class="offcanvas_footer">
                        <span><a href="#"><em class="fas fa-envelope"></em>
                        <?php echo e(__('msg.support@ekart.com')); ?></a></span>
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
                              <p><?php echo e(__('msg.you_can_get_free_delivery_by_shopping_more_than')); ?>

                                 <?php echo e(get_price(Cache::get('min_amount'))); ?>

                              </p>
                           </li>
                        </ul>
                     </div>
                     <div class="col-lg-6">
                        <div class="header_social_icon text-end">
                           <?php if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media'))): ?>
                           <ul>
                              <?php $__currentLoopData = Cache::get('social_media'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a href="<?php echo e($c->link); ?>" target="_blank"><em class="fab <?php echo e($c->icon); ?>"></em></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                           <?php endif; ?>
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
                           <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(_asset(Cache::get('web_logo'))); ?>" alt="logo"></a>
                        </div>
                     </div>
                     <div class="col-lg-10 col-md-6 col-sm-7 col-12">
                        <div class="content_right_info">
                           <!--main menu start-->
                           <div class="main_menu_content main_menu_position">
                              <nav>
                                 <ul>
                                    <li>
                                       <a href="<?php echo e(route('home')); ?>" class="active"><?php echo e(__('msg.home')); ?>

                                       <a>
                                    </li>
                                    <li class="mega_items_content"><a href="<?php echo e(route('shop')); ?>"><?php echo e(__('msg.shop')); ?></a>
                                    </li>
                                    <li><a href="<?php echo e(route('blog')); ?>"><?php echo e(__('msg.blog')); ?></a>
                                    </li>
                                    <li>
                                       <a><?php echo e(__('msg.more')); ?><em class="fa fa-angle-down"></em></a>
                                       <ul class="sub_menu pages">
                                          <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('msg.about us')); ?></a></li>
                                          <li><a href="<?php echo e(route('page', 'faq')); ?>"><?php echo e(__('msg.faq')); ?></a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a href="<?php echo e(route('contact')); ?>"> <?php echo e(__('msg.contact us')); ?></a>
                                    </li>
                                 </ul>
                              </nav>
                           </div>
                           <!--main menu end-->
                           <div class="header_account_area">
                              <div class="header_account_list register login-sec">
                                 <?php if(isLoggedIn()): ?>
                                 <ul>
                                    <li>
                                       <a >Hello, <?php echo e($user['name']); ?> <em class="fas fa-chevron-down fa-xs"></em></a>
                                       <ul class="sub_menu myaccount">
                                          <li><a href="<?php echo e(route('my-account')); ?>" > <span class="my-profile-img"><img src="<?php echo e($user['profile']); ?>"></span><span class="side-menu account-profile "><?php echo e(__('msg.my_profile')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('change-password')); ?>"><em class="fas fa-key"></em><span class="side-menu"><?php echo e(__('msg.change_password')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('my-orders')); ?>"><em class="far fa-list-alt"></em><span class="side-menu"><?php echo e(__('msg.my_orders')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('notification')); ?>"><em class="fa fa-bell"></em><span class="side-menu"><?php echo e(__('msg.notifications')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('favourite')); ?>"><em class="fa fa-heart"></em><span class="side-menu"><?php echo e(__('msg.favourite')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('transaction-history')); ?>"><em class="fa fa-outdent"></em><span class="side-menu"><?php echo e(__('msg.transaction_history')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('addresses')); ?>"><em class="fa fa-wrench"></em><span class="side-menu"><?php echo e(__('msg.manage_addresses')); ?></span></a></li>
                                          <li><a href="<?php echo e(route('logout')); ?>"><em class="fa fa-sign-out-alt"></em><span class="side-menu"><?php echo e(__('msg.logout')); ?></span></a></li>
                                       </ul>
                                    </li>
                                 </ul>
                                 <?php else: ?>
                                 <em class="far fa-user fa-lg">
                                 <button data-bs-toggle="modal" data-bs-target="#myModal" data-tab="login">Login</button></em>
                                 <?php endif; ?>
                              </div>
                              <div class="header_account_list header_wishlist">
                                 <a href="<?php echo e(route('favourite')); ?>"><em class="far fa-heart"></em></a>
                              </div>
                              <?php if(isLoggedIn()): ?>
                              <div class="header_account_list  mini_cart_wrapper">
                                 <?php else: ?>
                                 <div class="header_account_list">
                                    <?php endif; ?>
                                    <a href="#"><i class="fab fa-opencart "></i>
                                    <span class="cart_count">
                                    <?php if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
                                    <span class="item_count" id="item_count"><?php echo e(count($data['cart']['cart'])); ?></span>
                                    <?php endif; ?>
                                    </span>
                                    </a>
                                    <div class="mini_cart">
                                       <?php if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
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
                                                      <?php if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
                                                      <span class="text-end innersubtotal">
                                                         <p class="product-name"><?php echo e(__('msg.total')); ?> :
                                                            <span><?php echo e(get_price(sprintf("%0.2f",$data['cart']['total'])) ?? '-'); ?></span>
                                                         </p>
                                                         <?php if(isset($data['cart']['coupon']['discount'])
                                                         &&
                                                         floatval($data['cart']['coupon']['discount'])): ?>
                                                         <p class="product-name"><?php echo e(__('msg.discount')); ?> :
                                                            <span>-
                                                            <?php echo e(get_price(sprintf("%0.2f",$data['cart']['coupon']['discount'])) ?? '-'); ?></span>
                                                         </p>
                                                         <?php endif; ?>
                                                      </span>
                                                   </td>
                                                   <?php endif; ?>
                                                </tr>
                                                <?php if(isset($data['cart']['cart']) &&
                                                is_array($data['cart']['cart']) &&
                                                count($data['cart']['cart'])): ?>
                                                <?php $__currentLoopData = $data['cart']['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($p->item[0])): ?>
                                                <tr class="cart1price">
                                                   <td class="text-end checktrash cart">
                                                      <a
                                                         href="">
                                                         <figure class="itemside">
                                                            <div class="aside">
                                                               <img src="<?php echo e($p->item[0]->image); ?>"
                                                                  class="img-sm"
                                                                  alt="<?php echo e($p->item[0]->name ?? 'Product Image'); ?>">
                                                            </div>
                                                            <figcaption class="info minicartinfo">
                                                      <a href=""
                                                         class="title text-dark"><?php echo e($p->item[0]->name ?? '-'); ?></a>
                                                      <span
                                                         class="small text-muted"><?php echo e(get_varient_name($p->item[0]) ?? '-'); ?></span>
                                                      <br /><span
                                                         class="price-wrap cartShow"><?php echo e($p->qty); ?></span>
                                                      <form
                                                         action="<?php echo e(route('cart-update', $p->product_id)); ?>"
                                                         method="POST" class="cartEdit cartEditmini">
                                                      <?php echo csrf_field(); ?>
                                                      <input type="hidden" name="child_id"
                                                         value="<?php echo e($p->product_variant_id); ?>">
                                                      <input type="hidden"
                                                         name="product_id"
                                                         value="<?php echo e($p->product_id); ?>">
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
                                                         max="<?php echo e(intval(getMaxQty($p->item[0]))); ?>"
                                                         data-max="<?php echo e(intval(getMaxQty($p->item[0]))); ?>"
                                                         value="<?php echo e($p->qty); ?>"
                                                         readonly>
                                                      <button
                                                         class="cart-qty-plus button-plus"
                                                         type="button"
                                                         id="button-plus"
                                                         value="+">+</button>
                                                      </div>
                                                      </form>
                                                      <?php if(intval($p->qty) > 1): ?>
                                                      <?php if(intval($p->item[0]->discounted_price)): ?>
                                                      x<small class="text-muted">
                                                      <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                      <?php
                                                      $tax_price  =  $p->item[0]->discounted_price + ($p->item[0]->discounted_price * $p->item[0]->tax_percentage/100);
                                                      ?>
                                                      <?php echo e(get_price($tax_price)); ?></small>
                                                      <?php else: ?>
                                                      <?php echo e(get_price($p->item[0]->discounted_price)); ?></small>
                                                      <?php endif; ?>
                                                      <?php else: ?>
                                                      x<small class="text-muted">
                                                      <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                      <?php
                                                      $tax_price  =  $p->item[0]->price + ($p->item[0]->price * $p->item[0]->tax_percentage/100);
                                                      ?>
                                                      <?php echo e(get_price($tax_price)); ?></small>
                                                      <?php else: ?>
                                                      <?php echo e(get_price($p->item[0]->price)); ?></small>
                                                      <?php endif; ?>
                                                      <?php endif; ?>
                                                      <?php endif; ?>
                                                      </figcaption>
                                                      </figure>
                                                      </a>
                                                      <div class="price-wrap">
                                                         <var class="price">
                                                         <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                         <?php if(intval($p->item[0]->discounted_price)): ?>
                                                         <?php
                                                         $tax_price  =  $p->item[0]->discounted_price + ($p->item[0]->discounted_price * $p->item[0]->tax_percentage/100);
                                                         ?>
                                                         <?php echo e(get_price(sprintf("%0.2f", $tax_price * ($p->qty ?? 1) ))); ?>

                                                         <?php else: ?>
                                                         <?php
                                                         $tax_price  =  $p->item[0]->price + ($p->item[0]->price * $p->item[0]->tax_percentage/100);
                                                         ?>
                                                         <?php echo e(get_price(sprintf("%0.2f",$tax_price * ($p->qty ?? 1) ))); ?>

                                                         <?php endif; ?>
                                                         <?php else: ?>
                                                         <?php if(intval($p->item[0]->discounted_price)): ?>
                                                         <?php echo e(get_price(sprintf("%0.2f", $p->item[0]->discounted_price * ($p->qty ?? 1) ))); ?>

                                                         <?php else: ?>
                                                         <?php echo e(get_price(sprintf("%0.2f", $p->item[0]->price * ($p->qty ?? 1) ))); ?>

                                                         <?php endif; ?>
                                                         <?php endif; ?>
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
                                                         class="btn btn-light btn-round cartDelete" data-varient="<?php echo e($p->product_variant_id); ?>">
                                                      <em class="fas fa-trash-alt"></em></button>
                                                   </td>
                                                </tr>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <tr>
                                                   <td colspan="4" class="text-center">
                                                      <img src="<?php echo e(asset('images/empty-cart.png')); ?>"
                                                         alt="No Items In Cart">
                                                      <br><br>
                                                      <a href="<?php echo e(route('shop')); ?>"
                                                         class="btn btn-primary"><em
                                                         class="fa fa-chevron-left  mr-1"></em><?php echo e(__('msg.continue_shopping')); ?></a>
                                                   </td>
                                                </tr>
                                                <?php endif; ?>
                                             </tbody>
                                             <tfoot>
                                                <tr>
                                                   <?php if(isset($data['cart']) && is_array($data['cart']) &&
                                                   count($data['cart'])): ?>
                                                   <td colspan="" class="text-end checkoutbtn">
                                                      <a href=""
                                                         class="btn btn-primary cartDeleteallmini"><?php echo e(__('msg.delete_all')); ?>

                                                      <em class="fa fa-trash"></em></a>
                                                      <?php if(Cache::has('min_order_amount') &&
                                                      intval($data['cart']['subtotal']) >=
                                                      intval(Cache::get('min_order_amount'))): ?>
                                                      <a href="<?php echo e(route('checkout')); ?>"
                                                         class="btn btn-primary"><?php echo e(__('msg.checkout')); ?>

                                                      <em class="fa fa-arrow-right"></em></a>
                                                      <?php else: ?>
                                                      <button class="btn btn-primary"
                                                         disabled><?php echo e(__('msg.checkout')); ?> <em
                                                         class="fa fa-arrow-right"></em></button>
                                                      <?php endif; ?>
                                                   </td>
                                                   <td colspan="" class="text-center mini_cart-subtotal ">
                                                      <?php if(isset($data['cart']['saved_price']) && floatval($data['cart']['saved_price'])): ?>
                                                      <p class="product-name text-center"><?php echo e(__('msg.saved_price')); ?> : <span> <?php echo e(get_price(sprintf("%0.2f", $data['cart']['saved_price']))); ?></span></p>
                                                      <?php endif; ?>
                                                   </td>
                                                   <?php endif; ?>
                                                </tr>
                                             </tfoot>
                                          </table>
                                       </div>
                                       <!--mini cart end-->
                                       <?php else: ?>
                                       <div class="text-center">
                                          <img src="<?php echo e(asset('images/empty-cart.png')); ?>"
                                             alt="No Items In Cart">
                                          <br><br>
                                          <a href="<?php echo e(route('shop')); ?>"
                                             class="btn btn-primary text-white"><em
                                             class="fa fa-chevron-left  mr-1"></em><?php echo e(__('msg.continue_shopping')); ?></a>
                                       </div>
                                       <?php endif; ?>
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
                           <form action="<?php echo e(route('shop')); ?>">
                              <div class="category_hover_content">
                                 <?php
                                 $categories = Cache::get('categories', []);
                                 ?>
                                 <select class="" name="category">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($c->slug); ?>"><?php echo e($c->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                           <?php
                           $categories = Cache::get('categories', []);
                           $maxProductToShow = 10;
                           $totalCategories = count($categories);
                           ?>
                           <div class="title_content">
                              <h2 class="categories_toggle"><?php echo e(__('msg.all_categories')); ?></h2>
                              <em
                                 class="fas fa-chevron-down fa-xs"></em>
                           </div>
                           <div class="categories_content_toggle">
                              <ul>
                                 <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if(isset($c->childs) && count((array)$c->childs)): ?>
                                 <li class="menu_item_content <?php echo e($k >= $maxProductToShow ? 'hidden' : ''); ?>">
                                    <a href="<?php echo e(route('category', $k)); ?>"><?php echo e($c->name); ?><em
                                       class="fas fa-plus fa-xs"></em></a>
                                    <ul class="cate_mega_menu">
                                       <?php $__currentLoopData = $c->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li><a href="<?php echo e(route('shop', ['category' => $c->slug, 'sub-category' => $child->slug])); ?>"><?php echo e($child->name); ?></a></li>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                 </li>
                                 <?php else: ?>
                                 <li class="menu_item_content <?php echo e($k >= $maxProductToShow ? 'hidden' : ''); ?>"><a href="<?php echo e(route('category', $k)); ?>"><?php echo e($c->name); ?></a>
                                 </li>
                                 <?php endif; ?>
                                 <?php if(intval(--$maxProductToShow)): ?>
                                 <?php else: ?>
                                 <?php if($maxProductToShow == 0): ?>
                                 <li><a href="#" id="more-btn"><em class="fa fa-plus" aria-hidden="true"></em>
                                    <?php echo e(__('msg.more categories')); ?></a>
                                 </li>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="searchbar_content mobile_screen_none">
                           <form action="<?php echo e(route('shop')); ?>">
                              <div class="category_hover_content">
                                 <?php
                                 $categories = Cache::get('categories', []);
                                 ?>
                                 <select class="" name="category" style="width:200px;">
                                    <option selected>Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($c->slug); ?>"><?php echo e($c->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                              <div class="search-box">
                                 <input type="text" value="<?php echo e(isset($_GET['s']) ? trim($_GET['s']) : ''); ?>" name="s"
                                    placeholder="Search Product...">
                                 <button type="submit"><em class="fas fa-search"></em></button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <?php if(trim(Cache::get('support_number', '')) != ''): ?>
                        <div class="connect-with-us">
                           <p><a href="#"><?php echo e(Cache::get('support_number')); ?></a>
                              <?php echo e(__('msg.customer_support')); ?>

                           </p>
                        </div>
                        <?php endif; ?>
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
         <img src="<?php echo e(_asset(Cache::get('loading'))); ?>"  id="preloader">
      </div>
      <?php if(!empty(Session::get('error_code')) && Session::get('error_code') == 5): ?>
      <script>
         $(function() {
         $('#myModal').modal('show');
         });
      </script>
      <?php endif; ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
	 
      <script>
         <?php if(!empty(Session::get('suc'))): ?>
         swal("Success!", "<?php echo e(Session::get('suc')); ?>", "success");
         <?php endif; ?>
         <?php if(!empty(Session::get('err'))): ?>
         swal("Error!", "<?php echo e(Session::get('err')); ?>", "error");
         <?php endif; ?>
         

      </script><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/common/header.blade.php ENDPATH**/ ?>