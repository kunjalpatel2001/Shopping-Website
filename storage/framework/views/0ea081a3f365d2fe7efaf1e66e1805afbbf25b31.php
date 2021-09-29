<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.register')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>">Home</a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.register')); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<section class="footerfix section-content mt-5 padding-bottom mb-4">
   <div class="container">
      <div class="card mx-auto register-card card dash-bg-right dash-bg-right1">
         <article class="card-body modal-body">
            <header class="mb-4">
               <h4 class="card-title"><?php echo e(__('msg.sign_up')); ?></h4>
            </header>
            <form method='POST' id='registerForm'>
               <?php echo csrf_field(); ?>
               <input type="hidden" name="action" value="save">
               <input type="hidden" name="auth_uid" value="<?php echo e($data['auth_uid']); ?>">
               <input type="hidden" name="mobile" value="<?php echo e($data['mobile']); ?>">
               <input type="hidden" name="country" value="<?php echo e($data['country']); ?>">
               <div class="form-group">
                  <div class="alert alert-danger error-hide" id="registerError"></div>
               </div>
               <div class="form-group mt-1">
               <label><?php echo e(__('msg.full_name')); ?></label>
                  <div class="ui search focus">
                  <div class="ui left icon input card-detail-desc">
                     <input type="text" name='display_name' class="form-control" value='<?php echo e($data['display_name']); ?>' required autofocus>
                  </div>
                  </div>
               </div>
               <div class="form-group mt-1">
                  <label><?php echo e(__('msg.email')); ?></label>
                  <div class="ui search focus">
                  <div class="ui left icon input card-detail-desc">
                  <input type="email" class="form-control" name='email' placeholder="" value='<?php echo e($data['email']); ?>' required>
                  </div>
                  <div class="ui left icon input card-detail-desc">
                  <p><span class="form-text  text-muted"><?php echo e(__('msg.we_will_never_share_you_email_with_anyone_else')); ?>.</small></p>
                  </div>
                  </div>
               </div>
               <div class="form-row mt-1">
                  
                     <label><?php echo e(__('msg.mobile')); ?></label>
                     <div class="ui search focus">
                  <div class="ui left icon input card-detail-desc">
                     <input type="text" class="form-control" name='mobile' placeholder="" value='<?php echo e($data['mobile']); ?>' readonly>
                  </div>
                  </div>
                  </div>
               
               <div class="form-row mt-1">
                  <div class="form-group col-lg-6 mt-1 col-md-12 col-12 mb-4">
                     <label><?php echo e(__('msg.create_password')); ?></label>
                     <div class="ui search focus">
                  <div class="ui left icon input card-detail-desc">
                     <input class="form-control" name='password' type="password" required>
                  </div>
                  </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12 col-12 mb-4 ">
                     <label><?php echo e(__('msg.repeat_password')); ?></label>
                     <div class="ui search focus">
                  <div class="ui left icon input card-detail-desc">
                     <input class="form-control" name='password_confirmation' type="password" required>
                  </div>
               </div>
               </div>
               </div>
               <div class="form-row mt-1">
                  
                     <label><?php echo e(__('msg.referral_code')); ?></label>
                     <div class="ui search focus">
                  <div class="ui left icon input card-detail-desc">
                     <input class="form-control" name='friends_code' type="text" value='<?php echo e($data['friends_code']); ?>'>
                  </div>
                  </div>
               </div>
               <div class="form-group mt-1">
               <div class="ui search focus">
                  <div class="ui left icon input ">
                     <input type="checkbox" class="custom-control-input" required>&nbsp;&nbsp;
                     <div class="custom-control-label">   <?php echo e(__('msg.I am agree with')); ?> <a href="<?php echo e(route('page', 'tnc')); ?>" target="_blank"><?php echo e(__('msg.terms and contitions')); ?></a>  </div>
                  
               </div>
               </div>
               <br/>
               <div class="form-group mt-1">
                  <button type="submit" class="btn btn-primary btn-block"> <?php echo e(__('msg.register')); ?>  </button>
               </div>
               
            </form>
         </article>
      </div>
   </div>
</section>
<script src="<?php echo e(asset('js/register.js')); ?>"></script><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/register.blade.php ENDPATH**/ ?>