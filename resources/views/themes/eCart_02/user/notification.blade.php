<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>{{__('msg.notifications')}}</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ route('my-account') }}">{{__('msg.my_account')}}</a>
               </li>
               <li class="breadcrumb-item active">
                  {{__('msg.notifications')}}
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
               <section class="about-us">
                  <div class="about-us-area">
                     <div class="container">
                        @if(isset($data['list']) && isset($data['list']['data']) && count($data['list']['data']))
                        @foreach($data['list']['data'] as $w)
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              @if(trim($w->image) != "")
                              <div class="about-us-img text-center">
                                 <img src="{{ $w->image }}" alt="{{ $w->name }}">
                              </div>
                              @else
                              <div class="about-us-img text-center">
                                 <img src="{{ asset('images/no-image.png') }}">
                              </div>
                              @endif
                           </div>
                           <div class="col-lg-6 col-md-6 align-self-center">
                              <div class="about-us-content">
                                 <h2>{{ $w->name }}</h2>
                                 <span class="animate-border mb-40"></span>
                                 <p>{{ $w->subtitle }}</p>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                           <div class="col">
                              @if(isset($data['last']) && $data['last'] != "")
                              <a href="{{ $data['last'] }}" class="btn btn-primary pull-left text-white"><em class="fa fa-arrow-left"></em> {{__('msg.previous')}}</a>
                              @endif
                           </div>
                           <div class="col">
                              @if(isset($data['next']) && $data['next'] != "")
                              <a href="{{ $data['next'] }}" class="btn btn-primary pull-right text-white"> {{__('msg.next')}}<em class="fa fa-arrow-right"></em></a>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </section>
</div>