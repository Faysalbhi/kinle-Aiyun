<x-frontend.layouts.master>


			<!-- ======================= Product Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row justify-content-between">
					
						<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
							<div class="quick_view_slide">
							@foreach ($thumbnails as $thumbnail )

								<div class="single_view_slide">
								
											
											<a href="{{ asset('uploads/product/thumbnail') }}/{{ $thumbnail->thumbnail }}" data-lightbox="roadtrip" class="d-block mb-4">
											<img src="{{ asset('uploads/product/thumbnail') }}/{{ $thumbnail->thumbnail }}" class="img-fluid rounded" alt="" />
											</a>

							
								</div>
							@endforeach
							</div>
						</div>
						
						<div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
							<div class="prd_details pl-3">
								
								<div class="prt_01 mb-1"><span class="text-light bg-info rounded px-2 py-1">{{ $product_info->subcategory->subcategory_name}}</span></div>
								<div class="prt_02 mb-3">
									<h2 class="ft-bold mb-1">{{ $product_info->product_name}}</h2>
									<div class="text-left">
										@php
													$total_review=App\Models\OrderProduct::where(['product_id'=>$product_info->id])->whereNotNull('review')->get()->count();
													$total_star=App\Models\OrderProduct::where(['product_id'=>$product_info->id])->whereNotNull('review')->sum('star');

													if($total_review!=0){
													$average_star=floor($total_star/$total_review);
													}
													
												@endphp
										<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">

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
											<span class="small">({{ $total_review }})</span>
										</div>
										<div class="elis_rty"><span class="ft-medium text-muted line-through fs-md mr-2">&#2547; {{ $product_info->product_price}}</span><span class="ft-bold theme-cl fs-lg mr-2">&#2547; {{ $product_info->after_discount}}</span></div>
									</div>
								</div>
								
								<div class="prt_03 mb-4">
									<p>{{ $product_info->short_desc }}</p>
								</div>
								
								<form action="{{ route('/addTocart') }}" method="post">
								
								@csrf
										<div class="prt_04 mb-2">
											<p class="d-flex align-items-center mb-0 text-dark ft-medium">Color:</p>
											<div class="text-left">
											@foreach ($available_colors as $color )
												
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input color_id" data-product={{ $product_info->id }} type="radio" name="color_id" value="{{ $color->color_id }}" id="{{ $color->color_id }}">
													<label class="form-option-label rounded-circle" for="{{ $color->color_id }}"><span class="form-option-color rounded-circle" style="background: {{ $color->color->color_code }}"></span></label>
												</div>
											@endforeach
												
											</div>
										</div>
										
										<div class="prt_04 mb-4">
											<p class="d-flex align-items-center mb-0 text-dark ft-medium">Size:</p>
											<div class="text-left pb-0 pt-2 colorSection">
												@foreach ($available_sizes as $size)
													@if ($size->size->size_name != "NA")
														<div class="form-check size-option form-option form-check-inline mb-2">
														<input selected class="form-check-input" type="radio" name="size_id" id="{{ $size->size->id }}" checked="">
														<label class="form-option-label" for="{{ $size->size->id }}">{{ $size->size->size_name }}</label>
														</div>
														@else
															<div class="form-check size-option form-option form-check-inline mb-2">
															<input class="form-check-input" type="radio" name="size_id" id="{{ $size->size->id }}" checked="">
															<label class="form-option-label" for="{{ $size->size->id }}">{{ $size->size->size_name }}</label>
															</div>
													@endif
													
											@endforeach
												
												
											</div>
										</div>
										
										<div class="prt_05 mb-4">
											<div class="form-row mb-7">
												<div class="col-12 col-lg-auto">
													<!-- Quantity -->
													<p class="d-flex align-items-center mb-0 text-dark ft-medium">Quentity:</p>
													<select class="mb-2 custom-select" id="quantity" name="quantity">
													@for ($i=1;$i<=10;$i++)
														
														<option value="{{ $i }}">{{ $i }}</option>
													@endfor
													</select>
												</div>
												<input type="hidden" value="{{ $product_info->id }}" name="product_id">
												<div class="col-12 col-lg mt-4">
													<!-- Submit -->
													<button type="submit" class="btn btn-block custom-height bg-dark mb-2">
														<iclass="lni lni-shopping-basket mr-2"></i>Add to Cart 
													</button>
												</div>
									</form>
												
										<div class="col-12 col-lg-auto mt-4">
											<!-- Wishlist -->
											<button class="btn custom-height btn-default btn-block mb-2 text-dark" data-toggle="button">
												<i class="lni lni-heart mr-2"></i>Wishlist
											</button>
										</div>
								  </div>
								</div>
								
								<div class="prt_06">
									<p class="mb-0 d-flex align-items-center">
									  <span class="mr-4">Share:</span>
									  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
										<i class="fab fa-twitter position-absolute"></i>
									  </a>
									  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
										<i class="fab fa-facebook-f position-absolute"></i>
									  </a>
									  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted" href="#!">
										<i class="fab fa-pinterest-p position-absolute"></i>
									  </a>
									</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->
			
			<!-- ======================= Product Description ======================= -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="description-tab" href="#description" data-toggle="tab" role="tab" aria-controls="description" aria-selected="true">Description</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" href="#information" id="information-tab" data-toggle="tab" role="tab" aria-controls="information" aria-selected="false">Additional information</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" href="#reviews" id="reviews-tab" data-toggle="tab" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
								</li>
							</ul>
							
							<div class="tab-content" id="myTabContent">
								
								<!-- Description Content -->
								<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
									<div class="description_info">
										<p class="p-0 mb-2">{{ $product_info->long_desc }}</p>
										<p class="p-0">At vero eo</p>
									</div>
								</div>
								
								<!-- Additional Content -->
								<div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
									<div class="additionals">
										{{ $product_info->additional_info }}
									</div>
								</div>
								
								<!-- Reviews Content -->
								<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
									<div class="reviews_info">
											@forelse (App\Models\OrderProduct::where(['product_id'=>$product_info->id])->whereNotNull('review')->get() as $review )
												
											
										<div class="single_rev d-flex align-items-start br-bottom py-3">
											<div class="single_rev_thumb"><img src="assets/img/team-1.jpg" class="img-fluid circle" width="90" alt="" /></div>
											<div class="single_rev_caption d-flex align-items-start pl-3">
												<div class="single_capt_left">
													<h5 class="mb-0 fs-md ft-medium lh-1">{{ $review->customer->name }}</h5>
													<span class="small">{{ $review->updated_at->format('d-M-Y') }}</span>
													<p>{{ $review->review }}</p>
												</div>
												<div class="single_capt_right">
													<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
													@for($i=1;$i<=$review->star;$i++)
														<i class="fas fa-star filled"></i>
													@endfor
													@for($review->star;$review->star<5;$review->star++)
														<i class="fas fa-star"></i>
													
														@endfor
													</div>
												</div>
											</div>
										</div>
										@empty
										<div class="alert alert-warning"> No review To show</div>
										@endforelse
										
										
									</div>
									
									<div class="reviews_rate">
									@if (Auth::guard('customer')->id())

										@if(App\Models\OrderProduct::where(['customer_id'=>Auth::guard('customer')->id(),'product_id'=>$product_info->id,'star'=>null])->exists())

											<form  action="{{ route('review.store') }}" method="POST" class="row">
												@csrf
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<h4>Submit Rating</h4>
												</div>
												
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<div class="revie_stars d-flex align-items-center justify-content-between px-2 py-2 gray rounded mb-2 mt-1">
														<div class="srt_013">
															<div class="submit-rating">

																<input id="star-5" class="star" type="radio" name="star" value="5" />
																<label for="star-5" title="5 stars">
																<i class="active fa fa-star" aria-hidden="true"></i>
																</label>

																<input id="star-4" class="star" type="radio" name="star" value="4" />
																<label for="star-4" title="4 stars">
																<i class="active fa fa-star" aria-hidden="true"></i>
																</label>

																<input id="star-3" class="star" type="radio" name="star" value="3" />
																<label for="star-3" title="3 stars">
																<i class="active fa fa-star" aria-hidden="true"></i>
																</label>

																<input id="star-2" class="star" type="radio" name="star" value="2" />
																<label for="star-2" title="2 stars">
																<i class="active fa fa-star" aria-hidden="true"></i>
																</label>

																<input id="star-1" class="star" type="radio" name="star" value="1" />
																<label for="star-1" title="1 star">
																<i class="active fa fa-star" aria-hidden="true"></i>
																</label>

															</div>
														</div>
														
														<div class="srt_014">
															<h6 class="mb-0"><span id="review_star"> 0</span> Star</h6>
														</div>
													</div>
												</div>
												
														<input type="hidden" name="product_id" value="{{$product_info->id }}"/>
												
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label for="review">Review:</label>
														<textarea name="review" class="form-control" placeholder="Enter Your Feedback"> </textarea>
													</div>
												</div>
												
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<div class="form-group m-0">
														<button type="submit" class="btn btn-white stretched-link hover-black">Submit Review <i class="lni lni-arrow-right"></i></button>
													</div>
												</div>
											
											</form>
										@endif
										
									@endif
										
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Product Description End ==================== -->


      			
			<!-- ======================= Similar Products Start ============================ -->
			<section class="middle pt-0">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Similar Products</h2>
								<h3 class="ft-bold pt-3">Matching Producta</h3>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="slide_items">
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/16.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Half Running Set</a></h5>
													<div class="elis_rty"><span class="ft-bold fs-md text-dark">$119.00</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div>
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/17.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Formal Men Lowers</a></h5>
													<div class="elis_rty"><span class="text-muted ft-medium line-through mr-2">$129.00</span><span class="ft-bold theme-cl fs-md">$79.00</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/18.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Half Running Suit</a></h5>
													<div class="elis_rty"><span class="ft-bold fs-md text-dark">$80.00</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="badge bg-warning text-white position-absolute ft-regular ab-left text-upper">Hot</div>
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/19.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Half Fancy Lady Dress</a></h5>
													<div class="elis_rty"><span class="text-muted ft-medium line-through mr-2">$149.00</span><span class="ft-bold theme-cl fs-md">$110.00</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/20.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Flix Flox Jeans</a></h5>
													<div class="elis_rty"><span class="text-muted ft-medium line-through mr-2">$90.00</span><span class="ft-bold theme-cl fs-md">$49.00</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="badge bg-danger text-white position-absolute ft-regular ab-left text-upper">Hot</div>
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/21.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Fancy Salwar Suits</a></h5>
													<div class="elis_rty"><span class="ft-bold fs-md text-dark">$114.00</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- single Item -->
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/22.png" alt="..."></a>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Collot Full Dress</a></h5>
													<div class="elis_rty"><span class="ft-bold theme-cl fs-md text-dark">$120.00</span></div>
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
			<!-- ======================= Similar Products Start ============================ -->
			@push('script')
			    <script>
        $('.color_id').click(function(){
            var color_id = $(this).val();
            var product_id = $(this).attr('data-product');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getSize',
                data:{'color_id':color_id, 'product_id':product_id},
                success:function(data){
                    $('.colorSection').html(data);
										// alert(data);
                }
            });

        });

				
    </script>
				
			@endpush
			@if(session('success'))
				@push('script')
					<script>
						toastr.success('{{ session('success') }}');
					</script>
				@endpush
				
			@endif
				
				@push('script')
					<script>
						$('.star').click(function(){
						var review_star=$(this).val();
							$('#review_star').html(review_star);

						});
					</script>
				@endpush
				

</x-frontend.layouts.master>