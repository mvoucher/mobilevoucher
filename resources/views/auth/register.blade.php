@extends('auth.template')

@section('main')
    

                 {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'class' => 'frm-single','files'=>true]) !!}
    <div class="inside">
      <div class="title"><strong>M-Voucher</strong> III</div>
      <!-- /.title -->
      {{-- <div class="frm-title">Register</div> --}}

  @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif 

         <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('name', ':message') }}</span>
      <div class="frm-input">
        {{ Form::text('name', null, ['class' => 'frm-inp','placeholder'=>'Name']) }}
        <i class="fa fa-building frm-ico"></i>
        </div>
      <!-- /.frm-input -->

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('photo', ':message') }}</span>
      <div class="frm-input">
        {{ Form::file('photo', null,['class'=>'frm-inp']) }}
        </div>
      <!-- /.frm-input -->

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('telephone', ':message') }}</span>
      <div class="frm-input">
        {{ Form::text('telephone', null, ['class' => 'frm-inp','placeholder'=>'Telephone/Phonenumber']) }}
        <i class="fa fa-phone frm-ico"></i>
        </div>
      <!-- /.frm-input -->

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('usertype', ':message') }}</span>
      <div class="frm-input">
      <?php 
      if($invite->role_id==1){$user_role = $select_org; }
      if($invite->role_id==2){$user_role = $select_prog; }
      if($invite->role_id==3){$user_role = $select_dtm; }

      ?>
         {!!  Form::select('usertype',$user_role,  null, ['class' => 'frm-inp','placeholder'=>'Select category' ]) !!}
        <i class="fa fa-suitcase frm-ico"></i>
        </div>
      <!-- /.frm-input -->

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('district', ':message') }}</span>
      <div class="frm-input">
        {{ Form::text('district', null, ['class' => 'frm-inp','placeholder'=>'e.g. Kampala']) }}
        <i class="fa fa-globe frm-ico"></i>
        </div>
      <!-- /.frm-input -->

        <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('email', ':message') }}</span>
      <div class="frm-input">
        {{ Form::email('email', $invite->email, ['class' => 'frm-inp','placeholder'=>'email Address']) }}
        <i class="fa fa-envelope frm-ico"></i>
        </div>
      <!-- /.frm-input -->

       <!-- /.frm-title -->
        <span class="text-danger">{{ $errors->first('username', ':message') }}</span>
      <div class="frm-input">
        {{ Form::text('username', null, ['class' => 'frm-inp','placeholder'=>'Username']) }}
        <i class="fa fa-user-secret frm-ico"></i>
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
        <div class="col-sm-12"><button type="submit" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-edit"></i><span>Register Me</span></button></div>
        <!-- /.col-sm-6 -->
        <!-- /.col-sm-6 -->
      </div>
      <!-- /.row -->
      
       @include('auth/partial/footer')
    {!! Form::text('invitor_role', $invite->role_id, ['class' => 'hpet']) !!}
    {!! Form::text('invitor_id', $invite->user_id, ['class' => 'hpet']) !!}
    {!! Form::text('reg_code', $reg_code->registration_code, ['class' => 'hpet']) !!}

      <!-- /.footer -->
    </div>
    <!-- .inside -->
    {!! Form::text('address', '', ['class' => 'hpet']) !!}
  {!! Form::close() !!}
  <!-- /.frm-single -->
          
    
@stop
