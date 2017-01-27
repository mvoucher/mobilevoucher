@extends('template')


@section('styles')

</style>
@stop

@section('main')
<?php $page_name = 'Voucher Configurations' ?>

           @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

<div class="row small-spacing">
	<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Voucher Numbers</h4>
					<!-- /.box-title -->
					
					 {!! Form::model($set_vnos, ['url' => ['configure_num/'.$set_vnos->limit], 'method' => 'put', 'class' => '']) !!}
			<table class="table table-bordered">
			<thead>
				<th>Limit</th>
				<th>min</th>
				<th> max</th>
			</thead>
				<tbody> 
					<tr> 
						<th scope="row">Range</th> 
			<td>{{ Form::text('min', $set_vnos->min, ['class' => 'form-control limit_fields']) }}</td>
			<td>{{ Form::text('max', $set_vnos->max, ['class' => 'form-control limit_fields']) }}</td>
					</tr>  
				</tbody> 
			</table>

		<span class="text-danger">{{ $errors->first('fmin', ':message') }}</span>
		<span class="text-danger">{{ $errors->first('fmax', ':message') }}</span>

				<div class="form-group margin-bottom-0">
								<div class="col-sm-10">
									{!! Form::submit('Save changes',null,'btn btn-info btn-sm') !!}
								</div>
							</div>
					 {!! Form::close() !!}

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

				<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Serial Numbers</h4>
					<!-- /.box-title -->

					
					 {!! Form::model($set_snos, ['url' => ['configure_num/'.$set_snos->limit], 'method' => 'put', 'class' => '']) !!}
			<table class="table table-bordered">
			<thead>
				<th>Limit</th>
				<th>min</th>
				<th> max</th>
			</thead>
				<tbody> 
					<tr> 
						<th scope="row">First range</th> 
			<td>{{ Form::text('min', $set_snos->min, ['class' => 'form-control limit_fields']) }}</td>
			<td>{{ Form::text('max', $set_snos->max, ['class' => 'form-control limit_fields']) }}</td>
					</tr> 
				</tbody> 
			</table>

		<span class="text-danger">{{ $errors->first('min', ':message') }}</span>
		<span class="text-danger">{{ $errors->first('max', ':message') }}</span>

				<div class="form-group margin-bottom-0">
								<div class="col-sm-10">
									{!! Form::submit('Save changes',null,'btn btn-info btn-sm') !!}
								</div>
							</div>
					 {!! Form::close() !!}

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
</div>


@stop

@section('scripts')

@stop

