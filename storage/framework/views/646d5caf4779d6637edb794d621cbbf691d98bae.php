<?php echo $__env->make("themes.$theme.common.msg", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.checkout_summary')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.checkout_summary')); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="main-content">
   <section class="checkout-section ptb-70">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-md-12 col-12 mb-4">
               <div class="account-sidebar account-tab mb-sm-30">
                  <div class="dark-bg tab-title-bg">
                     <div class="heading-part">
                        <div class="sub-title text-center"><span></span><em class="far fa-user"></em> My
                           Account
                        </div>
                     </div>
                  </div>
                  <div class="account-tab-inner">
                     <ul class="account-tab-stap">
                        <li class="active"> <a href="#"><em class="fas fa-wallet"></em>Checkout Summary<i class="fa fa-angle-right"></i> </a> </li>
                        <li> <a href="#"><em class="far fa-heart"></em>Address<i class="fa fa-angle-right"></i> </a> </li>
                        <li> <a href="#"><em class="fas fa-digital-tachograph"></em>Payment<i class="fa fa-angle-right"></i> </a> </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
               <div id="data-step1" class="account-content" data-temp="tabdata">
                  <div class="cart-main-content py-2 py-lg-5">
                     <div class="container">
                        <h3 class="cart-page-title">Order Summary</h3>
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-12">
                              <div class="table_description">
                                 <div class="cart_page-content">
                                    <table aria-describedby="cart-table">
                                       <thead>
                                          <tr class="cart-header">
                                             <th scope="col" class="header_product_thumb">Image
                                             </th>
                                             <th scope="col" class="header_product_name"><?php echo e(__('msg.product')); ?>

                                             </th>
                                             <th scope="col" class="header_product-price"><?php echo e(__('msg.price')); ?>

                                             </th>
                                             <th scope="col" class="header_product_quantity">
                                                <?php echo e(__('msg.qty')); ?>

                                             </th>
                                             <th scope="col" class="header_product_total"><?php echo e(__('msg.subtotal')); ?>

                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php if(isset($data['cart']) && is_array($data['cart']) && count($data['cart'])): ?>
                                          <?php $__currentLoopData = $data['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if(isset($p->item)): ?>
                                          <tr>
                                             <td class="header_product_thumb"><a href="#"><img
                                                src="<?php echo e($p->item[0]->image); ?>"
                                                alt=""></a></td>
                                             <td class="header_product_name">
                                                <a href="#"><?php echo e(strtoupper($p->item[0]->name) ?? '-'); ?></a>
                                                <p class="small text-muted text-center"><?php echo e(get_varient_name($p->item[0])); ?>

                                                   <?php if(intval($p->item[0]->discounted_price)): ?>
                                                   (<?php echo e(intval($p->item[0]->discounted_price)); ?> X <?php echo e(($p->qty ?? 1)); ?>)
                                                   <?php else: ?>
                                                   (<?php echo e(intval($p->item[0]->price)); ?> X <?php echo e(($p->qty ?? 1)); ?>)
                                                   <?php endif; ?>
                                                   <br><?php echo e(__('msg.tax')." (".$p->item[0]->tax_percentage); ?>% <?php echo e($p->item[0]->tax_title); ?>)
                                                </p>
                                             </td>
                                             <td class="header_product-price"><?php if(intval($p->item[0]->discounted_price)): ?>
                                                <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                <?php echo e($p->item[0]->discounted_price+($p->item[0]->discounted_price*$p->item[0]->tax_percentage/100) ?? ''); ?>

                                                <?php else: ?>
                                                <?php echo e($p->item[0]->discounted_price ?? ''); ?>

                                                <?php endif; ?>
                                                <?php else: ?>
                                                <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                <?php echo e($p->item[0]->price+($p->item[0]->price*$p->item[0]->tax_percentage/100) ?? ''); ?>

                                                <?php else: ?>
                                                <?php echo e($p->item[0]->price ?? ''); ?>

                                                <?php endif; ?>
                                                <?php endif; ?>
                                             </td>
                                             <td class="header_product_quantity">
                                                <?php echo e($p->qty); ?>

                                             </td>
                                             <td class="header_product_total"><?php if(intval($p->item[0]->discounted_price)): ?>
                                                <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                <?php echo e(($p->item[0]->discounted_price+($p->item[0]->discounted_price*$p->item[0]->tax_percentage/100)) * ($p->qty ?? 1)); ?>

                                                <?php else: ?>
                                                <?php echo e($p->item[0]->discounted_price * ($p->qty ?? 1)); ?>

                                                <?php endif; ?>
                                                <?php else: ?>
                                                <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                <?php echo e(($p->item[0]->price+($p->item[0]->price*$p->item[0]->tax_percentage/100)) * ($p->qty ?? 1)); ?>

                                                <?php else: ?>
                                                <?php echo e($p->item[0]->price * ($p->qty ?? 1)); ?>

                                                <?php endif; ?>
                                                <?php endif; ?>
                                             </td>
                                          </tr>
                                          <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="cart_submit">
                                    <a href="<?php echo e(route('shop')); ?>" class="btn cart_shopping"><em
                                       class="fas fa-angle-double-left"></em>&nbsp;&nbsp;Continue
                                    Shopping</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-12 ">
                              <div class="discount-code-wrapper">
                                 <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code
                                    </h4>
                                 </div>
                                 <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <form action="<?php echo e(route('coupon-apply')); ?>" method="POST" class='ajax-form <?php echo e(intval($data['coupon'] ?? 0) ? 'address-hide' : ''); ?>' id='couponForm'>
                                    <input type="hidden" name="total" value="<?php echo e($data['total']); ?>">
                                    <div class='formResponse'></div>
                                    <div class="input-group">
                                       <input type="text" class="form-control" name="coupon" value="<?php echo e($data['coupon']['promo_code'] ?? ''); ?>" placeholder="Coupon code">
                                       <span class="input-group-append">
                                       <button class="btn btn-primary">APPLY COUPON</button>
                                       </span>
                                    </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12 ">
                              <div class="grand-total-content">
                                 <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total
                                    </h4>
                                 </div>
                                 <h5><?php echo e(__('msg.subtotal')); ?> : <span><?php echo e(get_price($data['subtotal'] ?? '-')); ?></span></h5>
                                 <?php if(isset($data['tax_amount']) && floatval($data['tax_amount'])): ?>
                                 <h5><?php echo e(__('msg.tax')); ?> <?php echo e($data['tax'] ? $data['tax']."%" : ''); ?> : <span>+ <?php echo e(get_price($data['tax_amount'])); ?></span></h5>
                                 <?php endif; ?>
                                 <?php if(isset($data['coupon']['discount'])  && floatval($data['coupon']['discount'])): ?>
                                 <h5><?php echo e(__('msg.discount')); ?> : <span>-
                                    <?php echo e(get_price(sprintf("%0.2f",$data['coupon']['discount'])) ?? '-'); ?></span>
                                 </h5>
                                 <?php endif; ?>
                                 <?php if(isset($data['saved_price']) && floatval($data['saved_price'])): ?>
                                 <h5><?php echo e(__('msg.saved_price')); ?> : <span>
                                    <?php echo e(get_price($data['saved_price'])); ?></span>
                                 </h5>
                                 <?php endif; ?>
                                 <a href="<?php echo e(route('checkout-address')); ?>">Proceed to Address&nbsp;&nbsp;<em
                                    class="fas fa-angle-double-right"></em></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/checkout_summary.blade.php ENDPATH**/ ?>