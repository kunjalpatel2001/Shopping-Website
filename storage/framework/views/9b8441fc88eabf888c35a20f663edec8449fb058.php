<div class="account-sidebar account-tab mb-sm-30">
   <div class="dark-bg tab-title-bg">
      <div class="heading-part">
         <div class="sub-title text-center"><span></span><em class="far fa-user"></em> My
            Orders
         </div>
      </div>
   </div>
   <div class="account-tab-inner">
      <ul class="account-tab-stap">
         <li class=""> <a href="<?php echo e(route('my-orders')); ?>"><em class="fas fa-align-justify"></em><?php echo e(__('msg.all_orders')); ?><i class="fa fa-angle-right"></i> </a> </li>
         <li> <a href="<?php echo e(route('my-orders', 'processed')); ?>"><em class="fas fa-tasks"></em><?php echo e(__('msg.in_process')); ?><i class="fa fa-angle-right"></i> </a> </li>
         <li> <a href="<?php echo e(route('my-orders', 'received')); ?>"><em class="fas fa-list-ul"></em> <?php echo e(__('msg.received')); ?><i class="fa fa-angle-right"></i> </a> </li>
         <li > <a href="<?php echo e(route('my-orders', 'shipped')); ?>"><em class="fas fa-ship"></em><?php echo e(__('msg.shipped')); ?><i class="fa fa-angle-right"></i> </a> </li>
         <li> <a href="<?php echo e(route('my-orders', 'delivered')); ?>"><em class="fas fa-truck"></em><?php echo e(__('msg.delivered')); ?><i class="fa fa-angle-right"></i> </a> </li>
         <li> <a href="<?php echo e(route('my-orders', 'cancelled')); ?>"><em class="fas fa-ban"></em><?php echo e(__('msg.cancelled')); ?><i class="fa fa-angle-right"></i> </a> </li>
         <li> <a href="<?php echo e(route('my-orders', 'returned')); ?>"><em class="fas fa-undo"></em><?php echo e(__('msg.returned')); ?><i class="fa fa-angle-right"></i> </a> </li>
      </ul>
   </div>
</div><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/user/order-sidebar.blade.php ENDPATH**/ ?>