@if(isset($s->products) && is_array($s->products) && count($s->products))
<div class="main-content mt-4 my-md-2">
   <section class="new-arrival my-lg-5 my-3">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="product_right_bar">
                  <div class="product_container">
                     @if(isset($s->title) && $s->title != "")
                     <div class="section_title">
                        <!-- <h2>{{ $s->title }} </h2> -->
                        <!-- <div class="desc_title">
                           {{ $s->short_description }}
                           @if(isset($s->slug) && $s->slug != "")
                           <a href="{{ route('shop', ['section' => $s->slug]) }}" class="view title-section view-all">{{__('msg.view_all')}}</a>
                           @endif
                        </div> -->

                     </div>
                     @endif
                     <div class="product_carousel_content new-arrival-carousel owl-carousel">
                        @php   $maxProductShow = get('style_2.max_product_on_homne_page2'); @endphp
                        @foreach($s->products as $p)
                        @if((--$maxProductShow) > -1)
                        <div class="product_items">
                           <article class="single_product">
                              <figure>
                                 <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('product-single', $p->slug) }}"><img
                                       src="{{ $p->image }}"
                                       alt="{{ $p->name ?? 'Product Image' }}"></a>
                                    <div class="label_product">
                                       @if(!count(getInStockVarients($p)))
                                       <span class="label_sale">{{ __('msg.sold_out') }}</span>
                                       @endif
                                       
                                    </div>
                                    <div class="action_links">
                                       <span class="inner product_data">
                                          <ul>
                                             @if(count(getInStockVarients($p)))
                                             <input type="hidden" class="id" name="id" value="{{ $p->id }}" data-id="{{ $p->id }}">
                                             <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                             @foreach(getInStockVarients($p) as $v)
                                             <input type="hidden" class="varient" data-varient="{{ $v->id }}" name="varient" value="{{ $v->id }}"  data-price='{{ get_price(get_price_varients($v)) }}' data-mrp='{{ get_price(get_mrp_varients($v)) }}' data-savings='{{ get_savings_varients($v) }}' checked>
                                             @endforeach
                                             <input type="hidden" class="slug" value="{{ $p->slug }}" data-slug="{{ $p->slug }}">
                                             @if(count(getInStockVarients($p))>1)
                                             <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                data-tab="quick_view"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             @else
                                             <li class="add_to_cart addtocart_single" data-id="{{ $p->id }}" data-varient="{{ $v->id }}" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             @endif
                                             
                                              <li class="quick_button productmodal"><a title="quick view"><span class="fas fa-search"></span></a></li>
                                              @endif
                                              <li class="wishlist"><a  title="Add to Wishlist" class="{{ (isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save' }}" data-id='{{ $p->id }}'></a></li>
                                          </ul>
                                       </span>
                                    </div>
                                 </div>
                                 <figcaption class="product_content">
                                    <h4 class="product_name"><a href="{{ route('product-single', $p->slug) }}">@if(strlen(strip_tags($p->name)) > 30) {!! substr(strip_tags($p->name), 0,30)."..." !!} @else {!! substr(strip_tags($p->name), 0,30) !!} @endif</a></h4>
                                    <p><a href="#">{{ $p->category_name }}</a></p>
                                    <div class="product_reviews">
                                       <div class="comment_note">
                                          <div class="star_content">
                                             @php
                                             $arating=0;
                                             $arating = floatval($p->ratings); @endphp
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
                                             ({{$p->number_of_ratings}})
                                          </div>
                                       </div>
                                    </div>
                                    <div class="price_box">
                                       <span class="current_price" id="price_{{ $p->id }}">{!! print_price($p) !!}</span>
                                       <span class="old_price"  id="mrp_{{ $p->id }}">{!! print_mrp($p) !!}</span>
                                       @if(get_savings_varients($p->variants[0]))
                                       <span class="discount-percentage discount-product" id="savings_{{ $p->id }}">{{ get_savings_varients($p->variants[0]) }}</span>
                                       @endif
                                    </div>
                                 </figcaption>
                              </figure>
                           </article>
                        </div>
                        @endif
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   </section>
</div>
@endif

<div class="main-content mt-4 my-md-2">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center mt-4">
            @if(isset($s->slug) && $s->slug != "")
            <a href="{{ route('shop') }}" class="view title-section view-all btn btn-primary ">{{__('msg.view_all')}}</a>
            @endif
         </div>
      </div>
   </div>
</div>