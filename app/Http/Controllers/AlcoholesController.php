<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use app\Http\Controllers\ConexionController;
use Storage;
class AlcoholesController extends Controller
{
  public $id_alcoholes;
  public $vRfc;
  public $mensaje;
  public $msj_declaracion;
  public $respuesta;
  public $id_ejecutor;
  public $password;
  public $municipio;
  public $id_requisito;
  public $id_infraccion;
  public $id_dependencia;
  public $ArrEjecutoresGuardados;
  public $ArrGuardados;

  public $Datos_Guardados;


/*
    GetEjecutores() sacara el listado de todos los verificadores util para combos

    GetInspectores() sacara el listado de todos los verificadores util para combos

     GetMunicipios() sacara el listado de  municipios de tamaulipas  con id_municipio y descripcion

    GetCatalogorequisitos sacara el listado de requisitos util en ventana de alta de multas.
    GetCatalogodependencias sacara listado de dependencias util en alta de multas.
    GetCatalogoMotivos () sacara motivos para alta de multas de alcoholes.
    fnCalculaImporte($municipio, $fecha_determinacion, $id_infraccion, $califica) utilpara alta de multas regrsa importe de la multa y fundamento de sancion y multa.
    GetDatoSimples($municipio, $folio,$tipo) sacara la primer consulta datos del negocio  que se usan como encabezados.

    GetDatosGenerales($municipio, $id_alcoholes) saca datos mas completos para pantalla datos generales.

    GetRequisitos($municipio,$id_alcoholes) obtiene los reuisitos ya presentados de un negocio para pantalla requisitos presentados

    GetpagosRealizados($municipio,$id_alcoholes) sacara los pagos realizados de un negocio

    GetAdeudos($id_alcoholes) sacara lo adeudoso multas  de un negocio

    GetVerificacionesPendientes($municipio, $id_ejecutor) obtendra la verificaciones pendientes de un verificador.

    GetVerificacionesRealizadas($municipio, $id_ejecutor) obtendra la verificaciones ya realizadas por verificaor

    GetResumenVerificaciones($municipio, $id_ejecutor, $fecha_inicio, $fecha_fin) total de verificaciones pendientes y realizadas pantalla estadisticas

    Gethistorial($id_alcoholes ) obtiene historial , horarios de cierre y apertura

    ----prceso de almacenado
      fnGrabaVerificacion(Request $request ) funcion que guarda la verificacion proxima a realizar por parte del supervisor



      fnGrabaVerificaCroquis(Request $request ) graba croquis de la verificacion

      fnGrabaMovimientosVerifica(Request $request ) graba las mediciones realizadas en la verificacion

      fnInsertaMulta(Request $request ) graba la multa determinada

      fnInsertaRequisto(Request $request ) inserta un nuevo requisito

        fnFinalizaVerificacion(Request $request ) finaliza verificacion cambiando estatus a completada pantalla verificaciones_negocio_1

     */



//saca el listado de verificadores para llenar combo como
  // en la pantalla verificadores1 GRUPO 6 VERIFICADORES , GRUPO 98 INSPECTOR ALCOHOLES
     function GetEjecutores()
  {
      try {

               $vIdMuniConec=1;

               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_verifica_datos = oci_parse($conec_muni,"SELECT  id_ejecutor,
                NOMBRE_EJECUTOR,
                PASSWORD
                from ejecat_ejecutor
                where  id_grupo  = 6
                and fecha_baja is null
                ORDER BY NOMBRE_EJECUTOR");


               oci_execute($str_verifica_datos);

               oci_close($conec_muni);

              $ArrEjecutorGuardado=array();
              $ArrEjecutoresGuardados =array();
              $cuantos=0;

               while ($row = oci_fetch_array($str_verifica_datos))
               {
                 $cuantos=$cuantos+1;

               $id_ejecutor= $ArrEjecutorGuardado['id_ejecutor']=$row[0];
               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $ArrEjecutorGuardado['nombre_ejecutor']=$ReemplazaLetra->Variable;
               $password =$ArrEjecutorGuardado["password"]=$row[2];

               $ArrEjecutoresGuardados[(string)$cuantos]=$ArrEjecutorGuardado;


                }
            oci_free_statement($str_verifica_datos);


            if ($cuantos > 0)
              {
                  $Datos_Guardados=$ArrEjecutoresGuardados;
              }


          return response()->json(["success"=> count($ArrEjecutoresGuardados)>0, "data"=> $ArrEjecutoresGuardados], 200);
        }
      catch (Exception $e) {

      }
      $this->mensaje=$e;


           $this->mensaje='ejecutores no disponibles por el momento, favor de reportarlo';

      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

     }



    function GetInspectores()
    {
      try {

               $vIdMuniConec=1;

               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_verifica_datos = oci_parse($conec_muni,"SELECT  id_ejecutor,
                NOMBRE_EJECUTOR,
                PASSWORD
                from ejecat_ejecutor
                where  id_grupo  = 98
                and fecha_baja is null
                ORDER BY NOMBRE_EJECUTOR");


               oci_execute($str_verifica_datos);

               oci_close($conec_muni);

              $ArrEjecutorGuardado=array();
              $ArrEjecutoresGuardados =array();
              $cuantos=0;

               while ($row = oci_fetch_array($str_verifica_datos))
               {
                 $cuantos=$cuantos+1;

               $id_ejecutor= $ArrEjecutorGuardado['id_ejecutor']=$row[0];
               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $ArrEjecutorGuardado['nombre_ejecutor']=$ReemplazaLetra->Variable;
               $password =$ArrEjecutorGuardado["password"]=$row[2];

               $ArrEjecutoresGuardados[(string)$cuantos]=$ArrEjecutorGuardado;


                }
            oci_free_statement($str_verifica_datos);


            if ($cuantos > 0)
              {
                  $Datos_Guardados=$ArrEjecutoresGuardados;
              }


          return response()->json(["success"=> count($ArrEjecutoresGuardados)>0, "data"=> $ArrEjecutoresGuardados], 200);
      }
      catch (Exception $e) {

      }
      $this->mensaje=$e;


           $this->mensaje='ejecutores no disponibles por el momento, favor de reportarlo';

      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

    }

     function GetMunicipios()
    {
      try {

               $vIdMuniConec=1;

               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_verifica_datos = oci_parse($conec_muni," SELECT  id_municipio, desc_ofnafiscal
                from grlpar_ofnafiscal
                where  id_ofnafiscal < 44
                order by id_municipio");


               oci_execute($str_verifica_datos);

               oci_close($conec_muni);

              $ArrGuardado=array();
              $ArrGuardados =array();
              $cuantos=0;

               while ($row = oci_fetch_array($str_verifica_datos))
               {
                 $cuantos=$cuantos+1;

               $ArrGuardado['id_municipio']=$row[0];

               $ArrGuardado["descripcion_municipio"]=$row[1];

               $ArrGuardados[(string)$cuantos]=$ArrGuardado;


                }
            oci_free_statement($str_verifica_datos);




          return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
      }
      catch (Exception $e) {

      }
      $this->mensaje=$e;


           $this->mensaje='ejecutores no disponibles por el momento, favor de reportarlo';

      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

    }




//OBTIENE CATALOGO DE REQUISITOS
     //pantalla añadir requisito
   function GetCatalogoRequisitos()
  {
      try {

               $vIdMuniConec=1;

               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_datos = oci_parse($conec_muni,"SELECT  ID_TIPOREQUISITO,
                upper(DESC_TIPOREQUISITO)
                FROM ALCCAT_TIPO_REQUISITO
                order by desc_tiporequisito");

               oci_execute($str_datos);
               oci_close($conec_muni);

                $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($str_datos))
               {
               $cuantos=$cuantos+1;
               $id_requisito=$ArrGuardado["id_requisito"]=$row[0];
               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $ArrGuardado["descripcion_requisito"]=$ReemplazaLetra->Variable;

               $ArrGuardados[(string)$cuantos]=$ArrGuardado;

                }
            oci_free_statement($str_datos);


          return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
      }
      catch (Exception $e) {

      }
      $this->mensaje=$e;
      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

     }

     //OBTIENE CATALOGO DE DEPENDENCIAS
     //pantalla verificaciones_adeudos_registrados
     //autoridad que resuelve
   function GetCatalogoDependencias()
  {
      try {

               $vIdMuniConec=1;

               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_datos = oci_parse($conec_muni,"SELECT ID_DEPENDENCIA,
                DESC_DEPENDENCIA
                FROM CONCAT_DEPENDENCIA
                WHERE TIPO='C'
                AND FED_EST_MPAL='E'
                AND ID_DEPENDENCIA IN (25,34,235,229,18,19,39, 33)
                order by DESC_DEPENDENCIA");


               oci_execute($str_datos);

               oci_close($conec_muni);


                $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($str_datos))
               {
                 $cuantos=$cuantos+1;

               $id_dependencia=$ArrGuardado["id_dependencia"]=$row[0];
               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $ArrGuardado["desc_dependencia"]=$ReemplazaLetra->Variable;

               $ArrGuardados[(string)$cuantos]=$ArrGuardado;

                }
            oci_free_statement($str_datos);


          return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
      }
      catch (Exception $e) {

      }
      $this->mensaje=$e;
      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

     }



     //OBTIENE todo el catalogo de  motivos de multas
     //ejercicio_fiscal es el año de la fecha actual
     // pantalla verificaciones_adeudos_registrados motivos de la multa
   function GetCatalogoMotivos($municipio)
  {
      try {

               $vIdMuniConec=$municipio;


               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_datos = oci_parse($conec_muni," SELECT ID_INFRACCION,
                DESC_INFRACCION,
                FUND_INFRACCION,
                FUND_SANCION,
                SANCION_MIN,
                SANCION_MED,
                SANCION_MAX ,
                EJERCICIO_FISCAL from alccat_infraccion
                WHERE EJERCICIO_FISCAL =  to_number(to_char(sysdate, 'yyyy'))
                ORDER BY DESC_INFRACCION ASC");


               oci_execute($str_datos);

               oci_close($conec_muni);

                 $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($str_datos))
               {
                 $cuantos=$cuantos+1;

               $id_infraccion=$ArrGuardado["id_infraccion"]=$row[0];


               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $ArrGuardado["descripcion_infraccion"]=$ReemplazaLetra->Variable;

               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[2]));
               $ArrGuardado["fundamento_infraccion"]=$ReemplazaLetra->Variable;

               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[3]));
               $ArrGuardado["fundamento_sancion"]=$ReemplazaLetra->Variable;

               $ArrGuardado["sancion_minima"]=$row[4];
               $ArrGuardado["sancion_media"]=$row[5];
               $ArrGuardado["sancion_maxima"]=$row[6];
               $ArrGuardado["ejercicio_fiscal"]=$row[7];

                $ArrGuardados[(string)$cuantos]=$ArrGuardado;

                }
            oci_free_statement($str_datos);


          return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
      }
      catch (Exception $e) {

      }
      $this->mensaje=$e;
      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

     }



     //OBTIENE el importe en base a la fecha determinacion y el motivo y calificacion
    // enviaran municipio, fecha_determinacion, id_infraccion, calificacion (minima, media o maxima)
     //pantalla verificaciones_adeudos_registrados al escoger la calificaicion se dispara  esta para calcular importe
     //fundamnetos legal y sancion
   function fnCalculaImporte($municipio, $fecha_determinacion, $id_infraccion, $califica)
  {
      try {

               $vIdMuniConec=$municipio;


               $Conec_Muni = new Class_Conexion;
               $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
               $conec_muni=$Conec_Muni->DB_conexion;

               $str_datos = oci_parse($conec_muni,"  SELECT ID_INFRACCION,
                    DESC_INFRACCION,
                    FUND_INFRACCION,
                    FUND_SANCION,
                    EJERCICIO_FISCAL,
                    CASE UPPER('$califica')
                    WHEN 'MINIMA' THEN round(a.SANCION_MIN * b.SALARIO_MINIMO, 0)
                    WHEN 'MEDIA' THEN  round(a.SANCION_MED * b.SALARIO_MINIMO,0)
                    WHEN 'MAXIMA' THEN round(a.SANCION_MAX * b.SALARIO_MINIMO,0)
                    END importe
                    FROM alccat_infraccion a ,
                    GRLPAR_SALARIO_MINIMO b
                    WHERE
                    a.EJERCICIO_FISCAL = to_number(to_char(fecha_final, 'yyyy'))
                    and a.ejercicio_fiscal =  to_number(to_char('$fecha_determinacion', 'yyyy'))
                    and TRUNC(a.id_infraccion)= '$id_infraccion' ");


               oci_execute($str_datos);

               oci_close($conec_muni);

               $respuesta =[];

               while ($row = oci_fetch_array($str_datos))
               {

               $id_infraccion=$respuesta["id_infraccion"]=$row[0];


               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $respuesta["descripcion_infraccion"]=$ReemplazaLetra->Variable;

               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[2]));
               $respuesta["fundamento_infraccion"]=$ReemplazaLetra->Variable;

               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[3]));
               $respuesta["fundamento_sancion"]=$ReemplazaLetra->Variable;
               $respuesta["ejercicio_fiscal"]=$row[4];

               $respuesta["importe"]=$row[5];


                }
            oci_free_statement($str_datos);


          return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);
      }
      catch (Exception $e) {

      }
      $this->mensaje=$e;
      return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

     }

    //$tipo l= licencia , s = solicitud
     /*
datos simples de encabezado de ventanas ejemplo verificaciones_negocio_dg
    pantalla verificaciones3
     */

   function GetDatoSimples($municipio, $folio,$tipo )
   {

       try
       {
          // $vIdMuniConec=substr($id_negocio,0,2);
           $vIdMuniConec=$municipio;

           $Conec_Muni = new Class_Conexion;
           $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
           $conec_muni=$Conec_Muni->DB_conexion;

           $str_verifica_datos = oci_parse($conec_muni,"SELECT
                alcmae_alcoholes.id_alcoholes,
                conmae_contribuyente.nombre_completo,
                alcmae_alcoholes.nombre_comercial,
                alcmae_alcoholes.cuenta_estatal,
                conmae_contribuyente.rfc,
                alccat_giro.desc_tiponegocio,
                alcmae_alcoholes.folio_licencia,
                alcmae_alcoholes.folio_solicitud,
                alccat_giro.desc_tiponegocio
                FROM alcmae_alcoholes,
                conmae_contribuyente,
                alccat_giro,
                alcmov_rechazado
                WHERE ( alcmae_alcoholes.id_alcoholes = alcmov_rechazado.id_alcoholes (+)) and
                ( conmae_contribuyente.id_contribuyente = alcmae_alcoholes.id_contribuyente ) and
                ( alcmae_alcoholes.id_giro_alcoholes = alccat_giro.id_giro_alcoholes ) and
                ( alcmae_alcoholes.tipo_negocio = alccat_giro.tipo_negocio ) and
                ((ALCMAE_ALCOHOLES.FOLIO_LICENCIA = '$folio' AND
                '$tipo' = 'L') OR
                (ALCMAE_ALCOHOLES.FOLIO_PREREGISTRO = '$folio' AND
                '$tipo'= 'P') OR
                (ALCMAE_ALCOHOLES.FOLIO_SOLICITUD = '$folio' AND
                '$tipo' = 'S'))");


           oci_execute($str_verifica_datos);

           oci_close($conec_muni);

           $respuesta =[];

           while ($row = oci_fetch_array($str_verifica_datos))
           {

               $id_alcoholes=$respuesta["id_alcoholes"]=$row[0];
               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
               $respuesta["nombre_completo"]=$ReemplazaLetra->Variable;


               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[2]));
               $respuesta["nombre_comercial"]=$ReemplazaLetra->Variable;


               $respuesta["cuenta_estatal"]=$row[3];
               $vrfc=$respuesta["rfc"]=$row[4];

               $vrfc=str_replace("&", "'||CHR(38)||'", $vrfc);

               $ReemplazaLetra = new ClsValidaCaracteres;
               $ReemplazaLetra->fnReemplazaLetra(trim($row[5]));
               $respuesta["desc_tiponegocio"]=$ReemplazaLetra->Variable;

               $respuesta["folio_licencia"]=$row[6];
               $respuesta["folio_solicitud"]=$row[7];

               $respuesta["desc_tiponegocio"]=$row[8];


           }
           oci_free_statement($str_verifica_datos);


           return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);
       }
       catch (Exception $exc)
       {
           oci_close($conec_muni);

           $this->mensaje='Historial no disponible por el momento, favor de reportarlo';

           return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

       }

   }


    //datos generales
   /*
   datos completos para     pantalla verificaciones_negocio_dg
   */
  function GetDatosGenerales($municipio, $id_alcoholes)
  {
      try
      {
          $vIdMuniConec=$municipio;
          $Conec_Muni = new Class_Conexion;
          $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
          $conec_muni=$Conec_Muni->DB_conexion;

          $str_verifica_datos = oci_parse($conec_muni," SELECT
            conmae_contribuyente.nombre_completo,
                alcmae_alcoholes.nombre_comercial,
                alcmae_alcoholes.cuenta_estatal,
                conmae_contribuyente.rfc,
                conmae_domicilio_alterno.calle,
                conmae_domicilio_alterno.num_exterior,
                conmae_domicilio_alterno.num_interior,
                conmae_domicilio_alterno.entre_calle,
                conmae_domicilio_alterno.yla_calle,
                grlcat_colonia.desc_colonia,
                grlcat_municipio.desc_municipio,
                alccat_giro.desc_tiponegocio,
                grlcat_localidad.desc_localidad,
                alcmae_alcoholes.folio_licencia,
                to_char( alcmae_alcoholes.fecha_inicio_operacion, 'DD/MON/YYYY') as fecha_inicio_op,
                to_char( alcmae_alcoholes.fecha_baja, 'DD/MON/YYYY') as fecha_baja,
                alcmae_alcoholes.id_contribuyente,
                alcmae_alcoholes.folio_solicitud  ,
                grlcat_situacion.desc_situacion
                FROM alcmae_alcoholes,
                conmae_contribuyente,
                conmae_domicilio_alterno,
                grlcat_colonia,
                grlcat_localidad,
                grlcat_municipio,
                alccat_giro,
                grlpar_ofnafiscal,
                alcmov_rechazado  ,
                grlcat_situacion
                WHERE ( alcmae_alcoholes.id_alcoholes = alcmov_rechazado.id_alcoholes (+)) and
                ( conmae_domicilio_alterno.id_municipio = grlcat_colonia.id_municipio (+)) and
                ( conmae_domicilio_alterno.id_localidad = grlcat_colonia.id_localidad (+)) and
                ( conmae_domicilio_alterno.id_colonia = grlcat_colonia.id_colonia (+)) and
                ( conmae_domicilio_alterno.id_municipio = grlcat_municipio.id_municipio (+)) and
                ( conmae_domicilio_alterno.id_municipio = grlcat_localidad.id_municipio (+)) and
                ( conmae_domicilio_alterno.id_localidad = grlcat_localidad.id_localidad (+)) and
                ( conmae_contribuyente.id_contribuyente = alcmae_alcoholes.id_contribuyente ) and
                ( alcmae_alcoholes.id_domicilio = conmae_domicilio_alterno.id_domicilio ) and
                ( alcmae_alcoholes.id_giro_alcoholes = alccat_giro.id_giro_alcoholes ) and
                ( alcmae_alcoholes.id_situacion = grlcat_situacion.id_situacion) and
                ( alcmae_alcoholes.tipo_negocio = alccat_giro.tipo_negocio ) and
                ( grlpar_ofnafiscal.id_municipio = conmae_domicilio_alterno.id_municipio ) and
                (alcmae_alcoholes.id_alcoholes = '$id_alcoholes' ) ");



              oci_execute($str_verifica_datos);

              oci_close($conec_muni);

              $respuesta =[];

              while ($row = oci_fetch_array($str_verifica_datos))
              {

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[0]));
                $respuesta["nombre_completo"]=$ReemplazaLetra->Variable;

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
                $respuesta["nombre_comercial"]=$ReemplazaLetra->Variable;

                $respuesta["cuenta_estatal"]=$row[2];
                $vrfc=$respuesta["rfc"]=$row[3];
                $respuesta["calle"]=$row[4];
                $respuesta["num_exterior"]=$row[5];
                $respuesta["num_interior"]=$row[6];

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[7]));
                $respuesta["entre_calle"]=$ReemplazaLetra->Variable;

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[8]));
                $respuesta["yla_calle"]=$ReemplazaLetra->Variable;

                $respuesta["desc_colonia"]=$row[9];
                $respuesta["desc_municipio"]=$row[10];

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[11]));
                $respuesta["desc_tiponegocio"]=$ReemplazaLetra->Variable;

                $respuesta["desc_localidad"]=$row[12];
                $respuesta["folio_licencia"]=$row[13];
                $respuesta["fecha_inicio_op"]=$row[14];
                $respuesta["fecha_baja"]=$row[15];
                $respuesta["id_contribuyente"]=$row[16];
                $respuesta["folio_solicitud"]=$row[17];
                $respuesta["desc_situacion"]=$row[18];
            }

          oci_free_statement($str_verifica_datos);

          return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);
        }
      catch (Exception $exc)
      {
          oci_close($conec_muni);

          $this->mensaje='Datos Generales no disponibles por el momento';

          return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

      }

  }

    //obtiene requisitos presentados de un negocio por id alcoholes
  /*
    pantalla requisitos presentados
  */
    function GetRequisitos($municipio,$id_alcoholes)
    {
        try
        {
            $vIdMuniConec=$municipio;
              $Conec_Muni = new Class_Conexion;
              $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
              $conec_muni=$Conec_Muni->DB_conexion;


                $strSacaRequsitos=oci_parse($conec_muni, " SELECT alcmov_requisito.id_alcoholes,
                alcmov_requisito.folio_documento,
                alcmov_requisito.fecha_documento,
                alcmov_requisito.ejercicio_fiscal
                FROM alcmov_requisito
                WHERE ( ALCMOV_REQUISITO.ID_ALCOHOLES = '$id_alcoholes' ) AND
                ALCMOV_REQUISITO.ID_TIPO_OBLIGACION = 7
                order by ejercicio_fiscal desc ");


                oci_execute($strSacaRequsitos);

                oci_close($conec_muni);

                $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($strSacaRequsitos))
               {
                 $cuantos=$cuantos+1;

                   $id_alcoholes=$ArrGuardado["id_alcoholes"]=$row[0];
                   $ArrGuardado["folio_documento"]=$row[1];
                   $ArrGuardado["fecha_documento"]=$row[2];
                   $ArrGuardado["ejercicio_fiscal"]=$row[3];

                   $ArrGuardados[(string)$cuantos]=$ArrGuardado;

               }
               oci_free_statement($strSacaRequsitos);


               return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
        } //fin try
           catch (Exception $exc)
           {
               oci_close($conec_muni);

               $this->mensaje='Historial no disponible por el momento, favor de reportarlo';

               return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
           }
    }

    //obtiene pagos realizados
    /*
    para la pantalla verificaciones_negocio_hp
    */
    function GetpagosRealizados($municipio,$id_alcoholes)
    {
        try
        {
            $vIdMuniConec=$municipio;
              $Conec_Muni = new Class_Conexion;
              $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
              $conec_muni=$Conec_Muni->DB_conexion;


                $strSacaPagos=oci_parse($conec_muni, "SELECT
                    to_char( grlmae_pagos.fecha_pago, 'DD/MON/YYYY') as fecha_pago,
                    grlmae_pagos.ejercicio_fiscal,
                    grlcat_concepto.desc_concepto,
                    grlmae_pagos.importe_pagado
                    from grlmae_pagos,
                    grlcat_concepto,
                    grlcat_centro_cobro,
                    segmae_usuario
                    where ( grlmae_pagos.id_municipio = grlcat_centro_cobro.id_municipio ) and
                    ( grlmae_pagos.id_centrocobro = grlcat_centro_cobro.id_centrocobro ) and
                    ( grlmae_pagos.id_usuario = segmae_usuario.id_usuario ) and
                    ( grlmae_pagos.id_concepto = grlcat_concepto.id_concepto ) and
                    ( grlmae_pagos.ejercicio_fiscal = grlcat_concepto.ejercicio_fiscal ) and
                    ( grlmae_pagos.llave_padron = '$id_alcoholes' ) and
                    ( grlmae_pagos.id_tipo_obligacion = 7 )     and
                    ( grlmae_pagos.id_concepto <> 70 )
                    union all
                    select
                    to_char( fac.fecha_pago, 'DD/MON/YYYY') as fecha_pago,
                    fac.ejercicio_fiscal,
                    con.desc_concepto,
                    fac.importe_total
                    from grlmae_facturacion fac,
                    grlcat_concepto con,
                    grlcat_forma_pago forma
                    where fac.llave_padron='$id_alcoholes'
                    and fac.id_tipo_obligacion=7
                    and forma.id_forma_pago = fac.id_forma_pago
                    and (fac.id_forma_pago=5 or fac.id_forma_pago=11)
                    and fac.id_concepto = con.id_concepto
                    and fac.ejercicio_fiscal= con.ejercicio_fiscal
                    order by ejercicio_fiscal desc ");


                oci_execute($strSacaPagos);

                oci_close($conec_muni);

                $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($strSacaPagos))
               {
                 $cuantos=$cuantos+1;

                   $ArrGuardado["fecha_pago"]=$row[0];
                   $ArrGuardado["ejercicio_fiscal"]=$row[1];
                   $ArrGuardado["concepto"]=$row[2];
                   $ArrGuardado["importe_pagado"]=$row[3];

                    $ArrGuardados[(string)$cuantos]=$ArrGuardado;

               }
               oci_free_statement($strSacaPagos);


               return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
        } //fin try
           catch (Exception $exc)
           {
               oci_close($conec_muni);

               $this->mensaje='Historial de pagos no disponible por el momento, favor de reportarlo';

               return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
           }
    }

        //obtiene adeudos a pagar
    /*
obtiene los adeudos que tiene esa licencia de alcoholes
para la pantalla adeudos registrados
    */
    function GetAdeudos($id_alcoholes)
    {
        try
        {
            $vIdMuniConec=substr($id_alcoholes,0,2);
              $Conec_Muni = new Class_Conexion;
              $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
              $conec_muni=$Conec_Muni->DB_conexion;

              $strSacaAdeudos=oci_parse($conec_muni, "   SELECT
             grlmae_facturacion.ejercicio_fiscal,
             grlcat_concepto.desc_concepto,
             grlmae_facturacion.fecha_vencimiento,
             grlmae_facturacion.importe_total
            FROM grlmae_facturacion,
                 grlcat_concepto
            WHERE ( grlmae_facturacion.ejercicio_fiscal = grlcat_concepto.ejercicio_fiscal ) and
                     ( grlmae_facturacion.id_concepto = grlcat_concepto.id_concepto ) and
                     ( ( grlmae_facturacion.LLAVE_PADRON = '$id_alcoholes' ) AND
                     ( grlmae_facturacion.id_tipo_obligacion = 7 ) AND
                     ( grlmae_facturacion.fecha_pago is null ) ) ");


                oci_execute($strSacaAdeudos);

                oci_close($conec_muni);

                $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($strSacaAdeudos))
               {
                 $cuantos=$cuantos+1;
                   $ArrGuardado["ejercicio_fiscal"]=$row[0];
                   $ArrGuardado["concepto"]=$row[1];
                   $ArrGuardado["fecha_vencimiento"]=$row[2];
                   $ArrGuardado["importe_pagado"]=$row[3];

                   $ArrGuardados[(string)$cuantos]=$ArrGuardado;
               }
               oci_free_statement($strSacaAdeudos);


               return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
        } //fin try
           catch (Exception $exc)
           {
               oci_close($conec_muni);

               $this->mensaje='Historial de adeudos no disponible por el momento';

               return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
           }
    }


    //VERIFICACIONES PENDIENTES POR EJECUTOR
    //71 ID_SITUACION = PENDIENTE
    /*
    pantalla verificaciones2
    */
    function GetVerificacionesPendientes($municipio, $id_ejecutor)
    {
        try
        {
            $vIdMuniConec=$municipio;
              $Conec_Muni = new Class_Conexion;
              $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
              $conec_muni=$Conec_Muni->DB_conexion;

              $strSaca=oci_parse($conec_muni, " SELECT
                b.id_alcoholes,
                C.NOMBRE_COMPLETO,
                B.NOMBRE_COMERCIAL,
                A.FECHA_DEBE_VISITAR
                FROM  SIATT.ALCMAE_VERIFICACION A,
                ALCMAE_ALCOHOLES B,
                CONMAE_CONTRIBUYENTE  C
                WHERE  A.ID_ALCOHOLES = B.ID_ALCOHOLES
                AND B.ID_CONTRIBUYENTE  = C.ID_CONTRIBUYENTE
                AND A.ID_SITUACION =71
                AND A.ID_EJECUTOR = '$id_ejecutor'
                ORDER BY  A.FECHA_DEBE_VISITAR DESC  ");


                oci_execute($strSaca);

                oci_close($conec_muni);

               $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($strSaca))
               {
                 $cuantos=$cuantos+1;

                  $ArrGuardado["id_alcoholes"]=$row[0];
                   $ReemplazaLetra = new ClsValidaCaracteres;
                   $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
                   $ArrGuardado["nombre_completo"]=$ReemplazaLetra->Variable;

                   $ReemplazaLetra = new ClsValidaCaracteres;
                   $ReemplazaLetra->fnReemplazaLetra(trim($row[2]));
                   $ArrGuardado["nombre_comercial"]=$ReemplazaLetra->Variable;
                   $ArrGuardado["fecha_debe_visitar"]=$row[3];
                   $ArrGuardados[(string)$cuantos]=$ArrGuardado;

               }
               oci_free_statement($strSaca);


               return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
        } //fin try
           catch (Exception $exc)
           {
               oci_close($conec_muni);

               $this->mensaje='Historial de pendientes  no disponible por el momento';

               return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
           }
    }

     //VERIFICACIONES REALIZADAS POR EJECUTOR
    //72 VERIFICADAS
    //pantalla verificaciones realizadas
    function GetVerificacionesRealizadas($municipio, $id_ejecutor)
    {
        try
        {
            $vIdMuniConec=$municipio;
              $Conec_Muni = new Class_Conexion;
              $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
              $conec_muni=$Conec_Muni->DB_conexion;

              $strSaca=oci_parse($conec_muni, " SELECT
                b.id_alcoholes,
                C.NOMBRE_COMPLETO,
                B.NOMBRE_COMERCIAL,
                A.FECHA_DEBE_VISITAR
                FROM  SIATT.ALCMAE_VERIFICACION A,
                ALCMAE_ALCOHOLES B,
                CONMAE_CONTRIBUYENTE  C
                WHERE  A.ID_ALCOHOLES = B.ID_ALCOHOLES
                AND B.ID_CONTRIBUYENTE  = C.ID_CONTRIBUYENTE
                AND A.ID_SITUACION =72
                AND A.ID_EJECUTOR = '$id_ejecutor'
                ORDER BY  A.FECHA_DEBE_VISITAR DESC  ");


                oci_execute($strSaca);

                oci_close($conec_muni);

                 $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($strSaca))
               {
                 $cuantos=$cuantos+1;


                 $ArrGuardado["id_alcoholes"]=$row[0];
                   $ReemplazaLetra = new ClsValidaCaracteres;
                    $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
                    $ArrGuardado["nombre_completo"]=$ReemplazaLetra->Variable;

                    $ReemplazaLetra = new ClsValidaCaracteres;
                    $ReemplazaLetra->fnReemplazaLetra(trim($row[2]));
                    $ArrGuardado["nombre_comercial"]=$ReemplazaLetra->Variable;
                   $ArrGuardado["fecha_debe_visitar"]=$row[3];

                    $ArrGuardados[(string)$cuantos]=$ArrGuardado;

               }
               oci_free_statement($strSaca);


               return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
        } //fin try
           catch (Exception $exc)
           {
               oci_close($conec_muni);

               $this->mensaje='Historial de Verificadas no disponible por el momento';

               return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
           }
    }



     //estadisticas REALIZADAS POR EJECUTOR
    // pantalla estadisticas
    function GetResumenVerificaciones($municipio, $id_ejecutor, $fecha_inicio, $fecha_fin)
    {
        try
        {
            $vIdMuniConec=$municipio;
              $Conec_Muni = new Class_Conexion;
              $Conec_Muni->GetfnCon_Municipio($vIdMuniConec);
              $conec_muni=$Conec_Muni->DB_conexion;

              $strSaca=oci_parse($conec_muni, "     SELECT
                B.DESC_SITUACION situacion,
                COUNT(*) cantidad
                FROM  SIATT.ALCMAE_VERIFICACION A , GRLCAT_SITUACION  B
                WHERE   A. ID_SITUACION =B.ID_SITUACION
                AND  A.ID_EJECUTOR = '$id_ejecutor'
                and  A.fecha_debe_visitar
                between TO_DATE( '$fecha_inicio','YYYY-MM-DD')   AND TO_DATE('$fecha_fin','YYYY-MM-DD')
                --between '$fecha_inicio' and '$fecha_fin'
                GROUP BY B.DESC_SITUACION ");


                oci_execute($strSaca);

                oci_close($conec_muni);

                $ArrGuardado=array();
                $ArrGuardados =array();
                $cuantos=0;

               while ($row = oci_fetch_array($strSaca))
               {
                 $cuantos=$cuantos+1;

                 $ArrGuardado["situacion"]=$row[0];
                  $ArrGuardado["cantidad"]=$row[1];



                  $ArrGuardados[(string)$cuantos]=$ArrGuardado;



               }
               oci_free_statement($strSaca);


               return response()->json(["success"=> count($ArrGuardados)>0, "data"=> $ArrGuardados], 200);
        } //fin try
           catch (Exception $exc)
           {
               oci_close($conec_muni);

               $this->mensaje='Resumen de situación no disponible por el momento';

               return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
           }
    }



    function Gethistorial($id_alcoholes )
    {
        try {

          $vmun=substr($id_alcoholes,0,2);
          $Conec_Mun = new Class_Conexion;
          $Conec_Mun->GetfnCon_Municipio($vmun);
          $conec_mun=$Conec_Mun->DB_conexion;

          $str_Historial = oci_parse($conec_mun, "SELECT
            alcmae_alcoholes.id_alcoholes,
            conmae_contribuyente.nombre_completo,
            alcmae_alcoholes.nombre_comercial,
            alcmae_alcoholes.cuenta_estatal,
            conmae_contribuyente.rfc,
            alccat_giro.dias_semana,
            alccat_giro.horario_semana,
            alccat_giro.dias_finsemana,
            alccat_giro.horario_finsemana,
            alccat_giro.desc_tiponegocio,
            alcmae_alcoholes.folio_licencia,
            grlcat_situacion.desc_situacion
            FROM alcmae_alcoholes,
            conmae_contribuyente,
            alccat_giro,
            grlcat_situacion
            WHERE
            ( conmae_contribuyente.id_contribuyente = alcmae_alcoholes.id_contribuyente ) and
            ( alcmae_alcoholes.id_giro_alcoholes = alccat_giro.id_giro_alcoholes ) and
            ( alcmae_alcoholes.tipo_negocio = alccat_giro.tipo_negocio ) and
            ( alcmae_alcoholes.id_situacion = grlcat_situacion.id_situacion ) and
            (alcmae_alcoholes.id_alcoholes = '$id_alcoholes')");


          oci_execute($str_Historial);
          oci_close($conec_mun);

          $respuesta =[];
          while ($row = oci_fetch_array($str_Historial))
          {
                $respuesta["id_alcoholes"]=$row[0];
                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[1]));
                $respuesta["nombre_completo"]=$ReemplazaLetra->Variable;


                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnReemplazaLetra(trim($row[2]));
                $respuesta["nombre_comercial"]=$ReemplazaLetra->Variable;

              $respuesta["cuenta_estatal"]=$row[3];
              $respuesta["rfc"]=$row[4];
              $respuesta["dias_semana"]=$row[5];
              $respuesta["horario_semana"]=$row[6];
              $respuesta["fin_semana"]=$row[7];
              $respuesta["horario_fin_semana"]=$row[8];
              $respuesta["desc_tipo_negocio"]=$row[9];
              $respuesta["folio_licencia"]=$row[10];
              $respuesta["situacion"]=$row[11];

            }

          oci_free_statement($str_Historial);

          return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);

        }

        catch (Exception $exc) {


         oci_close($conec_mun);

         $this->mensaje=$exc;
         return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);

      }

    }

//guarda la verificacion desde la ventana del inspector que la agenda para su visita
    /*
    pantalla registro verificaciones_pendientes
    */
     function fnGrabaVerificacion(Request $request )
    {
        try
        {

            $municipio=$request->municipio;
            $id_alcoholes=$request->id_alcoholes;
            $fecha_debe_visitar=$request->fecha_debe_visitar;
            $id_ejecutor=$request->id_ejecutor;
            $id_inspector=$request->id_inspector;
            $observaciones=$request->observaciones;



          $vmun=substr($id_alcoholes,0,2);
          $Conec_Mun = new Class_Conexion;
          $Conec_Mun->GetfnCon_Municipio($vmun);
          $conec=$Conec_Mun->DB_conexion;

           $strquery2 = "begin SIATT.SP_GRABA_VERIFICACION('$id_alcoholes',  '$fecha_debe_visitar','$id_ejecutor','$id_inspector', '$observaciones'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);
               // header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");

                $msj_declaracion='Verificacion Insertada Correctamente';

                $respuesta =[];

                $respuesta["msj_declaracion"]=$msj_declaracion;

        return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);

            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }


    //guarda la verificacion desde la ventana del verificador que hace la verificacion
     function fnCierraVerifica(Request $request )
    {
        try
        {

            $municipio=$request->municipio;
            $id_alcoholes=$request->id_alcoholes;
            $id_verificacion=$request->id_verificacion;


          $vmun=substr($id_alcoholes,0,2);
          $Conec_Mun = new Class_Conexion;
          $Conec_Mun->GetfnCon_Municipio($vmun);
          $conec=$Conec_Mun->DB_conexion;

           $strquery2 = "begin SIATT.SP_CIERRA_VERIFICACION('$id_alcoholes',  '$id_verificacion'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);
               // header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");

                $msj_declaracion='Cerrada Correctamente';

                $respuesta =[];

                $respuesta["msj_declaracion"]=$msj_declaracion;

        return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);

            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }




    //guarda la verificacion desde la ventana del verificador que hace la verificacion
     function fnGrabaVerificaCroquis(Request $request )
    {
        try
        {
            //dd($request->all());
            $municipio=$request->municipio;
            $id_alcoholes=$request->id_alcoholes;
            $id_verificacion=$request->id_verificacion;
            $croquis=$request->croquis;

            // list($imagen_fierro,$imagen_guardar) = explode(',', $request->croquis);
            // $imagen_deco = base64_decode($imagen_guardar);

            $dir = "ms018/imagenes";
            $file = $request->croquis; // Illuminate\Http\UploadedFile
            $nombre = 'archivo1'; // foto.png
            $imagen_sugerida = \Storage::disk('staticstam')->putFileAs($dir, $file, $nombre);
            dd($imagen_sugerida);
            $vmun=substr($id_alcoholes,0,2);
            $Conec_Mun = new Class_Conexion;
            $Conec_Mun->GetfnCon_Municipio($vmun);
            $conec=$Conec_Mun->DB_conexion;

           $strquery2 = "begin SIATT.SP_GRABA_VERIFICACION_CROQUIS('$id_alcoholes',  '$id_verificacion','$croquis'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);
               // header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");

                $msj_declaracion='Croquis actualizado Correctamente';

                $respuesta =[];

                $respuesta["msj_declaracion"]=$msj_declaracion;

        return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);

            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }


     //guarda la verificacion desde la ventana del verificador que hace la verificacion
    //pantalla verificaciones_negocio_1
     function fnFinalizaVerificacion(Request $request )
    {
        try
        {

            $municipio=$request->municipio;
            $id_alcoholes=$request->id_alcoholes;
            $id_verificacion=$request->id_verificacion;



          $vmun=substr($id_alcoholes,0,2);
          $Conec_Mun = new Class_Conexion;
          $Conec_Mun->GetfnCon_Municipio($vmun);
          $conec=$Conec_Mun->DB_conexion;

           $strquery2 = "begin SIATT.SP_FINALIZA_VERIFICACION('$id_alcoholes',  '$id_verificacion'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);
               // header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");

                $msj_declaracion='Actualizado Correctamente';

                $respuesta =[];

                $respuesta["msj_declaracion"]=$msj_declaracion;

        return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);

            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }



//guarda la verificacion desde la ventana del verificador que hace la verificacion
     function fnGrabaMovimientosVerifica(Request $request )
    {
        try
        {


            $id_alcoholes=$request->id_alcoholes;
            $id_verificacion=$request->id_verificacion;
            $descripcion=$request->marcador;


          $vmun=substr($id_alcoholes,0,2);
          $Conec_Mun = new Class_Conexion;
          $Conec_Mun->GetfnCon_Municipio($vmun);
          $conec=$Conec_Mun->DB_conexion;





           $strquery2 = "begin SIATT.SP_GRABA_MOV_VERIFICACION('$id_verificacion','$descripcion'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);
               // header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");

                $msj_declaracion='Movimiento Insertado Correctamente';

                $respuesta =[];

                $respuesta["msj_declaracion"]=$msj_declaracion;

        return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);

            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }




     function fnInsertaMulta(Request $request )
    {
        try
        {

            $municipio=$request->municipio;
            $id_alcoholes=$request->id_alcoholes;
            $expediente=$request->expediente;
            $fecha_determinacion=$request->fecha_determinacion;
            $id_infraccion=$request->id_infraccion;
            $importe=$request->importe;
            $id_dependencia=$request->id_autoridad;
            $lugar_infraccion=$request->lugar_infraccion;



          $vmun=substr($id_alcoholes,0,2);
          $Conec_Mun = new Class_Conexion;
          $Conec_Mun->GetfnCon_Municipio($vmun);
          $conec=$Conec_Mun->DB_conexion;

           $strquery2 = "begin SIATT.SP_INSERTA_MULTASALCO('$id_alcoholes',  '$expediente',
           '$fecha_determinacion', '$id_infraccion' , '$importe', '$id_dependencia', '$lugar_infraccion'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);

                $msj_declaracion='Multa insertada Correctamente';

               $respuesta =[];


                $respuesta["msj_declaracion"]='$msj_declaracion';

        return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);


            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }


//pantalla inserta requisito
     function fnInsertaRequisto(Request $request )
    {
        try
        {
            $municipio=$request->municipio;
            $id_alcoholes=$request->id_alcoholes;
            $id_requisito=$request->id_requisito;
            $folio_documento=$request->folio_documento;
            $fecha_documento=$request->fecha_documento;
            $ejercicio_fiscal=$request->ejercicio_fiscal;

           // $vmun=substr($municipio);

            $vmun=substr($id_alcoholes,0,2);

            $Conec_Mun = new Class_Conexion;
            $Conec_Mun->GetfnCon_Municipio($vmun);
            $conec=$Conec_Mun->DB_conexion;

           $strquery2 = "begin SIATT.SP_INSERTA_REQUISITO('$id_alcoholes',
            '$id_requisito','$folio_documento', '$fecha_documento','$ejercicio_fiscal'); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta sp');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto sp');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }


                oci_commit($conec);
                oci_close($conec);

             $msj_declaracion=' Requisito Insertado Correctamente';

                $respuesta =[];

                $respuesta["msj_declaracion"]=$msj_declaracion;

            return response()->json(["success"=> count($respuesta)>0, "data"=> $respuesta], 200);


            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
                return response()->json(["success"=> false, "mensaje"=> $this->mensaje], 400);
            }
    }

}
?>
