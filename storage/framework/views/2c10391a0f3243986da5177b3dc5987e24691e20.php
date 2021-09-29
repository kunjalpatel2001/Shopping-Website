<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.faq')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item">
                  <a><?php echo e(__('msg.more')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.faq')); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<div class="main-content">
   
   <section class="wow fadeIn my-lg-5 my-md-3">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h2 class="text-uppercase text-center license"><?php echo e(__('msg.Regular & Extended Licenses')); ?></h2>
               <span class="animate-border mx-auto"></span>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 col-sm-12 center-col">
               <!-- faq content -->
               <div class="panel-group faq-content" id="faq-one">
                  <!-- faq item -->
                  <?php if(count($data['faq'])): ?>
                  <?php $__currentLoopData = $data['faq']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="panel">
                     <div class="panel-heading">
                        <a data-bs-toggle="collapse" data-parent="#faq-<?php echo e($faq->id); ?>" href="#faq-<?php echo e($faq->id); ?>" class="collapsed" aria-expanded="false">
                           <div class="panel-title  text-uppercase "><?php echo e($faq->question); ?><span class="pull-right "><i class="fas fa-plus"></i></span></div>
                        </a>
                     </div>
                     <div id="faq-<?php echo e($faq->id); ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                           <?php echo e($faq->answer); ?>

                        </div>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <!-- end faq item -->
                  <div class="row text-center">
                     <div class="col-12">
                        <br><br>
                        <h3><?php echo e(__('msg.no_faq_found')); ?>.</h3>
                     </div>
                     <div class="col-12">
                        <br><br>
                        <a href="<?php echo e(route('shop')); ?>" class="btn btn-primary"><em class="fa fa-chevron-left mr-1"></em> <?php echo e(__('msg.continue_shopping')); ?></a>
                     </div>
                  </div>
                  <?php endif; ?>
                  <!-- end faq item -->
               </div>
               <!-- end faq -->
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/faq.blade.php ENDPATH**/ ?>