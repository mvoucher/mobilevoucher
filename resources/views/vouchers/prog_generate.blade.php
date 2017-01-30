@extends('template')

@section('styles')	
	<!-- Select2 -->
	{!! HTML::style('assets/plugin/select2/css/select2.min.css') !!}
@stop

@section('main')
<?php $page_name = 'Generate Vouchers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon mdi mdi-menu mdi-24px js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="{{ url('voucher_prog_batches') }}">List generated vouchers</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					
					<!--form goes here -->
						{!! Form::open(['url' => 'voucher_generating', 'method' => 'post', 'class' => 'form-horizontal','onsubmit'=>'return checkForm(this);']) !!}	
							

							<div class="form-group">
							{!! Form::label('type', 'Select voucher type', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							<select class="form-control select2_1" name="type">	
							@foreach ($imp_voucher as $imp)			
							<option value="{{ $imp->vouchertype_id }}">{{ $imp->vouchertype->name }} - {{ $imp->vouchertype->color }} @ {{ $imp->vouchertype->value }}</option>
												@endforeach		
					</select>								
								</div>
								<span class="text-danger">{{ $errors->first('type', ':message') }}</span>
							</div>

							<div class="form-group">
							{!! Form::label('number', 'Number of vouchers', ['class' => 'col-sm-3 control-label'] )  !!}
								<div class="col-sm-5">
							{{ Form::text('number', null, ['class' => 'form-control','placeholder'=>'0']) }}
								</div>
								<span class="text-danger">{{ $errors->first('number', ':message') }}</span>
							</div>

							<div class="form-group margin-bottom-0">
								<div class="col-sm-offset-3 col-sm-10">
							<input type="submit" name="myButton" class="btn btn-info btn-sm" value="Generate Vouchers">

								
								</div>
							</div>

				  {!! Form::close() !!}

				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->

			<?php 
/*	$num1 = mt_rand(1,2147483647);
      $num_12 = mt_rand(999999,2147483647);
      $num2 = mt_rand(1,$num_12);
      $num = $num1.$num2;
			$x = (int)substr($num, 0, 6);
			$y = (int)substr($num, -2); 
			$ran_div = mt_rand(1,99);
			$z = ($y.$x)/$ran_div;
			sprintf('%07d',$z);*/
			?>
</div>


@stop

@section('scripts')

<script type="text/javascript">

  function checkForm(form) // Submit button clicked
  {
    //
    // check form input values
    //

    form.myButton.disabled = true;
    form.myButton.value = "Please wait...";
    return true;
  }

</script>


	<!-- Select2 -->
	{!! HTML::script('assets/plugin/select2/js/select2.min.js') !!}

	<!-- Demo Scripts -->
	{!! HTML::script('assets/scripts/form.demo.min.js') !!}
@stop

