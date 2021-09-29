<?php if(isset($s->products) && is_array($s->products) && count($s->products)): ?>
<div class="main-content mt-4 my-md-2">
   <section class="new-arrival my-lg-5 my-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="product_right_bar">
                  <div class="product_container">
                     <?php if(isset($s->title) && $s->title != ""): ?>
                     <div class="section_title">
                        <h2><?php echo e($s->title); ?> </h2>
                        <div class="desc_title">
                           <?php echo e($s->short_description); ?>

                           <?php if(isset($s->slug) && $s->slug != ""): ?>
                           <a href="<?php echo e(route('shop', ['section' => $s->slug])); ?>" class="view title-section view-all"><?php echo e(__('msg.view_all')); ?></a>
                           <?php endif; ?>
                        </div>

                     </div>
                     <?php endif; ?>
                     <div class="product_carousel_content new-arrival-carousel owl-carousel">
                        <?php   $maxProductShow = get('style_2.max_product_on_homne_page2'); ?>
                        <?php $__currentLoopData = $s->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if((--$maxProductShow) > -1): ?>
                        <div class="product_items">
                           <article class="single_product">
                              <figure>
                                 <div class="product_thumb">
                                    <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>"><img
                                       src="<?php echo e($p->image); ?>"
                                       alt="<?php echo e($p->name ?? 'Product Image'); ?>"></a>
                                    <div class="label_product">
                                       <?php if(!count(getInStockVarients($p))): ?>
                                       <span class="label_sale"><?php echo e(__('msg.sold_out')); ?></span>
                                       <?php endif; ?>
                                       
                                    </div>
                                    <div class="action_links">
                                       <span class="inner product_data">
                                          <ul>
                                             <?php if(count(getInStockVarients($p))): ?>
                                             <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                             <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                             <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                             <?php if(count(getInStockVarients($p))>1): ?>
                                             <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                data-tab="quick_view"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <?php else: ?>
                                             <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <?php endif; ?>
                                             
                                              <li class="quick_button productmodal"><a title="quick view"><span class="fas fa-search"></span></a></li>
                                              <?php endif; ?>
                                              <li class="wishlist"><a  title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a></li>
                                          </ul>
                                       </span>
                                    </div>
                                 </div>
                                 <figcaption class="product_content">
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php if(strlen(strip_tags($p->name)) > 30): ?> <?php echo substr(strip_tags($p->name), 0,30)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,30); ?> <?php endif; ?></a></h4>
                                    <p><a href="#"><?php echo e($p->category_name); ?></a></p>
                                    <div class="product_reviews">
                                       <div class="comment_note">
                                          <div class="star_content">
                                             <?php
                                             $arating=0;
                                             $arating = floatval($p->ratings); ?>
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
                                             (<?php echo e($p->number_of_ratings); ?>)
                                          </div>
                                       </div>
                                    </div>
                                    <div class="price_box">
                                       <span class="current_price" id="price_<?php echo e($p->id); ?>"><?php echo print_price($p); ?></span>
                                       <span class="old_price"  id="mrp_<?php echo e($p->id); ?>"><?php echo print_mrp($p); ?></span>
                                       <?php if(get_savings_varients($p->variants[0])): ?>
                                       <span class="discount-percentage discount-product" id="savings_<?php echo e($p->id); ?>"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                       <?php endif; ?>
                                    </div>
                                 </figcaption>
                              </figure>
                           </article>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php endif; ?><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/parts/style_2.blade.php ENDPATH**/ ?>