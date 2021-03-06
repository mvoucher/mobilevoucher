@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Programme Beneficiaries' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('beneficiary.create') }}"><button class="btn btn-xs btn-primary">Register Beneficiary </button></a>
		<a href="{{ url('beneficiary_import') }}"><button class="btn btn-xs btn-primary">Import Excel file</button></a>
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
				
@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

   @if(session()->has('error'))
     @include('partials/error', ['type' => 'danger', 'message' => session('error')])
   @endif

					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Age</th>
								<th>District</th>
								<th>Sub County</th>
								<th>Village</th>
								<th># in Household</th>
								<th>Voucher Serial No</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>   
								<div class="btn-group">
						<a class="btn btn-warning btn-xs" href="#"><i class="fa fa-edit" title="Edit"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', 1]]) !!}
        {!! Form::destroy('Delete', 'Are you sure you want to delete this client') !!}
        {!! Form::close() !!}
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
</div>


@stop

@section('scripts')
	@yield('dtscripts')

	 <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {} );
} );
    </script>
@stop

