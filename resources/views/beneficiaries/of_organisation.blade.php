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
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Age</th>
								<th>District</th>
								<th>Sub County</th>
								<th>Village</th>
								<th>No.in H'sehold</th>
								<th>Programme</th>
								<th>Vou. Serial No</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>....name</td>
								<td>....sex</td>
								<td>....dob</td>
								<td>....add</td>
								<td>....name</td>
								<td>....sex</td>
								<td>....dob</td>
								<td>....add</td>
								<td>.....</td>
								<td>.....</td>
								<td>   
								<div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-eye" title="View more"></i></a>
						<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-edit" title="Edit"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', 1]]) !!}
        {!! Form::destroy('Delete', 'Are you sure you want to delete this client') !!}
        {!! Form::close() !!}
								</td>
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

