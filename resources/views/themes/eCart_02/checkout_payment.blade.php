<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>{{__('msg.checkout_payment')}}</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ route('home') }}">{{__('msg.home')}}</a>
               </li>
               <li class="breadcrumb-item active">
                  {{__('msg.checkout_payment')}}
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
            <div class="col-lg-3 col-md-12 col-12 mb-4">
               <div class="account-sidebar account-tab mb-sm-30">
                  <div class="dark-bg tab-title-bg">
                     <div class="heading-part">
                        <div class="sub-title text-center"><span></span><em class="far fa-user"></em> My
                           Account
                        </div>
                     </div>
                  </div>
                  <div class="account-tab-inner">
                     <ul class="account-tab-stap">
                        <li> <a href="{{ route('checkout') }}"><em class="fas fa-wallet"></em>Checkout Summary<i class="fa fa-angle-right"></i> </a> </li>
                        <li> <a href="{{ route('checkout-address') }}"><em class="far fa-heart"></em>Address<i class="fa fa-angle-right"></i> </a> </li>
                        <li class="active"> <a href="#"><em class="fas fa-digital-tachograph"></em>Payment<i class="fa fa-angle-right"></i> </a> </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
               <div id="data-step1" class="" data-temp="tabdata">
                  <div class="row">
                     <div class="col-xl-6 col-lg-12 back-bg">
                        <form class=" full">
                           <div class="mb-20">
                              <div class="row">
                               
                                 @if(isset(Cache::get('timeslot')->slots) && count(Cache::get('timeslot')->slots))
                                 <div class="col-12 mb-20">
                                    <div class="heading-part">
                                       <h3 class="sub-heading">{{__('msg.select_delivery_day')}}</h3>
                                    </div>
                                    <hr>
                                 </div>
                                 <table class="table table-borderless table-shopping-cart" aria-describedby="myDec" aria-hidden="true">
                                    <tbody>
                                       <tr>
                                          <td>
                                             <div class="form-group">
                                                <div class="alert alert-danger" id="dateError">{{__('msg.select_suitable_delivery_date')}}</div>
                                             </div>
                                             <div class="col-md-12 col-xl-12 col-xxl-8">
                                                <div class="form-group calender w-100">
                                                   <div id="calendar">
                                                      <div id="datepicker" data-start='{{ Cache::get('delivery_starts_from', 0) }}' data-end='{{ Cache::get('allowed_days', 0) }}'>
                                                   </div>
                                                   <em class="calender-icon fa fa-calendar-o"></em> <span id='deliveryDatePrint'></span>
                                                </div>
                                             </div>
                              </div>
                              </td>
                              </tr>
                              </tbody>
                              </table>
                           </div>
                           
                     </div>
                     <div class="row">
                     <div class="col-12 mb-20">
                     <div class="heading-part">
                     <h3 class="sub-heading">{{__('msg.select_delivery_time')}}</h3>
                     </div>
                     <hr>
                     </div>
                     <table class="table table-borderless table-shopping-cart" aria-describedby="myDec3" aria-hidden="true">
                     <tbody>
                     <tr>
                     <td>
                     <div class="form-group">
                     <div class="alert alert-danger" id="timeError">{{__('select_payment_suitable_delivery_time')}}</div>
                     </div>
                     <div class="form-group" id="time">
                     @foreach(Cache::get('timeslot')->slots as $slot)
                     @if($slot->status == 1)
                     <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input  name="deliverTime" type="radio" class="custom-control-input"value="{{ $slot->title }}" data-from="{{ $slot->from_time }}" data-to="{{ $slot->to_time }}" data-last="{{ $slot->last_order_time }}" >
                                          <label class="custom-control-label">{{ $slot->title }}</label>
                                       </div>
                                    </div>
                     
                     @endif
                     @endforeach
                       @endif
                     </div>
                     </td>
                     </tr>
                     </tbody>
                     </table>
                     </div>
                     </form>
                  </div>
                  <div class=" col-xl-5 col-lg-12 back-bg1 col-xl-offset-1">
                     <div class="order-area-content1">
                        <h3>Your order</h3>
                        <div class="order-wrap-content">
                           <div class="order-product-info">
                              <div class="order-middle-content">
                                 <ul>
                                    <li><span class="order-middle-left">{{__('msg.subtotal')}}</span> <span class="order-price">{{ get_price($data['subtotal'])
                                       ?? '-' }}</span>
                                    </li>
                                    @if(isset($data['tax_amount']) && floatval($data['tax_amount']))
                                    <li><span class="order-middle-left">{{__('msg.tax')}} {{ $data['tax'] }}%</span> <span class="order-price">+ {{ get_price($data['tax_amount']) }} </span></li>
                                    @endif
                                    @if(isset($data['shipping']) && floatval($data['shipping']))
                                    <li><span class="order-middle-left">{{__('msg.delivery_charge')}}</span> <span class="order-price">+ {{ get_price($data['shipping']) }} </span></li>
                                    @endif
                                    @if(isset($data['coupon']['discount']) && floatval($data['coupon']['discount']))
                                    <li><span class="order-middle-left">{{__('msg.discount')}} </span> <span class="order-price">- {{ get_price($data['coupon']['discount']) }} </span></li>
                                    @endif
                                 </ul>
                              </div>
                              <div class="order-bottom-content">
                                 <ul>
                                    <li class="order-shipping">{{__('msg.total')}}</li>
                                    <li class="order-shipping">{{ get_price($data['total'])
                                       ?? '-' }}
                                    </li>
                                 </ul>
                              </div>
                              <h4 class="mb-3">{{__('msg.payment_method')}}</h4>
                              <div class="d-block my-3">
                                 <div class="row">
                                    @if(isset(Cache::get('payment_methods')->cod_payment_method) && Cache::get('payment_methods')->cod_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input  name="payment_method" type="radio" class="custom-control-input" value="cod"  checked >
                                          <label class="custom-control-label">{{__('msg.cash_on_delivery')}}</label>
                                       </div>
                                    </div>
                                    @endif @if(isset(Cache::get('payment_methods')->paypal_payment_method) && Cache::get('payment_methods')->paypal_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="paypal">
                                          <label class="custom-control-label">{{__('msg.paypal')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->payumoney_payment_method) && Cache::get('payment_methods')->payumoney_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3" id="PayUMoney">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="payumoney">
                                          <label class="custom-control-label">{{__('msg.PayUMoney')}}</label>
                                       </div>
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="payumoney-bolt">
                                          <label class="custom-control-label">{{__('msg.PayUMoney')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->razorpay_payment_method) && Cache::get('payment_methods')->razorpay_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input"value="razorpay">
                                          <label class="custom-control-label">{{__('msg.Razorpay')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->stripe_payment_method) && Cache::get('payment_methods')->stripe_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="stripe">
                                          <label class="custom-control-label">{{__('msg.Stripe')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->midtrans_payment_method) && Cache::get('payment_methods')->midtrans_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="midtrans">
                                          <label class="custom-control-label">{{__('msg.Midtrans')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->flutterwave_payment_method) && Cache::get('payment_methods')->flutterwave_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="flutterwave">
                                          <label class="custom-control-label">{{__('msg.flutterwave')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->paystack_payment_method) && Cache::get('payment_methods')->paystack_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="paystack">
                                          <label class="custom-control-label">{{__('msg.paystack')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @if(isset(Cache::get('payment_methods')->paytm_payment_method) && Cache::get('payment_methods')->paytm_payment_method == 1)
                                    <div class="col-md-12">
                                       <div class="custom-control custom-radio mb-3">
                                          <input name="payment_method" type="radio" class="custom-control-input" value="paytm">
                                          <label class="custom-control-label">{{__('msg.paytm')}}</label>
                                       </div>
                                    </div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                        <form action="{{ route('checkout-proceed') }}" method="POST">
                           <input type="hidden" name="deliverDay" id="date">
                           <input type="hidden" name="deliveryTime">
                           <input type="hidden" name="paymentMethod">
                           <input type="hidden" name="wallet_used" value="false">
                           <input type="hidden" name="wallet_balance" value="{{ floatval($data['total']) }}">
                           <div class="Place-order mt-25">
                              <button type="submit" name="submit" value="submit" class="btn btn-primary ml-2">Place Order</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
</div>	

<script src="{{ asset('js/checkout-payment.js') }}"></script>
