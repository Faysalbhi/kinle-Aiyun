<x-frontend.layouts.master>
			<div class="headerd header-dark head-style-2">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<div class="nav-toggle"></div>
							<div class="nav-menus-wrapper">
								<ul class="nav-menu">
									<li><a href="{{ route('index') }}" class="pl-0">Home</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="{{ route('about') }}">About Us</a></li>
									<li><a href="{{ route('contact') }}">Contact</a></li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ======================= Category & Slider ======================== -->
			<section class="p-0">
				<div class="container">
					<div class="row">
					
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
							<div class="killore-new-block-link border mb-3 mt-3">
								<div class="px-3 py-3 ft-medium fs-md text-dark gray">Top Categories</div>
								
								<div class="killore--block-link-content">
									<ul>
										@foreach ($categories as $category )
										<li>
											
										<a href=""><img src="{{ asset('uploads/category')}}/{{ $category->img  }}"  style="width:30px;height:30px;border-radius:50%;pading:2px" alt="">{{ $category->name }}</a>
										</li>
											
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						
						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
							<div class="home-slider auto-slider mb-3 mt-3">

								<!-- Slide -->
								<div data-background-image="assets/img/light-banner-1.png" class="item">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="home-slider-container">

													<!-- Slide Title -->
													<div class="home-slider-desc">
														<div class="home-slider-title mb-4">
															<h5 class="fs-sm ft-ragular mb-2">New Collection</h5>
															<h1 class="mb-2 ft-bold">The Standard<br>With <span class="theme-cl">Smartness</span></h1>
															<span class="trending">Apple 10 comes with 6.5 inches full HD + High Valume</span>
														</div>

														<a href="#" class="btn btn-white stretched-link hover-black">Buy Now<i class="lni lni-arrow-right ml-2"></i></a>
													</div>
													<!-- Slide Title / End -->

												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Slide -->
								<div data-background-image="assets/img/light-banner-2.png" class="item">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="home-slider-container">

													<!-- Slide Title -->
													<div class="home-slider-desc">
														<div class="home-slider-title mb-4">
															<h5 class="fs-sm ft-ragular mb-2">Super Sale</h5>
															<h1 class="mb-2 ft-bold">The Standard<br>With <span class="text-success">Smartness</span></h1>
															<span class="trending">Xiomi Redmi 10 comes with 6.5 inches full HD + LCD Screen</span>
														</div>

														<a href="#" class="btn btn-white stretched-link hover-black">Shop Now<i class="lni lni-arrow-right ml-2"></i></a>
													</div>
													<!-- Slide Title / End -->

												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide -->
								<div data-background-image="assets/img/light-banner-3.png" class="item">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="home-slider-container">

													<!-- Slide Title -->
													<div class="home-slider-desc">
														<div class="home-slider-title mb-4">
															<h5 class="fs-sm ft-ragular mb-2">Super Sale</h5>
															<h1 class="mb-2 ft-bold">The Standard<br>With Smartness</h1>
															<span class="trending">Xiomi Redmi 10 comes with 6.5 inches full HD + LCD Screen</span>
														</div>

														<a href="#" class="btn theme-bg text-light">Shop Now<i class="lni lni-arrow-right ml-2"></i></a>
													</div>
													<!-- Slide Title / End -->

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
			<!-- ======================= Category & Slider ======================== -->
			
			<!-- ======================= Product List ======================== -->
			<section class="middle">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Trendy Products</h2>
								<h3 class="ft-bold pt-3">Our Trending Products</h3>
							</div>
						</div>
					</div>
					
					<div class="row align-items-center rows-products">			
						@foreach ($all_products as $product)
							<!-- Single -->
							<div class="col-xl-2 col-lg-2 col-md-6 col-6">
								<div class="product_grid card b-0">
									<div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Sale</div>
									<div class="badge bg-danger text-white position-absolute ft-regular ab-right text-upper">{{-$product->discount.'%'??''}}</div>
									<div class="card-body p-0">
										<div class="shop_thumb position-relative">
											<a class="card-img-top d-block overflow-hidden" href="{{ route('single_product',$product->id) }}"><img class="card-img-top" src="{{asset('uploads/product/preview')}}/{{ $product->preview}}" alt="..."></a>
										</div>
									</div>
									<div class="card-footer b-0 p-0 pt-2 bg-white d-flex align-items-start justify-content-between">
										<div class="text-left">
											<div class="text-left">
												<div class="elso_titl"><span class="small">{{ $product->category->name}}</span></div>
												<h5 class="fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">{{ $product->product_name }}</a></h5>
												<div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
												
												@php
													$total_review=App\Models\OrderProduct::where(['product_id'=>$product->id])->whereNotNull('review')->get()->count();
													$total_star=App\Models\OrderProduct::where(['product_id'=>$product->id])->whereNotNull('review')->sum('star');

													if($total_review!=0){
													$average_star=floor($total_star/$total_review);
													}

												@endphp

												{{-- only reviewd product  --}}
												@if($total_star>0)
													@for($i=1;$i<=$average_star;$i++)
														<i class="fas fa-star filled"></i>
													@endfor	

													@for($average_star;$average_star<5;$average_star++)
														<i class="fas fa-star"></i>
													@endfor
												@endif

												{{-- without review product  --}}
												@if($total_star==0)
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
												@endif


												</div>
												
												<div class="elis_rty">
												<span class="ft-medium text-muted line-through fs-md mr-2">&#2547; {{ $product->product_price }}</span>
												<span class="ft-bold text-dark fs-sm">&#2547; {{ $product->after_discount }}</span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						@endforeach
						
						<!-- Single -->
						<div class="col-xl-2 col-lg-2 col-md-6 col-6">
							<div class="product_grid card b-0">
								<div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
								<div class="card-body p-0">
									<div class="shop_thumb position-relative">
										<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="{{asset('frontend/assets')}}/img/shop/11.png" alt="..."></a>
									</div>
								</div>
								<div class="card-footer b-0 p-0 pt-2 bg-white d-flex align-items-start justify-content-between">
									<div class="text-left">
										<div class="text-left">
											<div class="elso_titl"><span class="small">Mobiles</span></div>
											<h5 class="fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Ziome iPhone 11</a></h5>
											<div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
											</div>
											<div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						
						
					</div>
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="position-relative text-center">
								<a href="shop-style-1.html" id="moreProducts" class="btn stretched-link borders">Explore More<i class="lni lni-arrow-right ml-2"></i></a>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= Product List ======================== -->
			
			<!-- ======================= Brand Start ============================ -->
			<section class="py-3 br-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="smart-brand">
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-1.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-2.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-3.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-4.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-5.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-6.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-1.png" class="img-fluid" alt="" />
								</div>
								
								<div class="single-brnads">
									<img src="{{asset('frontend/assets')}}/img/shop-logo-2.png" class="img-fluid" alt="" />
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Brand Start ============================ -->
			
			<!-- ======================= Tag Wrap Start ============================ -->
			<section class="bg-cover" style="background:url({{ asset('frontend') }}/assets/img/e-middle-banner.png) no-repeat;">
				<div class="ht-60"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10 col-sm-12">
							<div class="tags_explore text-center">
								<h2 class="mb-0 text-white ft-bold">Big Sale Up To 70% Off</h2>
								<p class="text-light fs-lg mb-4">Exclussive Offers For Limited Time</p><p>
								<a href="#" class="btn btn-lg bg-white px-5 text-dark ft-medium">Explore Your Order</a>
							</p></div>
						</div>
					</div>
				</div>
				<div class="ht-60"></div>
			</section>
			<!-- ======================= Tag Wrap Start ============================ -->
			
			<!-- ======================= All Category ======================== -->
			<section class="middle">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Popular Categories</h2>
								<h3 class="ft-bold pt-3">Trending Categories</h3>
							</div>
						</div>
					</div>
					
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/headphones.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Headphones</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/watch.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Watches</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/washing-machine.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Washing Machine</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/cell-phone.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">iPhones</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/safety-goggles.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Goggles</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/camera.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Video Camera</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/fashion.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Wear</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/tshirt.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Kid's Wear</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/accessories.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Accessories</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/sneakers.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Shoes</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/television.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Television</a></h6></div>
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
							<div class="cats_side_wrap text-center mx-auto mb-3">
								<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="{{asset('frontend/assets')}}/img/pant.png" class="img-fluid" width="40" alt=""></a></div></div>
								<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Pants</a></h6></div>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= All Category ======================== -->
			
			<!-- ======================= Customer Review ======================== -->
			<section class="gray">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Testimonials</h2>
								<h3 class="ft-bold pt-3">Client Reviews</h3>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
							<div class="reviews-slide px-3">
								
								<!-- single review -->
								<div class="single_review">
									<div class="sng_rev_thumb"><figure><img src="{{asset('frontend/assets')}}/img/team-1.jpg" class="img-fluid circle" alt="" /></figure></div>
									<div class="sng_rev_caption text-center">
										<div class="rev_desc mb-4">
											<p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
										</div>
										<div class="rev_author">
											<h4 class="mb-0">Mark Jevenue</h4>
											<span class="fs-sm">CEO of Addle</span>
										</div>
									</div>
								</div>
								
								<!-- single review -->
								<div class="single_review">
									<div class="sng_rev_thumb"><figure><img src="{{asset('frontend/assets')}}/img/team-2.jpg" class="img-fluid circle" alt="" /></figure></div>
									<div class="sng_rev_caption text-center">
										<div class="rev_desc mb-4">
											<p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
										</div>
										<div class="rev_author">
											<h4 class="mb-0">Henna Bajaj</h4>
											<span class="fs-sm">Aqua Founder</span>
										</div>
									</div>
								</div>
								
								<!-- single review -->
								<div class="single_review">
									<div class="sng_rev_thumb"><figure><img src="{{asset('frontend/assets')}}/img/team-3.jpg" class="img-fluid circle" alt="" /></figure></div>
									<div class="sng_rev_caption text-center">
										<div class="rev_desc mb-4">
											<p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
										</div>
										<div class="rev_author">
											<h4 class="mb-0">John Cenna</h4>
											<span class="fs-sm">CEO of Plike</span>
										</div>
									</div>
								</div>
								
								<!-- single review -->
								<div class="single_review">
									<div class="sng_rev_thumb"><figure><img src="{{asset('frontend/assets')}}/img/team-4.jpg" class="img-fluid circle" alt="" /></figure></div>
									<div class="sng_rev_caption text-center">
										<div class="rev_desc mb-4">
											<p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
										</div>
										<div class="rev_author">
											<h4 class="mb-0">Madhu Sharma</h4>
											<span class="fs-sm">Team Manager</span>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Customer Review ======================== -->
			
			<!-- ======================= Top Seller Start ============================ -->
			<section class="space min">
				<div class="container">
					
					<div class="row">
						
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
							<div class="top-seller-title"><h4 class="ft-medium">Top Seller</h4></div>
							<div class="ftr-content">
							
								<!-- Single Item -->
								@foreach ($topselling_product as $topselling)
									
								

								<div class="product_grid row">
									<div class="col-xl-4 col-lg-5 col-md-5 col-4">
										<div class="shop_thumb position-relative">
											<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="{{ asset('uploads/product/preview') }}/{{ $topselling->product->preview }}" alt="..."></a>
										</div>
									</div>
									<div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
										<div class="text-left mfliud">
											<div class="elso_titl"><span class="small">Mobiles</span></div>
											<h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">{{ $topselling->product->product_name }}</a></h5>
											<div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="elis_rty"><span class="ft-bold text-dark fs-sm">&#2547; {{ $topselling->product->product_price }} -&#2547; {{ $topselling->product->after_discount }}</span></div>
										</div>
									</div>
								</div>

								@endforeach
								
								
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
							<div class="ftr-title"><h4 class="ft-medium">Featured Products</h4></div>
							<div class="ftr-content">
								<!-- Single Item -->
								@foreach ($best_review_products as $best_review_product)
									
							
								<div class="product_grid row">
									<div class="col-xl-4 col-lg-5 col-md-5 col-4">
										<div class="shop_thumb position-relative">
											<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="{{ asset('uploads/product/preview') }}/{{ $best_review_product->product->preview }}" alt="..."></a>
										</div>
									</div>
									<div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
										<div class="text-left mfliud">
											<div class="elso_titl"><span class="small">{{ $best_review_product->product->category->name}}</span></div>
											<h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">{{ $best_review_product->product->product_name }}</a></h5>
											<div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="elis_rty"><span class="ft-bold text-dark fs-sm">&#2547; {{ $best_review_product->product->product_price }} - &#2547; {{ $best_review_product->product->after_discount }}</span></div>
										</div>
									</div>
								</div>
								
							@endforeach
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
							<div class="ftr-title"><h4 class="ft-medium">Recent Products</h4></div>
							<div class="ftr-content">
								<!-- Single Item -->
								@foreach ($recent_products as $recent_product)
									
						
									<div class="product_grid row">
										<div class="col-xl-4 col-lg-5 col-md-5 col-4">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="{{ asset('uploads/product/preview') }}/{{ $recent_product->preview }}" alt="..."></a>
											</div>
										</div>
										<div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
											<div class="text-left mfliud">
												<div class="elso_titl"><span class="small">{{ $recent_product->category->name }}</span></div>
												<h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">{{ $recent_product->product_name }}</a></h5>
												<div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
												</div>
												<div class="elis_rty"><span class="ft-bold text-dark fs-sm">&#2547; {{ $recent_product->product_price }} - &#2547; {{ $recent_product->after_discount }}</span></div>
											</div>
										</div>
									</div>
								@endforeach
								
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<!-- ======================= Top Seller Start ============================ -->
			
			<!-- ======================= Customer Features ======================== -->
			<section class="px-0 py-3 br-top">
				<div class="container">
					<div class="row">
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="d-flex align-items-center justify-content-start py-2">
								<div class="d_ico">
									<i class="fas fa-shopping-basket"></i>
								</div>
								<div class="d_capt">
									<h5 class="mb-0">Free Shipping</h5>
									<span class="text-muted">Capped at $10 per order</span>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="d-flex align-items-center justify-content-start py-2">
								<div class="d_ico">
									<i class="far fa-credit-card"></i>
								</div>
								<div class="d_capt">
									<h5 class="mb-0">Secure Payments</h5>
									<span class="text-muted">Up to 6 months installments</span>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="d-flex align-items-center justify-content-start py-2">
								<div class="d_ico">
									<i class="fas fa-shield-alt"></i>
								</div>
								<div class="d_capt">
									<h5 class="mb-0">15-Days Returns</h5>
									<span class="text-muted">Shop with fully confidence</span>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="d-flex align-items-center justify-content-start py-2">
								<div class="d_ico">
									<i class="fas fa-headphones-alt"></i>
								</div>
								<div class="d_capt">
									<h5 class="mb-0">24x7 Fully Support</h5>
									<span class="text-muted">Get friendly support</span>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Customer Features ======================== -->
</x-frontend.layouts.master>      