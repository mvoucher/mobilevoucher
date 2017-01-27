@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Duplicate Vouchers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								
								<th>Voucher No.</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($duplicates as $vnos)
							<tr>
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

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					
					<table id="example2" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								
								<th>Serial No.</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($duplicates2 as $vnos)
							<tr>
								<td>{{ $vnos->serialno }}</td>
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
    $('#example2').DataTable( {} );
} );
    </script>
@stop

