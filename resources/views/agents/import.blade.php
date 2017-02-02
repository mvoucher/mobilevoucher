@extends('template')

@section('styles')	
<!-- Datepicker -->
{!! HTML::style('assets/plugin/datepicker/css/bootstrap-datepicker.min.css') !!}

<!-- Select2 -->
	{!! HTML::style('assets/plugin/select2/css/select2.min.css') !!}	

@stop

@section('main')
<?php $page_name = 'Import Agents file' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ url('agent_of_prog') }}"><button class="btn btn-xs btn-primary">View Agents </button></a>
		<a href="{{ asset('packages/Agents.xlsx') }}"><button class="btn btn-xs btn-primary">Download Excel Template</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
				
						<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>
	<strong>Warning:</strong> The system only allows Excel files in a pre-defined format.
	<p>Ensure that all the information to be uploaded is in <b>one sheet</b>. This is to minimise data conflicts during data processing</p>  
</div>
					
					<!--form goes here -->
						{!! Form::open(['url' => 'importExcel', 'method' => 'post', 'class' => 'form-horizontal','files'=>true]) !!}

							<div class="form-group">
							{!! Form::label('dealer_id', 'Agro Dealer', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							<select class="form-control select2_1" name="dealer_id">						
							{{-- @foreach ($voucher_types as $voucher_types)
								<option value=""></option>					
							@endforeach --}}
					</select>
								</div>
								<span class="text-danger">{{ $errors->first('dealer_id', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('import_file', 'Attach an excel file', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							 {{ Form::file('import_file', null,['class'=>'']) }}
								</div>
								<span class="text-danger">{{ $errors->first('import_file', ':message') }}</span>
							</div>


							<div class="form-group margin-bottom-0">
								<div class="col-sm-offset-3 col-sm-10">
									{!! Form::submit('Upload file',null,'btn btn-info btn-sm') !!}
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

		<!-- Select2 -->
	{!! HTML::script('assets/plugin/select2/js/select2.min.js') !!}

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}	
@stop

