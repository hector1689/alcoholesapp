@extends('layouts.app')
@section('title', 'Principales Contribuyentes')
@section('estilos')
  <link href="assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
@endsection
@section('main')

  <div class="card card-custom gutter-b">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
  	<div class="card-title">
  		<h3 class="card-label">Reporte de pagos por Mes
  		</h3>
  	</div>
<!--   	<div class="card-toolbar">
  	
  		<div class="dropdown dropdown-inline mr-2">
  			<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  			<span class="svg-icon svg-icon-md">
  			
  				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
  					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
  						<rect x="0" y="0" width="24" height="24"></rect>
  						<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
  						<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
  					</g>
  				</svg>
  			
  			</span>Exportar
  		</button>

  	
  			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
  				
  				<ul class="navi flex-column navi-hover py-2">
  					<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Escoge una opcion:</li>
  					<li class="navi-item">
  						<a href="#" class="navi-link">
  							<span class="navi-icon">
  								<i class="la la-print"></i>
  							</span>
  							<span class="navi-text">Imprimir</span>
  						</a>
  					</li>
  					<li class="navi-item">
  						<a href="#" class="navi-link">
  							<span class="navi-icon">
  								<i class="la la-copy"></i>
  							</span>
  							<span class="navi-text">Copiar</span>
  						</a>
  					</li>
  					<li class="navi-item">
  						<a href="#" class="navi-link">
  							<span class="navi-icon">
  								<i class="la la-file-excel-o"></i>
  							</span>
  							<span class="navi-text">Excel</span>
  						</a>
  					</li>
  				</ul>
  				
  			</div>
  		
  		</div>
  		
  	</div> -->
  </div>
  <div class="card-body">
  	<div class="mb-7">
  		<div class="row align-items-center">
  			<div class="col-lg-11 col-xl-11">
  				<div class="row align-items-center">

  					<div class="col-md-4 my-2 my-md-0">
  						<div class="d-flex align-items-center">
  							<label class="mr-3 mb-0 d-none d-md-block">Mes:</label>
                <select class="form-control" id="mes">
                  <option value="0">Todos</option>
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>

                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>

                </select>

<!--   							<div class="dropdown bootstrap-select form-control">


  							<button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_status" title="All">
  								<div class="filter-option">
  									<div class="filter-option-inner">
  										<div class="filter-option-inner-inner">Todos los meses</div>
  									</div>
  								</div>
  							</button>
  							<div class="dropdown-menu ">
  								<div class="inner show" role="listbox" id="bs-select-1" tabindex="0">
  									<ul class="dropdown-menu inner show" role="presentation"></ul>
  								</div>
  							</div>
  						</div> -->
  						</div>
  					</div>

  					<div class="col-md-4 my-2 my-md-0">
  						<div class="d-flex align-items-center">
  							<label class="mr-3 mb-0 d-none d-md-block">Año:</label>
                <select class="form-control" id="anio">
                  <option value="0">Todos</option>
                  <option value="1">2021</option>
                  <option value="2">2020</option>
                  <option value="3">2019</option>
                  <option value="3">2018</option>
                  <option value="3">2017</option>
                </select>
<!--   							<div class="dropdown bootstrap-select form-control">


  							<button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_type" title="All">
  								<div class="filter-option">
  								<div class="filter-option-inner">
  									<div class="filter-option-inner-inner">Año actual
  									</div>
  								</div>
  								</div>
  							</button>
  				<div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div>
  			</div> -->
  						</div>
  					</div>
  					<div class="col-md-4 my-2 my-md-0">
  						<div class="d-flex align-items-center">
  							<label class="mr-3 mb-0 d-none d-md-block">Municipio:</label>
                <select class="form-control" id="municipio">
                  <option value="0">Todos</option>
                  <option value="1">Victoria</option>
                  <option value="2">Abasolo</option>
                  <option value="3">Aldama</option>
                  <option value="4">Altamira</option>
                  <option value="5">Ant Morelos</option>
                  <option value="6">Burgos</option>
                  <option value="7">Bustamante</option>
                  <option value="8">Camargo</option>
                  <option value="9">Casas</option>
                  <option value="10">Cruillas</option>
                  <option value="11">Gomes Farias</option>
                  <option value="12">Gonzalez</option>
                  <option value="13">Guemez</option>

                  <option value="14">Guerrero</option>
                  <option value="15">Hidalgo</option>
                  <option value="16">Jaumave</option>
                  <option value="17">Jimenez</option>
                  <option value="18">Llera</option>
                  <option value="19">Madero</option>
                  <option value="20">Mainero</option>
                  <option value="21">Mante</option>
                  <option value="22">Matamoros</option>
                  <option value="23">Mendez</option>
                  <option value="24">Mier</option>
                  <option value="25">Miquihuana</option>
                  <option value="26">Nuevo Laredo</option>
                  <option value="27">Nuevo Morelos</option>
                  <option value="28">Ocampo</option>

                  <option value="29">Padilla</option>
                  <option value="30">palmillas</option>
                  <option value="31">Reynosa</option>
                  <option value="32">San Carlos</option>
                  <option value="33">San Fernando</option>
                  <option value="34">San Nicolas </option>
                  <option value="35">Soto La Marina</option>
                  <option value="36">Tampico</option>
                  <option value="37">Tula</option>
                  <option value="38">Villagran</option>
                  <option value="39">XIco</option>
                  <option value="40">Abasolo</option>
                  <option value="41">Vhermoso</option>
                  <option value="42">Miguel Aleman</option>
                  <option value="43">Diaz Ordaz</option>

                </select>
<!--   							<div class="dropdown bootstrap-select form-control">

  							<button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_type" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Todos</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div> -->
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-1 col-xl-1 mt-5 mt-lg-0">
  				<a class="btn btn-light-primary px-6 font-weight-bold" onclick="buscar()">Buscar</a>
  			</div>
  		</div>
  	 </div>
    </div>
  </div>

  <div id="tablaestatal">
      
    <div class="card card-custom gutter-b">
    	<div class="card-header flex-wrap py-3">
    		<div class="card-title">
    			<h3 class="card-label">
    				<span class="d-block text-muted pt-2 font-size-sm">Ordenado de forma descendente por el importe pagado</span>
    			</h3>
    		</div>
  <!--   		<div class="card-toolbar">
    		
    <div class="dropdown dropdown-inline mr-2">
    	<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    		<span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"></rect>
            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
        </g>
    </svg></span>		Exportar
    	</button>

    
    	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
    
    		<ul class="navi flex-column navi-hover py-2">
    			<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
    		        Escoge una opcion:
    		    </li>
    			<li class="navi-item">
    				<a href="#" class="navi-link">
    					<span class="navi-icon"><i class="la la-print"></i></span>
    					<span class="navi-text">Imprmir</span>
    				</a>
    			</li>
    			<li class="navi-item">
    				<a href="#" class="navi-link">
    					<span class="navi-icon"><i class="la la-copy"></i></span>
    					<span class="navi-text">Copiar</span>
    				</a>
    			</li>
    			<li class="navi-item">
    				<a href="#" class="navi-link">
    					<span class="navi-icon"><i class="la la-file-excel-o"></i></span>
    					<span class="navi-text">Excel</span>
    				</a>
    			</li>
    			<li class="navi-item">
    				<a href="#" class="navi-link">
    					<span class="navi-icon"><i class="la la-file-text-o"></i></span>
    					<span class="navi-text">CSV</span>
    				</a>
    			</li>
    			<li class="navi-item">
    				<a href="#" class="navi-link">
    					<span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
    					<span class="navi-text">PDF</span>
    				</a>
    			</li>
    		</ul>
    	
    	</div>
    	
    </div>
   <a href="#" class="btn btn-primary font-weight-bolder">
    	<span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"></rect>
            <circle fill="#000000" cx="9" cy="15" r="6"></circle>
            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
        </g>
    </svg></span>	Nuevo
    </a> 
    		</div> -->
    	</div>
    	<div class="card-body">
    		<!--begin: Datatable-->

          <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-checkable dataTable no-footer dtr-inline" id="kt_datatable" role="grid" aria-describedby="kt_datatable_info" style="width: 1070px;">
                     <thead>
                          <tr role="row">
      <!--                   <th class="dt-left sorting_disabled" rowspan="1" colspan="1" style="width: 23px;" aria-label="Record ID">

                          <label class="checkbox checkbox-single">
                              <input type="checkbox" value="" class="group-checkable">
                              <span></span>
                          </label>
                        </th> -->
                      <!--   <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 38px;"
                        aria-sort="descending" aria-label="Cuenta Estatal: activate to sort column ascending">Cuenta Estatal</th> -->

                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 54px;"
                         aria-label="Nombre: activate to sort column ascending">Nombre</th>

                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width:
                        41px;" aria-label="rfc: activate to sort column ascending">Rfc</th>

                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width:
                        54px;" aria-label="Correo electronico: activate to sort column ascending">Cuenta Estatal</th>

                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width:
                         66px;" aria-label="Municipio: activate to sort column ascending">Municipio</th>

                        <th class="sorting_desc" tabindex="0"  rowspan="1" colspan="1" style="width:
                        65px;" aria-label="Importe Pagado: activate to sort column ascending">Importe Pagado</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>

                      
                    </table>
                  </div>
                </div>
            </div>
        


      </div>
    </div>
  </div>




@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/admin/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<script>
  var tabla;
  $('#municipio').select2();
  $('#mes').select2();
  $('#anio').select2();

  $('#tablaestatal').hide();

  function buscar(){

    var  municipio= $('#municipio').val();
    var  mes= $('#mes').val();
    var  anio= $('#anio').val();


  $('#tablaestatal').show();



      /////////////////////////////////////////////////////////////

            $(function() {
            tabla = $('#kt_datatable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "bDestroy": true,
              order: [[0, 'desc']],

              ajax:{
                  'type': 'POST',
                  'headers': {'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
                  'url' : '/traercontribuyentes',
                  'data':{
                            municipio:municipio,
                            mes:mes,
                            anio:anio,
                  }
              },
              columns: [
                { data: 'nombre_propietario', name: 'nombre_propietario'},
                { data: 'rfc', name: 'rfc'},
                { data: 'cuenta_estatal', name: 'cuenta_estatal'},
                { data: 'municipio', name: 'municipio'},
                { data: 'total_pagado', name: 'total_pagado'},
               
              ],
              language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
            });
            });



    


  }

  

</script>
@endsection
