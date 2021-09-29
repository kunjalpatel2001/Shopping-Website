{{-- slider --}}
<div class="main-slider-sec">
   @if(Cache::has('sliders') && is_array(Cache::get('sliders')) && count(Cache::get('sliders')))
   <div class="slider-activation owl-carousel nav-style dot-style nav-dot-left">
      @foreach(Cache::get('sliders') as $i => $s)
      @if($s->type == 'product')
      <a href="{{ route('product-single', $s->slug ?? '-') }}">
         <div class="single-slider-content height-100vh bg-img" data-dot="0{{$i+1}}"
            style="background-image:url('{{ $s->image }}');background-size: contain; background-repeat: no-repeat; background-position: center;">
            <div class="container">
               <div class="row align-items-center">
			   @if( $s->image2 != "")
                  <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                     <div class="inner-slider-img slider-animated-content">
                        <img class="animated" src="{{ $s->image2 }}" alt="">
                     </div>
                  </div>
				  @endif
                  <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                     <div class="slider-content slider-animated-content ml-70">
                        <h3 class="animated">{{ $s->title }}</h3>
                            <p class="animated">{{ $s->short_description }}</p>
							@if( $s->title != "")
                            <div class="btn-hover">
                                <span class="animated norm-btn" href="{{ route('product-single', $s->slug ?? '-') }}">SHOP NOW</span>
                            </div>
							@endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
      @elseif($s->type == 'category')
      <a href="{{ route('category', $s->slug ?? '-') }}">
         <div class="single-slider-content height-100vh bg-img" data-dot="0{{$i+1}}"
            style="background-image:url('{{ $s->image }}');background-size: contain; background-repeat: no-repeat; background-position: center;">
            <div class="container">
               <div class="row align-items-center">
			   @if( $s->image2 != "")
                  <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                     <div class="inner-slider-img slider-animated-content">
                        <img class="animated" src="{{ $s->image2 }}" alt="">
                     </div>
                  </div>
				  @endif
				  <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                     <div class="slider-content slider-animated-content ml-70">
                        <h3 class="animated">{{ $s->title }}</h3>
                            <p class="animated">{{ $s->short_description }}</p>
							@if( $s->title != "")
                            <div class="btn-hover">
                                <span class="animated norm-btn" href="{{ route('category', $s->slug ?? '-') }}">SHOP NOW</span>
                            </div>
							@endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
      @else
      <a href="">
         <div class="single-slider-content height-100vh bg-img" data-dot="0{{$i+1}}"
            style="background-image:url('{{ $s->image }}');background-size: contain; background-repeat: no-repeat; background-position: center;">
            <div class="container">
               <div class="row align-items-center">
			   @if( $s->image2 != "")
                  <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                     <div class="inner-slider-img slider-animated-content">
                        <img class="animated" src="{{ $s->image2 }}" alt="">
                     </div>
                  </div>
				  @endif
				  <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                     <div class="slider-content slider-animated-content ml-70">
                        <h3 class="animated">{{ $s->title }}</h3>
                            <p class="animated">{{ $s->short_description }}</p>
							@if( $s->title != "")
                            <div class="btn-hover">
                                <span class="animated norm-btn" href="{{ route('shop') }}">SHOP NOW</span>
                            </div>
							@endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </a>
      @endif
      @endforeach
   </div>
   @endif
</div>
{{-- shipping area --}}
<section class="shipping-content">
   <div class="container">
      <div class="shipping_inner_content">
         <div class="row">
            
            
         
         </div>
      </div>
   </div>
</section>
{{-- all-content --}}
<!-- newsletter pop -->
{{-- <section class="shipping-content" id="dialog">
   <div class="popup_box ">
      <div class="popup_content newsletter">
         <span class="popup_close">Close</span>
         <div class="content">
            <img src="{{theme('images/newsletter.png')}}" alt="">
            <div class="wrapper1">
               <div class="newletter-title">
                  <h2>Newsletter</h2>
               </div>
               <div class="box-content newleter-content">
                  <label class="newletter-label">Enter your email address to subscribe our notification of our
                  new post &amp; features by email.</label>
                  <div id="subscribe-form">
                     <form name="subscribe" id="subscribe_popup" action="{{ route('newsletter') }}" method="POST" class="ajax-form">
                        @csrf
                        <div class="formResponse"></div>
                        <input type="email"  name="email" id="subscribe_pemail"
                           placeholder="Enter Your Email.." class="text-center">
                        <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                        <div id="notification"></div>
                        <a class="subscribe-btn-outline"><button type="submit" name="submit">Subscribe</button></a>
                     </form>
                     <div class="subscribe-bottom">
                        <input type="checkbox" id="newsletter_popup_dont_show_again" class="no">
                        <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                     </div>
                  </div> --}}
                  <!-- subscribe-form -->
               {{-- </div> --}}
               <!-- box-content -->
            {{-- </div>
         </div> --}}
         <!-- row -->
      {{-- </div>
   </div>
</section> --}}
<!-- /Newsletter Popup -->
{{-- footer --}}