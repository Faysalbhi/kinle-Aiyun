<x-frontend.layouts.master>


				<!-- ======================= Product Detail ======================== -->
			<section class="middle">
				<div class="container">
				
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="text-center d-block mb-5">
								<h2>Checkout</h2>
										@if(session('ordersuccess'))
											<div class="alert alert-success">
												<h3>{{ session('ordersuccess') }}</h3>
											</div>

										@endif
							</div>
						</div>
					</div>
					
					<div class="row justify-content-between">
						<div class="col-12 col-lg-7 col-md-12">
							<form action="{{ route('order.store') }}" method="post">
							 @csrf
								<h5 class="mb-4 ft-medium">Billing Details</h5>
								<div class="row mb-2">
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group">
											<label class="text-dark">Full Name *</label>
											<input type="text" name="billing_name" class="form-control" placeholder="First Name" value="{{ App\Models\Customer::find(Auth::guard('customer')->id())->name }}" readonly/>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">Email *</label>
											<input type="email" name="billing_email" class="form-control" placeholder="Email" value="{{ App\Models\Customer::find(Auth::guard('customer')->id())->email }}" readonly/>
										</div>
									</div>
									
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">Mobile Number *</label>
											<input type="text" name="billing_phone" class="form-control" placeholder="Mobile Number" />
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">Company</label>
											<input type="text" class="form-control" name="billing_company" placeholder="Company Name (optional)" />
										</div>
									</div>
									
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<label class="text-dark">Address *</label>
											<input type="text" name="billing_address" class="form-control" placeholder="Address" />
										</div>
									</div>
									
									
									
									
									
									
									
								</div>
								
						
								<h5 class="mb-4 ft-medium">Shipping Details</h5>
								<div class="row mb-2">
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group">
											<label class="text-dark">Full Name *</label>
											<input type="text" class="form-control" name="shipping_name" placeholder="First Name" />
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">Email *</label>
											<input type="email" name="shipping_email" class="form-control" placeholder="Email" />
										</div>
									</div>
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">Company</label>
											<input type="text" name="shipping_company" class="form-control" placeholder="Company Name (optional)" />
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">Mobile Number *</label>
											<input type="text" name="shipping_phone" class="form-control" placeholder="Mobile Number" />
										</div>
									</div>
									
									
									<div class="col-xl-6 col-lg-16 col-md-6 col-sm-12 col-12">
										<div class="form-group">
											<label class="text-dark">Country *</label>
											<select class="custom-select country_id" name="country_id">
											  <option value="">Select Country</option>
													@foreach ($countries as $country )
														
											  <option value="{{ $country->id }}">{{ $country->name }}</option>
													@endforeach

											</select>
										</div>
									</div>
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group" id="city">
											<label class="text-dark">City / Town *</label>
											<select class="custom-select city_id" name="city_id">
											  <option value="">Select City</option>

											  <option value="1" selected="">Dhaka</option>

											</select>
										</div>
									</div>
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label class="text-dark">ZIP / Postcode *</label>
											<input type="text" class="form-control" name="zipcode" placeholder="Zip / Postcode" />
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group">
											<label class="text-dark">Address *</label>
											<input type="text" name="shipping_address" class="form-control" placeholder="Address" />
										</div>
									</div>
									
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<label class="text-dark">Order Notes</label>
											<textarea class="form-control ht-50" name="notes" ></textarea>
										</div>
									</div>
									
								</div>
								
							
						</div>
						
						<!-- Sidebar -->
						<div class="col-12 col-lg-4 col-md-12">
							<div class="d-block mb-3">
								<h5 class="mb-4">Order Items (3)</h5>
								<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
										@php
											$subtotal=0;
										@endphp
									@foreach ($carts as $cart )
											<li class="list-group-item">
												<div class="row align-items-center">
													<div class="col-3">
														<!-- Image -->
														<a href="product.html"><img src="{{'frontend/assets'}}/img/product/7-a.jpg" alt="..." class="img-fluid"></a>
													</div>
													<div class="col d-flex align-items-center">
														<div class="cart_single_caption pl-2">
															<h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $cart->product->product_name }}</h4>
															<p class="mb-1 lh-1"><span class="text-dark">Size: {{ $cart->size->size_name }}</span></p>
															<p class="mb-3 lh-1"><span class="text-dark">Color: {{ $cart->color->color_name }}</span></p>
															<h4 class="fs-md ft-medium mb-3 lh-1 text-muted"><span class="pr-5">{{ $cart->quantity }} X </span>&#2547; {{ $cart->product->after_discount}}</h4>
														</div>
													</div>
												</div>
											</li>
												@php
													$subtotal+=$cart->quantity*$cart->product->after_discount;
												@endphp
										@endforeach
									
									
								</ul>
							</div>
							
							<div class="mb-4">
								<div class="form-group">
									<h6>Delivery Location</h6>
									<ul class="no-ul-list">
										<li>
											<input id="c1" class="radio-custom delivery_btn" name="charge" value="60" type="radio">
											<label for="c1" class="radio-custom-label">Inside City</label>
										</li>
										<li>
											<input id="c2" class="radio-custom delivery_btn" name="charge" value="120" type="radio">
											<label for="c2" class="radio-custom-label">Outside City</label>
										</li>
									</ul>
								</div>
							</div>
							<div class="mb-4">
								<div class="form-group">
									<h6>Select Payment Method</h6>
									<ul class="no-ul-list">
										<li>
											<input id="c3" class="radio-custom" name="payment_method" value="1" type="radio">
											<label for="c3" class="radio-custom-label">Cash on Delivery</label>
										</li>
										<li>
											<input id="c4" class="radio-custom" name="payment_method" value="2" type="radio">
											<label for="c4" class="radio-custom-label">Pay With SSLCommerz</label>
										</li>
										<li>
											<input id="c5" class="radio-custom" name="payment_method" value="3" type="radio">
											<label for="c5" class="radio-custom-label">Pay With Stripe</label>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="card mb-4 gray">
							  <div class="card-body">
								<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
								  <li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Subtotal</span> <span class="ml-auto text-dark ft-medium">{{ $subtotal }}</span>
								  </li>
								  <li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Charge</span> <span class="ml-auto text-dark ft-medium">&#2547; <span id="charge"> 0.0</span></span>
								  </li>
									@if (session('discount')>0)
										<li class="list-group-item d-flex text-dark fs-sm ft-regular">
										<span>Discount</span> <span class="ml-auto text-dark ft-medium">&#2547; <span id="charge">{{ session('discount') }}</span></span>
										</li>
									@endif
									
								  <li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<input type="hidden" name="discount" value="{{ session('discount') }}">
									<input type="hidden"  name="sub_total" value="{{ $subtotal }}">
									<input type="hidden" class="total" name="total" value="{{ $subtotal-session('discount') }}">
									<span>Total</span> <span class="ml-auto text-dark ft-medium grandTotal">{{ $subtotal-session('discount') }}</span>
								  </li>
								</ul>
							  </div>
							</div>

							
							<button type="submit" class="btn btn-block btn-dark mb-3" href="checkout.html">Place Your Order</button>
						</div>
						
					</div>
					</form>
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->
			@push('script')
			<script>
					$('.delivery_btn').click(function (){
							var charge =parseInt($(this).val());
							var total=parseInt($('.total').val());
							var grandTotal=charge+total;
							$('.grandTotal').html(grandTotal);
							$('#charge').html(charge);
							// alert(charge);
					})
			</script>

			<script>
					$('.country_id').change(function(){
								var country_id = $(this).val();

								$.ajaxSetup({
										headers: {
												'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										}
								});

								$.ajax({
										type:'POST',
										url:'/getCity',
										data:{'country_id': country_id},
										success:function(data){
											$('.city_id').html(data);
											$('.city_id').select2();
										}
								});
					})
				</script>
				<script>
					$(document).ready(function() {
							$('.country_id').select2();
					});
				</script>
				
			@endpush

</x-frontend.layouts.master>