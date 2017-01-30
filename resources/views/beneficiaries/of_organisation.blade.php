@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Organisation Beneficiaries' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
						<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th style="width: 100px">First Name</th>
								<th style="width: 100px">Last Name</th>
								<th style="width: 100px">Gender</th>
								<th style="width: 100px">Age</th>
								<th style="width: 100px">District</th>
								<th style="width: 100px">Sub County</th>
								<th style="width: 100px">Village</th>
								<th style="width: 100px">No.in H'sehold</th>
								<th style="width: 100px">Programme</th>
								<th style="width: 100px">Vou. Serial No</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								
							</tr>
							
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

