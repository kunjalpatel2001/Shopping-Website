<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.my_account')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"> <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a> </li>
               <li class="breadcrumb-item active"> <?php echo e(__('msg.my_account')); ?> </li>
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
            <div class="col-lg-3 col-md-12 col-12 mb-4"> <?php echo $__env->make("themes.".get('theme').".user.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
            <div class="col-lg-9 col-md-12 col-12">
               <div id="data-step1" class="account-content" data-temp="tabdata">
                  <div class="dashboard-right">
                     <form method='POST' enctype="multipart/form-data" id="profile_form">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                           <div class="col-xl-4 col-md-6 col-lg-6 mb-lg-0 mb-md-3 mb-sm-5 mb-4">
                              <div class="dash-bg-right dash-bg-right1">
                                 <div class="reward-body-dtt">
                                    <div class="reward-img-icon">
                                       <img id="user_profile" src="<?php echo e($data['profile']['profile']); ?>" alt="User">
                                       <div class="img-add">
                                          <input type="file" name="profile" accept="image/*" id="file" />
                                          <label for="file"><i class="fas fa-camera"></i></label>
                                          <input type="text" class="form-control" disabled placeholder="Upload File" id="file1" hidden>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-8 col-lg-6 col-md-6 mb-lg-0 mb-md-3 mb-sm-5 mb-4">
                              <div class="dash-bg-right dash-bg-right1">
                                 <div class="add-cash-body">
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12">
                                          <div class="form-group mt-1">
                                             <label class="control-label"><?php echo e(__('msg.name')); ?></label>
                                             <div class="ui search focus">
                                                <div class="ui left icon input card-detail-desc">
                                                   <input class="card-inputfield " type="text" name="name" value="<?php echo e($data['profile']['name']); ?>" required>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       &nbsp;
                                       <div class="col-lg-12 col-md-12">
                                          <div class="form-group mt-1">
                                             <label class="control-label"><?php echo e(__('msg.email')); ?></label>
                                             <div class="ui search focus">
                                                <div class="ui left icon input card-detail-desc">
                                                   <input class="card-inputfield " type="email" name="email" value="<?php echo e($data['profile']['email']); ?>">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       &nbsp;
                                       <div class="col-lg-12 col-md-12">
                                          <div class="form-group mt-1 mb-4">
                                             <label class="control-label"><?php echo e(__('msg.mobile')); ?></label>
                                             <div class="ui search focus">
                                                <div class="ui left icon input card-detail-desc">
                                                   <input class="card-inputfield " type="text" value="<?php echo e($data['profile']['mobile']); ?>" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="hidden" value="<?php echo e($data['profile']['user_id']); ?>" class="form-control" name="id">
                                    <button type="submit" name="submit" value="submit" id="submit_btn" class=" btn btn-primary"><?php echo e(__('msg.update')); ?></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script>
   $(document).on("click", ".file-upload", function() {
   	var file = $(this).parent().parent().parent().find(".file");
   	file.trigger("click");
   });
   $('input[type="file"]').change(function(e) {
   	var fileName = e.target.files[0].name;
   	$("#file1").val(fileName);
   	var reader = new FileReader();
   	reader.onload = function(e) {
   		// get loaded data and render thumbnail.
   		document.getElementById("user_profile").src = e.target.result;
   	};
   	// read the image file as a data URL.
   	reader.readAsDataURL(this.files[0]);
   });
   $('#profile_form').on('submit', function(e) {
   	e.preventDefault();
   	var fd = new FormData(this);
   	if(confirm('Are you sure?')) {
   		var files = $('#file')[0].files[0];
   		var token = <?php echo json_encode($data['token']) ?>;
   		fd.append('profile', files);
   		fd.append('accesskey', '90336');
   		fd.append('type', 'edit-profile');
   		$.ajax({
   			type: 'POST',
   			url: profile_api_url,
   			data: fd,
   			headers: {
   				Authorization: 'Bearer ' + token
   			},
   			beforeSend: function() {
   				$('#submit_btn').html('Please wait..');
   			},
   			contentType: false,
   			processData: false,
   			success: function(result) {
   				console.log(result);
   				$('#submit_btn').html('Update')
   			}
   		});
   	}
   });
</script><?php /**PATH /home2/chachaki/public_html/resources/views/themes/eCart_02/user/account.blade.php ENDPATH**/ ?>