@extends("layouts.app")

<?php
use Dwij\Laraadmin\Controllers\ModuleController;
?>

@section("contentheader_title", "Modules")
@section("contentheader_description", "modules listing")
@section("section", "Modules")
@section("sub_section", "Listing")
@section("htmlheader_title", "Modules Listing")

@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Module</button>
@endsection

@section("main-content")

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="dt_modules" class="table table-bordered">
		<thead>
		<tr class="success">
			<th>ID</th>
			<th>Name</th>
			<th>Items</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Module</h4>
			</div>
			{!! Form::open(['action' => 'ModuleController@store', 'id' => 'module-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#dt_modules").DataTable({
		
	});
	$("#module-add-form").validate({
		
	});
});
</script>
@endpush