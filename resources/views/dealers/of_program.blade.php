@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Agro Dealers' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('dealer.create') }}"><button class="btn btn-xs btn-primary"> Register Agro Dealer</button></a>
		<a href="{{ url('dealer_import') }}"><button class="btn btn-xs btn-primary">Import Excel file </button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
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
								<th>Add Agent</th>
								<th>Edit</th>
								<th>Delete</th>
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
								<td>   
								<div class="btn-group">
						<a class="btn btn-success btn-xs" href="#"><i class="fa fa-plus" title="Edit"></i></a>
								</div></td>
								<td>   
								<div class="btn-group">
						<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-edit" title="Edit"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['dealer.destroy', 1]]) !!}
        {!! Form::destroy('Delete', 'Are you sure you want to delete this dealer') !!}
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

