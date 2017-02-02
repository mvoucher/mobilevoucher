@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Batch' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ url('voucher_batches') }}"><button class="btn btn-xs btn-primary">View Batches </button></a>
		<a href=""><button class="btn btn-xs btn-primary"> </button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Voucher type</th>
								<th>Color</th>
								<th>Value</th>
								<th>Voucher No.</th>
								<th>Serial No.</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($batchdetail as $vnos)
							<tr>
								<td>{{ $vnos->batch->vouchertype->name }}</td>
								<td>{{ $vnos->batch->vouchertype->color }}</td>
								<td>{{ number_format($vnos->batch->vouchertype->value) }}</td>
								<td>{{ $vnos->voucherno }}</td>
								<td>{{ sprintf('%06d',$vnos->id) }}</td>
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

