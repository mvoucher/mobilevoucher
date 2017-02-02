@extends('template')
@inject('field_methods', 'App\Http\Controllers\FieldController')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Field Officers' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					<h4 class="box-title">{{-- ..... --}}</h4>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Programme</th>
								<th>District</th>
								<th>Date added</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($programmes_mngr as $program)
							<tr>
								<td>{{ $program->name }}</td>
								<td>{{ $field_methods->getFieldProg($program->prog_id)  }}</td>
								<td>{{ $program->district }}</td>
								<td>{{ date("d-m-Y", strtotime($program->created_at)) }}</td>
							</tr>						@endforeach
							
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

