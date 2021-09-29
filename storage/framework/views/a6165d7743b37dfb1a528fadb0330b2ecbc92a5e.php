<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.notifications')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('my-account')); ?>"><?php echo e(__('msg.my_account')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.notifications')); ?>

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
               <?php echo $__env->make("themes.".get('theme').".user.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
               <section class="about-us">
                  <div class="about-us-area">
                     <div class="container">
                        <?php if(isset($data['list']) && isset($data['list']['data']) && count($data['list']['data'])): ?>
                        <?php $__currentLoopData = $data['list']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <?php if(trim($w->image) != ""): ?>
                              <div class="about-us-img text-center">
                                 <img src="<?php echo e($w->image); ?>" alt="<?php echo e($w->name); ?>">
                              </div>
                              <?php else: ?>
                              <div class="about-us-img text-center">
                                 <img src="<?php echo e(asset('images/no-image.png')); ?>">
                              </div>
                              <?php endif; ?>
                           </div>
                           <div class="col-lg-6 col-md-6 align-self-center">
                              <div class="about-us-content">
                                 <h2><?php echo e($w->name); ?></h2>
                                 <span class="animate-border mb-40"></span>
                                 <p><?php echo e($w->subtitle); ?></p>
                              </div>
                           </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="row">
                           <div class="col">
                              <?php if(isset($data['last']) && $data['last'] != ""): ?>
                              <a href="<?php echo e($data['last']); ?>" class="btn btn-primary pull-left text-white"><em class="fa fa-arrow-left"></em> <?php echo e(__('msg.previous')); ?></a>
                              <?php endif; ?>
                           </div>
                           <div class="col">
                              <?php if(isset($data['next']) && $data['next'] != ""): ?>
                              <a href="<?php echo e($data['next']); ?>" class="btn btn-primary pull-right text-white"> <?php echo e(__('msg.next')); ?><em class="fa fa-arrow-right"></em></a>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/user/notification.blade.php ENDPATH**/ ?>