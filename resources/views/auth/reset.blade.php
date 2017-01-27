@extends('auth.template')


@section('main')


                 {!! Form::open(['url' => 'password/reset', 'method' => 'post', 'role' => 'form','class'=>'frm-single']) !!}
 {!! Form::hidden('token', $token) !!}

    <div class="inside">
      <div class="title"><strong>M-Voucher</strong> III</div>
      <!-- /.title -->
     {{--  <div class="frm-title">Reset Password</div> --}}
      <!-- /.frm-title -->

               @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('email', ':message') }}</span>
      <div class="frm-input">
        {{ Form::email('email', null, ['class' => 'frm-inp','placeholder'=>'email Address']) }}
        <i class="fa fa-envelope frm-ico"></i>
        </div>
      <!-- /.frm-input -->
      
        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('password', ':message') }}</span>
      <div class="frm-input">
        {{ Form::password('password', ['class' => 'frm-inp','placeholder'=>'Password']) }}
        <i class="fa fa-lock frm-ico"></i>
        </div>
      <!-- /.frm-input -->

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('password_confirmation', ':message') }}</span>
      <div class="frm-input">
        {{ Form::password('password_confirmation', ['class' => 'frm-inp','placeholder'=>'Confirm password']) }}
        <i class="fa fa-lock frm-ico"></i>
        </div>
      <!-- /.frm-input -->

      <div class="row small-spacing">
        <!-- /.col-sm-12 -->
        <div class="col-sm-12"><button type="submit" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-refresh"></i><span>Reset Password</span></button></div>
        <!-- /.col-sm-6 -->
      </div>

     @include('auth/partial/footer')
      <!-- /.footer -->
    </div>
    <!-- .inside -->
  </form>
  <!-- /.frm-single -->

              {!! Form::close() !!}   
    
@stop



