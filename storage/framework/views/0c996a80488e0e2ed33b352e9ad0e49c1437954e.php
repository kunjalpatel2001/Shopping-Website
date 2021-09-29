<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>About Us</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item">
                  <a><?php echo e(__('msg.more')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.about_us')); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="main-content">
   
   <section class="about-us">
      <div class="about-us-area pt-90 pb-90">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="about-us-img text-center">
                     <a href="#">
                     <img src="<?php echo e(theme('images/aboutus.png')); ?>" alt="">
                     </a>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 align-self-center">
                  <div class="about-us-content">
                     <p class="peragraph-blog"><?php echo $data['content']; ?></p>
                     <div class="about-us-btn btn-hover hover-border-none">
                        <a class="btn-color-white btn-color-theme-bg black-color" href="<?php echo e(route('shop')); ?>">Shop
                        now!</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <section class="feature-area pb-90 section-padding-3">
      <div class="container">
         <div class="row">
            <div class="d-block m-auto text-center heading-feature">
               <h2 class="text-capitalize"><?php echo e(__('msg.What We Provide')); ?></h2>
               <span class="animate-border mb-40 mx-auto"></span>
            </div>
         </div>
         <div class="feature-border feature-border-about">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="feature-wrap mb-30 text-center">
                     <i class="fas fa-star fa-2x"></i>
                     <h5><?php echo e(__('msg.Best Product')); ?></h5>
                     <span><?php echo e(__('msg.Best Queality Products')); ?></span>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="feature-wrap mb-30 text-center">
                     <i class="fas fa-cog fa-2x"></i>
                     <h5><?php echo e(__('msg.100% fresh')); ?></h5>
                     <span><?php echo e(__('msg.Best Queality Products')); ?></span>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="feature-wrap mb-30 text-center">
                     <i class="fas fa-user-lock fa-2x"></i>
                     <h5><?php echo e(__('msg.Secure Payment')); ?></h5>
                     <span><?php echo e(__('msg.Best Queality Products')); ?></span>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="feature-wrap mb-30 text-center">
                     <i class="fas fa-mug-hot fa-2x"></i>
                     <h5><?php echo e(__('msg.Best Wood')); ?></h5>
                     <span><?php echo e(__('msg.Best Queality Products')); ?></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <section class="teams">
      <div class="container-fluid">
         <div class="heading heading-center mb-3">
            <h2><?php echo e(__('msg.Our Team')); ?></h2>
            <span class="animate-border"></span>
         </div>
         <div class=" team-members team-members-shadow m-b-40 team-carousel owl-carousel">
            <div class="team-member">
               <div class="team-image">
                  <img src="<?php echo e(theme('images/team.png')); ?>">
               </div>
               <div class="team-desc">
                  <h3><?php echo e(__('msg.Alea Smith')); ?></h3>
                  <span><?php echo e(__('msg.Software Developer')); ?></span>
                  <p><?php echo e(__('msg.team_description')); ?></p>
                  <div class="align-center">
                     <a class="btn btn-xs btn-slide btn-light" href="#">
                     <i class="fab fa-facebook-f"></i>
                     <span><?php echo e(__('msg.Facebook')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                     <i class="fab fa-twitter"></i>
                     <span><?php echo e(__('msg.Twitter')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                     <i class="fab fa-instagram"></i>
                     <span><?php echo e(__('msg.Instagram')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                     <i class="fas fa-envelope"></i>
                     <span><?php echo e(__('msg.Mail')); ?></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="team-member">
               <div class="team-image">
                  <img src="<?php echo e(theme('images/team-2.png')); ?>">
               </div>
               <div class="team-desc">
                  <h3><?php echo e(__('msg.Ariol Doe')); ?></h3>
                  <span><?php echo e(__('msg.Software Developer')); ?></span>
                  <p><?php echo e(__('msg.team_description')); ?></p>
                  <div class="align-center">
                     <a class="btn btn-xs btn-slide btn-light" href="#">
                     <i class="fab fa-facebook-f"></i>
                     <span><?php echo e(__('msg.Facebook')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                     <i class="fab fa-twitter"></i>
                     <span><?php echo e(__('msg.Twitter')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                     <i class="fab fa-instagram"></i>
                     <span><?php echo e(__('msg.Instagram')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                     <i class="fas fa-envelope"></i>
                     <span><?php echo e(__('msg.Mail')); ?></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="team-member">
               <div class="team-image">
                  <img src="<?php echo e(theme('images/team-3.png')); ?>">
               </div>
               <div class="team-desc">
                  <h3><?php echo e(__('msg.Emma Ross')); ?></h3>
                  <span><?php echo e(__('msg.Software Developer')); ?></span>
                  <p><?php echo e(__('msg.team_description')); ?></p>
                  <div class="align-center">
                     <a class="btn btn-xs btn-slide btn-light" href="#">
                     <i class="fab fa-facebook-f"></i>
                     <span><?php echo e(__('msg.Facebook')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                     <i class="fab fa-twitter"></i>
                     <span><?php echo e(__('msg.Twitter')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                     <i class="fab fa-instagram"></i>
                     <span><?php echo e(__('msg.Instagram')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                     <i class="fas fa-envelope"></i>
                     <span><?php echo e(__('msg.Mail')); ?></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="team-member">
               <div class="team-image">
                  <img src="<?php echo e(theme('images/team-4.png')); ?>">
               </div>
               <div class="team-desc">
                  <h3><?php echo e(__('msg.Victor Loda')); ?></h3>
                  <span><?php echo e(__('msg.Software Developer')); ?></span>
                  <p><?php echo e(__('msg.team_description')); ?></p>
                  <div class="align-center">
                     <a class="btn btn-xs btn-slide btn-light" href="#">
                     <i class="fab fa-facebook-f"></i>
                     <span><?php echo e(__('msg.Facebook')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                     <i class="fab fa-twitter"></i>
                     <span><?php echo e(__('msg.Twitter')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                     <i class="fab fa-instagram"></i>
                     <span><?php echo e(__('msg.Instagram')); ?></span>
                     </a>
                     <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                     <i class="fas fa-envelope"></i>
                     <span><?php echo e(__('msg.Mail')); ?></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <section class="counter-up my-lg-5 mb-md-3">
      <div class="container">
         <div class="row counter-box text-center wow">
            <div class="col-12">
               <h2><?php echo e(__('msg.Our Work')); ?></h2>
               <span class="animate-border mb-40 mx-auto"></span>
            </div>
            <div class="col-md-3 col-12 my-lg-4 my-3">
               <i class="fas fa-code fa-3x"></i>
               <p><span class="counter" data-count="474070">0</span>+</p>
               <span class="counter-desc"><?php echo e(__('msg.Lines of code')); ?></span>
            </div>
            <div class="col-md-3 col-12 my-lg-4 my-3">
               <i class="fas fa-users fa-3x"></i>
               <p><span class="counter" data-count="10000">0</span>+</p>
               <span class="counter-desc"><?php echo e(__('msg.Happy Clients')); ?></span>
            </div>
            <div class="col-md-3 col-12 my-lg-4 my-3">
               <i class="far fa-handshake fa-3x"></i>
               <p><span class="counter" data-count="300">0</span>+</p>
               <span class="counter-desc"><?php echo e(__('msg.Project Done')); ?></span>
            </div>
            <div class="col-md-3 col-12 my-lg-4 my-3">
               <i class="fas fa-hourglass-half fa-3x"></i>
               <p><span class="counter" data-count="82343">0</span>+</p>
               <span class="counter-desc"><?php echo e(__('msg.Hours of work')); ?></span>
            </div>
         </div>
      </div>
   </section>
   
   <section class="testimonial-area pt-60 pb-80">
      <div class="container-fluid">
         <div class="section-title-2">
            <h2><?php echo e(__('msg.Testimonials')); ?></h2>
            <span class="animate-border mb-4"></span>
         </div>
         <div class="testimonial-active owl-carousel">
            <div class="inner-testimonial">
               <div class="client-content">
                  <p><?php echo e(__('msg.testimonial_description1')); ?></p>
               </div>
               <div class="client-info">
                  <img alt="" src="<?php echo e(theme('images/testimonial-1.png')); ?>">
                 <h5><?php echo e(__('msg.testimonial_name1')); ?></h5>
                  <span><?php echo e(__('msg.Deginer')); ?></span>
               </div>
            </div>
            <div class="inner-testimonial">
               <div class="client-content">
                  <p><?php echo e(__('msg.testimonial_description2')); ?></p>
               </div>
               <div class="client-info">
                  <img alt="" src="<?php echo e(theme('images/testimonial-2.png')); ?>">
                  <h5><?php echo e(__('msg.testimonial_name2')); ?></h5>
                  <span><?php echo e(__('msg.Developer')); ?></span>
               </div>
            </div>
            <div class="inner-testimonial">
               <div class="client-content">
                  <p><?php echo e(__('msg.testimonial_description1')); ?></p>
               </div>
               <div class="client-info">
                  <img alt="" src="<?php echo e(theme('images/testimonial-3.png')); ?>">
                    <h5><?php echo e(__('msg.testimonial_name1')); ?></h5>
                  <span><?php echo e(__('msg.Customer')); ?></span>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <section class="brand-logo-area pb-90">
      <div class="container-fluid">
         <div class="heading heading-center text-center mb-5">
            <h2><?php echo e(__('msg.Collabration')); ?></h2>
            <span class="animate-border mx-auto"></span>
         </div>
         <div class="brand-logo-padding bg-light-gray">
            <div class="brand-logo-active-2 owl-carousel">
               <div class="single-brand-logo">
                  <img src="<?php echo e(theme('images/brandpartners.png')); ?>" alt="">
               </div>
               <div class="single-brand-logo">
                  <img src="<?php echo e(theme('images/brandpartners.png')); ?>" alt="">
               </div>
               <div class="single-brand-logo">
                  <img src="<?php echo e(theme('images/brandpartners.png')); ?>" alt="">
               </div>
               <div class="single-brand-logo">
                  <img src="<?php echo e(theme('images/brandpartners.png')); ?>" alt="">
               </div>
               <div class="single-brand-logo">
                  <img src="<?php echo e(theme('images/brandpartners.png')); ?>" alt="">
               </div>
               <div class="single-brand-logo">
                  <img src="<?php echo e(theme('images/brandpartners.png')); ?>" alt="">
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script src="<?php echo e(theme('js/counterup.js')); ?>"></script><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/about.blade.php ENDPATH**/ ?>