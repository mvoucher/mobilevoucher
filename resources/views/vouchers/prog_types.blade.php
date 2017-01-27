@extends('template')
@inject('voucher_methods', 'App\Http\Controllers\VoucherController')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')

	<!-- Select2 -->
	{!! HTML::style('assets/plugin/select2/css/select2.min.css') !!}	
@stop

@section('main')
<?php $page_name = 'Implemented Voucher Types' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
										
					<!--form goes here -->
						{!! Form::open(['url' => 'voucher_implement_type', 'method' => 'post', 'class' => 'form-horizontal']) !!}	
					

							<div class="form-group">
							{!! Form::label('types', 'Choose Voucher Types', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">

							<select class="form-control select2_1" name="vouchertype_id">						
							@foreach ($voucher_types as $voucher_types)
								@if ($voucher_methods->getProgramNonImpmtdVou($voucher_types->id))
									<option value="{{ $voucher_types->id }}" disabled="disabled">{{ $voucher_types->name }} - {{ $voucher_types->color }} @ {{ number_format($voucher_types->value) }})</option>
								@else
									<option value="{{ $voucher_types->id }}">{{ $voucher_types->name }} - {{ $voucher_types->color }} @ {{ number_format($voucher_types->value) }})</option>
								@endif						
							@endforeach
					</select>
								<span class="text-danger">{{ $errors->first('vouchertype_id', ':message') }}</span>	
					</div>
					<div class="col-sm-4">
						{!! Form::submit('Add to list',null,'btn btn-info btn-sm ml-15') !!}
					</div>
							</div>

	{!! Form::text('org_id', auth()->user()->org_id, ['class' => 'hpet']) !!}
    {!! Form::text('user_id', auth()->user()->id, ['class' => 'hpet']) !!}

				  {!! Form::close() !!}

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ route('voucher.create') }}">Create New Type</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->

									 @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Color</th>
								<th>Value</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($imp_voucher as $imp)
							<tr>
								<td>{{ $imp->vouchertype->name }}</td>
								<td>{{ $imp->vouchertype->color }}</td>
								<td>{{ number_format($imp->vouchertype->value) }}</td>
								
								<td>
		{!! Form::open(['method' => 'PUT', 'url' => ['voucher_prog_destroy/'.$imp->vouchertype_id]]) !!}
        {!! Form::destroy('Remove', 'Are you sure you want to unsubscribe from this voucher type') !!}
        {!! Form::close() !!}
								</td>
							</tr>
						@endforeach
							
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
</div>




@stop

@section('scripts')
	@yield('dtscripts')

		 <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {} );
} );
    </script>

{{-- 	 <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
            },
            'colvis'
        ]
    } );
} );
    </script> --}}
	<!-- Select2 -->
	{!! HTML::script('assets/plugin/select2/js/select2.min.js') !!}

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}

@stop



