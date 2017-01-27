@section('dtstyles')
<!-- Data Tables -->
	{!! HTML::style('assets/plugin/datatables/media/css/dataTables.bootstrap.min.css') !!}
	{!! HTML::style('assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') !!}
	{!! HTML::style('assets/plugin/datatables/buttons/buttons.dataTables.css') !!}
@stop

@section('dtscripts')
<!-- Data Tables -->
	{!! HTML::script('assets/plugin/datatables/media/js/jquery.dataTables.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/media/js/dataTables.bootstrap.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') !!}
	
	{!! HTML::script('assets/plugin/datatables/buttons/dataTables.buttons.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/buttons/jszip.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/buttons/pdfmake.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/buttons/vfs_fonts.js') !!}
	{!! HTML::script('assets/plugin/datatables/buttons/buttons.html5.min.js') !!}
	{!! HTML::script('assets/plugin/datatables/buttons/buttons.colVis.min.js') !!}


   
@stop