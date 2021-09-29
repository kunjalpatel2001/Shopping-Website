
<?php if(Cache::has('advertisements') && is_array(Cache::get('advertisements')) && count(Cache::get('advertisements'))): ?>
<section class="shipping-content">
   <div class="main-content my-md-2">
      
      <section class="home-banner banner-sec-1">
         <div class="container-fluid">
            <div class="row">
               <?php $__currentLoopData = Cache::get('advertisements'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if(isset($advt->ad1) && trim($advt->ad1) !== ""): ?>
               <div class="col col-md-4 col-xs-12 col-12">
                  <div class="banner_box_content">
                     <img src="<?php echo e($advt->ad1); ?>" alt="ad-1">
                  </div>
               </div>
               <?php endif; ?>
               <?php if(isset($advt->ad2) && trim($advt->ad2) !== ""): ?>
               <div class="col col-md-4 col-xs-12 col-12">
                  <div class="banner_box_content">
                     <img src="<?php echo e($advt->ad2); ?>" alt="ad-2">
                  </div>
               </div>
               <?php endif; ?>
               <?php if(isset($advt->ad3) && trim($advt->ad3) !== ""): ?>
               <div class="col col-md-4 col-xs-12 col-12">
                  <div class="banner_box_content">
                     <img src="<?php echo e($advt->ad3); ?>" alt="ad-3">
                  </div>
               </div>
               <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </section>
      
   </div>
</section>
<?php endif; ?><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/parts/advertisement_banner.blade.php ENDPATH**/ ?>