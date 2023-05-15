
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $title??"Kinile" }}</title>
	<link rel="stylesheet" href="{{asset('backend/assets')}}/vendors/core/core.css">
  <link rel="stylesheet" href="{{asset('backend/assets')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="{{asset('backend/assets')}}/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="{{asset('backend/assets')}}/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="{{asset('backend/assets')}}/css/demo_1/style.css">
  <link rel="shortcut icon" href="{{asset('backend/assets')}}/images/favicon.png" />
  @stack('style')
</head>
<body>
	<div class="main-wrapper">

		<x-backend.layouts.partials.sidebar>
		</x-backend.layouts.partials.sidebar>
    {{-- ---------------------- --}}
		<x-backend.layouts.partials.sidebar_settings>
		</x-backend.layouts.partials.sidebar_settings>
    {{-- ----------------------------- --}}
    <x-backend.layouts.partials.navbar>
		</x-backend.layouts.partials.navbar>
    {{-- ----------------------------- --}}
				<!-- partial -->

      <div class="page-content">

        {{ $slot }}
      

      </div>

      <!-- partial:partials/_footer.html -->
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
        <p class="text-muted text-center text-md-left">Copyright © {{ date('Y') }} <a href="kinle-aiyun.com" target="_blank">Kinle-Aiyun</a>. All rights reserved</p>
        <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Ali Faysal <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
      </footer>
      <!-- partial -->
    
    </div>
    
    </div>

	<!-- core:js -->
	<script src="{{asset('backend/assets')}}/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{asset('backend/assets')}}/vendors/chartjs/Chart.min.js"></script>
  <script src="{{asset('backend/assets')}}/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="{{asset('backend/assets')}}/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="{{asset('backend/assets')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
  <script src="{{asset('backend/assets')}}/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('backend/assets')}}/vendors/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{asset('backend/assets')}}/vendors/feather-icons/feather.min.js"></script>
	<script src="{{asset('backend/assets')}}/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{asset('backend/assets')}}/js/dashboard.js"></script>
  <script src="{{asset('backend/assets')}}/js/datepicker.js"></script>
	<!-- end custom js for this page -->
  @stack('script')
</body>
</html>    