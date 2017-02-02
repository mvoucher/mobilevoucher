@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'User Log Trail' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="#"><button class="btn btn-xs btn-primary">Back Ups</button></a>
		{{-- <a href=""><button class="btn btn-xs btn-primary"> </button></a> --}}
</div>
</div>
</div>


<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
							<th>#</th>
								<th>User</th>
								<th>IP Address</th>
								<th>Login Time</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($log_trails as $logs)
							<tr>
							<td>{{ $logs->id}}</td>
								<td>{{ $logs->user->username}}</td>
								<td>{{ $logs->last_login_ip }}</td>
								<td>{{ $logs->last_login_at }}</td>
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

