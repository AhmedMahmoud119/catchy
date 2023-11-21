<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('admin.layouts.css')
    @yield('css')


</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

        @include('admin.layouts.sidemenu')


        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            <div class="text-center">
{{--                @include('flash::message')--}}
            </div>

            @include('admin.layouts.navbar')

            @yield('header')

            <div class="card content d-flex flex-column flex-column-fluid bg-light border-0" id="kt_content">
                    <div class="container">
                        @include('admin.layouts.flash')
                        @yield('content')
                    </div>
            </div>

        </div>
    </div>
</div>

<!-- WRAPPER -->
{{--	<div id="wrapper">--}}
{{--		<!-- NAVBAR -->--}}
{{--		@include('admin.layouts.navbar')--}}

{{--		<!-- END NAVBAR -->--}}
{{--		<!-- LEFT SIDEBAR -->--}}
{{--		@include('admin.layouts.sidemenu')--}}
{{--		<!-- END LEFT SIDEBAR -->--}}
{{--		<!-- MAIN -->--}}
{{--		<div class="main">--}}
{{--			<!-- MAIN CONTENT -->--}}
{{--			<div class="main-content">--}}
{{--				<div class="container-fluid">--}}

{{--					<div class="panel ">--}}

{{--						@yield('header')--}}
{{--						<div class="text-center col-md-10 col-md-offset-1 " >--}}
{{--							@include('flash::message')--}}
{{--						</div>--}}

{{--                        <div class="panel-body">--}}
{{--							@yield('content')--}}
{{--						</div>--}}
{{--					</div>--}}

{{--				</div>--}}
{{--			</div>--}}
{{--			<!-- END MAIN CONTENT -->--}}
{{--		</div>--}}
{{--		<!-- END MAIN -->--}}
{{--		<div class="clearfix"></div>--}}
{{--		<footer>--}}
{{--			<div class="container-fluid">--}}
{{--				<p class="copyright">&copy; 2019 <a href="#" target="_blank">{{settings('website_name')}}</a>. All Rights Reserved.</p>--}}
{{--			</div>--}}
{{--		</footer>--}}
{{--	</div>--}}
@include('admin.layouts.js')
@yield('scripts')

</body>

</html>
