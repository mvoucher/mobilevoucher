@extends('template')

@section('styles')	
	
@stop

@section('main')
<?php $page_name = 'Create Programme' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon mdi mdi-menu mdi-24px js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('programme_of_org') }}">List Programmes</a></li>
							<li><a href="{{ url('program_invites') }}">List Invites</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					
					<!--form goes here -->
					{!! Form::open(['url' => 'invite_program', 'method' => 'post', 'class' => 'form-horizontal']) !!}	
							<div class="form-group">
							{!! Form::label('name', 'Name of Programme', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'Programme Name']) }}
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

