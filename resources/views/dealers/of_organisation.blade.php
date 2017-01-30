@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Organisation Agro Dealers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Full Name</th>
								<th>Gender</th>
								<th>Bate of Birth</th>
								<th>Location</th>
								<th>MM Phone no.</th>
								<th>Programme</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>....name</td>
								<td>....sex</td>
								<td>....dob</td>
								<td>....add</td>
								<td>....mm no</td>
								<td>....</td>
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

