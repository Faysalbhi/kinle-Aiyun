<x-frontend.layouts.master>


		<!-- ======================= Product Detail ======================== -->
			<section class="middle">
				<div class="container">
				
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="text-center d-block mb-5">
								<h2>Shopping Cart</h2>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-between">
						<div class="col-12 col-lg-7 col-md-12">
							<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
									@php
										$subtotal=0;
									@endphp
									@foreach ($carts as $cart)
										<li class="list-group-item">
											<div class="row align-items-center">
												<div class="col-3">
													<!-- Image -->
													<a href="product.html"><img src="{{asset('uploads/product/preview/')}}/{{ $cart->product->preview }}" alt="..." class="img-fluid"></a>
												</div>
												<div class="col d-flex align-items-center justify-content-between">
													<div class="cart_single_caption pl-2">
														<h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $cart->product->product_name }}</h4>
														<p class="mb-1 lh-1"><span class="text-dark">Size: {{ $cart->size->size_name}}</span></p>
														<p class="mb-3 lh-1"><span class="text-dark">Color: {{ $cart->color->color_name }}</span></p>
														<h4 class="fs-md ft-medium mb-3 lh-1">&#2547; {{ $cart->product->after_discount }}</h4>
														<select class="mb-2 custom-select w-auto">

															@for($i=1;$i<=10;$i++)

															<option  {{ $cart->quantity==$i?'selected':'' }} value="{{ $i }}">{{ $i }}</option>
															@endfor
														</select>
													</div>
													<div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i></button></div>
												</div>
											</div>
										</li>
										@php
											$subtotal+=$cart->quantity*$cart->product->after_discount;
										@endphp
									@endforeach
								
								
								
							</ul>
							
							<div class="row align-items-end justify-content-between mb-10 mb-md-0">
							
								<div class="col-12 col-md-auto mfliud">
									<button class="btn stretched-link borders">Update Cart</button>
								</div>
							</div>
						</div>
						
						<div class="col-12 col-md-12 col-lg-4">
								<form action="" class="mb-7 mb-md-2">
									<label class="fs-sm ft-medium text-dark">Coupon code:</label>
									<div class="row form-row">
										<div class="col">
											<input class="form-control" name="coupon" type="text" placeholder="Enter coupon code*" value="{{ @$_GET['coupon'] }}">
										</div>
										<div class="col-auto">
											<button class="btn btn-dark" type="submit">Apply</button>
										</div>
									</div>
								</form>
							<div class="card mb-4 gray mfliud">
							  <div class="card-body">
								<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
								  <li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Subtotal</span> <span class="ml-auto text-dark ft-medium">&#2547; {{ $subtotal }}</span>
								  </li>
								  <li class="list-group-item d-flex text-dark fs-sm ft-regular">
										@php 
										if($type==1){
											$discount=floor(($subtotal*$discount)/100);
										}
											
										@endphp
									<span>Discount</span> <span class="ml-auto text-dark ft-medium">&#2547; {{ $discount}}</span>
								  </li>
								  <li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Total</span> <span class="ml-auto text-dark ft-medium">&#2547; {{ $total=$subtotal-$discount }}</span>
								  </li>
								  <li class="list-group-item fs-sm text-center">
									Shipping cost calculated at Checkout *
								  </li>
								</ul>
							  </div>
							</div>
								@php
									session(['discount'=>$discount]);
								@endphp
							<a class="btn btn-block btn-dark mb-3" href="{{ route('checkout'),$total }}">Proceed to Checkout</a>
							
							<a class="btn-link text-dark ft-medium" href="shop.html">
							  <i class="ti-back-left mr-2"></i> Continue Shopping
							</a>
						</div>
						
					</div>
					
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->

</x-frontend.layouts.master>