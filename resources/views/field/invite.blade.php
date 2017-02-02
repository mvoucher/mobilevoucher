@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Invited Field Officers' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('fieldmngr.create') }}"><button class="btn btn-xs btn-primary">Invite New Field Officer</button></a>
		<a href="{{ url('field_of_prog') }}"><button class="btn btn-xs btn-primary">View Registered Field Officers</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
 @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>email</th>
								<th>Status</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($invite as $invites)
							<tr>
								<td>{{ date("d-m-Y", strtotime($invites->created_at)) }}</td>
								<td>{{ $invites->name }}</td>
								<td>{{ $invites->email }}</td>
								<td>{{ $invites->response==1?'Accepted':'Pending' }}</td>
								
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['fieldmngr.destroy', 1]]) !!}
        {!! Form::destroy('Cancel', 'Are you sure you want to cancel this invitation') !!}
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

