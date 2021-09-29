<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>{{__('msg.favourites')}}</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ route('my-account') }}">{{__('msg.my_account')}}</a>
               </li>
               <li class="breadcrumb-item active">
                  {{__('msg.favourites')}}
               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="main-content">
   <section class="favourite_sec checkout-section ptb-70">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-md-12 col-12 mb-4">
               @include("themes.".get('theme').".user.sidebar")
            </div>
            <div class="col-lg-9 col-md-12">
               <!--shop wrapper start-->
               <!--shop toolbar start-->
               <div class="shop_toolbar_content">
                  <div class="shop_toolbar_btn">
                     <button data-role="grid-view" type="button" class="active btn-grid-view" data-toggle="tooltip" title="grid"></button>
                     <button data-role="list-view" type="button"  class="btn-list-view" data-toggle="tooltip" title="List"></button>
                  </div>
               </div>
               <!--shop toolbar end-->
               @if(isset($data['list']) && isset($data['list']['data']) && is_array($data['list']['data']) && count($data['list']['data']))
               <div class="row right_shop_content list-view">
               @foreach($data['list']['data'] as $p)
                    @if(count($p->variants))
                  <div class="col-12 ">
                     <div class="single_product_content">
                        <div class="inner_product_content">
                       
                           <a class="img_content" href="{{ route('product-single', $p->slug ?? '-') }}"><img src="{{ $p->image }}" alt="{{ $p->image }}"></a>
						    <div class="label_product">@if(!count(getInStockVarients($p)))
                              <span class="label_sale">{{ __('msg.sold_out') }}</span>
                              @endif
                           </div>
                           <div class="share_links inner product_data">
                           @if(count(getInStockVarients($p)))
                              <form action="{{ route('cart-add-single-varient') }}" method="POST">
                                 <input type="hidden" class="id" name="id" value="{{ $p->product_id }}" data-id="{{ $p->product_id }}">
                                 <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                              @foreach(getInStockVarients($p) as $v)
                              <input type="hidden" class="varient" data-varient="{{ $v->id }}" name="varient" value="{{ $v->id }}"  data-price='{{ get_price(get_price_varients($v)) }}' data-mrp='{{ get_price(get_mrp_varients($v)) }}' data-savings='{{ get_savings_varients($v) }}' checked>
                              @endforeach
                              <input type="hidden" class="slug" value="{{ $p->slug }}" data-slug="{{ $p->slug }}">
                              <ul>
                                 @if(count(getInStockVarients($p))>1)
                                 <li class="add_to_cart productmodal"><a  title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                 @else
                                 <li class="add_to_cart addtocart_single" data-id="{{ $p->product_id }}" data-varient="{{ $v->id }}" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                 @endif
                                 @endif
                                 <li class="wishlist"><a class="{{ (isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save' }}" data-id='{{ $p->id }}' title="Add to Wishlist"></a></li>
                              </ul>
                              </form>
                           </div>
                        </div>
                        <div class="product_content inner_grid_content">
                           <h4 class="product_name"><a href="{{ route('product-single', $p->slug ?? '-') }}">{{ $p->name }}</a></h4>
                           <p>{{ $p->category_name }}</p>
                           
                           <div class="price_box">
                           <span class="current_price" id="mrp_{{ $p->id }}">{!! print_mrp($p) !!}</span>
                              <span class="old_price" id="price_{{ $p->id }}">{!! print_price($p) !!}</span>
                              @if(get_savings_varients($p->variants[0]))
                              <span class="discount-percentage discount-product" id="savings_{{ $p->id }}">{{ get_savings_varients($p->variants[0]) }}</span>
                              @endif
                           </div>
                        </div>
                        
                        <div class="product_content inner_list_content">
                           <h4 class="product_name"><a href="{{ route('product-single', $p->slug ?? '-') }}">{{ $p->name }}</a></h4>
                           <p>{{ $p->category_name }}</p>
                          
                           <div class="price_box">
                           <span class="current_price">{!! print_mrp($p) !!}</span>
                              <span class="old_price">{!! print_price($p) !!}</span>
                              @if(get_savings_varients($p->variants[0]))
                              <span class="discount-percentage discount-product" id="savings_{{ $p->id }}">{{ get_savings_varients($p->variants[0]) }}</span>
                              @endif
                           </div>
                           <div class="product_desc">
                              <p>@if(strlen(strip_tags($p->description)) > 180) {!! substr(strip_tags($p->description), 0,180) ."..." !!} @else {!! substr(strip_tags($p->description), 0,180) !!} @endif</p>
                           </div>
                           <div class="share_links list_action_right inner product_data">
                           <ul>
                                 @if(count(getInStockVarients($p)))
                                 <input type="hidden" class="id" name="id" value="{{ $p->product_id }}" data-id="{{ $p->product_id }}">
                                 <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                 @foreach(getInStockVarients($p) as $v)
                                 <input type="hidden" class="varient" data-varient="{{ $v->id }}" name="varient" value="{{ $v->id }}"  data-price='{{ get_price(get_price_varients($v)) }}' data-mrp='{{ get_price(get_mrp_varients($v)) }}' data-savings='{{ get_savings_varients($v) }}' checked>
                                 @endforeach
                                 <input type="hidden" class="slug" value="{{ $p->slug }}" data-slug="{{ $p->slug }}">
                                 @if(count(getInStockVarients($p))>1)
                                 <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart">Add to Cart</span></a></li>
                                 @else
                                 <li class="add_to_cart addtocart_single" data-id="{{ $p->product_id }}" data-varient="{{ $v->id }}" data-qty="1"><a title="Add to cart">Add to Cart</span></a></li>
                                 @endif
                                 @endif
                                 
                                 <li class="wishlist"><a title="Add to Wishlist" class="{{ (isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save' }}" data-id='{{ $p->id }}'></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                    @endforeach
               </div>
               @endif
               <div class="shop_toolbar t_bottom">
                  <div class="pagination">
                     
                  </div>
               </div>
               <!--shop toolbar end-->
               <!--shop wrapper end-->
            </div>
         </div>
      </div>
   </section>
</div>