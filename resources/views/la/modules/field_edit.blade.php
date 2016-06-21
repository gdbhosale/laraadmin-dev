@extends("layouts.app")

@section("contentheader_title", "Edit Field: ".$field->label)
@section("contentheader_description", "from ".$module->model." module")
@section("section", "Module ".$module->name)
@section("section_url", url('/modules/'.$module->id))
@section("sub_section", "Edit Field")

@section("htmlheader_title", "Field Edit : ".$field->label)

@section("main-content")
<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($field, ['route' => ['module_fields.update', $field->id ], 'method'=>'PUT', 'id' => 'field-edit-form']) !!}
					{{ Form::hidden("module_id", $module->id) }}
					
					<div class="form-group">
						<label for="label">Field Label :</label>
						{{ Form::text("label", null, ['class'=>'form-control', 'placeholder'=>'Field Label', 'data-rule-minlength' => 2, 'data-rule-maxlength'=>20, 'required' => 'required']) }}
					</div>
					
					<div class="form-group">
						<label for="colname">Column Name :</label>
						{{ Form::text("colname", null, ['class'=>'form-control', 'placeholder'=>'Column Name (lowercase)', 'data-rule-minlength' => 2, 'data-rule-maxlength'=>20, 'required' => 'required']) }}
					</div>
					
					<div class="form-group">
						<label for="field_type">UI Type:</label>
						{{ Form::select("field_type", $ftypes, null, ['class'=>'form-control', 'required' => 'required']) }}
					</div>
					
					<div class="form-group">
						<label for="readonly">Read Only:</label>
						{{ Form::checkbox("readonly", "readonly", []) }}
						<div class="Switch Round Off" style="vertical-align:top;margin-left:10px;"><div class="Toggle"></div></div>
					</div>
					
					<div class="form-group">
						<label for="defaultvalue">Default Value :</label>
						{{ Form::text("defaultvalue", null, ['class'=>'form-control', 'placeholder'=>'Default Value']) }}
					</div>
					
					<div class="form-group">
						<label for="minlength">Minimum :</label>
						{{ Form::number("minlength", null, ['class'=>'form-control', 'placeholder'=>'Default Value']) }}
					</div>
					
					<div class="form-group">
						<label for="maxlength">Maximum :</label>
						{{ Form::number("maxlength", null, ['class'=>'form-control', 'placeholder'=>'Default Value']) }}
					</div>
					
					<div class="form-group">
						<label for="required">Required:</label>
						{{ Form::checkbox("required", "required") }}
						<div class="Switch Round Off" style="vertical-align:top;margin-left:10px;"><div class="Toggle"></div></div>
					</div>
					
					<div class="form-group">
						<label for="popup_vals">Values :</label>
						<div class="radio" style="margin-bottom:20px;">
							<label>{{ Form::radio("popup_value_type", "table", false) }} From Table</label>
							<label>{{ Form::radio("popup_value_type", "list", true) }} From List</label>
						</div>
						{{ Form::select("popup_vals_table", $tables, [], ['class'=>'form-control', 'rel' => '']) }}
						{{ Form::select("popup_vals_list[]", [], [], ['class'=>'form-control popup_vals_list', 'rel' => 'taginput', 'multiple' => true, 'data-placeholder'=> 'Add Multiple values (Press Enter to add)']) }}
						
						<?php
						// print_r($tables);
						?>
					</div>
					
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url('/modules/'.$module->id) }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
				
				@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("select.popup_vals_list").show();
	$("select.popup_vals_list").next().show();
	$("select[name='popup_vals_table']").hide();
	
	$("input[name='popup_value_type']").on("change", function() {
		console.log($(this).val());
		if($(this).val() == "list") {
			$("select.popup_vals_list").show();
			$("select.popup_vals_list").next().show();
			$("select[name='popup_vals_table']").hide();
		} else {
			$("select[name='popup_vals_table']").show();
			$("select.popup_vals_list").hide();
			$("select.popup_vals_list").next().hide();
		}
	})
	$("#field-edit-form").validate({
		
	});
});
</script>
@endpush