@extends('template')


@section('styles')

</style>

@stop

@section('main')
<?php $page_name = 'Voucher No. settings' ?>

<div class="row small-spacing">
	<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Bordered table</h4>
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
					<p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
					<table class="table table-bordered">
						<caption>Optional table caption.</caption>
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th> 
								<th>Last Name</th> 
								<th>Username</th> 
							</tr> 
						</thead> 
						<tbody> 
							<tr> 
								<th scope="row">1</th> 
								<td>Mark</td> 
								<td>Otto</td> 
								<td>@mdo</td> 
							</tr> 
							<tr> 
								<th scope="row">2</th> 
								<td>Jacob</td> 
								<td>Thornton</td> 
								<td>@fat</td> 
							</tr> 
							<tr> 
								<th scope="row">3</th> 
								<td>Larry</td> 
								<td>the Bird</td> 
								<td>@twitter</td> 
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

