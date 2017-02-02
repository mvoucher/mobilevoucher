@extends('template')

@section('styles')	
<!-- Datepicker -->
{!! HTML::style('assets/plugin/datepicker/css/bootstrap-datepicker.min.css') !!}
@stop

@section('main')
<?php $page_name = 'Register beneficiary' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ url('beneficiary_of_prog') }}"><button class="btn btn-xs btn-primary">View Beneficiaries</button></a>
		<a href="{{ url('beneficiary_import') }}"><button class="btn btn-xs btn-primary">Import Excel file</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					
					
					<!--form goes here -->
						{!! Form::open(['url' => 'register_benef', 'method' => 'post', 'class' => 'form-horizontal']) !!}	
							<div class="form-group">
							{!! Form::label('firstname', 'First Name', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('firstname', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('firstname', ':message') }}</span>
							</div>	

							<div class="form-group">
							{!! Form::label('lastname', 'Last Name', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('lastname', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('lastname', ':message') }}</span>
							</div>

							<div class="form-group">
								  <label class="col-sm-3 control-label" for="radios">Gender</label>
								  <div class="col-sm-5"> 
								    <div class="radio">
                   				 {!! Form::radio('gender', 'male', true, ['id' => 'radio1']) !!}
								{!! Form::label('radio1', 'Male') !!}
							</div>
							<div class="radio">
                   				 {!! Form::radio('gender', 'female', false, ['id' => 'radio2']) !!}
								{!! Form::label('radio2', 'Feale') !!}
							</div>  
							  </div>
							</div>

							{{-- <div class="form-group">
							{!! Form::label('dob', 'Date of Birth', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
								<div class="input-group">
							{{ Form::text('dob', null, ['class' => 'form-control','placeholder'=>'mm/dd/yyyy','id'=>'datepicker-autoclose']) }}
							<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>	
								</div>
								</div>
								<span class="text-danger">{{ $errors->first('dob', ':message') }}</span>
							</div> --}}



							<div class="form-group">
							{!! Form::label('age', 'Age', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('age', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('age', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('district', 'District', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('district', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('district', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('sub_county', 'Sub county', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('sub_county', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('sub_county', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('village', 'Village', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('village', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('village', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('no_in_household', 'No. in household', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('no_in_household', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('no_in_household', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('voucher_serial_no', 'Voucher Serial No.', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('voucher_serial_no', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('voucher_serial_no', ':message') }}</span>
							</div>

							<div class="form-group margin-bottom-0">
								<div class="col-sm-offset-3 col-sm-10">
									{!! Form::submit('Save',null,'btn btn-info btn-sm ml-15') !!}
								</div>
							</div>
				  {!! Form::close() !!}

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
</div>


@stop

@section('scripts')
	<!-- Datepicker -->
	{!! HTML::script('assets/plugin/datepicker/js/bootstrap-datepicker.min.js') !!}	

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}	
@stop

