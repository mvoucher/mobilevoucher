@extends('template')

@section('styles')	
	
@stop

@section('main')
<?php $page_name = 'Invite Field Officer' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ url('field_of_prog') }}"><button class="btn btn-xs btn-primary">View Registered Field officers</button></a>
		<a href="{{ url('field_invites') }}"><button class="btn btn-xs btn-primary">View Invited Field officers</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					
<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>
	Warning: Ensure that the recipient's <strong>email</strong> is correct and functional as it will receive the invitation link to register.  
</div>	
					
					<!--form goes here -->
					{!! Form::open(['url' => 'invite_fieldmngr', 'method' => 'post', 'class' => 'form-horizontal']) !!}	
							<div class="form-group">
							{!! Form::label('name', 'Name of Field Officer', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'Manager Name']) }}
								</div>
								<span class="text-danger">{{ $errors->first('name', ':message') }}</span>
							</div>

							<div class="form-group">
							 {!! Form::label('email', 'Email address', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
								  {{ Form::email('email', null, ['class' => 'form-control','placeholder'=>'email Address']) }}
								</div>
								<span class="text-danger">{{ $errors->first('email', ':message') }}</span>
							</div>

							<div class="form-group margin-bottom-0">
								<div class="col-sm-offset-3 col-sm-10">
									{!! Form::submit('Send Invitation',null,'btn btn-info btn-sm ml-15') !!}
								</div>
							</div>

    {!! Form::text('role_id', auth()->user()->role_id, ['class' => 'hpet']) !!}
				  {!! Form::close() !!}

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
</div>


@stop

@section('scripts')

@stop

