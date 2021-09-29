<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>Sub Category</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  Sub Category
               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->

<section class="new-arrival mb-lg-5">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="product_right_bar">
               <div class="product_container">
                  <div class="section_title">
                     <h2>&nbsp; </h2>
                     <div class="desc_title">
                        &nbsp; 
                        <br/>
                     </div>
                  </div>
                  <?php if(isset($data['sub-categories'])): ?>  
                  <div class="product_carousel_content subcategory-carousel owl-carousel">
                  
                  <?php $__currentLoopData = $data['sub-categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="product_items">
                        <article class="single_product">
                           <figure>
                              <div class="product_thumb">
                                 <a class="primary_img" href="<?php echo e(route('shop', ['category' => $data['category']->slug, 'sub-category' => $c->slug])); ?>"><img
                                    src="<?php echo e($c->image); ?>"
                                    alt="<?php echo e($c->name ?? ''); ?>"></a>
                              </div>
                              <figcaption class="product_content">
                                 <h4 class="product_name"><a href="<?php echo e(route('shop', ['category' => $data['category']->slug, 'sub-category' => $c->slug])); ?>"><?php echo e($c->name); ?></a></h4>
                                 <p class="pb-4"><?php echo e($c->subtitle); ?></p>
                              </figcaption>
                           </figure>
                        </article>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </div>
                  <?php endif; ?>
                  <?php if(isset($data['list']) && isset($data['list']) && is_array($data['list']) && count($data['list'])): ?>
                 <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if(isset($p->variants) && count($p->variants)): ?>
               <?php if($loop->first): ?>
                  <div class="shop_toolbar_content mt-3">
                  <div class="shop_toolbar_btn">
                     <button data-role="grid-view" type="button" class="active btn-grid-view" data-toggle="tooltip" title="grid"></button>
                     <button data-role="list-view" type="button"  class="btn-list-view" data-toggle="tooltip" title="List"></button>
                  </div>
               </div>
               <?php endif; ?>
               <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
               <!--shop toolbar end-->
              
               <div class="row right_shop_content list-view">
               <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if(isset($p->variants) && count($p->variants)): ?>
                  <div class="col-12 ">
                     <div class="single_product_content">
                        <div class="inner_product_content">
                       
                           <a class="img_content" href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><img src="<?php echo e($p->image); ?>" alt="<?php echo e($p->image); ?>"></a>
						    <div class="label_product"><?php if(!count(getInStockVarients($p))): ?>
                              <span class="label_sale"><?php echo e(__('msg.sold_out')); ?></span>
                              <?php endif; ?>
                           </div>
                           <div class="share_links inner product_data">
                           <?php if(count(getInStockVarients($p))): ?>
                              <form action="<?php echo e(route('cart-add-single-varient')); ?>" method="POST">
                                 <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                 <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                              <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                              <ul>
                                 <?php if(count(getInStockVarients($p))>1): ?>
                                 <li class="add_to_cart productmodal"><a  title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                 <?php else: ?>
                                 <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <li class="wishlist"><a class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>' title="Add to Wishlist"></a></li>
                              </ul>
                              </form>
                           </div>
                        </div>
                        <div class="product_content inner_grid_content">
                           <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><?php echo e($p->name); ?></a></h4>
                           <p><?php echo e($p->category_name); ?></p>
                           
                           <div class="price_box">
                           <span class="current_price" id="mrp_<?php echo e($p->id); ?>"><?php echo print_mrp($p); ?></span>
                              <span class="old_price" id="price_<?php echo e($p->id); ?>"><?php echo print_price($p); ?></span>
                              <?php if(get_savings_varients($p->variants[0])): ?>
                              <span class="discount-percentage discount-product" id="savings_<?php echo e($p->id); ?>"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                              <?php endif; ?>
                           </div>
                        </div>
                        
                        <div class="product_content inner_list_content">
                           <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><?php echo e($p->name); ?></a></h4>
                           <p><?php echo e($p->category_name); ?></p>
                           <?php if($p->ratings > 0): ?>
                           <div class="product_rating">
                              <ul>
                                 <?php $arating = floatval($p->ratings); ?>
                                 <?php for($j = 1; $j <= 5; $j++): ?> 
                                 <?php if($arating < $j): ?> 
                                 <?php if(is_float($arating) && (round($arating) == $j)): ?> 
                                 <li><a><em
                                    class="fas fa-star-half-alt"></em></a></li>
                                 <?php else: ?>
                                 <li><a><em
                                    class="fas fa-star-empty"></em></a></li>
                                 <?php endif; ?>
                                 <?php else: ?>
                                 <li><a><em
                                    class="fas fa-star"></em></a></li>
                                 <?php endif; ?>
                                 <?php endfor; ?>
                                 <li>(<?php echo e($p->number_of_ratings); ?>)</li>
                              </ul>
                           </div>
                           <?php endif; ?>
                           <div class="price_box">
                           <span class="current_price"><?php echo print_mrp($p); ?></span>
                              <span class="old_price"><?php echo print_price($p); ?></span>
                              <?php if(get_savings_varients($p->variants[0])): ?>
                              <span class="discount-percentage discount-product" id="savings_<?php echo e($p->id); ?>"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                              <?php endif; ?>
                           </div>
                           <div class="product_desc">
                              <p><?php if(strlen(strip_tags($p->description)) > 180): ?> <?php echo substr(strip_tags($p->description), 0,180) ."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->description), 0,180); ?> <?php endif; ?></p>
                           </div>
                           <div class="share_links list_action_right inner product_data">
                           <ul>
                                 <?php if(count(getInStockVarients($p))): ?>
                                 <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                 <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                 <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                 <?php if(count(getInStockVarients($p))>1): ?>
                                 <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart">Add to Cart</span></a></li>
                                 <?php else: ?>
                                 <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart">Add to Cart</span></a></li>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 
                                 <li class="wishlist"><a title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
               <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/sub-categories.blade.php ENDPATH**/ ?>