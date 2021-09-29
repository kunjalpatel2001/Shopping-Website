<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e($data['title']); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e($data['title']); ?>

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
               <p> <?php echo $data['content']; ?></p>
               <span class="animate-border mx-auto"></span>
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/page.blade.php ENDPATH**/ ?>