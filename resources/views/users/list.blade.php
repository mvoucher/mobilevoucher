@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Users' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>User Type</th>
								<th>Confirmed</th>
								<th>Status</th>
								<th>Ban</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->role->title }}</td>
								<td>{{ $user->confirmed==1?'Yes':'No' }}</td>
								<td>{{ $user->status==1?'Active':'Banned' }}</td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', 1]]) !!}
        {!! Form::destroy('Ban', 'Are you sure you want to ban this user') !!}
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

