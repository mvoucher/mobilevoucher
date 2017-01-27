@extends('auth.template')

@section('main')


          {!! Form::open(['url' => 'password/email', 'method' => 'post', 'class' => 'frm-single']) !!}
    <div class="inside">
      <div class="title"><strong>M-Voucher</strong> III</div>
      <!-- /.title -->
      <div class="frm-title">Reset Password</div>

             @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif

         <p class="text-center">Enter your email address and we'll send you an email with instructions to reset your password.</p>
    
         <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('email', ':message') }}</span>
      <div class="frm-input">
        {{ Form::email('email', null, ['class' => 'frm-inp','placeholder'=>'email Address']) }}
        <i class="fa fa-envelope frm-ico"></i>
        </div>
      <!-- /.frm-input -->


      <div class="row small-spacing">
        <!-- /.col-sm-12 -->
        <div class="col-sm-6"><button type="submit" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-reply"></i><span>Send me</span></button></div>
        <!-- /.col-sm-6 -->
        <div class="col-sm-6"><a href="{{ url('/') }}" class="a-link"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-edit"></i>Back To Login</button></a></div>
        <!-- /.col-sm-6 -->
      </div>

       @include('auth/partial/footer')
      <!-- /.footer -->
    </div>
    <!-- .inside -->

                        {!! Form::text('address', '', ['class' => 'hpet']) !!} 
{!! Form::close() !!} 


  <!-- /.frm-single -->


	
@stop