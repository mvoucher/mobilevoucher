@extends('template')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Agro Dealers' ?>

@if (session('theuser')=='admin')
<div class="row small-spacing">
<div class="col-xs-12">
<div class="top-content">
		<a href="{{ route('productlist.create') }}"><button class="btn btn-xs btn-primary">Add New Product</button></a>
</div>
</div>
</div>
@endif

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Category</th>
								@if (session('theuser')=='admin')
								<th width="50px">Edit</th>
								<th width="50px">Delete</th>
								@endif
							</tr>
						</thead>
						<tbody>
						@foreach ($get_pdts as $product)
							<tr>
								<td>{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->category }}</td>
								@if (session('theuser')=='admin')
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								@endif
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

