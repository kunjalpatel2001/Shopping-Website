
<div class="main-slider-sec">
   <?php if(Cache::has('sliders') && is_array(Cache::get('sliders')) && count(Cache::get('sliders'))): ?>
   <div class="slider-activation owl-carousel nav-style dot-style nav-dot-left">
      <?php $__currentLoopData = Cache::get('sliders'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($s->type == 'product'): ?>
      <a href="<?php echo e(route('product-single', $s->slug ?? '-')); ?>">
         <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i+1); ?>"
            style="background-image:url('<?php echo e($s->image); ?>');background-size: contain; background-repeat: no-repeat; background-position: center;">
            <div class="container">
               <div class="row align-items-center">
			   <?php if( $s->image2 != ""): ?>
                  <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                     <div class="inner-slider-img slider-animated-content">
                        <img class="animated" src="<?php echo e($s->image2); ?>" alt="">
                     </div>
                  </div>
				  <?php endif; ?>
                  <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                     <div class="slider-content slider-animated-content ml-70">
                        <h3 class="animated"><?php echo e($s->title); ?></h3>
                            <p class="animated"><?php echo e($s->short_description); ?></p>
							<?php if( $s->title != ""): ?>
                            <div class="btn-hover">
                                <span class="animated norm-btn" href="<?php echo e(route('product-single', $s->slug ?? '-')); ?>">SHOP NOW</span>
                            </div>
							<?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
      <?php elseif($s->type == 'category'): ?>
      <a href="<?php echo e(route('category', $s->slug ?? '-')); ?>">
         <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i+1); ?>"
            style="background-image:url('<?php echo e($s->image); ?>');background-size: contain; background-repeat: no-repeat; background-position: center;">
            <div class="container">
               <div class="row align-items-center">
			   <?php if( $s->image2 != ""): ?>
                  <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                     <div class="inner-slider-img slider-animated-content">
                        <img class="animated" src="<?php echo e($s->image2); ?>" alt="">
                     </div>
                  </div>
				  <?php endif; ?>
				  <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                     <div class="slider-content slider-animated-content ml-70">
                        <h3 class="animated"><?php echo e($s->title); ?></h3>
                            <p class="animated"><?php echo e($s->short_description); ?></p>
							<?php if( $s->title != ""): ?>
                            <div class="btn-hover">
                                <span class="animated norm-btn" href="<?php echo e(route('category', $s->slug ?? '-')); ?>">SHOP NOW</span>
                            </div>
							<?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
      <?php else: ?>
      <a href="">
         <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i+1); ?>"
            style="background-image:url('<?php echo e($s->image); ?>');background-size: contain; background-repeat: no-repeat; background-position: center;">
            <div class="container">
               <div class="row align-items-center">
			   <?php if( $s->image2 != ""): ?>
                  <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                     <div class="inner-slider-img slider-animated-content">
                        <img class="animated" src="<?php echo e($s->image2); ?>" alt="">
                     </div>
                  </div>
				  <?php endif; ?>
				  <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                     <div class="slider-content slider-animated-content ml-70">
                        <h3 class="animated"><?php echo e($s->title); ?></h3>
                            <p class="animated"><?php echo e($s->short_description); ?></p>
							<?php if( $s->title != ""): ?>
                            <div class="btn-hover">
                                <span class="animated norm-btn" href="<?php echo e(route('shop')); ?>">SHOP NOW</span>
                            </div>
							<?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
   <?php endif; ?>
</div>

<section class="shipping-content">
   <div class="container">
      <div class="shipping_inner_content">
         <div class="row">
            
            
         
         </div>
      </div>
   </div>
</section>

<!-- newsletter pop -->

                  <!-- subscribe-form -->
               
               <!-- box-content -->
            
         <!-- row -->
      
<!-- /Newsletter Popup -->
<?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/home.blade.php ENDPATH**/ ?>