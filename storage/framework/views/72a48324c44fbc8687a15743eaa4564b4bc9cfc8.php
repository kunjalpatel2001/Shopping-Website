<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <?php if(isset($data['data']) && isset($data['data']) && is_array($data['data']) && count($data['data'])): ?>
            <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->first): ?>
            <h1><?php echo e($product->flash_sales_Name); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e($product->flash_sales_Name); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="main-content my-3">
   <section class="inner_flash_sales">
      <div class="container-fluid">
         <div class="deals_product_inner">
            <div class="product_carousel_content ">
               <div class="row">
                  <?php if(isset($data['data']) && isset($data['data']) && is_array($data['data']) && count($data['data'])): ?>
                  <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                     <article class="single_product flash_boder">
                        <figure>
                           <div class="product_thumb">
                              <a class="primary_img" href="<?php echo e(route('product-single', $product->slug)); ?>"><img
                                 src="<?php echo e($product->image); ?>" alt="deals"></a>
								 <div class="action_links">
                                       <span class="inner product_data">
                                          <input type="hidden" class="slug" value="<?php echo e($product->slug); ?>" data-slug="<?php echo e($product->slug); ?>">
                                          <ul>
                                             <input type="hidden" class="id" name="id" value="<?php echo e($product->product_id); ?>" data-id="<?php echo e($product->product_id); ?>">
                                             <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                             <input type="hidden" class="varient" data-varient="<?php echo e($product->product_variant_id); ?>" name="varient"  value="<?php echo e($product->product_variant_id); ?>" checked>
                                             <input type="hidden" class="slug" value="<?php echo e($product->slug); ?>" data-slug="<?php echo e($product->slug); ?>">
                                             <li class="add_to_cart addtocart_single" data-id="<?php echo e($product->product_id); ?>" data-varient="<?php echo e($product->product_variant_id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <li class="quick_button productmodal_sale"><a title="quick view"><span class="fas fa-search"></span></a></li>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="<?php echo e((isset($product->is_favorite) && intval($product->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($product->product_id); ?>'></a></li>
                                          </ul>
                                       </span>
                                    </div>
                           </div>
                           <figcaption class="product_content">
                              <h4 class="product_name"><a href="<?php echo e(route('product-single', $product->slug)); ?>"><?php echo e($product->product_name); ?></a></h4>
                              <p><?php echo e($product->category_name); ?></p>
                              <div class="product_reviews">
                                 <div class="comment_note">
                                    <div class="star_content">
                                       <?php 
                                       $arating=0;
                                       $arating = floatval($product->product_ratings); ?>
                                       <?php for($j = 1; $j <= 5; $j++): ?> 
                                       <?php if($arating < $j): ?> 
                                       <?php if(is_float($arating) && (round($arating) == $j)): ?> 
                                       <em
                                          class="fas fa-star-half-alt"></em>
                                       <?php else: ?>
                                       <em
                                          class="far fa-star"></em>
                                       <?php endif; ?>
                                       <?php else: ?>
                                       <em
                                          class="fas fa-star"></em>
                                       <?php endif; ?>
                                       <?php endfor; ?>
                                       (<?php echo e($product->number_of_ratings); ?>)
                                    </div>
                                 </div>
                              </div>
                              <div class="price_box">
                                 <span class="current_price"><?php echo e(Cache::get('currency')); ?> <?php echo e($product->discounted_price); ?></span>
                                 <span class="old_price"><s><?php echo e(Cache::get('currency')); ?> <?php echo e($product->price); ?></s></span>
                              </div>
                              <div class="product_timing">
                                 <div data-countdown="<?php echo e($product->end_date); ?>"></div>
                              </div>
                             
                           </figcaption>
                        </figure>
                     </article>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/flash-sales.blade.php ENDPATH**/ ?>