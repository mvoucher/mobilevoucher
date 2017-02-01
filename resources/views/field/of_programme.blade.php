@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Field Officers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon mdi mdi-menu mdi-24px js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ route('fieldmngr.create') }}">Invite Field Officers</a></li>
							<li><a href="{{ url('field_invites') }}">View Invites</a></li>
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
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($program_field as $prog)
						<tr>
								<td>{{ $prog->name }}</td>
								<td>{{ $prog->country }}</td>
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

