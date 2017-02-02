@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Field Officers' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('fieldmngr.create') }}"><button class="btn btn-xs btn-primary">Invite Field officer</button></a>
		<a href="{{ url('field_invites') }}"><button class="btn btn-xs btn-primary">View Invited Field officers</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>District</th>
								<th>Telephone</th>
								<th>Email</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($program_field as $prog)
						<tr>
								<td>{{ $prog->name }}</td>
								<td>{{ $prog->district }}</td>
								<td>{{ $prog->telephone }}</td>
								<td>{{ $prog->email }}</td>
								
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', 1]]) !!}
        {!! Form::destroy('Remove', 'Are you sure you want to delete this program') !!}
        {!! Form::close() !!}
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

