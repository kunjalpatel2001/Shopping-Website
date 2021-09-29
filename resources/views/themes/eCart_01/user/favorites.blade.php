<section class="section-content padding-bottom footerfix">
    <a href="#" id="scroll"><span></span></a>
    <div class="page_title corner-title overflow-visible">
        <ol class="breadcrumb">
            <li class=" item-1"></li>
            <li class="breadcrumb-item"><a href="{{ route('my-account') }}">{{__('msg.my_account')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('msg.favourites')}}</li>
        </ol>
    </div>
    <div class="container mt-5">
        @if(isset($data['list']['data']) && is_array($data['list']['data']) && count($data['list']['data']))
            <div class="ekart">
                <div class="row no-gutter">
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
                                      
                                            <input type="hidden" class="id" name="id" value="{{ $p->product_id }}" data-id="{{ $p->product_id }}">
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
            </div>
        @else
            <div class="row text-center">
                <div class="col-12">
                    <br><br>
                    <h3>{{__('msg.no_favorites_product_found')}}</h3>
                </div>
                <div class="col-12">
                    <br><br>
                    <a href="{{ route('shop') }}" class="btn btn-primary"><em class="fa fa-chevron-left mr-1"></em> {{__('msg.continue_shopping')}}</a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                @if(isset($data['last']) && $data['last'] != "")
                    <a href="{{ $data['last'] }}" class="btn btn-primary pull-left text-white"><em class="fa fa-arrow-left"></em> {{__('msg.previous')}}</a>
                @endif
            </div>
            <div class="col favnext text-right">
                @if(isset($data['next']) && $data['next'] != "")
                    <a href="{{ $data['next'] }}" class="btn btn-primary pull-right text-white">{{__('msg.next')}} <em class="fa fa-arrow-right"></em></a>
                @endif
            </div>
        </div>
    </div>
</section>