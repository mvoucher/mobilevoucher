@extends('template')

@section('styles')	

@stop

@section('main')
<?php $page_name = 'Create Voucher Type' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('voucher_types_of_org') }}">List Types</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					
					<!--form goes here -->
						 {!! Form::model($vouchertype, ['route' => ['voucher.update', $vouchertype->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

							
							<div class="form-group">
							{!! Form::label('name', 'Voucher Name', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('name',null, ['class' => 'form-control']) }}
								</div>
								<span class="text-danger">{{ $errors->first('name', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('color', 'Color', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							<select class="form-control select2_1" name="color">						
							<option value="Red">Red</option>
							<option value="Blue">Blue</option>
							<option value="Pink">Green</option>
							<option value="Purple">Purple</option>
							<option value="Pink">Pink</option>
							<option value="Orage">Orange</option>
							<option value="Brown">Brown</option>
							<option value="Yellow">Yellow</option>
							<option value="Gold">Gold</option>
					</select>								
								</div>
								<span class="text-danger">{{ $errors->first('color', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('value', 'Value (Amount)', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('value', null, ['class' => 'form-control','placeholder'=>'0000']) }}
								</div>
								<span class="text-danger">{{ $errors->first('value', ':message') }}</span>
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

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}	
@stop

