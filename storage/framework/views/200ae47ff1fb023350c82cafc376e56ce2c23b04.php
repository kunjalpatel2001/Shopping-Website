
<?php echo $__env->make("themes.$theme.common.msg", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.my_address')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.my_address')); ?>

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
               <li> <a href="<?php echo e(route('checkout')); ?>"><em class="fas fa-wallet"></em>Checkout Summary<i class="fa fa-angle-right"></i> </a> </li>
               <li class="active"> <a href="#"><em class="far fa-heart"></em>Address<i class="fa fa-angle-right"></i> </a> </li>
               <li> <a href="#"><em class="fas fa-digital-tachograph"></em>Payment<i class="fa fa-angle-right"></i> </a> </li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-lg-9 col-md-12 col-12">
   <?php if(isset($data['address']) && is_array($data['address']) && count($data['address'])): ?>
   <div id="data-step1" class="">
      <div class="m-0"  id="address">
         <div class="row" id="mydesc">
            <div class="col-12 mb-20">
               <div class="heading-part">
                  <h3 class="sub-heading">Account Information</h3>
               </div>
               <hr>
            </div>
            <form action="<?php echo e(route('checkout-address')); ?>" method="POST">
               <div class="row">
                  <?php $__currentLoopData = $data['address']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(isset($a->id) && intval($a->id)): ?>
                  <div class="col-md-6 mb-1">
                    
                     <div class="cart-total-table address-box commun-table">
                        <div class="table-responsive">
                           <table class="table table-shopping-cart" aria-describedby="mydesc" aria-hidden="true">
                              <thead>
                                 <tr class="delivery-address">
                                    <th><input type="radio" name="id" value="<?php echo e($a->id); ?>" <?php echo e((count($data['address']) == 1 || (isset($a->is_default) && intval($a->is_default)) ? 'checked=checked' : '')); ?>> <?php echo e($a->type); ?>

                                       <span class="form-group edit-delete">
                                       <button class="btn editAddress" data-data='<?php echo e(json_encode($a)); ?>'> <em class="fas fa-pencil-alt"></em></button>
                                       <a href="<?php echo e(route('address-remove', $a->id)); ?>" class="btn"> <em class="fas fa-times text-danger"></em></a>
                                       </span>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       <ul>
                                          <li class="inner-heading"> <b><?php echo e($a->name ?? ''); ?></b>
                                          </li>
                                          <li>
                                             <p><?php echo e($a->address ?? ''); ?>, <?php echo e($a->area_id ?? ''); ?><br>
                                                <?php echo e($a->city_id ?? ''); ?> - <?php echo e($a->pincode ?? ''); ?><br>
                                                <?php echo e(__('msg.mobile')); ?>: <?php echo e(($a->country_code ?? '') ." ". ($a->mobile ?? '-')); ?>

                                             </p>
                                          </li>
                                       </ul>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
               <div class="row">
                  <div class="add_new_address_btn col-md-6">
                     <span onclick="address()" class="btn btn-primary"><?php echo e(__('msg.add_new_address')); ?>&nbsp;&nbsp;<em
                        class="fas fa-plus"></em></span>
                  </div>
                  <?php if(isset($data['address'][0])): ?>
                  <div class="add_new_address_btn col-md-6">
                     <button type="submit" class="btn btn-primary add-to-cart float-right">Proceed to Payment&nbsp;&nbsp;<em
                        class="fas fa-angle-double-right"></em></button>
                  </div>
                  <?php endif; ?>
               </div>
            </form>
         </div>
      </div>
      <div class="row ">
         <div class="col-md-12" id="editAddress">
            <div class="card dash-bg-right dash-bg-right1">
               <h3><?php echo e(__('msg.edit_address')); ?></h3>
               <hr class="mb-0">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg">
                        <form action="<?php echo e(route('address-add')); ?>" id='formEditAddress' method="POST">
                           <input type="hidden" name="id">
                           <input type="hidden" name="latitude" value="0">
                           <input type="hidden" name="longitude" value="0">
                           <input type="hidden" name="country_code" value="0">
                           <div class="form-group mt-1">
                           <label><?php echo e(__('msg.name')); ?></label>
                           <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                
                                 <input class="form-control" name="name" type="text">
                              </div>
                              </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                           <label><?php echo e(__('msg.mobile_no')); ?></label>
                           <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                
                                 <input class="form-control" id='editPhone' type="number" name="mobile">
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                           <label><?php echo e(__('msg.alternate_mobile_no')); ?></label>
                           <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 
                                 <input class="form-control" type="number" name="alternate_mobile">
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                          
                                 <label><?php echo e(__('msg.address')); ?></label>
                                 <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="address">
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                          
                                 <label><?php echo e(__('msg.landmark')); ?></label>
                                 <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="landmark">
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                          
                                 <label><?php echo e(__('msg.pincode')); ?></label>
                                 <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="number" name="pincode" placeholder="Pincode">
                              </div>
                           </div>
                           </div>
                           <br/>
                            
                           <div class="form-group mt-1">
                              <div class="form-group col">
                                 <label><?php echo e(__('msg.select_city')); ?></label>
                                     <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="city" placeholder="City" >
                              </div>
                           </div>
                                  
                                 <br/> 
                              </div>
                              <div class="form-group col">
                                 <label><?php echo e(__('msg.select_area')); ?></label>
                                   <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="area" placeholder="Area" >
                              </div>
                           </div>
                                 
                              </div>
                           </div>
                           
                           <br/>
                           <div class="form-group mt-1">
                              
                                 <label><?php echo e(__('msg.state')); ?></label>
                                 <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="state" required>
                              </div>
                      
                                 <label><?php echo e(__('msg.country')); ?></label>
                                 <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="country" required>
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                              <label class="radio-inline">
                              <input class="mr-2" type="radio" name="type" checked value="Home"><?php echo e(__('msg.home')); ?>

                              </label>
                              <label class="radio-inline  ml-5">
                              <input class="mr-2" type="radio" name="type" value="Work"><?php echo e(__('msg.work')); ?>

                              </label>
                              <label class="radio-inline  ml-5">
                              <input class="mr-2" type="radio" name="type" value="Other"><?php echo e(__('msg.other')); ?>

                              </label>
                           </div>
                           <div class="form-group mt-1">
                              <input type="checkbox" name="is_default" class=" mt-1" />
                              <label class="control-label" for="default-address"> <?php echo e(__('msg.set_as_default_address')); ?></label>
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-block text-uppercase"> <?php echo e(__('msg.update')); ?> </button>
                              <button class="btn btn-primary btn-block text-uppercase AddEditAddressCancel"> <?php echo e(__('msg.cancel')); ?> </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <div class="row padding-bottom <?php echo e(count($data['address']) > 0 ? '' : 'visible'); ?>">
         <div class="col-md-12" id="addAddress">
            <div class="card dash-bg-right dash-bg-right1">
               <h3><?php echo e(__('msg.add_new_address')); ?></h3>
               <hr class="mb-0">
               <div class="card-body add-cash-body">
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <form action="<?php echo e(route('address-add')); ?>" id='formAddAddress' method='POST'>
                           <input type="hidden" name="latitude" value="0">
                           <input type="hidden" name="longitude" value="0">
                           <input type="hidden" name="country_code" value="0">
                           <div class="form-group mt-1">
                              <label class=""><?php echo e(__('msg.name')); ?></label>
                              <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="card-inputfield" name="name" type="text" placeholder="Name" required>
                                 </div>
                              </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                                 <label><?php echo e(__('msg.mobile_no')); ?></label>
                                 <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control card-inputfield" id='addPhone' type="number" placeholder="Mobile No" name="mobile" required>
                                 </div>
                              </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                           <label><?php echo e(__('msg.alternate_mobile_no')); ?></label>
                           <div class="ui search focus">
                           <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="number" placeholder="Altername Mobile No" name="alternate_mobile">
                              </div>
                              </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                           <label><?php echo e(__('msg.address')); ?></label>
                           <div class="ui search focus">
                           <div class="ui left icon input card-detail-desc">
                                 
                                 <input class="form-control" type="text" placeholder="Address" name="address" required>
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                         
                                 <label><?php echo e(__('msg.landmark')); ?></label>
                                 <div class="ui search focus">
                           <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" placeholder="Landmark" name="landmark" required>
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                              
                                 <label><?php echo e(__('msg.pincode')); ?></label>
                                 <div class="ui search focus">
                           <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="number" placeholder="Pincode" name="pincode" required>
                              </div>
                           </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                              <div class="form-group col">
                                 <label><?php echo e(__('msg.select_city')); ?></label>
                                       <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="city" placeholder="City" >
                              </div>
                           </div>
                              </div>
                              <br/>
                              <div class="form-group col">
                                 <label><?php echo e(__('msg.select_area')); ?></label>
                                       <div class="ui search focus">
                                 <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="area" placeholder="Area" >
                              </div>
                           </div>
                              </div>
                           </div>
                           <br/>
                           <div class="form-group mt-1">
                     
                                 <label><?php echo e(__('msg.state')); ?></label>
                                 <div class="ui search focus">
                           <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="state" required placeholder="State">
                              </div>
                              </div>
                              <br/>
                                 <label><?php echo e(__('msg.country')); ?></label>
                                 <div class="ui search focus">
                           <div class="ui left icon input card-detail-desc">
                                 <input class="form-control" type="text" name="country" required placeholder="Country">
                              </div>
                              </div>
                           </div>
                          <br/>
                           <div class="form-group mt-1">
                              <label class="radio-inline">
                              <input class="mr-2 " type="radio" name="type" value="Home" checked><?php echo e(__('msg.home')); ?>

                              </label>
                              <label class="radio-inline  ml-5">
                              <input class="mr-2" type="radio" name="type" value="Work"><?php echo e(__('msg.work')); ?>

                              </label>
                              <label class="radio-inline  ml-5">
                              <input class="mr-2" type="radio" name="type" value="Other"><?php echo e(__('msg.other')); ?>

                              </label>
                           </div>
                           </div>
                           <div class="form-group mt-1 mb-4 mt-3">
                              <input type="checkbox" name="is_default" class=" mt-1" />
                              <label class="control-label" for="default-address"> <?php echo e(__('msg.set_as_default_address')); ?></label>
                           </div>
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-block text-uppercase"> <?php echo e(__('msg.add_new_address')); ?> </button>
                              <button class="btn btn-primary btn-block text-uppercase AddEditAddressCancel"> <?php echo e(__('msg.cancel')); ?> </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?php echo e(theme('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/address.js')); ?>"></script><?php /**PATH /home/retailindia/domains/retailindia.shop/public_html/resources/views/themes/eCart_02/checkout_address.blade.php ENDPATH**/ ?>