<section class="section-content padding-bottom ">
    <!--user address-->
    <a href="#" id="scroll"><span></span></a>
    <div class="page_title corner-title overflow-visible">
        <ol class="breadcrumb">
            <li class=" item-1"></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('msg.home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('msg.my_account')}}</li>
        </ol>
    </div>
    <div class="container mt-2 mt-lg-5">
        <div class="row">
            @include("themes.$theme.user.sidebar")
            <main class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <form method='POST' enctype="multipart/form-data" id="profile_form">
                                   @csrf 
                                    <div class="form-row">
                                        <div class="col form-group">
                                            
                                            <div class="col form-group text-center">

                                                <img id="user_profile" class="profile-rounded" src="{{ $data['profile']['profile'] }}" alt="User" width="50%">
                                                <div class="camera-icon">
                                                    <em class="fa fa-camera"></em>
                                                </div>
                                                <input class="file-upload" type="file" name="profile" accept="image/*" id="file"/>
                                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file1" hidden>
                                            </div>  
                                        </div>  
                                        <div class="col form-group">
                                            <label>{{__('msg.name')}}</label>
                                            <input type="text" name="name" class="form-control" value="{{ $data['profile']['name'] }}" required>
                                            <input type="hidden" name="token" class="form-control" value="{{ $data['token'] }}" required>
                                            <br/>
                                            <label>{{__('msg.email')}}</label>
                                            <input type="email" name="email" value="{{ $data['profile']['email'] }}" class="form-control">
                                            <br/>
                                            <label>{{__('msg.mobile')}}</label>
                                            <input type="text" value="{{ $data['profile']['mobile'] }}" class="form-control" disabled="disabled">
                                          
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
										<input type="hidden" value="{{ $data['profile']['user_id'] }}" class="form-control" name="id">
                                        <button type="submit" name="submit" value="submit" id="submit_btn" class="btn btn-primary btn-block mt-4">{{__('msg.update')}} </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!--end user address-->
</section>

<script>

$(document).on("click", ".file-upload", function() {
  var file = $(this)
    .parent()
    .parent()
    .parent()
    .find(".file");
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
        $('#profile_form').on('submit', function (e) {
            e.preventDefault();
             var fd = new FormData(this);
                if (confirm('Are you sure?')) {
            var files = $('#file')[0].files[0];
            var token = <?php echo json_encode($data['token']) ?>;
            fd.append('profile',files);
            fd.append('accesskey','90336');
            fd.append('type','edit-profile');
           
                    $.ajax({
                        type: 'POST',
                        url: profile_api_url,
                        data: fd,
                        headers: {Authorization: 'Bearer ' + token},
                        beforeSend: function () {
                            $('#submit_btn').html('Please wait..');
                        },
                        contentType: false,
			            processData: false,
                        success: function (result) {
                          console.log(result);
            
                          $('#submit_btn').html('Update')
                        }
                    });
                }
        });
    </script>