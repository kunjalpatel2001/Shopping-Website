{{-- big advertise banner --}}
@if(Cache::has('offers') && is_array(Cache::get('offers')) && count(Cache::get('offers')))
@foreach(Cache::get('offers') as $o)
@if(isset($o->image) && trim($o->image) !== "")
<section class="main-content home-banner banner-sec-2">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="banner_box_content">
               <img src="{{ $o->image }}" alt="ad-1">
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@endforeach
@endif