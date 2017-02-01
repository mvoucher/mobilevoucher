@extends('template')

@section('styles')	
<!-- Datepicker -->
{!! HTML::style('assets/plugin/datepicker/css/bootstrap-datepicker.min.css') !!}
@stop

@section('main')
<?php $page_name = 'Import Agro Dealer file' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon mdi mdi-menu mdi-24px js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('dealer_of_prog') }}">View Dealers</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->

<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>
	<strong>Warning:</strong> The system only allows Excel files in a pre-defined format.
	<p>Ensure that all the information to be uploaded is in <b>one sheet</b>. This is to minimise data conflicts during data processing</p>  
</div>
					
					<!--form goes here -->
						{!! Form::open(['url' => 'importExcel', 'method' => 'post', 'class' => '','files'=>true]) !!}
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

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}	
@stop

