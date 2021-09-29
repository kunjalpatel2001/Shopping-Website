{{-- big advertise banner --}}
@if(Cache::has('advertisements') && is_array(Cache::get('advertisements')) && count(Cache::get('advertisements')))
<section class="shipping-content">
   <div class="main-content my-md-2">
      {{-- advertise-banner-images --}}
      <section class="home-banner banner-sec-1">
         <div class="container-fluid">
            <div class="row">
               @foreach(Cache::get('advertisements') as $advt)
               @if(isset($advt->ad1) && trim($advt->ad1) !== "")
               <div class="col col-md-4 col-xs-12 col-12">
                  <div class="banner_box_content">
                     <img src="{{ $advt->ad1 }}" alt="ad-1">
                  </div>
               </div>
               @endif
               @if(isset($advt->ad2) && trim($advt->ad2) !== "")
               <div class="col col-md-4 col-xs-12 col-12">
                  <div class="banner_box_content">
                     <img src="{{ $advt->ad2 }}" alt="ad-2">
                  </div>
               </div>
               @endif
               @if(isset($advt->ad3) && trim($advt->ad3) !== "")
               <div class="col col-md-4 col-xs-12 col-12">
                  <div class="banner_box_content">
                     <img src="{{ $advt->ad3 }}" alt="ad-3">
                  </div>
               </div>
               @endif
               @endforeach
            </div>
         </div>
      </section>
      {{-- new arrival --}}
   </div>
</section>
@endif