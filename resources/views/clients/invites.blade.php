@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Invited Organisations' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ route('organisation.create') }}">Invite Organisation</a></li>
							<li><a href="{{ url('organisationlist') }}">List Organisations</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>

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
								<th>View : Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>

						@foreach ($invite as $invites)
							<tr>
								<td>{{ date("d-m-Y", strtotime($invites->created_at)) }}</td>
								<td>{{ $invites->name }}</td>
								<td>{{ $invites->email }}</td>
								<td>{{ $invites->response==1?'Accepted':'Pending' }} </td>
								<td>   
								<div class="btn-group">
						 <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-eye" title="View more"></i></a>
						<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-edit" title="Edit"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $invites->id]]) !!}
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

