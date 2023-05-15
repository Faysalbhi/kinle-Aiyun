
		<x-frontend.layouts.master>
    	<!-- ======================= Login Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-start justify-content-between">
					
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="mb-3">
								<h3>Login</h3>
							</div>
							<form action="{{ route('customer.login') }}" method="post" class="border p-3 rounded">				
								@csrf
								<div class="form-group">
									<label>Email *</label>
									<input type="text" class="form-control" name="email" placeholder="Email*">
								</div>
								
								<div class="form-group">
									<label>Password *</label>
									<input type="password" class="form-control" name="password" placeholder="Password*">
								</div>
								
								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="eltio_k2">
											<a href="#">Lost Your Password?</a>
										</div>	
									</div>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Login</button>
								</div>
							</form>
						</div>
						{{-- ---------------------- --}}
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
							<div class="mb-3">
								<h3>Register</h3>
							</div>
							<form action="{{ route('customer.store') }}" method="post" class="border p-3 rounded">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Full Name *</label>
										<input type="text" class="form-control" name="name" placeholder="Full Name">
									</div>
								</div>
								
								<div class="form-group">
									<label>Email *</label>
									<input type="text" class="form-control" name="email" placeholder="Email*">
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label>Password *</label>
										<input type="password" class="form-control" name="password" placeholder="Password*">
									</div>
									
									<div class="form-group col-md-6">
										<label>Confirm Password *</label>
										<input type="password" class="form-control" name="password_confairmation" placeholder="Confirm Password*">
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Create An Account</button>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Login End ======================== -->
			
			<!-- ============================= Customer Features =============================== -->
			<section class="px-0 py-3 br-top">
				<div class="container">
					<div class="row">
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="d-flex align-items-center justify-content-start py-2">
								<div class="d_ico">
									<i class="fas fa-shopping-basket theme-cl"></i>
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
									<i class="far fa-credit-card theme-cl"></i>
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
									<i class="fas fa-shield-alt theme-cl"></i>
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
									<i class="fas fa-headphones-alt theme-cl"></i>
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