@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Generated Vouchers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Batch No.</th>
								<th>Voucher Type</th>
								<th>Quantity</th>
								<th>Programme</th>
								<th>Total</th>
								<th>Date generated</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($batches as $batch)
							<tr>
								<td>#{{ $batch->id }}</td>
								<td>{{ $batch->vouchertype->name }}</td>
								<td>{{ number_format($batch->quantity) }}</td>
								<td>{{ $batch->user->name }}</td>
								<td>{{ number_format(($batch->quantity)*($batch->vouchertype->value)) }}</td>
								<td>{{ date("d-m-Y", strtotime($batch->created_at)) }}</td>
								<td><div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-eye" title="View more"></i></a>
								</div>
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
@stop

