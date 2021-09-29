
@if(isset($s->products) && is_array($s->products) && count($s->products))
    <!--section recently added and new on ekart -->
    <section class="section-content padding-bottom mt-3 sellpro">
        <div class="container">
            @if(isset($s->title) && $s->title != "")
                <h4 class="title-section title-sec font-weight-bold">{{ $s->title }} <small class="text-muted short-desc"> {{ $s->short_description }}</h4>
                @if(isset($s->slug) && $s->slug != "")
                    <a href="{{ route('shop', ['section' => $s->slug]) }}" class="view title-section viewall">{{__('msg.view_all')}}</a>
                @endif
                <hr class="line">
            @endif
            <div class="ekart">
                <div class="row no-gutter">
                    @php   $maxProductShow = get('style_2.max_product_on_homne_page'); @endphp
                    @foreach($s->products as $p)
                        @if((--$maxProductShow) > -1)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6 recent-add">
                                <figure class="card card-sm card-product-grid">
                                    <aside class="add-to-fav">
                                        <button type="button" class="btn {{ (isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save' }}" data-id='{{ $p->id }}' />
                                    </aside>
                                    <a href="{{ route('product-single', $p->slug) }}" class="img-wrap"> <img src="{{ $p->image }}" alt="{{ $p->name ?? 'Product Image' }}"> </a>
                                    <figcaption class="info-wrap">
                                        <div class="text-wrap p-1 text-center">
                                            <a href="{{ route('product-single', $p->slug) }}" class="title font-weight-bold product-name">{{ $p->name }}</a>

                                            <span class="text-muted style-desc">
                                                @if(strlen(strip_tags($p->description)) > 20) {!! substr(strip_tags($p->description), 0,20)."..." !!} @else {!! substr(strip_tags($p->description), 0,20) !!} @endif
                                            </span>
                                            <div class="price mt-1 ">
                                                <strong id="price_{{ $p->id }}">{!! print_price($p) !!}</strong> &nbsp; <s class="text-muted" id="mrp_{{ $p->id }}">{!! print_mrp($p) !!}</s>
                                                <small class="text-success" id="savings_{{ $p->id }}"> {{ get_savings_varients($p->variants[0]) }} </small>
                                            </div>
                                        </div>
                                    </figcaption>
                                    @if(count(getInStockVarients($p)))
                                        <span class="inner product_data">
<!--                                            <form action='{{ route('cart-add-single-varient') }}' method="POST"> -->
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
<!--                                              </form> -->
                                        </span>
                                    @else
                                        <span class="sold-out">{{ __('msg.sold_out') }}</span>
                                    @endif
                                </figure>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--section end recently added and new on ekart -->
@endif


    <!-- JavaScript -->
