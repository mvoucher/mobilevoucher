@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Programmes' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ route('programme.create') }}">Invite Programme</a></li>
							<li><a href="{{ url('program_invites') }}">List Invites</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Country</th>
								<th>Telephone</th>
								<th>Email</th>
								<th>View : Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($program as $prog)
						<tr>
								<td>{{ $prog->name }}</td>
								<td>{{ $prog->country }}</td>
								<td>{{ $prog->telephone }}</td>
								<td>{{ $prog->email }}</td>
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

