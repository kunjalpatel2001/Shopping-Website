<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>{{__('msg.shop')}}</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ route('home') }}">Home</a>
               </li>
               <li class="breadcrumb-item active">
                  {{__('msg.shop')}}
               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="main-content my-lg-5  my-md-2">
   <!--shop  area start-->
   <div class="main_shop_content shop_inverse_content mt-lg-5 mt-md-3">
      <div class="divider-top-lg"></div>
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-md-12">
               <!--sidebar widget start-->
               <aside class="sidebar_content shop_sidebar">
                  <div class="content_inner">
                     @if(isset($data['categories']) && is_array($data['categories']) && count($data['categories']))
                     <div class="content_list content_categories">
                        <h3>{{__('msg.category')}}</h3>
                        <ul>
                           @php $i=1; @endphp
                           @foreach($data['categories'] as $c)
                           @if(isset($c->name) && trim($c->name) != "")
                           <li class="content_sub_categories sub_categories{{$i}}">
                              <input type="checkbox" class="custom-control-input cats" id="cat-{{ $c->id }}" value="{{ $c->slug }}" {{ (isset($data['selectedCategory']) && is_array($data['selectedCategory']) && in_array($c->slug, $data['selectedCategory'])) ? 'checked' : ''}} hidden>
                              <a class="{{ (isset($data['selectedCategory']) && is_array($data['selectedCategory']) && in_array($c->slug, $data['selectedCategory'])) ? 'active' : ''}}"><label class="custom-control-label" for="cat-{{ $c->id }}">{{ $c->name }}</label></a>
                              @if(isset($data['selectedCategory']) && is_array($data['selectedCategory']))
                              @foreach($data['selectedCategory'] as $cat)
                              @if(isset(Cache::get('categories',[])[$cat]) && isset(Cache::get('categories',[])[$cat]->childs) && $c->name == Cache::get('categories',[])[$cat]->name)
                              <ul class="content_dropdown_categories dropdown_categories{{$i}}"  @if($data['selectedCategory'] && in_array($c->slug, $data['selectedCategory']))) style="display:block" @endif  >
                              @foreach(Cache::get('categories',[])[$cat]->childs as $c)
                              <input type="checkbox" class="custom-control-input subs" id="sub-{{ $c->id }}" value="{{ $c->slug }}" {{ (isset($data['selectedSubCategory']) && is_array($data['selectedSubCategory']) && in_array($c->slug, $data['selectedSubCategory'])) ? 'checked' : ''}} hidden>
                           <li ><a><label class="custom-control-label" for="sub-{{ $c->id }}">{{ $c->name }}</label></a></li>
                           @endforeach
                        </ul>
                        @endif
                        @endforeach
                        @endif
                        </li>
                        <br>
                        @endif
                        @php $i++; @endphp
                        @endforeach
                        </ul>
                     </div>
                     @endif
                     <div>
                        <!--<div class="content_list discount">
                           <h3>Discount</h3>
                           <ul>
                              <li>
                                 <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-10" value="10" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '10') ? 'checked' : '' }} hidden>
                                 <a class="{{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '10') ? 'active' : '' }}"><label class="custom-control-label" for="discount-10">10% Off or more</label></a>
                              </li>
                              <li>
                                 <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-25" value="25" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '25') ? 'checked' : '' }} hidden>
                                 <a class="{{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '25') ? 'active' : '' }}"><label class="custom-control-label" for="discount-25">25% Off or more</label></a>
                              </li>
                              <li>
                                 <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-35" value="35" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '35') ? 'checked' : '' }} hidden>
                                 <a class="{{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '35') ? 'active' : '' }}"><label class="custom-control-label" for="discount-35">35% Off or more</label></a>
                              </li>
                              <li>
                                 <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-50" value="50" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '50') ? 'checked' : '' }} hidden>
                                 <a class="{{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '50') ? 'active' : '' }}"><label class="custom-control-label" for="discount-50">50% Off or more</label></a>
                              </li>
                           </ul>
                        </div>
                        <div class="content_list out_of_stock">
                           <h3>Availability</h3>
                           <ul>
                              <li>
                                 <input type="radio" name="out_of_stock" class="custom-control-input out_of_stock" id="out_of_stock" value="{{ (isset($_GET['out_of_stock']) && $_GET['out_of_stock'] == '1') ? '0' : '1' }}"  hidden>
                                 <a class="{{ (isset($_GET['out_of_stock']) && $_GET['out_of_stock'] == '1') ? 'active' : '' }}"><label class="custom-control-label" for="out_of_stock">Out of Stock</label></a>
                              </li>
                           </ul>
                        </div>-->
                     </div>
                     <br/>
                     <div class="content_list content_filter">
                        <h3>Filter by price</h3>
                        <form action="#" method="GET" id='filter'>
                           <input type="hidden" name="s" value="{{ isset($_GET['s']) ? trim($_GET['s']) : ''}}">
                           <input type="hidden" name="section" value="{{ isset($_GET['section']) ? trim($_GET['section']) : ''}}">
                           <input type="hidden" name="category" value="{{ isset($_GET['category']) ? trim($_GET['category']) : ''}}">
                           <input type="hidden" name="sub-category" value="{{ isset($_GET['sub-category']) ? trim($_GET['sub-category']) : ''}}">
                           <input type="hidden" name="sort" value="{{ isset($_GET['sort']) ? trim($_GET['sort']) : ''}}">
                           <input type="hidden" name="discount_filter" value="{{ isset($_GET['discount_filter']) ? trim($_GET['discount_filter']) : ''}}">
                           <input type="hidden" name="out_of_stock" value="{{ isset($_GET['out_of_stock']) ? trim($_GET['out_of_stock']) : ''}}">
                           <div>
                              <h5 class="mb-3 name title-sec">{{__('msg.price')}}</h5>
                              <div class="row">
                                 <div class="col">
                                    <div id="slider-range" data-min="{{ intval($data['total_min_price']) }}" data-max="{{ intval($data['total_max_price']) }}" data-selected-min="{{  $data['total_min_price']}}" data-selected-max="{{ $data['total_max_price']}}"></div>
                                    <br>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col">
                                    <input type="number" name="min_price" value="{{  $data['total_min_price']}}" class="form-control">
                                 </div>
                                 <div class="col">
                                    <input type="number" name="max_price" value="{{  $data['total_max_price']}}" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col">
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">{{__('msg.filter')}}</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </aside>
               <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
               @php
               $number = 0;
               @endphp
               @if(isset($data['list']) && isset($data['list']['data']) && is_array($data['list']['data']) && count($data['list']['data']))
               @foreach($data['list']['data'] as $p)
               <?php $number++ ?>
               @endforeach
               @endif
               <!--shop wrapper start-->
               <!--shop toolbar start-->
               <div class="shop_toolbar_content">
                  <div class="shop_toolbar_btn">
                     <button data-role="grid-view" type="button" class="active btn-grid-view" data-toggle="tooltip" title="grid"></button>
                     <button data-role="list-view" type="button"  class="btn-list-view" data-toggle="tooltip" title="List"></button>
                     <p>{{ $number. ' Items out of ' }}{{ (isset($data['total']) && intval($data['total'])) ?  $data['total'].' Items' : '' }}</p>
                  </div>
                  <div class="">
                     <select name="orderby" id="sort" class="relevant_sort">
                        <option value=""> {{__('msg.relevent')}} </option>
                        <option value="new" {{ (isset($_GET['sort']) && $_GET['sort'] == 'new') ? 'selected' : '' }}>{{__('msg.sort_by_newness')}}</option>
                        <option value="old" {{ (isset($_GET['sort']) && $_GET['sort'] == 'old') ? 'selected' : '' }}>{{__('msg.sort_by_oldness')}}</option>
                        <option value="low" {{ (isset($_GET['sort']) && $_GET['sort'] == 'low') ? 'selected' : '' }}>{{__('msg.sort_by_price_low_to_high')}}</option>
                        <option value="high" {{ (isset($_GET['sort']) && $_GET['sort'] == 'high') ? 'selected' : '' }}>{{__('msg.sort_by_price_high_to_low')}}</option>
                     </select>
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
                                 <input type="hidden" class="id" name="id" value="{{ $p->id }}" data-id="{{ $p->id }}">
                                 <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                 @foreach(getInStockVarients($p) as $v)
                                 <input type="hidden" class="varient" data-varient="{{ $v->id }}" name="varient" value="{{ $v->id }}"  data-price='{{ get_price(get_price_varients($v)) }}' data-mrp='{{ get_price(get_mrp_varients($v)) }}' data-savings='{{ get_savings_varients($v) }}' checked>
                                 @endforeach
                                 <input type="hidden" class="slug" value="{{ $p->slug }}" data-slug="{{ $p->slug }}">
                                 <ul>
                                    @if(count(getInStockVarients($p))>1)
                                    <li class="productmodal" data-bs-toggle="modal" data-bs-target="#modal_box"><a  title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                    @else
                                    <li class="add_to_cart addtocart_single" data-id="{{ $p->id }}" data-varient="{{ $v->id }}" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                    @endif
                                    <li class="quick_button productmodal"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"> <span class="fas fa-search"></span></a></li>
                                    @endif
                                    <li class="wishlist"><a class="{{ (isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save' }}" data-id='{{ $p->id }}' title="Add to Wishlist"></a></li>
                                 </ul>
                              </form>
                           </div>
                        </div>
                        <div class="product_content inner_grid_content">
                           <h4 class="product_name"><a href="{{ route('product-single', $p->slug ?? '-') }}">{{ $p->name }}</a></h4>
                           <p>{{ $p->category_name }}</p>
                           <div class="product_rating">
                              <ul>
                                 @php $arating = floatval($p->ratings); @endphp
                                 @for ($j = 1; $j <= 5; $j++) 
                                 @if ($arating < $j) 
                                 @if (is_float($arating) && (round($arating) == $j)) 
                                 <li><a><em
                                    class="fas fa-star-half-alt"></em></a></li>
                                 @else
                                 <li><a><em
                                    class="far fa-star"></em></a></li>
                                 @endif
                                 @else
                                 <li><a><em
                                    class="fas fa-star"></em></a></li>
                                 @endif
                                 @endfor
                                 <li>({{$p->number_of_ratings}})</li>
                              </ul>
                           </div>
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
                           <div class="product_rating">
                              <ul>
                                 @php $arating = floatval($p->ratings); @endphp
                                 @for ($j = 1; $j <= 5; $j++) 
                                 @if ($arating < $j) 
                                 @if (is_float($arating) && (round($arating) == $j)) 
                                 <li><a><em
                                    class="fas fa-star-half-alt"></em></a></li>
                                 @else
                                 <li><a><em
                                    class="far fa-star"></em></a></li>
                                 @endif
                                 @else
                                 <li><a><em
                                    class="fas fa-star"></em></a></li>
                                 @endif
                                 @endfor
                                 <li>({{$p->number_of_ratings}})</li>
                              </ul>
                           </div>
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
                                 <input type="hidden" class="id" name="id" value="{{ $p->id }}" data-id="{{ $p->id }}">
                                 <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                 @foreach(getInStockVarients($p) as $v)
                                 <input type="hidden" class="varient" data-varient="{{ $v->id }}" name="varient" value="{{ $v->id }}"  data-price='{{ get_price(get_price_varients($v)) }}' data-mrp='{{ get_price(get_mrp_varients($v)) }}' data-savings='{{ get_savings_varients($v) }}' checked>
                                 @endforeach
                                 <input type="hidden" class="slug" value="{{ $p->slug }}" data-slug="{{ $p->slug }}">
                                 @if(count(getInStockVarients($p))>1)
                                 <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart">Add to Cart</span></a></li>
                                 @else
                                 <li class="add_to_cart addtocart_single" data-id="{{ $p->id }}" data-varient="{{ $v->id }}" data-qty="1"><a title="Add to cart">Add to Cart</span></a></li>
                                 @endif
                                 <li class="quick_button productmodal"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="fas fa-search"></span></a></li>
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
               <div class="shop_toolbar t_bottom">
                  <div class="pagination">
                     <ul>
                        @php
                        $number_of_pages = $data['number_of_pages'];
                        $currentpage = '0';
                        $currentpage = request()->input('page');
                        @endphp
                        @for($page = max(1, $currentpage - 2); $page <= min($currentpage + 4, $number_of_pages); $page++)
                        @php $pageprevious = $page-1;
                        @endphp
                        @if(request()->query('min_price')!== NULL OR request()->query('category')!== NULL)
                        <li class=""><a href="{{Request::fullUrl()}}&page={{ $pageprevious }}" @if($currentpage == $pageprevious ) class="active" @else class="btn btn-primary pull-right text-white" @endif>{{ $page }}</a></li>
                        @else
                        <li class=""><a href="shop?page={{ $pageprevious }}" @if($currentpage == $pageprevious ) class="active" @else class="btn btn-primary pull-right text-white" @endif>{{ $page }}  </a></li>
                        @endif
                        @endfor
                     </ul>
                  </div>
               </div>
               @endif
               <!--shop toolbar end-->
               <!--shop wrapper end-->
            </div>
         </div>
      </div>
      <div class="divider-bottom-lg"></div>
   </div>
   <!--shop  area end-->
</div>
{{-- footer --}}
</div>
</body>
</html>