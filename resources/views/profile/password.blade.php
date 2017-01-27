@extends('template')

@section('styles')	
	
@stop

@section('main')
<?php $page_name = 'Change Password' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->

					  @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif 
					
					
				  	{!! Form::open(['url' => 'new_password', 'method' => 'post', 'class' => 'form-horizontal']) !!}	

		<div class="form-group">
            {!! Form::label('password', 'New Password:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!}
        		<span class="text-danger">{{ $errors->first('password', ':message') }}</span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => 'Confirm Password', 'type' => 'password']) !!}
        		<span class="text-danger">{{ $errors->first('password_confirmation', ':message') }}</span>
            </div>
        </div>

         <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                {!! Form::submit('Save Changes',null,'btn btn-primary btn-sm ml-15') !!}
            </div>
        </div>

		{!! Form::close() !!}	

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
</div>

@stop

@section('scripts')

@stop

