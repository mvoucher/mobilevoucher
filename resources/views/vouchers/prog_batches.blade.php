@extends('template')
@inject('voucher_methods', 'App\Http\Controllers\VoucherController')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Generated Vouchers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon mdi mdi-menu mdi-24px js__drop_down_button"></a>
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
								<th class="wd-50">Batch#</th>
								<th class="wd-120">Voucher Type</th>
								<th class="wd-150">Quantity @ Price</th>
								<th>Total</th>
								<th>Left | Set</th>
								<th>Date</th>
								<th class="wd-120">View : Top up</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($batches as $batch)
							<tr>
								<td>#{{ $batch->id }}</td>
								<td>{{ $batch->vouchertype->name }}</td>
								<td>{{ number_format($voucher_methods->actualVouchInsert($batch->id)) }} @ {{ number_format($batch->vouchertype->value) }}</td>
								<td>{{ number_format(($voucher_methods->actualVouchInsert($batch->id))*($batch->vouchertype->value))  }}</td>
								<td>{{ ($batch->quantity)-($voucher_methods->actualVouchInsert($batch->id))}} | {{ $batch->quantity }}</td>
								<td>{{ date("d-m-Y", strtotime($batch->created_at)) }}</td>
								<td><div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="{{ url('voucher_batch_detail/'.$batch->id) }}"><i class="fa fa-eye" title="View more"></i></a>
						 <?php $rem =($batch->quantity)-($voucher_methods->actualVouchInsert($batch->id))  ?>
						 @if (($batch->quantity)>($voucher_methods->actualVouchInsert($batch->id)) && $rem<500)
						 	<a class="btn btn-success btn-xs" href="{{ url('voucher_batch_fill/'.$batch->id.'/'.$rem ) }}"><i class="fa fa-plus" title="Top up"></i></a>
						 @endif
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

