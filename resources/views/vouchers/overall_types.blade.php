@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Voucher Types' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Organisation</th>
								<th>Voucher Name</th>
								<th>Category</th>
								<th>Color</th>
								<th>Value</th>
								<th>Date added</th>
							</tr>
						</thead>
						<tbody>
							
						@foreach ($voucher_types as $voucher_type)
							<tr>
							<td>{{ $voucher_type->user->name }}</td>
								<td>{{ $voucher_type->name }}</td>
								<td>{{ $voucher_type->category }}</td>
								<td>{{ $voucher_type->color }}</td>
								<td>{{ number_format($voucher_type->value) }}</td>
								<td>{{ date("d-m-Y", strtotime($voucher_type->created_at)) }}</td>
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
@stop

