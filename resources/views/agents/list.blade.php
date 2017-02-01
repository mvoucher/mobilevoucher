@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Agents' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Gender</th>
								<th>District</th>
								<th>Sub-county</th>
								<th>Village</th>
								<th>MM Phonenumber</th>
								<th>Programme</th>
								<th>Agro Dealer</th>
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

