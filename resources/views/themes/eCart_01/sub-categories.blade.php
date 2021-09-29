<section class="footerfix section-content padding-bottom">
    <a href="#" id="scroll"><span></span></a>
    <div class="container">
        <nav class="row row-eq-height">
            @if(isset($data['sub-categories']))
            @foreach ($data['sub-categories'] as $c)
            <div class="col-md-3 mt-2">
                <a href="{{ route('shop', ['category' => $data['category']->slug, 'sub-category' => $c->slug]) }}">
                    <div class="card card-category eq-height-element">
                        <div class="img-wrap">
                            <img src="{{ $c->image }}" alt="{{ $c->name ?? '' }}">
                        </div>
                        <div class="card-body1234 text-center">
                            <h4 class="card-title">{{ $c->name }}</h4>
                            <p>{{ $c->subtitle }}</p>
                        </div>
                    </div>
                </a>
            </div>               
            @endforeach
            @else
            <div class="row">
                <div class="col">
                    <br><br>
                    <h1 class="text-center">{{__('msg.no_subcategory_found')}}</h1>
                </div>
            </div>
            @endif
        </nav>
        @if(isset($data['list']) && isset($data['list']) && is_array($data['list']) && count($data['list']))
        
                <div id="products" class="row view-group">
                    @foreach($data['list'] as $p)
                    @if(isset($p->variants) && count($p->variants))
                    <div class="item1 col-sm-12 col-lg-6 col-md-4">
                        <div class="add-to-fav">
                            
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
{{--                                            </form> --}}
                                        
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
                    <!-- <div class="col">
                         @if(isset($data['last']) && $data['last'] != "")
                             <a href="{{ $data['last'] }}" class="btn btn-primary pull-left text-white"><em class="fa fa-arrow-left"></em> {{__('msg.previous')}}</a>
                         @endif
                     </div>
                     <div class="col text-right">
                         @if(isset($data['next']) && $data['next'] != "")
                             <a href="{{ $data['next'] }}" class="btn btn-primary pull-right text-white">{{__('msg.next')}} <em class="fa fa-arrow-right"></em></a>
                         @endif
                     </div>-->
                     {{-- <div class="col text-right shoppagination">
                        @php
                        $number_of_pages = $data['number_of_pages'] + 1;
                        $currentpage = '0';
                         $currentpage = request()->input('page');
                        @endphp
                        @for($page=1; $page <=  $number_of_pages; $page++)

                        @php $pageprevious = $page-1;
                        @endphp
                       
                        <a href="shop?page={{ $pageprevious }}" @if($currentpage == $pageprevious ) class="active" @else class="btn btn-primary pull-right text-white" @endif>{{ $page }}  </a>
                       
                        @endfor

                    </div> --}}

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
</section>