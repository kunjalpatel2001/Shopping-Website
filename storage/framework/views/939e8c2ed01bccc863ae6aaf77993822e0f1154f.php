<div class="body-footer-items">

  <div class="guarantee-item main"><p class="guarantee-image">
                  <img class="imgset lazyload image-xl"height="50" src="https://cdn.shopify.com/s/files/1/0524/8932/2674/files/7_days_x50.png?v=1620298672"alt="">
                </p><h5 class="guarantee-title">7 Days Return</h5><div class="guarantee-text rte spacer-none"><p>We are offering 7 days return and money back guarantee</p></div></div>
            
            <div class="grid__item large--three-twelfths medium--six-twelfths main" >
              <div class="guarantee-item "><p class="guarantee-image">
                  <img class="imgset lazyload image-xl"height="50" src="https://cdn.shopify.com/s/files/1/0524/8932/2674/files/download_2_x50.png?v=1616917363"alt="">
                </p><h5 class="guarantee-title">Cash On Delivery</h5><div class="guarantee-text rte spacer-none"><p>Cash On Delivery Available on Every order</p></div></div>
            </div>
            <div class="grid__item large--three-twelfths medium--six-twelfths main" >
              <div class="guarantee-item "><p class="guarantee-image">
                  <img class="imgset lazyload image-xl"height="50" src="https://cdn.shopify.com/s/files/1/0524/8932/2674/files/lG2Ez_x50.gif?v=1616917661"alt="">
                </p><h5 class="guarantee-title">Orders Shipped</h5><div class="guarantee-text rte spacer-none"><p>Currently Delivering Orders Number</p></div></div>
            </div>
            <div class="grid__item large--three-twelfths medium--six-twelfths main" >
              <div class="guarantee-item "><p class="guarantee-image">
                  <img class="imgset lazyload image-xl"height="50"src="https://cdn.shopify.com/s/files/1/0524/8932/2674/files/images_1_x50.png?v=1616922958"alt="">
                </p><h5 class="guarantee-title">Customer Care</h5><div class="guarantee-text rte spacer-none"><p>24 Hours customer support     <br/>( 24/7 )</p></div></div>
            </div></div><br>
   



<section class="subscribe-news">
   <div class="newsletter">
      <div class="container">
         <div class="newsletter-inner center-sm">
            <div class="row justify-content-center align-items-center">
               <div class=" col-xl-10 col-md-12">
                  <div class="newsletter-bg">
                     <div class="row  align-items-center">
                        <div class="col-xl-6 col-lg-6">
                           <div class="d-lg-flex align-items-center">
                              <div class="newsletter-icon">
                                 <i class="far fa-envelope-open fa-3x"></i>
                              </div>
                              <div class="newsletter-title">
                                 <h2 class="main_title"><?php echo e(__('msg.subscribe_to_our_newsletter')); ?></h2>
                                 <div class="sub-title"><?php echo e(__('msg.newsletter_line')); ?>

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <form action="<?php echo e(route('newsletter')); ?>" method="POST" class="ajax-form">
                              <?php echo csrf_field(); ?>
                              <div class="formResponse"></div>
                              <div class="newsletter-box">
                               
                                 <input type="text"  id="email" name="name" placeholder="Your Name Here..." required>
                                  <br><br> 
                                 <input type="email"  id="email" name="email" placeholder="Your Email Here..." required>
                                 <br><br>

                                  <div class="submit-button" >
                                       <button title="Subscribe" name="submit" type="submit" class="btn-color"style="margin-top:110px;">Subscribe</button>
                                  </div>
                                
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<footer class="footer" id="iconfooter3">
   <div class="container">
      <hr>
      <div class="footer-inner">
         <div class="footer-middle">
            <div class="row">
               <div class="col-lg-3 f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <div class="f-logo">
                        <a href="<?php echo e(route('home')); ?>" class="">
                        <img src="<?php echo e(_asset(Cache::get('web_logo'))); ?>" alt="Logo">
                        </a>
                     </div>
                     <div class="footer-respond">
                        <p><?php echo e(Cache::get('common_meta_description', '')); ?></p>
                        <?php if(trim(Cache::get('android_app_url', '')) != ''): ?>
                        <a target="_blank" href="<?php echo e(Cache::get('android_app_url', 'https://play.google.com')); ?>" class="app_button">
                        <img src="<?php echo e(_asset(Cache::get('google_play', theme('images/google1.png')))); ?>" alt="Google Play Store">
                        </a>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title"><?php echo e(__('msg.customer_services')); ?> <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                     <ul class="collapse dont-collapse-sm link">
                        <li><a href="<?php echo e(route('page', 'privacy-policy')); ?>"><?php echo e(__('msg.privay_policy')); ?></a></li>
                        <li><a href="<?php echo e(route('page', 'tnc')); ?>"><?php echo e(__('msg.terms_and_conditions')); ?></a></li>
                        <li><a href="<?php echo e(route('page', 'refund-policy')); ?>">Refund Policy</a></li>
                        <li><a href="<?php echo e(route('page', 'shipping-policy')); ?>">shipping policy</a></li>
                        <li><a href="<?php echo e(route('page', 'delivery-returns-policy')); ?>">Delivery & Returns </a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-3 f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title"><?php echo e(__('msg.recent_blogs')); ?> <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                         <ul class="collapse dont-collapse-sm address-footer">
                           <?php if(Cache::has('getblog') && is_array(Cache::get('getblog')) && count(Cache::get('getblog'))): ?>
                           <?php $__currentLoopData = Cache::get('getblog'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if(!empty($bg->slug)): ?>
                                 <li class="post_content1 wow fadeInRight">
                                    <div class="post_thumb">
                                          <a href="<?php echo e(route('blog-single', $bg->slug)); ?>"><img src="<?php echo e($bg->image); ?>" alt="<?php echo e($bg->title); ?>"></a>
                                    </div>
                                    <div class="post_info">
                                          <h4><a href="<?php echo e(route('blog-single', $bg->slug)); ?>"><?php echo e($bg->title); ?></a></h4>
                                          <span><em class="far fa-clock"></em> <?php echo e(date(" F j, Y", strtotime($bg->date_created))); ?> </span>

                                    </div>
                                 </li>
                           		 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                         </ul>
                  </div>
               </div>
               <div class="col-lg-3 f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title">ADDRESS <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                     <ul class="collapse dont-collapse-sm address-footer">
                        <?php
                        $store_address = str_ireplace("<br>", ' ',  Cache::get('store_address') );
                        ?>
                        <?php if(trim(Cache::get('store_address', '')) != ''): ?>
                        <li class="item">
                           <em class="fas fa-map-marker"> </em>
                           <p><?php echo e($store_address); ?></p>
                        </li>
                        <?php endif; ?>
                        <li class="item">
                           <em class="fas fa-envelope"> </em>
                           <p> <a href="#"><?php echo e(Cache::get('support_email')); ?></a> </p>
                        </li>
                        <li class="item">
                           <em class="fas fa-phone"> </em>
                           <p><?php echo e(Cache::get('support_number')); ?></p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <hr>
        

        
         <div class="footer-bottom ">
            <div class="row mtb-30">
               <div class="col-lg-6 ">
                  <div class="copy-right "><?php echo e(__('msg.copyright')); ?> &copy; <?php echo e(date('Y')); ?> <?php echo e(__('msg.made')); ?> <a href="https://skypearlinfotech.com" target="_blank"><?php echo e(__('SkyPearl iNfotech')); ?>.</a>
                  </div>
               </div>
              
              
              
               <div class="col-lg-6 ">
                  <?php if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media'))): ?>
                  <div class="footer_social pt-xs-15 center-sm">
                     <ul class="social-icon">
                        <li>
                           <div class="title">Follow us on :</div>
                        </li>
                        <?php $__currentLoopData = Cache::get('social_media'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($c->link); ?>" target="_blank"><em class="fab <?php echo e($c->icon); ?>"></em></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <hr>
   
         </div>
      </div>
   </div>
  
    <style>
              
            .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
        </style>

<a href="https://api.whatsapp.com/send?phone=+91 9879566443&text=HELLO !" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
</footer>
</body>
</html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="<?php echo e(theme('js/cartajax.js')); ?>"></script>
<script src="<?php echo e(theme('js/jquery.countdown.js')); ?>"></script>
<script src="<?php echo e(theme('js/plugins.js')); ?>"></script>
<script src="<?php echo e(theme('js/semantic.min.js')); ?>"></script>
<script src="<?php echo e(theme('js/elevatezoom.js')); ?>"></script>
<script src="<?php echo e(theme('js/owl-carousel.js')); ?>"></script>
<script src="<?php echo e(theme('js/wow.js')); ?>"></script>
<script src="<?php echo e(theme('js/actionswitcher.js')); ?>"></script>
<script src="<?php echo e(theme('js/switcherdemo.js')); ?>"></script>
<script src="<?php echo e(theme('js/script.js')); ?>"></script>
<script src="<?php echo e(asset('js/script.js')); ?>"></script>

<div class="demo-style-switch" id="switch-style">
<a id="toggle-switcher" class="switch-button"><em class="far fa-sun fa-spin"></em></a>
<div class="switched-options">
  
   <div class="config-title">
      Colors :
   </div>
   <ul class="styles">
      <li>
         <a href="#" onclick="setActiveStyleSheet('blue'); return false;" title="Blue">
            <div class="blue"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('orange'); return false;" title="Orange">
            <div class="orange"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('green'); return false;" title="Green">
            <div class="green"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('purplish'); return false;" title="purplish">
            <div class="purplish"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('gold'); return false;" title="gold">
            <div class="gold"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('red'); return false;" title="red">
            <div class="red"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('yellow'); return false;" title="Yellow">
            <div class="yellow"></div>
         </a>
      </li>
      <li>
         <a href="#" onclick="setActiveStyleSheet('pink'); return false;" title="pink">
            <div class="pink"></div>
         </a>
      </li>
   </ul>
</div>
  
  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script>
  
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>  

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCFidZ1DpFbHD8SAukYZGZVFnvsKrFuaW4",
    authDomain: "retailindia-abd97.firebaseapp.com",
    projectId: "retailindia-abd97",
    storageBucket: "retailindia-abd97.appspot.com",
    messagingSenderId: "302004365932",
    appId: "1:302004365932:web:625a75cea4b360e12c8649",
    measurementId: "G-HKX8GPTY72"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
<?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/common/footer.blade.php ENDPATH**/ ?>