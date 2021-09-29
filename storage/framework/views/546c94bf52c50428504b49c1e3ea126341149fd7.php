<div class="account-sidebar account-tab mb-sm-30">
   <div class="dark-bg tab-title-bg">
      <div class="heading-part">
         <div class="sub-title text-center"><span></span><em class="far fa-user"></em> My
            Account
         </div>
      </div>
   </div>
   <div class="account-tab-inner">
      <ul class="account-tab-stap">
         <li> <a href="<?php echo e(route('my-account')); ?>"><em class="fas fa-user"></em><?php echo e(__('msg.my_profile')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('change-password')); ?>"><em class="fas fa-asterisk"></em><?php echo e(__('msg.change_password')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('my-orders')); ?>"><em class="fas fa-taxi"></em><?php echo e(__('msg.my_orders')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('notification')); ?>"><em class="fas fa-bell"></em><?php echo e(__('msg.notifications')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('favourite')); ?>"><em class="fas fa-heart"></em><?php echo e(__('msg.favourite')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('transaction-history')); ?>"><em class="fas fa-outdent"></em><?php echo e(__('msg.transaction_history')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('addresses')); ?>"><em class="fas fa-wrench"></em><?php echo e(__('msg.manage_addresses')); ?><em class="fa fa-angle-right"></em> </a> </li>
         <li> <a href="<?php echo e(route('logout')); ?>"><em class="fas fa-sign-out-alt"></em><?php echo e(__('msg.logout')); ?><em class="fa fa-angle-right"></em> </a> </li>
      </ul>
   </div>
</div><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/user/sidebar.blade.php ENDPATH**/ ?>