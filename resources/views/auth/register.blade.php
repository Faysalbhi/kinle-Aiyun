{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register Kinile Aiyun</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets')}}/vendors/core/core.css">
	<link rel="stylesheet" href="{{asset('backend/assets')}}/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="{{asset('backend/assets')}}/vendors/flag-icon-css/css/flag-icon.min.css">
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('backend/assets')}}/css/demo_1/style.css">
  <link rel="shortcut icon" href="{{asset('backend/assets')}}/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">
                        <img src="{{ asset('backend/assets/images/faysal4.png') }}" alt="">
                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Kinile<span>Aiyun</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
                    <form action="{{ route('register') }}" method="post" class="forms-sample">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" name="name" autocomplete="Username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control"  placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"> Password</label>
                        <input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Cnfairm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" name="remember" class="form-check-input">
                          Remember me
                        </label>
                      </div>
                      <div class="mt-3">
                        <button class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Sing up</button>
                        <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="btn-icon-prepend" data-feather="twitter"></i>
                          Sign up with twitter
                        </button>
                      </div>
                      <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="{{asset('backend/assets')}}/vendors/core/core.js"></script>
	<script src="{{asset('backend/assets')}}/vendors/feather-icons/feather.min.js"></script>
	<script src="{{asset('backend/assets')}}/js/template.js"></script>
</body>
</html>