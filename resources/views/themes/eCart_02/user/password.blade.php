<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>{{__('msg.change_password')}}</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ route('home') }}">{{__('msg.home')}}</a>
               </li>
               <li class="breadcrumb-item active">
                  {{__('msg.change_password')}}
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
               @include("themes.".get('theme').".user.sidebar")
            </div>
            <div class="col-lg-9 col-md-12 col-12">
               <div id="data-step1" class="account-content" data-temp="tabdata">
                  <div class="dashboard-right">
                     <form method='POST'>
                        @csrf 
                        <div class="row">
                           <div class="col-lg-6 col-md-6 mb-lg-0 mb-md-3 mb-sm-5 mb-4">
                              <div class="dash-bg-right dash-bg-right1">
                                 <div class="add-cash-body">
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12">
                                          <div class="form-group mt-1">
                                             <label class="control-label">{{__('msg.old_password')}}</label>
                                             <div class="ui search focus">
                                                <div class="ui left icon input card-detail-desc">
                                                   <input class="card-inputfield " type="password"
                                                      name="current_password">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       &nbsp;
                                       <div class="col-lg-12 col-md-12">
                                          <div class="form-group mt-1">
                                             <label class="control-label">{{__('msg.new_password')}}</label>
                                             <div class="ui search focus">
                                                <div class="ui left icon input card-detail-desc">
                                                   <input class="card-inputfield " type="password" name="new_password">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       &nbsp;
                                       <div class="col-lg-12 col-md-12">
                                          <div class="form-group mt-1 mb-4">
                                             <label class="control-label">{{__('msg.confirm_new_password')}}</label>
                                             <div class="ui search focus">
                                                <div class="ui left icon input card-detail-desc">
                                                   <input class="card-inputfield " type="password" name="new_password_confirmation">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" name="submit" value="submit" class=" btn btn-primary">{{__('msg.change_password')}}</button>
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