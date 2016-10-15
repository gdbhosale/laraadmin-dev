<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
	@include('la.layouts.partials.htmlheader')
@show
<body class="{{ LAConfigs::getByKey('skin') }} {{ LAConfigs::getByKey('layout') }} @if(LAConfigs::getByKey('layout') == 'sidebar-mini') sidebar-collapse @endif" bsurl="{{ url('') }}" adminRoute="{{ config('laraadmin.adminRoute') }}">
<div class="wrapper">

	@include('la.layouts.partials.mainheader')

	@include('la.layouts.partials.sidebar')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		
		@if(!isset($no_header))
			@include('la.layouts.partials.contentheader')
		@endif
		
		<!-- Main content -->
		<section class="content {{ $no_padding or '' }}">
			<!-- Your Page Content Here -->
			@yield('main-content')
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->

	@include('la.layouts.partials.controlsidebar')

	@include('la.layouts.partials.footer')

</div><!-- ./wrapper -->

@include('la.layouts.partials.file_manager')

@section('scripts')
	@include('la.layouts.partials.scripts')
@show

</body>
</html>
