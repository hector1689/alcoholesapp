@extends('layouts.app')
@section('title', 'Pagos Mensuales')
@section('main')
<div class="card card-custom gutter-b">
<div class="card-header flex-wrap border-0 pt-6 pb-0">
	<div class="card-title">
		<h3 class="card-label">Reporte de pagos por Mes
		</h3>
	</div>
<!-- 	<div class="card-toolbar">

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

<!-- 							<div class="dropdown bootstrap-select form-control">


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
								<option value="0">Año actual</option>
								<option value="1">2021</option>
								<option value="2">2020</option>
								<option value="3">2019</option>
								<option value="3">2018</option>
								<option value="3">2017</option>
							</select>
<!-- 							<div class="dropdown bootstrap-select form-control">
							

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
<!-- 							<div class="dropdown bootstrap-select form-control">

							<button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_type" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Todos</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div> -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-xl-1 mt-5 mt-lg-0">
				<a  class="btn btn-light-primary px-6 font-weight-bold" onclick="buscar()">Buscar</a>
			</div>
		</div>
	 </div>
  </div>
</div>
<div id="tablaestatal">
	<div class="row">
	  <div class="col-xl-6">
	    <div class="card card-custom bg-light-danger card-stretch gutter-b">
	      <div class="card-body">
	        <span class="svg-icon svg-icon-2x svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
	          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	              <polygon points="0 0 24 0 24 24 0 24"></polygon>
	              <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
	              <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
	            </g>
	          </svg><!--end::Svg Icon-->
	        </span>
	        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block" id="total_recibos"></span>
	        <span class="font-weight-bold text-muted font-size-sm"> Total de Pagos Recibidos </span>
	    </div>
	  </div>
	</div>

	<div class="col-xl-6">
	  <div class="card card-custom bg-light-success card-stretch gutter-b">
	      <div class="card-body">
	          <span class="svg-icon svg-icon-2x svg-icon-success">
	            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
	            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	            <rect x="0" y="0" width="24" height="24"></rect>
	            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
	              <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
	          </g>
	        </svg>
	      </span>
	          <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block" id="total_importe"></span>
	          <span class="font-weight-bold text-muted  font-size-sm">Total Recaudación en el mes</span>
	    </div>
	  </div>
	</div>


	<!-- <div class="col-lg-12">

	  <div class="card card-custom gutter-b">

	    <div class="card-header h-auto">
	   
	      <div class="card-title py-5">
	        <h3 class="card-label">
	          Importes por municipio
	        </h3>
	      </div>
	      
	    </div>
	    
	    <div class="card-body">
	    
	      <div id="pagos_meses"></div>
	  
	    </div>
	  </div>
	  
	</div> -->


	</div>


</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

	$('#municipio').select2();
  $('#mes').select2();
  $('#anio').select2();
  $('#tablaestatal').hide();



 function buscar(){
 	var  municipio= $('#municipio').val();
  var  mes= $('#mes').val();
  var  anio= $('#anio').val();
  $('#tablaestatal').show();

/*  if (municipio == '' || mes == '' || anio == '') {
  	Swal.fire("Lo Sentimos", 'Campos no seleccionados o vacios', "warning");
  }else{*/
  	  				////////////// total pago recibos ///////////////////////
          $.ajax({
               type:"POST",
               url:"/totalpagosrecibos",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data:{
                   municipio:municipio,
                   mes:mes,
                   anio:anio,
                 },
                success:function(data){
 										console.log(data.totalpagos)
/*
 										if (data == '') {
 											var numero = 0;
 										}else{
 											var numero = data;
 										}*/

 										$('#total_recibos').html('<strong> $'+data.totalpagos+'</strong>')
                }
          });

          //////////////// total recaudacion del mes ////////////////////////

          $.ajax({
               type:"POST",
               url:"/Importedelmes",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data:{
                   municipio:municipio,
                   mes:mes,
                   anio:anio,
                 },
                success:function(data){
 										console.log(data.TotalPagado)

 										if (data.TotalPagado == null) {
 											var total = 0;
 										}else{
 											var total = data.TotalPagado;
 										}

 										$('#total_importe').html('<strong> $'+total+'</strong>')

                }
          });
  /*}*/



 }

const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

grafica1();

function grafica1() {
  const apexChart = "#pagos_meses";
  var options = {
    series: [{
      name: "Pagos",
      data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
    }],
    chart: {
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'straight'
    },
    grid: {
      row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
      },
    },
    xaxis: {
      categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre'],
    },
    colors: [primary]
  };

  var chart = new ApexCharts(document.querySelector(apexChart), options);
  chart.render();
}
</script>
@endsection
