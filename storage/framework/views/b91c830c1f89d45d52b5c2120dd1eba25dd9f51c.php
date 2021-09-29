<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.my_order_track')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
               <a href="<?php echo e(route('my-account')); ?>"><?php echo e(__('msg.my_account')); ?></a>
               </li>
               <li class="breadcrumb-item active">
               <?php echo e(__('msg.my_order_track')); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="order_track_page main-content">
   <section class="checkout-section ptb-70">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-md-12 col-12 mb-4">
               <?php echo $__env->make("themes.".get('theme').".user.order-sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
               <div id="data-step1" class="account-content" data-temp="tabdata">
                  <div id="form-print" class="admission-form-wrapper">
                     <div class="row">
                        <div class="col-12">
                           <div class="heading-part heading-bg mb-30">
                              <h2 class="heading m-0">My Orders</h2>
                           </div>
                        </div>
                     </div>
                     <div class="dashboard-right">
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                               <?php if(isset($data['list']->items) && is_array($data['list']->items) && count($data['list']->items)): ?>
                        <?php $__currentLoopData = $data['list']->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $allStatus = ['received' => 0, 'processed' => 1, 'shipped' => 2, 'delivered' => 3];
                            $orderPlaced = "";
                            $orderProcessed = "";
                            $orderShipped = "";
                            $orderDelivered = "";
                            $orderCancelled = "";
                            $orderReturned = "";
                            foreach($itm->status as $s){
                                if($s[0] == "received"){
                                    $orderPlaced = $s[1];
                                }elseif($s[0] == "processed"){
                                    $orderProcessed = $s[1];
                                }elseif($s[0] == "shipped"){
                                    $orderShipped = $s[1];
                                }elseif($s[0] == "delivered"){
                                    $orderDelivered = $s[1];
                                }elseif($s[0] == "cancelled"){
                                    $orderCancelled = $s[1];
                                }elseif($s[0] == "returned"){
                                    $orderReturned = $s[1];
                                }
                            }
                            ?>
                              <div class="dash-bg-right dash-bg-right1">
                                 <div class="dash-bg-right-title">
                                    <h6><?php echo e(__('msg.ordered_id')); ?> : <?php echo e($data['list']->id); ?></h6>
                                    <h6><?php echo e(__('msg.order_date')); ?> :  <?php echo e($data['list']->date_added ? date('d-m-Y', strtotime($data['list']->date_added)) : ''); ?></h6>
                                 </div>
                                 <div class="order-dashboard">
                                    <ul class="order-dash-desc">
                                       <li>
                                          <div class="order-img">
                                             <img src="<?php echo e($itm->image); ?>"
                                                alt="<?php echo e($itm->name ?? 'Product Image'); ?>">
                                          </div>
                                       </li>
                                       <li>
                                          <div class="order-desc">
                                             <h4><?php echo e($itm->name); ?></h4>
                                             <p>Qty : <?php echo e($itm->quantity); ?></p>
                                             <p><?php echo e(get_price($itm->sub_total)); ?></p>
                                             <p><?php echo e(__('msg.via')); ?> <?php echo e(strtoupper($data['list']->payment_method)); ?></p>
                                             <p><?php echo e(strtoupper($itm->active_status)); ?></p>
                                          </div>
                                       </li>
                                    </ul>
                                    <?php if(count($itm->status)): ?>
                                    
                                    <div class="track-order">
                                       <h4>Track Order</h4>
                                       <div class="bs-wizard" style="border-bottom:0;">
                                          <?php if($orderPlaced != ""): ?>
                                          <div class="bs-wizard-step complete">
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_placed')); ?>

                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("d-m-Y", strtotime($orderPlaced))); ?></div>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date('h:i:s A', strtotime($orderPlaced))); ?></div>
                                          </div>
                                          <?php endif; ?>
                                          <?php if($orderProcessed != ""): ?>
                                          <div class="bs-wizard-step complete">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_processed')); ?>

                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("d-m-Y", strtotime($orderProcessed))); ?></div>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("h:i:s A", strtotime($orderProcessed))); ?></div>
                                          </div>
                                          <?php elseif($orderCancelled == ""): ?>
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_processed')); ?>

                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          <?php endif; ?>
                                          <?php if($orderShipped != ""): ?>
                                          <div class="bs-wizard-step complete">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_shipped')); ?></div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("d-m-Y", strtotime($orderShipped))); ?></div>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("h:i:s A", strtotime($orderShipped))); ?></div>
                                          </div>
                                          <?php elseif($orderCancelled == ""): ?>
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_shipped')); ?></div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          <?php endif; ?>
                                          <?php if($orderDelivered != ""): ?>
                                          <div class="bs-wizard-step complete">
                                             <!-- active -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_delivered')); ?>

                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("d-m-Y", strtotime($orderDelivered))); ?></div>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("h:i:s A", strtotime($orderDelivered))); ?></div>
                                          </div>
                                          <?php elseif($orderCancelled == ""): ?>
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_delivered')); ?></div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          <?php endif; ?>
                                          <?php if($itm->applied_for_return == true): ?>
                                          <?php if($orderReturned != ""): ?>
                                          <div class="bs-wizard-step disabled">
                                             <!-- active -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_returned')); ?>

                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("d-m-Y", strtotime($orderDelivered))); ?></div>
                                             <div class="bs-wizard-info text-center text-muted"><?php echo e(date("h:i:s A", strtotime($orderDelivered))); ?></div>
                                          </div>
                                          <?php elseif($orderCancelled == ""): ?>
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum"><?php echo e(__('msg.order_returned')); ?></div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          <?php endif; ?>
                                          <?php endif; ?>
                                       </div>
                                    </div>
                                    <?php endif; ?>
									
                                    <div class="call-bill">
                                       <div class="delivery-man">
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                             
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>
                              
                           </div>
                        </div>
						 <div class="row">
            <div class="col-md-6">
                <div class="dash-bg-right dash-bg-right1">
                    <h3 class="m-2 font-weight-bold text-dark text-start"><?php echo e(__('msg.price_detail')); ?></h3>

                    <table class="table table-hover">
						<tr>
							<td><?php echo e(__('msg.items_amount')); ?> :</td>
							<td><?php echo e(get_price($data['list']->total, false)); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('msg.delivery_charge')); ?> :</td>
							<td>+ <?php echo e(get_price($data['list']->delivery_charge, false)); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('msg.tax')); ?>(<?php echo e($data['list']->tax_percentage); ?>%) : </td>
							<td>+ <?php echo e(get_price($data['list']->tax_amount, false)); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('msg.discount')); ?>(0%) :</td>
							<td>- <?php echo e(get_price($data['list']->discount, false)); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('msg.total')); ?> : </td>
							<td><b><?php echo e(get_price(floatval($data['list']->total) + floatval($data['list']->delivery_charge) + floatval($data['list']->tax_amount) - floatval($data['list']->discount), false)); ?></b></td>
						</tr>
						<tr>
							<td><?php echo e(__('msg.promo_code_discount')); ?> :</td>
							<td>- <?php echo e(get_price($data['list']->promo_discount, false)); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('msg.wallet_balance')); ?>  : </td>
							<td>-<?php echo e(get_price($data['list']->wallet_balance, false)); ?></td>
						</tr>
						<tr>
							<td><b><?php echo e(__('msg.final_total')); ?> :</b> </td>
							<td><b><?php echo e(get_price($data['list']->final_total, false)); ?></b></td>
						</tr>
					</table>

                </div>
            </div>
     

            <div class="col-md-6">
                <div class="dash-bg-right dash-bg-right1 ">
                    <h3 class="m-2 font-weight-bold text-dark text-start"><?php echo e(__('msg.other_details')); ?></h3>

                    <table class="table table-hover">
						<tr>
							<td><?php echo e(__('msg.name')); ?> : <?php echo e($data['list']->user_name); ?></td>
							
						</tr>
						<tr>
							<td><?php echo e(__('msg.mobile_no')); ?>: <?php echo e($data['list']->mobile); ?></td>
							
						</tr>
						<tr>
							<td><?php echo e(__('msg.address')); ?> : <?php echo e($data['list']->address ?? ''); ?></td>
							
						</tr>
					</table>

                </div>
            </div>
        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/user/order-track.blade.php ENDPATH**/ ?>