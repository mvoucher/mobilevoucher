@extends('auth.template')

@section('main')

            
    {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'class' => 'frm-single']) !!}
    <div class="inside">
      <div class="title"><strong>M-Voucher</strong></div>
      <!-- /.title -->
     {{--  <div class="frm-title">Login</div> --}}

           @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif

           @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

      <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('log', ':message') }}</span>
      <div class="frm-input">
        {{ Form::email('log', null, ['class' => 'frm-inp','placeholder'=>'Username']) }}
        <i class="fa fa-user frm-ico"></i>
        </div>
      <!-- /.frm-input -->

       <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('password', ':message') }}</span>
      <div class="frm-input">
        {{ Form::password('password', ['class' => 'frm-inp','placeholder'=>'Password']) }}
        <i class="fa fa-lock frm-ico"></i>
        </div>
      <!-- /.frm-input -->

      <div class="clearfix margin-bottom-20">
        <div class="pull-left">

       {{--    <div class="checkbox primary">    
                    <input id="memory" name="memory" type="checkbox">
                    {!! Form::label('memory', 'Remember me') !!}
          </div> --}}
          <!-- /.checkbox -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right"><a href="{{ url('password/email') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
        <!-- /.pull-right -->
      </div>
      <!-- /.clearfix -->

         <div class="row small-spacing">
        <!-- /.col-sm-12 -->
        <div class="col-sm-12"><button type="submit" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-arrow-circle-right"></i><span>Login me in</span></button></div>
        <!-- /.col-sm-6 -->
      </div>

<div class="frm-sponsors">
      <div class="row small-spacing">
       <!-- /.col-sm-12 -->
        <div class="col-sm-8"><img class="img-responsive" src="{{ asset('assets/images/sponsers.png') }}"></div>
         <div class="col-sm-4"><img class="img-responsive" src="{{ asset('assets/images/innovatelogo.png') }}"></div>
      </div></div>
      <!-- /.row -->

 @include('auth/partial/footer')

  
    </div>
    <!-- .inside -->
    {!! csrf_field() !!}
  {!! Form::close() !!}               

  <!-- /.frm-single -->

@stop

@section('scripts')

@stop

