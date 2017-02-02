@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'Voucher Types' ?>

<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('voucher.create') }}"><button class="btn btn-xs btn-primary">Create New Voucher Type </button></a>
		{{-- <a href=""><button class="btn btn-xs btn-primary"> </button></a> --}}
</div>
</div>
</div>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
				

					 @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
  @endif

					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Category</th>
								<th>Color</th>
								<th>Value</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($voucher_types as $voucher_type)
							<tr>
								<td>{{ $voucher_type->name }}</td>
								<td>{{ $voucher_type->category }}</td>
								<td>{{ $voucher_type->color }}</td>
								<td>{{ number_format($voucher_type->value) }}</td>
								<td>   
								<div class="btn-group">
						<a class="btn btn-warning btn-xs" href="{{ route('voucher.edit',$voucher_type->id) }}"><i class="fa fa-edit" title="Edit"></i></a>
								</div></td>
								<td>
		{!! Form::open(['method' => 'DELETE', 'route' => ['voucher.destroy', $voucher_type->id]]) !!}
        {!! Form::destroy('Delete', 'Are you sure you want to delete this voucher type') !!}
        {!! Form::close() !!}
								</td>
							</tr>
						@endforeach
							
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

