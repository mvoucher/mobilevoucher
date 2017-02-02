@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Organisations' ?>

@if (session('theuser')=='admin')
	<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('organisation.create') }}"><button class="btn btn-xs btn-primary">Invite New Organisation</button></a>
		<a href="{{ url('organisation_invites') }}"><button class="btn btn-xs btn-primary">View Invited Organisations </button></a>
</div>
</div>
</div>
@endif

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>District</th>
								<th>Telephone</th>
								<th>Email</th>
								<th>Date added</th>
								@if (session('theuser')=='admin')									
								<th>View : Edit</th>
								<th>Delete</th>
								@endif
							</tr>
						</thead>
						<tbody>
						@foreach ($organisations as $org)
							<tr>
								<td>{{ $org->name }}</td>
								<td>{{ $org->username }}</td>
								<td>{{ $org->district }}</td>
								<td>{{ $org->telephone }}</td>
								<td>{{ $org->email }}</td>
								<td>{{ date("d-m-Y", strtotime($org->created_at)) }}</td>
								@if (session('theuser')=='admin')
									<td>   
								<div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-eye" title="View more"></i></a>
						<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-edit" title="Edit"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $org->id]]) !!}
        {!! Form::destroy('Delete', 'Are you sure you want to delete this client') !!}
        {!! Form::close() !!}
								</td>
								@endif
							</tr>
							{{-- expr --}}
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

