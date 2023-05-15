<x-frontend.layouts.master>


				<!-- ======================= Dashboard Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-start justify-content-between">
					
						<div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
							<div class="d-block border rounded">
								<div class="dashboard_author px-2 py-5">
									<div class="dash_auth_thumb circle p-1 border d-inline-flex mx-auto mb-2">
										<img src="assets/img/team-1.jpg" class="img-fluid circle" width="100" alt="" />
									</div>
									<div class="dash_caption">
										<h4 class="fs-md ft-medium mb-0 lh-1">Adam Wishnoi</h4>
										<span class="text-muted smalls">Australia</span>
									</div>
								</div>
								
								<div class="dashboard_author">
									<h4 class="px-3 py-2 mb-0 lh-2 gray fs-sm ft-medium text-muted text-uppercase text-left">Dashboard Navigation</h4>
									<ul class="dahs_navbar">
										<li><a href="my-orders.html" class="active"><i class="lni lni-shopping-basket mr-2"></i>My Order</a></li>
										<li><a href="wishlist.html"><i class="lni lni-heart mr-2"></i>Wishlist</a></li>
										<li><a href="profile-info.html"><i class="lni lni-user mr-2"></i>Profile Info</a></li>
										<li><a href="login.html"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
									</ul>
								</div>
								
							</div>
						</div>
						
						<div class="col-12 col-md-12 col-lg-8 col-xl-8 text-center">
							<!-- Single Order List -->
							@foreach (App\Models\Order::where('customer_id',Auth::guard('customer')->id())->get(); as $order)
								
							
							<div class="ord_list_wrap border mb-4">
								<div class="ord_list_head gray d-flex align-items-center justify-content-between px-3 py-3">
									<div class="olh_flex">
										<p class="m-0 p-0"><span class="text-muted">Order ID</span></p>
										<h6 class="mb-0 ft-medium">{{ $order->order_id }}</h6>
									</div>	
									<div class="col-xl-2 col-lg-2 col-md-2 col-12 ml-auto">
									@php
										$order_id=substr($order->order_id,1);
									@endphp
											<a href="{{ route('customer.invoice',$order_id) }}" class="btn btn-info btn-sm ">Download I</a>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-2 col-12 ml-auto">
											<p class="mb-1 p-0"><span class="text-muted">Status</span></p>
											<div class="delv_status"><span class="ft-medium small text-warning bg-light-warning rounded px-3 py-1">Completed</span></div>
									</div>	
								</div>
								<div class="ord_list_body text-left">
									<!-- First Product -->
									@foreach (App\Models\OrderProduct::where('order_id',$order->order_id)->get(); as $product)
									<div class="row align-items-center justify-content-center m-0 py-4 br-bottom">
										<div class="col-xl-12 col-lg-12 col-md-5 col-12">
											<div class="cart_single d-flex align-items-start mfliud-bot">
												<div class="cart_selected_single_thumb">
													<a href="#"><img src="assets/img/product/2.jpg" width="75" class="img-fluid rounded" alt=""></a>
												</div>
												<div class="cart_single_caption pl-3">
													<p class="mb-0"><span class="text-muted small">{{ $product->product->category->category_name}}</span></p>
													<h4 class="product_title fs-sm ft-medium mb-1 lh-1">{{ $product->product->product_name }}</h4>
													<p class="mb-2"><span class="text-dark medium">Size: {{ $product->size->size_name}}</span>, <span class="text-dark medium">Color: {{ $product->color->color_name}}</span></p>
													<h4 class="fs-sm ft-bold mb-0 lh-1">&#2547; {{ $product->price}}</h4>
												</div>
											</div>
										</div>
										
										
									</div>
									@endforeach
									
									
									
								</div>
								<div class="ord_list_footer d-flex align-items-center justify-content-between br-top px-3">
									<div class="col-xl-12 col-lg-12 col-md-12 pl-0 py-2 olf_flex d-flex align-items-center justify-content-between">
										<div class="olf_flex_inner"><p class="m-0 p-0"><span class="text-muted medium text-left">Order Date: {{ $order->created_at->format('d-M-Y') }}</span></p></div>
										<div class="olf_inner_right"><h5 class="mb-0 fs-sm ft-bold">Total:&#2547; {{ $order->grand_total }}</h5></div>
									</div>
								</div>
							</div>
							<!-- End Order List -->
							@endforeach
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Dashboard Detail End ======================== -->

</x-frontend.layouts.master>