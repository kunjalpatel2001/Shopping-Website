<!--shop page -->
<section class="section-content padding-bottom mt-5">
    <a href="#" id="scroll"><span></span></a>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-xl-3 col-12 filter mb-3">
                <div class="card">
                    <div class="pt-4">
                        <legend class="mb-1 p-0 title-sec">{{__('msg.filter_by')}}</legend>
                        <hr class="line mb-0 pb-0">
                    </div>
                    <form action='#' method="GET" id='filter'>
                        <input type="hidden" name="s" value="{{ isset($_GET['s']) ? trim($_GET['s']) : ''}}">
                        <input type="hidden" name="section" value="{{ isset($_GET['section']) ? trim($_GET['section']) : ''}}">
                        <input type="hidden" name="category" value="{{ isset($_GET['category']) ? trim($_GET['category']) : ''}}">
                        <input type="hidden" name="sub-category" value="{{ isset($_GET['sub-category']) ? trim($_GET['sub-category']) : ''}}">
                        <input type="hidden" name="sort" value="{{ isset($_GET['sort']) ? trim($_GET['sort']) : ''}}">
                        <input type="hidden" name="discount_filter" value="{{ isset($_GET['discount_filter']) ? trim($_GET['discount_filter']) : ''}}">
						<input type="hidden" name="out_of_stock" value="{{ isset($_GET['out_of_stock']) ? trim($_GET['out_of_stock']) : ''}}">
                        <div>
                            
                            <br>
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
                        <br>
                    </form>
                    <br>
                    @if(isset($data['categories']) && is_array($data['categories']) && count($data['categories']))
                    <div>
                        <h5 class="mb-3 name">{{__('msg.category')}}</h5>
                        <div class="text ml-4 ">
                            @foreach($data['categories'] as $c)
                                @if(isset($c->name) && trim($c->name) != "")
                                    <div class="custom-control custom-checkbox pb-2">
                                        <input type="checkbox" class="custom-control-input cats" id="cat-{{ $c->id }}" value="{{ $c->slug }}" {{ (isset($data['selectedCategory']) && is_array($data['selectedCategory']) && in_array($c->slug, $data['selectedCategory'])) ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="cat-{{ $c->id }}">{{ $c->name }}</label>
                                        @if(isset($data['selectedCategory']) && is_array($data['selectedCategory'])  )
                        @foreach($data['selectedCategory'] as $cat)
                            @if(isset(Cache::get('categories',[])[$cat]) && isset(Cache::get('categories',[])[$cat]->childs) && $c->name == Cache::get('categories',[])[$cat]->name)
                                <br>
                                <div>
                                    <!--<h5 class="mb-3 name">{{ Cache::get('categories',[])[$cat]->name }}</h5>-->
                                    <div class="text ml-4">
                                        @foreach(Cache::get('categories',[])[$cat]->childs as $c)
                                            <div class="custom-control custom-checkbox pb-2">
                                                <input type="checkbox" class="custom-control-input subs" id="sub-{{ $c->id }}" value="{{ $c->slug }}" {{ (isset($data['selectedSubCategory']) && is_array($data['selectedSubCategory']) && in_array($c->slug, $data['selectedSubCategory'])) ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="sub-{{ $c->id }}">{{ $c->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <br>
                    <div>
                        <h5 class="mb-3 name title-sec">Discount</h5>
                        <div class="text ml-4 discount">
                            <div class="custom-control custom-radio pb-2">
                                <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-10" value="10" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '10') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="discount-10">10% Off or more</label>
                            </div>
                            <div class="custom-control custom-radio pb-2">
                                <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-25" value="25" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '25') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="discount-25">25% Off or more</label>
                            </div>
                            <div class="custom-control custom-radio pb-2">
                                <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-35" value="35" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '35') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="discount-35">35% Off or more</label>
                            </div>
                            <div class="custom-control custom-radio pb-2">
                                <input type="radio" name="discount" class="custom-control-input discount_filter" id="discount-50" value="50" {{ (isset($_GET['discount_filter']) && $_GET['discount_filter'] == '50') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="discount-50">50% Off or more</label>
                            </div>
                        </div>
                    </div>
                     
                    <br>
                   
                    <div>
                        <h5 class="mb-3 name title-sec">Avaibility</h5>
                        <div class="text ml-4 out_of_stock">
                            <div class="custom-control custom-radio pb-2">
                                <input type="radio" name="out_of_stock" class="custom-control-input out_of_stock" id="out_of_stock" value="1" {{ (isset($_GET['out_of_stock']) && $_GET['out_of_stock'] == '1') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="out_of_stock">Out of Stock</label>
                            </div>
                           
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-xl-9 col-lg-7 col-12 shopdetails">
                <nav class="navbar navbar-md navbar-light bg-white row gridviewdiv">
                    <div class="col-md-6 col-xs-3 col-6">
                        <div class="row">
                            <div id="list">
                                <em class= "fa fa-list fa-lg" data-view ="list-view"></em>
                            </div>
                            <div id="grid">
                                <em class="selected fa fa-th fa-lg" data-view ="grid-view"></em>
                            </div>
                            @php
                                $number = 0;
                            @endphp
                            @if(isset($data['list']) && isset($data['list']['data']) && is_array($data['list']['data']) && count($data['list']['data']))
                                @foreach($data['list']['data'] as $p)
                                    <?php $number++ ?>
                                @endforeach
                            @endif
                            <div class="letter">
                                <small> {{ $number.' Items out of ' }}{{ (isset($data['total']) && intval($data['total'])) ?  $data['total'].' Items' : '' }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="gridviewselect">
                            <div class="row">
                                <div class="select"> {{__('msg.sort_by')}}:  </div>
                                <div class="select1">
                                    <select class="form-control innerselect1" id="sort">
                                        <option value=""> {{__('msg.relevent')}} </option>
                                        <option value="new" {{ (isset($_GET['sort']) && $_GET['sort'] == 'new') ? 'selected' : '' }}>{{__('msg.new')}}</option>
                                        <option value="old" {{ (isset($_GET['sort']) && $_GET['sort'] == 'old') ? 'selected' : '' }}>{{__('msg.old')}}</option>
                                        <option value="low" {{ (isset($_GET['sort']) && $_GET['sort'] == 'low') ? 'selected' : '' }}>{{__('msg.low_to_high')}}</option>
                                        <option value="high" {{ (isset($_GET['sort']) && $_GET['sort'] == 'high') ? 'selected' : '' }}>{{__('msg.high_to_low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                @if(isset($data['list']) && isset($data['list']['data']) && is_array($data['list']['data']) && count($data['list']['data']))
                <div id="products" class="row view-group">
                    @foreach($data['list']['data'] as $p)
                    @if(count($p->variants))
                    <div class="item1 col-sm-12 col-lg-6 col-md-4">
                        <div class="add-to-fav">
                            <button type="button" class="btn {{ (isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save' }}" data-id='{{ $p->id }}' />
                        </div>
                        <a href="{{ route('product-single', $p->slug ?? '-') }}">
                            <div class="thumbnail card-sm">
                                <a href="{{ route('product-single', $p->slug ?? '-') }}">
                                    <div class="img-event">
                                        <img class="group list-group-image img-fluid" src="{{ $p->image }}" alt="{{ $p->image }}">
                                    </div>
                                </a>
                                <div class="caption card-body">
                                    <div class="text-wrap text-center">
                                        <a href="{{ route('product-single', $p->slug ?? '-') }}" class="title font-weight-bold product-name">{{ $p->name }}</a>

                                        <span class="text-muted description1">@if(strlen(strip_tags($p->description)) > 18) {!! substr(strip_tags($p->description), 0,18) ."..." !!} @else {!! substr(strip_tags($p->description), 0,18) !!} @endif</span>
                                        <div class="price mt-1 ">
                                            <strong id="price_{{ $p->id }}">{!! print_price($p) !!}</strong> &nbsp; <s class="text-muted" id="mrp_{{ $p->id }}">{!! print_mrp($p) !!}</s>
                                            <small class="text-success" id="savings_{{ $p->id }}"> {{ get_savings_varients($p->variants[0]) }} </small>
                                        </div>
                                    </div>
                                    @if(count(getInStockVarients($p)))
                                    <span class="inner text-center d-block m-auto product_data">
                                       {{-- <form action='{{ route('cart-add-single-varient') }}' method="POST"> --}} 
                                        <form action='{{ route('cart-add-single-varient') }}' method="POST"> 
                                            <input type="hidden" class="id" name="id" value="{{ $p->id }}" data-id="{{ $p->id }}">
                                            <input type="hidden" name="qty" value="1" class="qty" data-qty="1">

                                                @foreach(getInStockVarients($p) as $v)
                                                    <input type="hidden" class="varient" data-varient="{{ $v->id }}" name="varient" value="{{ $v->id }}"  data-price='{{ get_price(get_price_varients($v)) }}' data-mrp='{{ get_price(get_mrp_varients($v)) }}' data-savings='{{ get_savings_varients($v) }}' checked>
                                                @endforeach

                                            <input type="hidden" class="slug" value="{{ $p->slug }}" data-slug="{{ $p->slug }}">
                                            @if(count(getInStockVarients($p))>1)
                                                <button type="submit"  class="btn cart-1 fa fa-shopping-cart productmodal"><span>&nbsp;&nbsp;{{__('msg.add_to_cart')}}</span></button>
                                            @else
                                                <button type="submit"  class="btn cart-1 fa fa-shopping-cart addtocart_single" data-id="{{ $p->id }}" data-varient="{{ $v->id }}" data-qty="1"><span>&nbsp;&nbsp;{{__('msg.add_to_cart')}}</span></button>
                                            @endif
                                          </form> 
                                        
                                    </span>
                                    @else
                                    <span class="sold-out">{{ __('msg.sold_out') }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="row">
                    <div class="col"><br></div>
                </div>
                <div class="row">
                    
                    <div class="col text-right shoppagination">
                        @php
                        $number_of_pages = $data['number_of_pages'] + 1;
                        $currentpage = '0';
                        $currentpage = request()->input('page');
                        @endphp
                        @for($page = max(1, $currentpage - 2); $page <= min($currentpage + 4, $number_of_pages); $page++)

                        @php $pageprevious = $page-1;
                        @endphp
                        @if(request()->query('category') OR request()->query('min_price'))
                        <a href="{{Request::fullUrl()}}&page={{ $pageprevious }}" @if($currentpage == $pageprevious ) class="active" @else class="btn btn-primary pull-right text-white" @endif> {{ $page }} </a>
                        @else
                        <a href="shop?page={{ $pageprevious }}" @if($currentpage == $pageprevious ) class="active" @else class="btn btn-primary pull-right text-white" @endif>{{ $page }}  </a>
                        @endif
                        @endfor

                    </div>

                    @else
                    <div class="row">
                        <div class="col">
                            <br><br>
                            <h1 class="text-center">{{__('msg.no_product_found')}}</h1>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End shop page -->