<div class="main-content mt-4 my-md-2">
   <section class="trending_content product_area">
      <div class="container-fluid">
         <div class="row">
            <?php if(Cache::has('flash-sales') && is_array(Cache::get('flash-sales')) && count(Cache::get('flash-sales'))): ?>
            <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-12 col-12">
               <div class="product_left_bar">
                  <div class="deals_product">
                     <div class="deals_title">
                        <h2>Hot Deals</h2>
                     </div>
                     <div class="deals_product_inner">
                        <div class="product_carousel_content deals_carousel owl-carousel">
                           <?php $__currentLoopData = Cache::get('flash-sales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <article class="single_product">
						    <?php if(!empty($fs->products)): ?>
                              <?php $__currentLoopData = $fs->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($loop->first): ?>
                              <figure>
                                 <div class="product_thumb">
                                    <a class="primary_img" href="<?php echo e(route('product-single', $product->slug ?? '-')); ?>"><img
                                       src="<?php echo e($product->image); ?>"
                                       alt="deals"></a>
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
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $product->slug ?? '-')); ?>"><?php echo e($product->name); ?></a>
                                    </h4>
                                    <p><?php echo e($product->category_name); ?></p>
                                    <br/>
                                    <p><?php echo e($fs->title); ?></p>
                                    <div class="product_reviews">
                                       <div class="comment_note">
                                          <div class="star_content">
                                             <?php
                                             $arating=0;
                                             $arating = floatval($product->ratings); ?>
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
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  
                              <a href="<?php echo e(route('sale-products', $fs->slug)); ?>" class="sale-view-all">View Sale</a>
                           </article>
						   <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     </div>
                  </div>
                  <div class="banner-image text-center trending-banner">
                     <?php if(Cache::has('advertisements') && is_array(Cache::get('advertisements')) && count(Cache::get('advertisements'))): ?>
                     <?php $__currentLoopData = Cache::get('advertisements'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if(isset($advt->ad3) && trim($advt->ad3) !== ""): ?>
                     <img src="<?php echo e($advt->ad3); ?>" alt="ad-3">
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <?php if(isset($s->products) && is_array($s->products) && count($s->products)): ?>
            <div class="col-xxl-9 col-xl-8 col-lg-7 col-md-12 col-12">
               <div class="product_right_bar">
                  <div class="product_container">
                     <div class="section_title">
                        <h2><?php echo e($s->title); ?></h2>
                        <div class="desc_title">
                           <?php echo e($s->short_description); ?>

                        </div>
                     </div>
                     <div class="product_carousel_content product_right_Carousel owl-carousel">
                        <?php   $maxProductShow = get('style_1.max_product_on_homne_page2');
                        $i=0;
                        ?>
                        <?php $__currentLoopData = $s->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $i++;
                        ?>
                        <?php if((--$maxProductShow) > -1): ?>
                        <?php if($i%2 !== 0): ?>
                        <div class="product_items">
                           <article class="single_product">
                              <figure>
                                 <div class="product_thumb">
                                    <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>"><img
                                       src="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Image'); ?>"></a>
                                    <div class="label_product"><?php if(!count(getInStockVarients($p))): ?>
                                       <span class="label_sale"><?php echo e(__('msg.sold_out')); ?></span>
                                       <?php endif; ?>
                                    </div>
                                    <div class="action_links">
                                       <span class="inner product_data">
                                          <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                          <ul>
                                             <?php if(count(getInStockVarients($p))): ?>
                                             <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                             <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                             <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                             <?php if(count(getInStockVarients($p))>1): ?>
                                             <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
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
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php echo e($p->name); ?></a></h4>
                                    <p>
                                    <p><a href="#"><?php echo e($p->category_name); ?></a></p>
                                    </p>
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
                                       <span class="current_price"><?php echo print_price($p); ?></span>
                                       <span class="old_price"><?php echo print_mrp($p); ?></span>
                                       <span class="discount-percentage discount-product"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                    </div>
                                 </figcaption>
                              </figure>
                           </article>
                           <?php endif; ?>
                           <?php if($i%2 == 0): ?>
                           <article class="single_product">
                              <figure>
                                 <div class="product_thumb">
                                    <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>"><img
                                       src="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Image'); ?>"></a>
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
                                             <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
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
                                       <span class="current_price"><?php echo print_price($p); ?></span>
                                       <span class="old_price"><?php echo print_mrp($p); ?></span>
                                       <span class="discount-percentage discount-product"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                    </div>
                                 </figcaption>
                              </figure>
                           </article>
                        </div>
                        <?php endif; ?>
                        <?php else: ?>
                        <?php break; ?>
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
<?php endif; ?><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/parts/style_1.blade.php ENDPATH**/ ?>