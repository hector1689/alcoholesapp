<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsuariosController extends Controller
{
      // function __construct(){
      //     date_default_timezone_set("America/Monterrey");
      //     setlocale(LC_TIME, 'es_ES.UTF-8');
      //     Carbon::setLocale('es');
      // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
       if ($request->ajax()) {
         $usuarios = User::orderBy('created_at','DESC')
         ->select('id', 'name', 'username', 'email', 'created_at')
           ->get();
           return datatables()->of($usuarios)
           ->addColumn('roles', function($data){
              if(!empty($user->getRoleNames())){
                foreach($user->getRoleNames() as $v){
                  return '<span class="label label-inline label-light-success font-weight-bold">'.$v.'</span>';
                  }
                }
           })
           ->addColumn('estatus', function($data){
             return '<span class="label label-lg font-weight-bold label-light-primary label-inline">Pendiente</span>';
           })
           ->addColumn('action', function($data){
             // return '<i class="flaticon2-pen text-primary"></i> <i class="icon-2x flaticon-eye"></i>';
             return '<div class="dropdown dropdown-inline">
	                      	                        	<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown" aria-expanded="false">
	                      	                        		<span class="svg-icon svg-icon-md">
	                      	                        			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                      	                        				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                      	                        					<rect x="0" y="0" width="24" height="24"></rect>
	                      	                        					<path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000">
	                      	                        					</path>
	                      	                        				</g>
	                      	                        			 </svg>
	                      	                        		 </span>
	                      	                        	</a>
	                      	                        	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
	                      	                        		<ul class="navi flex-column navi-hover py-2">
	                      	                        			<li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">     Escoge una accion:
	                      	                        			</li>
	                      	                        			<li class="navi-item">
	                      	                        			 	<a href="#" class="navi-link">
	                      	                        			 		<span class="navi-icon"><i class="la la-print"></i></span>
	                      	                        			 		<span class="navi-text">Imprimir</span>
	                      	                        			 	</a>
	                      	                        			</li>
	                      	                        			 <li class="navi-item">
	                      	                        			 	<a href="#" class="navi-link">
	                      	                        			 		<span class="navi-icon">
	                      	                        			 			<i class="la la-copy">  </i>
	                      	                        			 		</span>
	                      	                        			 		<span class="navi-text">Copiar</span>
	                      	                        			 	</a>
	                      	                        			 </li>
	                      	                        			<li class="navi-item">
	                      	                        			  	<a href="#" class="navi-link">
	                      	                        			  		<span class="navi-icon"><i class="la la-file-excel-o"></i>
	                      	                        			  		</span>
	                      	                        			  		<span class="navi-text">Excel</span>
	                      	                        			  	</a>
	                      	                        			</li>
	                      	                        			<li class="navi-item">
	                      	                        			  	<a href="#" class="navi-link">
	                      	                        			  		<span class="navi-icon"><i class="la la-file-text-o"></i></span>
	                      	                        			  		<span class="navi-text">CSV</span>	                                        </a>
	                      	                        			</li>
	                      	                        			<li class="navi-item">
	                  	                        			  		<a href="#" class="navi-link">
	                  	                        			  			<span class="navi-icon"><i class="la la-file-pdf-o"></i>
	                  	                        			  		</span>
	                  	                        			  		<span class="navi-text">PDF</span>
	                  	                        			  		</a>
	                      	                        			</li>
	                      	                        		</ul>
	                      	                        	</div>

	              	                        		</div>';
           })
           ->rawColumns(['action', 'roles', 'estatus'])
           ->make(true);
         }
         return view('usuarios.index');
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('usuarios.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
