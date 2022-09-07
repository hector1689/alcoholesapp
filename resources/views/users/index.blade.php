@extends('layouts.app')
@section('title', 'Usuarios')
@section('estilos')
	<link href="/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
@endsection
@section('main')
	<!--begin::Card-->
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<div class="card card-custom gutter-b">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">
					Listado de usuarios
				</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Dropdown-->				<!--begin::Button-->
				<a href="{{route('users.create')}}" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<circle fill="#000000" cx="9" cy="15" r="6"/>
							<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
						</g>
					</svg><!--end::Svg Icon--></span>	Nuevo usuario
				</a>
				<!--end::Button-->
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-bordered table-checkable" id="usuarios">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Usuario</th>
						<th>Fecha</th>
						<th>Tipo</th>
					<!-- 	<th>Estatus</th> -->
            <!-- <th>Origen</th> -->
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
</div>
	<!--end::Card-->
@endsection

@section('scripts')
	<script src="/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>

	<script>
	var table;
	$(document).ready(function() {
	    table = $('#usuarios').DataTable({
	    processing: true,
	    serverSide: true,
	    ajax: {
	      url: "{{ route('users.index') }}",
	    },
	    language: {
	            "sProcessing":    "Procesando...",
	            "lengthMenu": "Mostrando _MENU_ registros por página",
	            "zeroRecords": "No hay registros para mostrar - sorry :(",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "No hay registros disponibles",
	            "infoFiltered": "(filtrado de _MAX_ registros totales)",
	            "sSearch":        "Buscar:",
	            "oPaginate": {
	                "sFirst":    "Primero",
	                "sLast":    "Último",
	                "sNext":    "Siguiente",
	                "sPrevious": "Anterior"
	              },
	            "sLoadingRecords": "Cargando...",
	        },
	    columns: [
	      { data: 'id', name: 'id', visible: false},
	      { data: 'name', name: 'name'},
	      { data: 'email', name: 'email' },
	      { data: 'username', name: 'username' },
	      { data: 'fecha', name: 'fecha' },
				{ data: 'roles', name: 'roles' },
	    /*  { data: 'estatus', name: 'estatus' },*/
      /*  { data: 'origen', name: 'origen' },*/
	      { data: 'action', name: 'action', orderable: false},
	    ],
	    order: []
	  });

	});

	function borrar(id){
		//console.log(id);

		Swal.fire({
			title: "¿Esta seguro de Eliminar el registro?",
			text: "No se podrá revertir",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar"
	}).then(function(result) {
			if (result.value) {
				$.ajax({
					 type:"POST",
					 url:"/dashboard/users/borrar",
					 headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 },
					 data:{
						 id:id,
					 },
						success:function(data){
							Swal.fire("", data.success, "success").then(function(){
								table.ajax.reload();
							});
						}
				});
			}
	})
	}
	</script>

@endsection
