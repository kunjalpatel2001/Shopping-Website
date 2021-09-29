<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>Sale</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ route('home') }}">{{__('msg.home')}}</a>
               </li>
               <li class="breadcrumb-item active">
                  Sale
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
            @if(isset($data['data']) && isset($data['data']) && is_array($data['data']) && count($data['data']))
            <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-12 col-12">
               <div class="product_left_bar">
                  <div class="deals_product">
                     <div class="deals_title">
                        <h2>Sale... Sale... Sale</h2>
                     </div>
                     <div class="deals_product_inner">
                        <div class="product_carousel_content deals_carousel owl-carousel">
                           @foreach(Cache::get('flash-sales') as $fs)
                           <article class="single_product">
                              <div class="deals_title">
                                 <h2>{{$fs->title}}</h2>
                              </div>
                              @foreach($fs->products as $product)
                              @if ($loop->first)
                              <figure>
                                 <div class="product_thumb">
                                    <a class="primary_img" href="product-details"><img
                                       src="{{ $product->image}}"
                                       alt="deals"></a>
                                 </div>
                                 <figcaption class="product_content">
                                    <h4 class="product_name"><a href="product-details">{{ $product->name}}</a>
                                    </h4>
                                    <p>{{ $product->category_name}}</p>
                                    <div class="product_reviews">
                                       <div class="comment_note">
                                          <div class="star_content">
                                             @php 
                                             $arating=0;
                                             $arating = floatval($product->ratings); @endphp
                                             @for ($j = 1; $j <= 5; $j++) 
                                             @if ($arating < $j) 
                                             @if (is_float($arating) && (round($arating) == $j)) 
                                             <em
                                                class="fas fa-star-half-alt"></em>
                                             @else
                                             <em
                                                class="far fa-star"></em>
                                             @endif
                                             @else
                                             <em
                                                class="fas fa-star"></em>
                                             @endif
                                             @endfor
                                             ({{$product->number_of_ratings}})
                                          </div>
                                       </div>
                                    </div>
                                    <div class="price_box">
                                       <span class="current_price">{{ Cache::get('currency') }} {{ $product->discounted_price}}</span>
                                       <span class="old_price"><s>{{ Cache::get('currency') }} {{ $product->price}}</s></span>
                                    </div>
                                    <div class="product_timing">
                                       <div data-countdown="{{ $product->end_date}}"></div>
                                    </div>
                                    <div class="addto_cart_btn inner product_data">
                                       <a class="add_to_cart addtocart_single" data-id="{{ $product->product_id }}" data-varient="{{ $product->product_variant_id }}" data-qty="1"  title="Add to cart">Add to Cart</a>
                                    </div>
                                 </figcaption>
                              </figure>
                              @endif
                              @endforeach
                              <a href="{{ route('sale-products', $fs->slug) }}">View All</a>
                           </article>
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <div class="banner-image text-center trending-banner">
                     <img src="{{theme('images/banner.png')}}" alt="banner">
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </section>
</div>