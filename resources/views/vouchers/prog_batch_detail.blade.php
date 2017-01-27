@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Batch 0001' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('voucher_prog_batches') }}">List batches</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Voucher type</th>
								<th>Color</th>
								<th>Value</th>
								<th>Voucher No.</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($batchdetail as $vnos)
							<tr>
								<td>{{ $vnos->batch->vouchertype->name }}</td>
								<td>{{ $vnos->batch->vouchertype->color }}</td>
								<td>{{ number_format($vnos->batch->vouchertype->value) }}</td>
								<td>{{ $vnos->voucherno }}</td>
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

