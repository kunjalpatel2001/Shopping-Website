<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.transaction_history')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('my-account')); ?>"><?php echo e(__('msg.my_account')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.transaction_history')); ?>

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
               <div class="dash-bg-right dash-bg-right1 no_history">
                  <?php if(isset($data['list']) && isset($data['list']['data']) && count($data['list']['data'])): ?>
                  <div class="dash-bg-right-title">
                     <h4></h4>
                  </div>
                  <div class="active-offers-body">
                     <div class="table-responsive">
                        <table aria-describedby="wallet-table"
                           class="table offer-table earning-table">
                           <thead class="thead-s-offer">
                              <tr>
                                 <th scope="col"><?php echo e(__('msg.id')); ?></th>
                                 <th scope="col"><?php echo e(__('msg.payment_gateway')); ?></th>
                                 <th scope="col"><?php echo e(__('msg.date_and_time')); ?></th>
                                 <th scope="col"><?php echo e(__('msg.message')); ?></th>
                                 <th scope="col"><?php echo e(__('msg.amount')); ?></th>
                                 <th scope="col"><?php echo e(__('msg.status')); ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $__currentLoopData = $data['list']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                 <td>#<?php echo e($w->id); ?></td>
                                 <td><?php echo e(strtoupper($w->type)); ?></td>
                                 <td><?php echo e(date('d-M-Y H:i A', strtotime($w->date_created))); ?></td>
                                 <td><?php echo e($w->message); ?></td>
                                 <td><?php echo e(get_price($w->amount, false)); ?></td>
                                 <td> <button class="btn btn-sm btn-<?php echo e(($w->status == 'canceled') ? 'danger' : 'success'); ?>"><?php echo e(strtoupper($w->status)); ?></button></strong>
                                 </td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <?php else: ?>
                  <div class="row text-center">
                     <div class="col-12">
                        <br><br>
                        <h3><?php echo e(__('msg.no_transaction_history_found')); ?></h3>
                     </div>
                     <div class="col-12">
                        <br><br>
                        <a href="<?php echo e(route('shop')); ?>" class="btn btn-primary"><em class="fa fa-chevron-left mr-1"></em><?php echo e(__('msg.continue_shopping')); ?></a>
                     </div>
                  </div>
                  <?php endif; ?>
                  <div class="row">
                     <div class="col">
                        <?php if(isset($data['last']) && $data['last'] != ""): ?>
                        <a href="<?php echo e($data['last']); ?>" class="btn btn-primary pull-left text-white"><em class="fa fa-arrow-left"></em><?php echo e(__('msg.previous')); ?></a>
                        <?php endif; ?>
                     </div>
                     <div class="col favnext text-right">
                        <?php if(isset($data['next']) && $data['next'] != ""): ?>
                        <a href="<?php echo e($data['next']); ?>" class="btn btn-primary pull-right text-white"><?php echo e(__('msg.next')); ?> <em class="fa fa-arrow-right"></em></a>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/user/transaction-history.blade.php ENDPATH**/ ?>