@extends('template')


@section('styles')

</style>

@stop

@section('main')
<?php $page_name = 'My Profile' ?>

  @if(session()->has('ok'))
                    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
                @endif 

<div class="row small-spacing">
<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title"><i class="ico fa fa-user"></i>Company Profile</h4>
					<!-- /.box-title -->
					
					<p><strong>Company name</strong> : </p>
					<p><strong>Telephone</strong> : </p>
					<p><strong>Country</strong> : </p>
					<p><strong>Role</strong> : </p>
				</div>
				<!-- /.box-content -->
			</div>

<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title"><i class="ico fa fa-lock"></i>Account Profile</h4>
					<!-- /.box-title -->
				
					<p><strong>Username</strong> : </p>
					<p><strong>Email</strong> : </p>
					<p><strong>Password status</strong> : </p>
					<p><strong>Account status</strong> : </p>
				</div>
				<!-- /.box-content -->
			</div>
	
</div>





@stop

@section('scripts')

@stop

