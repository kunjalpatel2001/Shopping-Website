<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>{{__('msg.my_order_track')}}</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
               <a href="{{ route('my-account') }}">{{__('msg.my_account')}}</a>
               </li>
               <li class="breadcrumb-item active">
               {{__('msg.my_order_track')}}
               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="order_track_page main-content">
   <section class="checkout-section ptb-70">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-md-12 col-12 mb-4">
               @include("themes.".get('theme').".user.order-sidebar")
            </div>
            <div class="col-lg-9 col-md-12 col-12">
               <div id="data-step1" class="account-content" data-temp="tabdata">
                  <div id="form-print" class="admission-form-wrapper">
                     <div class="row">
                        <div class="col-12">
                           <div class="heading-part heading-bg mb-30">
                              <h2 class="heading m-0">My Orders</h2>
                           </div>
                        </div>
                     </div>
                     <div class="dashboard-right">
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                               @if(isset($data['list']->items) && is_array($data['list']->items) && count($data['list']->items))
                        @foreach($data['list']->items as $itm)
                            @php
                            $allStatus = ['received' => 0, 'processed' => 1, 'shipped' => 2, 'delivered' => 3];
                            $orderPlaced = "";
                            $orderProcessed = "";
                            $orderShipped = "";
                            $orderDelivered = "";
                            $orderCancelled = "";
                            $orderReturned = "";
                            foreach($itm->status as $s){
                                if($s[0] == "received"){
                                    $orderPlaced = $s[1];
                                }elseif($s[0] == "processed"){
                                    $orderProcessed = $s[1];
                                }elseif($s[0] == "shipped"){
                                    $orderShipped = $s[1];
                                }elseif($s[0] == "delivered"){
                                    $orderDelivered = $s[1];
                                }elseif($s[0] == "cancelled"){
                                    $orderCancelled = $s[1];
                                }elseif($s[0] == "returned"){
                                    $orderReturned = $s[1];
                                }
                            }
                            @endphp
                              <div class="dash-bg-right dash-bg-right1">
                                 <div class="dash-bg-right-title">
                                    <h6>{{__('msg.ordered_id')}} : {{ $data['list']->id }}</h6>
                                    <h6>{{__('msg.order_date')}} :  {{ $data['list']->date_added ? date('d-m-Y', strtotime($data['list']->date_added)) : '' }}</h6>
                                 </div>
                                 <div class="order-dashboard">
                                    <ul class="order-dash-desc">
                                       <li>
                                          <div class="order-img">
                                             <img src="{{ $itm->image }}"
                                                alt="{{ $itm->name ?? 'Product Image'}}">
                                          </div>
                                       </li>
                                       <li>
                                          <div class="order-desc">
                                             <h4>{{ $itm->name }}</h4>
                                             <p>Qty : {{ $itm->quantity }}</p>
                                             <p>{{ get_price($itm->sub_total) }}</p>
                                             <p>{{__('msg.via')}} {{ strtoupper($data['list']->payment_method) }}</p>
                                             <p>{{ strtoupper($itm->active_status) }}</p>
                                          </div>
                                       </li>
                                    </ul>
                                    @if(count($itm->status))
                                    
                                    <div class="track-order">
                                       <h4>Track Order</h4>
                                       <div class="bs-wizard" style="border-bottom:0;">
                                          @if($orderPlaced != "")
                                          <div class="bs-wizard-step complete">
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_placed')}}
                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("d-m-Y", strtotime($orderPlaced)) }}</div>
                                             <div class="bs-wizard-info text-center text-muted">{{ date('h:i:s A', strtotime($orderPlaced)) }}</div>
                                          </div>
                                          @endif
                                          @if($orderProcessed != "")
                                          <div class="bs-wizard-step complete">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_processed')}}
                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("d-m-Y", strtotime($orderProcessed)) }}</div>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("h:i:s A", strtotime($orderProcessed)) }}</div>
                                          </div>
                                          @elseif($orderCancelled == "")
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_processed')}}
                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          @endif
                                          @if($orderShipped != "")
                                          <div class="bs-wizard-step complete">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_shipped')}}</div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("d-m-Y", strtotime($orderShipped)) }}</div>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("h:i:s A", strtotime($orderShipped)) }}</div>
                                          </div>
                                          @elseif($orderCancelled == "")
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_shipped')}}</div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          @endif
                                          @if($orderDelivered != "")
                                          <div class="bs-wizard-step complete">
                                             <!-- active -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_delivered')}}
                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("d-m-Y", strtotime($orderDelivered)) }}</div>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("h:i:s A", strtotime($orderDelivered)) }}</div>
                                          </div>
                                          @elseif($orderCancelled == "")
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_delivered')}}</div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          @endif
                                          @if($itm->applied_for_return == true)
                                          @if($orderReturned != "")
                                          <div class="bs-wizard-step disabled">
                                             <!-- active -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_returned')}}
                                             </div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="javascript:void(0)"
                                                class="bs-wizard-dot"></a>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("d-m-Y", strtotime($orderDelivered)) }}</div>
                                             <div class="bs-wizard-info text-center text-muted">{{ date("h:i:s A", strtotime($orderDelivered)) }}</div>
                                          </div>
                                          @elseif($orderCancelled == "")
                                          <div class="bs-wizard-step disabled">
                                             <!-- complete -->
                                             <div class="text-center bs-wizard-stepnum">{{__('msg.order_returned')}}</div>
                                             <div class="progress">
                                                <div class="progress-bar"></div>
                                             </div>
                                             <a href="#"  class="bs-wizard-dot"></a>
                                          </div>
                                          @endif
                                          @endif
                                       </div>
                                    </div>
                                    @endif
									
                                    <div class="call-bill">
                                       <div class="delivery-man">
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                             
                              @endforeach
                             @endif
                              
                           </div>
                        </div>
						 <div class="row">
            <div class="col-md-6">
                <div class="dash-bg-right dash-bg-right1">
                    <h3 class="m-2 font-weight-bold text-dark text-start">{{__('msg.price_detail')}}</h3>

                    <table class="table table-hover">
						<tr>
							<td>{{__('msg.items_amount')}} :</td>
							<td>{{ get_price($data['list']->total, false)}}</td>
						</tr>
						<tr>
							<td>{{__('msg.delivery_charge')}} :</td>
							<td>+ {{ get_price($data['list']->delivery_charge, false)}}</td>
						</tr>
						<tr>
							<td>{{__('msg.tax')}}({{ $data['list']->tax_percentage}}%) : </td>
							<td>+ {{ get_price($data['list']->tax_amount, false) }}</td>
						</tr>
						<tr>
							<td>{{__('msg.discount')}}(0%) :</td>
							<td>- {{ get_price($data['list']->discount, false)}}</td>
						</tr>
						<tr>
							<td>{{__('msg.total')}} : </td>
							<td><b>{{ get_price(floatval($data['list']->total) + floatval($data['list']->delivery_charge) + floatval($data['list']->tax_amount) - floatval($data['list']->discount), false)}}</b></td>
						</tr>
						<tr>
							<td>{{__('msg.promo_code_discount')}} :</td>
							<td>- {{ get_price($data['list']->promo_discount, false) }}</td>
						</tr>
						<tr>
							<td>{{__('msg.wallet_balance')}}  : </td>
							<td>-{{ get_price($data['list']->wallet_balance, false) }}</td>
						</tr>
						<tr>
							<td><b>{{__('msg.final_total')}} :</b> </td>
							<td><b>{{ get_price($data['list']->final_total, false) }}</b></td>
						</tr>
					</table>

                </div>
            </div>
     

            <div class="col-md-6">
                <div class="dash-bg-right dash-bg-right1 ">
                    <h3 class="m-2 font-weight-bold text-dark text-start">{{__('msg.other_details')}}</h3>

                    <table class="table table-hover">
						<tr>
							<td>{{__('msg.name')}} : {{ $data['list']->user_name }}</td>
							
						</tr>
						<tr>
							<td>{{__('msg.mobile_no')}}: {{ $data['list']->mobile }}</td>
							
						</tr>
						<tr>
							<td>{{__('msg.address')}} : {{ $data['list']->address ?? '' }}</td>
							
						</tr>
					</table>

                </div>
            </div>
        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>