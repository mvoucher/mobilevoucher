@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Generated Vouchers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('voucher_generate') }}">Generate vouchers</a></li>
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
								<th>Batch No.</th>
								<th>Voucher Type</th>
								<th>Quantity @ Price</th>
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
								<td>{{ number_format($batch->quantity) }} @ {{ number_format($batch->vouchertype->value) }}</td>
								<td>{{ number_format(($batch->quantity)*($batch->vouchertype->value))  }}</td>
								<td>{{ date("d-m-Y", strtotime($batch->created_at)) }}</td>
								<td><div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="{{ url('voucher_batch_detail/'.$batch->id) }}"><i class="fa fa-eye" title="View more"></i></a>
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

