@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'User Log Trail' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Archive</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>User</th>
								<th>IP Address</th>
								<th>Login Time</th>
								<th>View</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>   
								<div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-eye" title="View more"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', 1]]) !!}
        {!! Form::destroy('Delete', 'Are you sure you want to delete this user') !!}
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

