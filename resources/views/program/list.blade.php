@extends('template')
@inject('program_methods', 'App\Http\Controllers\ProgrammeController')

@include('partials/dtables')

@section('styles')	
	@yield('dtstyles')
@stop

@section('main')
<?php $page_name = 'List of Programmes' ?>

<div class="row small-spacing">
		<div class="col-xs-12">
				<div class="box-content table-responsive">
					
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Organisation</th>
								<th>District</th>
								<th>Date added</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($programmes as $program)
							<tr>
								<td>{{ $program->name }}</td>
								<td>{{ $program_methods->getProgOrganisation($program->org_id)  }}</td>
								<td>{{ $program->district }}</td>
								<td>{{ date("d-m-Y", strtotime($program->created_at)) }}</td>					
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

