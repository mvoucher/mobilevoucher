@extends('template')

@section('styles')	
<!-- Datepicker -->
{!! HTML::style('assets/plugin/datepicker/css/bootstrap-datepicker.min.css') !!}
@stop

@section('main')
<?php $page_name = 'Register beneficiary' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon mdi mdi-menu mdi-24px js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('beneficiary_of_prog') }}">List Beneficiaries</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					
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

				  	<div class="container">

		<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>

		<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>

		<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
		<a href="{{ URL::to('exportPDF') }}"><button class="btn btn-success">Download PDF</button></a>


	</div>

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

