@extends('template')
@inject('voucher_methods', 'App\Http\Controllers\VoucherController')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')

	<!-- Select2 -->
	{!! HTML::style('assets/plugin/select2/css/select2.min.css') !!}	
@stop

@section('main')
<?php $page_name = 'Programme Voucher Types' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
									 @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Category</th>
								<th>Color</th>
								<th>Value</th>
								<th>Programme</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($get_impltd as $imp)
							<tr>
								<td>{{ $imp->vouchertype->name }}</td>
								<td>{{ $imp->vouchertype->category }}</td>
								<td>{{ $imp->vouchertype->color }}</td>
								<td>{{ number_format($imp->vouchertype->value) }}</td>							
								<td>{{ $imp->user->name }}</td>
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

	<!-- Select2 -->
	{!! HTML::script('assets/plugin/select2/js/select2.min.js') !!}

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}

@stop



