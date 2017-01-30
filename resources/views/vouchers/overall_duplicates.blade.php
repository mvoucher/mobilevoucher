@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Duplicate Vouchers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Voucher type</th>
								<th>Batch No.</th>
								<th>Programme</th>
								<th>Voucher No.</th>
								<th>Serial No.</th>
								<th>Replace</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($duplicates as $vnos)
							<tr>
								<td>{{ $vnos->batch->vouchertype->name }}</td>
								<td>#{{ $vnos->batch_id }}</td>
								<td>...</td>
								<td>{{ $vnos->voucherno }}</td>
								<td>{{ sprintf('%06d',$vnos->id) }}</td>
								<td>......</td>
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

