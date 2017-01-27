@extends('template')


@section('styles')

</style>

@stop

@section('main')
<?php $page_name = 'Voucher Configurations' ?>

<div class="row small-spacing">
	<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Voucher Numbers</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					
					<table class="table table-bordered">
						<tbody> 
							<tr> 
								<th scope="row">Minimum number</th> 
								<td>...</td> 
							</tr> 
							<tr> 
								<th scope="row">Maximum number</th> 
								<td>...</td> 
							</tr> 
							<tr> 
								<th scope="row">Number of digits</th> 
								<td>...</td> 
							</tr> 
						</tbody> 
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
</div>


@stop

@section('scripts')

@stop

