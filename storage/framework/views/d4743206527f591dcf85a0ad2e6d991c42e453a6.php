<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.blog')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.blog')); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<!-- blog-details -->
<div class="main-content">
   <section class="blog_details">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12 col-md-12 ">
               <!--blog grid area start-->
               <div class="outer_blog_content wow fadeInLeftBig">
                  <div class="blog-sec mt-5 mb-5">
                     <div class="row">
                        <?php if(isset($data['data'])  && is_array($data['data']) && count($data['data'])): ?>
                        <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b =>$bg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($bg->slug)): ?>
                        <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3 col-12 blogrespon">
                           <div class="blog-card blog-card-blog">
                              <div class="blog-card-image wow fadeInLeft">
                                 <a href="<?php echo e(route('blog-single', $bg->slug)); ?>"> <img class="img" alt="blog" src="<?php echo e($bg->image); ?>"></a>
                                 <div class="ripple-cont"></div>
                              </div>
                              <div class="blog-table wow fadeInLeft">
                                 <h6 class="blog-category blog-text-success"><em class="far fa-newspaper"></em><?php echo e($bg->category_name); ?></h6>
                                 <h4 class="blog-card-caption">
                                    <a href="<?php echo e(route('blog-single', $bg->slug)); ?>"><?php echo e($bg->title); ?> </a>
                                 </h4>
                                 <p class="blog-card-description"><?php if(strlen(strip_tags($bg->description)) > 70): ?> <?php echo substr(strip_tags($bg->description), 0,70) ."..."; ?> <?php else: ?> <?php echo substr(strip_tags($bg->description), 0,70); ?> <?php endif; ?></p>
                                 <div class="ftr">
                                    <a href="<?php echo e(route('blog-single', $bg->slug)); ?>">Read More</a>
                                    <div class="stats"> <em class="far fa-clock"></em>  <?php echo e(date(" F j, Y", strtotime($bg->date_created))); ?>  </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <!--blog grid area start-->
            </div>
         </div>
      </div>
   </section>
</div>
<!-- eof details --><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/blog.blade.php ENDPATH**/ ?>