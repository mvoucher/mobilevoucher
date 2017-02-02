@extends('template')

@section('styles')	
<!-- Datepicker -->
{!! HTML::style('assets/plugin/datepicker/css/bootstrap-datepicker.min.css') !!}
@stop

@section('main')
<?php $page_name = 'Register Agro Dealer' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ url('productlist') }}"><button class="btn btn-xs btn-primary">View Products</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
										
					<!--form goes here -->
						{!! Form::open(['url' => 'invite_organ', 'method' => 'post', 'class' => 'form-horizontal']) !!}	
							<div class="form-group">
							{!! Form::label('name', 'Product Name', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('name', ':message') }}</span>
							</div>	

							<div class="form-group">
							{!! Form::label('category', 'Voucher Category', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							<select class="form-control select2_1" name="category">						
							<option value="Cereal">Cereals</option>
							<option value="Legume">Legumes</option>
							<option value="Vegetable">Vegetables</option>
					</select>								
								</div>
								<span class="text-danger">{{ $errors->first('color', ':message') }}</span>
							</div>


							<div class="form-group">
							{!! Form::label('slug', 'Slug', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('slug', null, ['class' => 'form-control','placeholder'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('slug', ':message') }}</span>
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


