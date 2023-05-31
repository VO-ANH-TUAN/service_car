
<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Giỏ hàng của tôi
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				@php $SumPriceCart = 0; @endphp

				<ul class="header-cart-wrapitem w-full">
{{--                    cái này bị lỗi nên đổi cái dưới--}}
{{--			     @if (count($products) > 0)--}}
                        @if (isset($products))


					@foreach($products as $key =>$product)

                            @php
                                $carts =Illuminate\Support\Facades\Session::get('carts');
                            @endphp

					@php
                          $Price =\App\Helpers\Helper::price( $product->price_sale != 0 ? $product->price_sale : $product->price );
                           if(isset($carts)){
                               $a=$carts[$product->id];
//                               $Price =\App\Helpers\Helper::price( $product->price_sale != 0 ? $product->price_sale : $product->price );
                               $SumPriceCart += $product->price_sale != 0 ? ($product->price_sale*$a) : ($product->price*$a) ;
                           }


					@endphp

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{$product->thumb}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							{{$product->name}}
							</a>

							<span class="header-cart-item-info">
						     {!!$Price!!}
							</span>
						</div>
					</li>
					@endforeach
                    @endif

				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total:  {{number_format($SumPriceCart, '0', '', '.')}}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="/carts" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Giỏ Hàng
						</a>

						<a href="/checkout" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Thanh toán
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
