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
<div class="top-content">
		<a href="{{ url('voucher_generate') }}"><button class="btn btn-xs btn-primary">Generate vouchers</button></a>
		{{-- <a href=""><button class="btn btn-xs btn-primary"> </button></a> --}}
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					

 @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Batch#</th>
								<th>Voucher Type</th>
								<th>Price</th>
								<th>Requested</th>
								<th>Generated</th>
								<th>Left</th>
								<th>Cost(Generated)</th>
								<th>Date</th>
								<th>View</th>
								<th>Top up</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($batches as $batch)
							<tr>
								<td>#{{ $batch->id }}</td>
								<td>{{ $batch->vouchertype->name }}</td>
								<td>{{ number_format($batch->vouchertype->value) }}</td>
								<td>{{ $batch->quantity }}</td>
								<td>{{ number_format($voucher_methods->actualVouchInsert($batch->id)) }}</td>
								<td>{{ ($batch->quantity)-($voucher_methods->actualVouchInsert($batch->id))}}  </td>
								<td>{{ number_format(($voucher_methods->actualVouchInsert($batch->id))*($batch->vouchertype->value))  }}</td>
								
								<td>{{ date("d-m-Y", strtotime($batch->created_at)) }}</td>
								<td>
								<div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="{{ url('voucher_batch_detail/'.$batch->id) }}"><i class="fa fa-eye" title="View more"></i></a>
						 <?php $rem =($batch->quantity)-($voucher_methods->actualVouchInsert($batch->id))  ?>
						 @if (($batch->quantity)>($voucher_methods->actualVouchInsert($batch->id)) && $rem<500)
						 	<a class="btn btn-success btn-xs" href="{{ url('voucher_batch_fill/'.$batch->id.'/'.$rem ) }}"><i class="fa fa-plus" title="Top up"></i></a>
						 @endif
								</div>
								</td>
								<td>
								<div class="btn-group">
						 <?php $rem =($batch->quantity)-($voucher_methods->actualVouchInsert($batch->id))  ?>
						 @if (($batch->quantity)>($voucher_methods->actualVouchInsert($batch->id)) && $rem<500)
						 	<a class="btn btn-success btn-xs" href="{{ url('voucher_batch_fill/'.$batch->id.'/'.$rem ) }}"><i class="fa fa-plus" title="Top up"></i></a>
						 @endif
								</div></td>
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

