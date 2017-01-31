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
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th class="wd-50">Batch#</th>
								<th>Voucher Type</th>
								<th>Quantity</th>
								{{-- <th>Organisation</th> --}}
								<th class="wd-150">Programme</th>
								<th>Date generated</th>
								<th>View : Fault</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($batches as $batch)						
							<tr bgcolor="">
								<td>#{{ $batch->id }}</td>
								<td>{{ $batch->vouchertype->name }}</td>
								<td>{{ number_format($voucher_methods->actualVouchInsert($batch->id)) }}</td>
								{{-- <td>{{ number_format($batch->quantity) }}</td> --}}
								{{-- <td>.....</td> --}}
								<td>{{ $batch->user->name }}</td>
								<td>{{ date("d-m-Y", strtotime($batch->created_at)) }}</td>
								<td><div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="{{ url('voucher_overall_batch_detail/'.$batch->id) }}"><i class="fa fa-eye" title="View more"></i></a>

						 <?php $rem =($batch->quantity)-($voucher_methods->actualVouchInsert($batch->id))  ?>
						 @if (($batch->quantity)>($voucher_methods->actualVouchInsert($batch->id)))
						 	<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-close" title="{{$rem}} defaulted vouchers"></i></a>
						 @endif

						 @if ($voucher_methods->duplicateExist($batch->id))
						 <a class="btn btn-danger btn-xs" href="{{ url('voucher_duplicates/'.$batch->id) }}"><i class="fa fa-eye" title="View duplicates"></i></a>	
						 @else					 
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

