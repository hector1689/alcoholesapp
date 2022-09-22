<?php

namespace App\Http\Controllers;


class Class_Conexion
{
  public $vmun_conexion;
  public $DB_conexion;
  public $msjConexion;


    function GetfnCon_Principal($x)
    {
        if ($x == 10)        {


          // $this->GetfnCadena_Conexion("INGRESOS");
            $this->GetfnCadena_Conexion("REGNORTE");
        }
        else
        {
        $this->msjConexion = "No se pudo conectar";
        }
    }

    function GetfnCon_Principal_Participaciones($x)
    {
        if ($x == 10)
        {
                 $this->GetfnCadena_Conexion_Participaciones("INGRESOS");
        }
        else
        {
        $this->msjConexion = "No se pudo conectar";
        }
    }

    function GetfnCon_PrincipalConcentra($x)
    {
        if ($x == 10)
        {

        $this->GetfnCadena_Conexion_Concentra("INGRESOS");

        }
        else
        {
        $this->msjConexion = "No se pudo conectar";
        }
    }

    function GetfnCon_PrincipalConsultaNet($x)
    {
        if ($x == 10)
        {
        $this->GetfnCadena_Conexion_ConsultaNet("INGRESOS");
        }
        else
        {
        $this->msjConexion = "No se pudo conectar";
        }
    }

    function GetfnCon_Principal_pvc($x2)
    {
        if ($x2 == "20a08gdnl")
        {
            $this->GetfnCadena_Conexion("RECAUDACION");
        }
        else
        {
            $this->msjConexion = "No se pudo conectar pvc";
        }
    }

    function GetfnCon_Principal_pvc2($x2)
    {
        if ($x2 == "20a08gdnl")
        {
            $this->GetfnCadena_Conexion_ConsultaNet("RECAUDACION");
        }
        else
        {
            $this->msjConexion = "No se pudo conectar pvc";
        }
    }

    function GetfnCon_PrincipalFis($x)
    {
        if ($x == 11)
        {
            $this->GetfnCadena_Conexion("FISCAL");
        }
        else
        {
        $this->msjConexion = "No se pudo conectar";
        }
    }

    function GetfnCon_Municipio($vmun)
    {
        switch($vmun)
        {
            case 1:
            $this->vmun_conexion="VICTORIA";    /*VICTORIA*/
            break;

            case 2:
            $this->vmun_conexion="ABASOLO"; /*ABASOLO*/
            break;

            case 3:
            $this->vmun_conexion="ALDAMA";  /*ALDAMA*/
            break;

            case 4:
            $this->vmun_conexion="ALTAMIRA";    /*ALTAMIRA*/
            break;

            case 5:
            $this->vmun_conexion="MANTE";   /*ANTIGUO MORELO*/
            break;

            case 6:
            $this->vmun_conexion="SANFER";  /*BURGOS*/
            break;

            case 7:
            $this->vmun_conexion="TULA";    /*BUSTAMANTE*/
            break;

            case 8:
            $this->vmun_conexion="CAMARGO"; /*CAMARGO*/
            break;

            case 9:
            $this->vmun_conexion="VICTORIA";    /*VILLA DE CASAS*/
            break;

            case 10:
            $this->vmun_conexion="SANFER";  /*CRUILLAS*/
            break;

            case 11:
            $this->vmun_conexion="MANTE";   /*GOMEZ FARIAS*/
            break;

            case 12:
            $this->vmun_conexion="GONZALEZ";    /*GONZALEZ*/
            break;

            case 13:
            $this->vmun_conexion="VICTORIA";    /*GUEMEZ*/
            break;

            case 14:
            $this->vmun_conexion="GUERRERO";    /*GUERRERO*/
            break;

            case 15:
            $this->vmun_conexion="HIDALGO";     /*HIDALGO*/
            break;

            case 16:
            $this->vmun_conexion="MANTE";   /*JAUMAVE*/
            break;

            case 17:
            $this->vmun_conexion="JIMENEZ";    /*JIMENEZ*/
            break;

            case 18:
            $this->vmun_conexion="LLERA";   /*LLERA*/
            break;

            case 19:
            $this->vmun_conexion="MADERO";  /*MADERO*/
            break;

            case 20:
            $this->vmun_conexion="HIDALGO";     /*MAINERO*/
            break;

            case 21:

            $this->vmun_conexion="MANTE";   /*MANTE*/
            break;

            case 22:
            $this->vmun_conexion="MATAMOROS";   /*MATAMOROS*/
            break;

            case 23:
            $this->vmun_conexion="SANFER";  /*MENDEZ*/
            break;

            case 24:
            $this->vmun_conexion="MIER";    /*MIER*/
            break;

            case 25:
            $this->vmun_conexion="TULA";    /*MIQUIHUANA*/
            break;

            case 26:
            $this->vmun_conexion="NLAREDO"; /*NUEVO LAREDO*/
            break;

            case 27:
            $this->vmun_conexion="MANTE";   /*NUEVO MORELOS*/
            break;

            case 28:
            $this->vmun_conexion="MANTE";  /*OCAMPO*/
            break;

            case 29:
            $this->vmun_conexion="PADILLA"; /*PADILLA*/
            break;

            case 30:
            $this->vmun_conexion="TULA"; /*PALMILLAS*/
            break;

            case 31:
            $this->vmun_conexion="REYNOSA"; /*REYNOSA*/
            break;

            case 32:
            $this->vmun_conexion="PADILLA"; /*SAN CARLOS*/
            break;

            case 33:
            $this->vmun_conexion="SANFER"; /*SAN FERNANDO*/
            break;

            case 34:
            $this->vmun_conexion="PADILLA"; /*SAN NICOLAS*/
            break;

            case 35:
            $this->vmun_conexion="SLMARINA";    /*SOTO LA MARINA*/
            break;

            case 36:
            $this->vmun_conexion="TAMPICO"; /*TAMPICO*/
            break;

            case 37:
            $this->vmun_conexion="TULA";    /*TULA*/
            break;

            case 38:
            $this->vmun_conexion="HIDALGO"; /*VILLAGRAN*/
            break;

            case 39:
            $this->vmun_conexion="XICO";    /*XICOTENCATL*/
            break;

            case 40:
            $this->vmun_conexion="MALEMAN"; /*MIGUEL ALEMAN*/
            break;

            case 41:
            $this->vmun_conexion="VHERMOSO";    /*VALLE HERMOSO*/
            break;

            case 42:
            $this->vmun_conexion="RIOBRAVO";    /*RIO BRAVO*/
            break;

            case 43:
            $this->vmun_conexion="DORDAZ";  /*GUSTAVO DIAZ ORDAZ*/
            break;

            case 44:
            $this->vmun_conexion="SURTAMPICO";  /*SURTAMPICO*/
            break;

            case 45:
            $this->vmun_conexion="REGNORTE";  /*REGNORTE*/
            break;
       }

        if ($this->vmun_conexion == '')
        {
        $this->msjConexion = "No se pudo realizar la conexion";
        }
        else
        {
        $vAlias = $this->vmun_conexion;
        $this->GetfnCadena_Conexion($vAlias);
        }
    }

    function GetfnCon_Municipio_ConsultaNet($vmun)
    {
        switch($vmun)
        {
            case 1:
            $this->vmun_conexion="VICTORIA";    /*VICTORIA*/
            break;

            case 2:
            $this->vmun_conexion="ABASOLO"; /*ABASOLO*/
            break;

            case 3:
            $this->vmun_conexion="ALDAMA";  /*ALDAMA*/
            break;

            case 4:
            $this->vmun_conexion="ALTAMIRA";    /*ALTAMIRA*/
            break;

            case 5:
            $this->vmun_conexion="MANTE";   /*ANTIGUO MORELO*/
            break;

            case 6:
            $this->vmun_conexion="SANFER";  /*BURGOS*/
            break;

            case 7:
            $this->vmun_conexion="TULA";    /*BUSTAMANTE*/
            break;

            case 8:
            $this->vmun_conexion="CAMARGO"; /*CAMARGO*/
            break;

            case 9:
            $this->vmun_conexion="VICTORIA";    /*VILLA DE CASAS*/
            break;

            case 10:
            $this->vmun_conexion="SANFER";  /*CRUILLAS*/
            break;

            case 11:
            $this->vmun_conexion="MANTE";   /*GOMEZ FARIAS*/
            break;

            case 12:
            $this->vmun_conexion="GONZALEZ";    /*GONZALEZ*/
            break;

            case 13:
            $this->vmun_conexion="VICTORIA";    /*GUEMEZ*/
            break;

            case 14:
            $this->vmun_conexion="GUERRERO";    /*GUERRERO*/
            break;

            case 15:
            $this->vmun_conexion="HIDALGO";     /*HIDALGO*/
            break;

            case 16:
            $this->vmun_conexion="MANTE";   /*JAUMAVE*/
            break;

            case 17:
            $this->vmun_conexion="JIMENEZ";    /*JIMENEZ*/
            break;

            case 18:
            $this->vmun_conexion="LLERA";   /*LLERA*/
            break;

            case 19:
            $this->vmun_conexion="MADERO";  /*MADERO*/
            break;

            case 20:
            $this->vmun_conexion="HIDALGO";     /*MAINERO*/
            break;

            case 21:
            $this->vmun_conexion="MANTE";   /*MANTE*/
            break;

            case 22:
            $this->vmun_conexion="MATAMOROS";   /*MATAMOROS*/
            break;

            case 23:
            $this->vmun_conexion="SANFER";  /*MENDEZ*/
            break;

            case 24:
            $this->vmun_conexion="MIER";    /*MIER*/
            break;

            case 25:
            $this->vmun_conexion="TULA";    /*MIQUIHUANA*/
            break;

            case 26:
            $this->vmun_conexion="NLAREDO"; /*NUEVO LAREDO*/
            break;

            case 27:
            $this->vmun_conexion="MANTE";   /*NUEVO MORELOS*/
            break;

            case 28:
            $this->vmun_conexion="MANTE";  /*OCAMPO*/
            break;

            case 29:
            $this->vmun_conexion="PADILLA"; /*PADILLA*/
            break;

            case 30:
            $this->vmun_conexion="TULA"; /*PALMILLAS*/
            break;

            case 31:
            $this->vmun_conexion="REYNOSA"; /*REYNOSA*/
            break;

            case 32:
            $this->vmun_conexion="PADILLA"; /*SAN CARLOS*/
            break;

            case 33:
            $this->vmun_conexion="SANFER"; /*SAN FERNANDO*/
            break;

            case 34:
            $this->vmun_conexion="PADILLA"; /*SAN NICOLAS*/
            break;

            case 35:
            $this->vmun_conexion="SLMARINA";    /*SOTO LA MARINA*/
            break;

            case 36:
            $this->vmun_conexion="TAMPICO"; /*TAMPICO*/
            break;

            case 37:
            $this->vmun_conexion="TULA";    /*TULA*/
            break;

            case 38:
            $this->vmun_conexion="HIDALGO"; /*VILLAGRAN*/
            break;

            case 39:
            $this->vmun_conexion="XICO";    /*XICOTENCATL*/
            break;

            case 40:
            $this->vmun_conexion="MALEMAN"; /*MIGUEL ALEMAN*/
            break;

            case 41:
            $this->vmun_conexion="VHERMOSO";    /*VALLE HERMOSO*/
            break;

            case 42:
            $this->vmun_conexion="RIOBRAVO";    /*RIO BRAVO*/
            break;

            case 43:
            $this->vmun_conexion="DORDAZ";  /*GUSTAVO DIAZ ORDAZ*/
            break;
       }

        if ($this->vmun_conexion == '')
        {
        $this->msjConexion = "No se pudo realizar la conexion";
        }
        else
        {
        $vAlias = $this->vmun_conexion;
        $this->GetfnCadena_Conexion_ConsultaNet($vAlias);
        }
    }

    function GetfnCadena_Conexion_ConsultaNet($vAlias)
    {
        $db_con = '['.$vAlias.']';
        $archivo = '../../concentra/clave.ini';
        $i=0;
        $texto1='';
        $texto2='';

        if (file_exists('../../concentra/clave.ini'))
        {
            $fichero = fopen($archivo,"rb");
            $contenido = file_get_contents($archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                    $vTexto1=trim($lineas[$i+1]);
                    $vTexto2=trim($lineas[$i+2]);
                    break;
                }
            }

            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
    }

    function GetfnCadena_Conexion($vAlias)
    {
        $vRuta='';
        $db_con = '['.$vAlias.']';
        $archivo = storage_path().'/clave.ini';
        $i=0;
        $texto1='';
        $texto2='';

        if(file_exists('../'.$archivo))
        {
            $vRuta='../';
        }
        elseif (file_exists('../../'.$archivo))
        {
            $vRuta='../../';
        }
        elseif (file_exists('../../../'.$archivo))
        {
            $vRuta='../../../';
        }
        elseif(file_exists('../../ingresos/'.$archivo))
        {
            $vRuta='../../ingresos/';
        }

        if (file_exists($vRuta.$archivo))
        {
            $fichero = fopen($vRuta.$archivo,"rb");
            $contenido = file_get_contents($vRuta.$archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                    $vTexto1=trim($lineas[$i+1]);
                    $vTexto2=trim($lineas[$i+2]);
                    break;
                }
            }

            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);


        switch($db_con)
        {

            case 'INGRESOS':

            $db_con="(DESCRIPTION =
               (ADDRESS_LIST =
                 (ADDRESS = (PROTOCOL = TCP) (HOST = 200.23.59.55) (PORT = 1521))
               )
               (CONNECT_DATA =
                 (SID=sfeias)
                 (SERVER=DEDICATED)
               )
             )";

            break;

             case 'SUR':
            $db_con= " (DESCRIPTION =
                        (ADDRESS_LIST =
                          (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.9.204)(PORT = 1521))
                        )
                        (CONNECT_DATA =
                          (SID = REGNORTE)
                          (SERVER = DEDICATED)
                        )
                      )";
            break;



            case 'REGNORTE':
            $db_con= " (DESCRIPTION =
                        (ADDRESS_LIST =
                          (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.9.204)(PORT = 1521))
                        )
                        (CONNECT_DATA =
                          (SID = REGNORTE)
                          (SERVER = DEDICATED)
                        )
                      )";
            break;


            default:



                // $db_con= " (DESCRIPTION =
                //         (ADDRESS_LIST =
                //           (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.9.204)(PORT = 1521))
                //         )
                //         (CONNECT_DATA =
                //           (SID = REGNORTE)
                //           (SERVER = DEDICATED)
                //         )
                //       )";




            $db_con= "  (DESCRIPTION =
                      (ADDRESS_LIST =
                        (ADDRESS = (PROTOCOL = TCP)(HOST = 200.23.59.31)(PORT = 1521))
                      )
                      (CONNECT_DATA =
                        (SID = BDGETPR)
                        (SERVER = DEDICATED)
                      )
                    )";

            break;

          }

        $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
    }

    function GetfnCadena_Conexion_Participaciones($vAlias)
    {
    $db_con = '['.$vAlias.']';
    $archivo = '../ingresos/concentra/clave.ini';
    $i=0;
    $texto1='';
    $texto2='';

        if (file_exists('../ingresos/concentra/clave.ini'))
        {
        $fichero = fopen($archivo,"rb");
        $contenido = file_get_contents($archivo);
        $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }

        $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
        $texto1=$this->encry;
        $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
        $texto2=$this->encry;
        }
        else
        {
        $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
      }

    function GetfnCadena_Conexion_SurTampico($vAlias)
    {
    $db_con = '['.$vAlias.']';
    if($vAlias=='VICTORIA')
    {
        $archivo = '../ingresos/concentra/clave.ini';
    }
    else
    {
        $archivo = '../../ingresos/concentra/clave.ini';
    }

    $i=0;
    $texto1='';
    $texto2='';
    if($vAlias=='VICTORIA')
    {
        if (file_exists('../ingresos/concentra/clave.ini'))
        {
            $fichero = fopen($archivo,"rb");
            $contenido = file_get_contents($archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }

            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
    }
    else
    {
        if (file_exists('../../ingresos/concentra/clave.ini'))
        {
            $fichero = fopen($archivo,"rb");
            $contenido = file_get_contents($archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }

            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
    }

        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
    }

    function GetfnCadena_Conexion_Inicio($vAlias)
    {
    $db_con = '['.$vAlias.']';
    $archivo = 'ingresos/concentra/clave.ini';
    $i=0;
    $texto1='';
    $texto2='';

        if (file_exists('ingresos/concentra/clave.ini'))
        {
        $fichero = fopen($archivo,"rb");
        $contenido = file_get_contents($archivo);
        $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }

        $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
        $texto1=$this->encry;
        $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
        $texto2=$this->encry;
        }
        else
        {
        $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);
//        echo $texto1.'--'.$texto2.'--'.$db_con;
        $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
    }

    function GetfnCadena_Conexion_Concentra($vAlias)
    {
    $db_con = '['.$vAlias.']';
    $archivo = 'clave.ini';
    $i=0;
    $texto1='';
    $texto2='';

        if (file_exists('clave.ini'))
        {
        $fichero = fopen($archivo,"rb");
        $contenido = file_get_contents($archivo);
        $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }

        $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
        $texto1=$this->encry;
        $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
        $texto2=$this->encry;
        }
        else
        {
        $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);
        //echo $texto1.'--'.$texto2.'--'.$db_con;
    $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
    }

    function GetfnEncripta($vdato, $vtipo)
    {
    $encry = "";
    $texto = $vdato;
    $tipo  = $vtipo;
    $cont = 0;

        if ($tipo == 1)
        {
            for ($cont == 0; $cont < strlen($texto); $cont++)
            {
            $ls_temp = substr($texto, $cont, 1);
            $li_operador = ord($ls_temp) - (32) + (12);
            $encry = $encry . chr($li_operador);
            }
        }
        else
        {
            for ($cont == 0; $cont < strlen($texto); $cont++)
            {
            $ls_temp = substr($texto, $cont, 1);
            $li_operador = ord($ls_temp) + (32) - (12);
            $encry = $encry . chr($li_operador);
            }
        }
    $this->encry=$encry;
    }

    function GetfnCon_Principal_Directorio($x)
    {
        if ($x == 10)
        {
            $this->GetfnCadena_Conexion_Participaciones("MANTE");
        }
        elseif($x==44)
        {
            $this->GetfnCadena_Conexion_SurTampico("SURTAMPICO");
        }
        elseif($x==3)
        {
            $this->GetfnCadena_Conexion_SurTampico("INGRESOS");
        }
        elseif($x==1)
        {
            $this->GetfnCadena_Conexion_Inicio("INGRESOS");
        }
         elseif($x==4)
        {
            $this->GetfnCadena_Conexion_SurTampico("VICTORIA");
        }
        elseif($x==2)
        {
            $this->GetfnCadena_Conexion_Inicio("RECAUDACION");
        }
        elseif($x==5)
        {
            $this->GetfnCadena_Conexion_Inicio("VICTORIA");
        }
        else
        {
            $this->msjConexion = "No se pudo conectar";
        }

    }

    function GetfnDbLiksTamps($vMuni)
    {
        if($vMuni=='01' or $vMuni=='1'  or $vMuni=='13')
        {
            $vDesMuni='VICTORIA';
        }
//        elseif($vMuni=='36')
//        {
//            $vDesMuni='TAMPICO';
//        }
//        elseif($vMuni=='19')
//        {
//            $vDesMuni='MADERO';
//        }
//        elseif($vMuni=='04' or $vMuni=='4')
//        {
//            $vDesMuni='ALTAMIRA';
//        }
        elseif($vMuni=='22')
        {
            $vDesMuni='MATAMOROS';
        }
        elseif($vMuni=='31')
        {
            $vDesMuni='REYNOSA';
        }
        elseif($vMuni=='26')
        {
            $vDesMuni='NLAREDO';
        }
        else
        {
            $vDesMuni='MANTE';
        }

        return $vDesMuni;
    }

    function GetfnCon_Municipio_Pruebas($vmun)
    {

        $this->vmun_conexion="NGETPR";  /*GUSTAVO DIAZ ORDAZ*/

        if ($this->vmun_conexion == '')
        {
        $this->msjConexion = "No se pudo realizar la conexion";
        }
        else
        {
        $vAlias = $this->vmun_conexion;
        $this->GetfnCadena_Conexion($vAlias);
        }
    }

    function GetfnDesc_Municipio($vmun)
    {
        switch($vmun)
        {
            case 1:
            $this->vmun_conexion="VICTORIA";    /*VICTORIA*/
            break;

            case 2:
            $this->vmun_conexion="ABASOLO"; /*ABASOLO*/
            break;

            case 3:
            $this->vmun_conexion="ALDAMA";  /*ALDAMA*/
            break;

            case 4:
            $this->vmun_conexion="ALTAMIRA";    /*ALTAMIRA*/
            break;

            case 5:
            $this->vmun_conexion="ANTIGUO MORELO";   /*ANTIGUO MORELO*/
            break;

            case 6:
            $this->vmun_conexion="BURGOS";  /*BURGOS*/
            break;

            case 7:
            $this->vmun_conexion="BUSTAMANTE";    /*BUSTAMANTE*/
            break;

            case 8:
            $this->vmun_conexion="CAMARGO"; /*CAMARGO*/
            break;

            case 9:
            $this->vmun_conexion="VILLA DE CASAS";    /*VILLA DE CASAS*/
            break;

            case 10:
            $this->vmun_conexion="CRUILLAS";  /*CRUILLAS*/
            break;

            case 11:
            $this->vmun_conexion="GOMEZ FARIAS";   /*GOMEZ FARIAS*/
            break;

            case 12:
            $this->vmun_conexion="GONZALEZ";    /*GONZALEZ*/
            break;

            case 13:
            $this->vmun_conexion="GUEMEZ";    /*GUEMEZ*/
            break;

            case 14:
            $this->vmun_conexion="GUERRERO";    /*GUERRERO*/
            break;

            case 15:
            $this->vmun_conexion="HIDALGO";     /*HIDALGO*/
            break;

            case 16:
            $this->vmun_conexion="JAUMAVE";   /*JAUMAVE*/
            break;

            case 17:
            $this->vmun_conexion="JIMENEZ";    /*JIMENEZ*/
            break;

            case 18:
            $this->vmun_conexion="LLERA";   /*LLERA*/
            break;

            case 19:
            $this->vmun_conexion="MADERO";  /*MADERO*/
            break;

            case 20:
            $this->vmun_conexion="MAINERO";     /*MAINERO*/
            break;

            case 21:
            $this->vmun_conexion="MANTE";   /*MANTE*/
            break;

            case 22:
            $this->vmun_conexion="MATAMOROS";   /*MATAMOROS*/
            break;

            case 23:
            $this->vmun_conexion="MENDEZ";  /*MENDEZ*/
            break;

            case 24:
            $this->vmun_conexion="MIER";    /*MIER*/
            break;

            case 25:
            $this->vmun_conexion="MIQUIHUANA";    /*MIQUIHUANA*/
            break;

            case 26:
            $this->vmun_conexion="NUEVO LAREDO"; /*NUEVO LAREDO*/
            break;

            case 27:
            $this->vmun_conexion="NUEVO MORELOS";   /*NUEVO MORELOS*/
            break;

            case 28:
            $this->vmun_conexion="OCAMPO";  /*OCAMPO*/
            break;

            case 29:
            $this->vmun_conexion="PADILLA"; /*PADILLA*/
            break;

            case 30:
            $this->vmun_conexion="PALMILLAS"; /*PALMILLAS*/
            break;

            case 31:
            $this->vmun_conexion="REYNOSA"; /*REYNOSA*/
            break;

            case 32:
            $this->vmun_conexion="SAN CARLOS"; /*SAN CARLOS*/
            break;

            case 33:
            $this->vmun_conexion="SAN FERNANDO"; /*SAN FERNANDO*/
            break;

            case 34:
            $this->vmun_conexion="SAN NICOLAS"; /*SAN NICOLAS*/
            break;

            case 35:
            $this->vmun_conexion="SOTO LA MARINA";    /*SOTO LA MARINA*/
            break;

            case 36:
            $this->vmun_conexion="TAMPICO"; /*TAMPICO*/
            break;

            case 37:
            $this->vmun_conexion="TULA";    /*TULA*/
            break;

            case 38:
            $this->vmun_conexion="VILLAGRAN"; /*VILLAGRAN*/
            break;

            case 39:
            $this->vmun_conexion="XICOTENCATL";    /*XICOTENCATL*/
            break;

            case 40:
            $this->vmun_conexion="MIGUEL ALEMAN"; /*MIGUEL ALEMAN*/
            break;

            case 41:
            $this->vmun_conexion="VALLE HERMOSO";    /*VALLE HERMOSO*/
            break;

            case 42:
            $this->vmun_conexion="RIO BRAVO";    /*RIO BRAVO*/
            break;

            case 43:
            $this->vmun_conexion="GUSTAVO DIAZ ORDAZ";  /*GUSTAVO DIAZ ORDAZ*/
            break;
       }
    }

    function GetfnCadena_Conexion_prueba($vAlias)
    {
    $db_con = '['.$vAlias.']';
    $archivo = 'clave.ini';
    $i=0;
    $texto1='';
    $texto2='';

        if (file_exists('clave.ini'))
        {
        $fichero = fopen($archivo,"rb");
        $contenido = file_get_contents($archivo);
        $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }

        $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
        $texto1=$this->encry;
        $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
        $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
            echo 'no encontro';
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        //echo $texto1.'--'.$texto2.'--'.$db_con;
        //$this->DB_conexion=oci_connect("$texto1","$texto2","$db_con");
    }

    function GetConexionInterconexion($vAlias)
    {
        $db_con = '['.$vAlias.']';
        $archivo = '../../../concentra/clave.ini';
        $i=0;
        $texto1='';
        $texto2='';

        if (file_exists('../../../concentra/clave.ini'))
        {
            $fichero = fopen($archivo,"rb");
            $contenido = file_get_contents($archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }
            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        //echo $texto1.'--'.$texto2.'--'.$db_con;
        $this->DB_CON_INTER=mssql_connect("$db_con","$texto1","$texto2");
    }

    function GetConexionRPP($vAlias,$vParametro)
    {
        $db_con = '['.$vAlias.']';
        $archivo = '../../../concentra/clave.ini';
        $i=0;
        $texto1='';
        $texto2='';

        if (file_exists('../../../concentra/clave.ini'))
        {
            $fichero = fopen($archivo,"rb");
            $contenido = file_get_contents($archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }
            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        //echo $texto1.'--'.$texto2.'--'.$db_con;
        if($vParametro==1)
        {
            $this->DB_CON_RPP=mssql_connect("BDReg 2000_Fiscal","$texto1","$texto2");
            mssql_select_db('BDReg 2000_Fiscal', $this->DB_CON_RPP);
        }
        elseif($vParametro==2)
        {
            $this->DB_CON_RPP=mssql_connect("BDReg 2000","$texto1","$texto2");
            mssql_select_db('BDReg 2000_Fiscal', $this->DB_CON_RPP);
        }

    }

    function GetConexionCNI($vAlias)
    {
        $db_con = '['.$vAlias.']';
        $archivo = '../../../concentra/clave.ini';
        $i=0;
        $texto1='';
        $texto2='';

        if (file_exists('../../../concentra/clave.ini'))
        {
            $fichero = fopen($archivo,"rb");
            $contenido = file_get_contents($archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                $vTexto1=trim($lineas[$i+1]);
                $vTexto2=trim($lineas[$i+2]);
                break;
                }
            }
            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        //echo $texto1.'--'.$texto2.'--'.$db_con;
        $texto2='x!$m,Iow';
        $enlace = mysql_connect('172.30.6.40',"$texto1","$texto2");
        if (!mysql_select_db('cni', $enlace))
        {
            $this->DB_CON_CNI='No pudo seleccionar la base de datos.';

        }
        else
        {
            $this->DB_CON_CNI=$enlace;
        }

        //$this->DB_CON_INTER=mssql_connect("$db_con","$texto1","$texto2");
    }

    function GetfnCon_PrincipalNuevo($x)
    {
        if ($x == 10)
        {
        //$this->GetfnCadena_Conexion("SIATT");
            $this->GetfnCadena_ConexionNuevo("INGRESOS");
        }
        else
        {
        $this->msjConexion = "No se pudo conectar";
        }
    }

    function GetfnCadena_ConexionNuevo($vAlias)
    {
        $vRuta='';
        $db_con = '['.$vAlias.']';
        $archivo = 'concentra/clave.ini';
        $i=0;
        $texto1='';
        $texto2='';

        if(file_exists('../'.$archivo))
        {
            $vRuta='../';
        }
        elseif (file_exists('../../'.$archivo))
        {
            $vRuta='../../';
        }
        elseif (file_exists('../../../'.$archivo))
        {
            $vRuta='../../../';
        }
        elseif(file_exists('../../ingresos/'.$archivo))
        {
            $vRuta='../../ingresos/';
        }

        //echo $vRuta;

        if (file_exists($vRuta.$archivo))
        {
            //echo '1';
            $fichero = fopen($vRuta.$archivo,"rb");
            $contenido = file_get_contents($vRuta.$archivo);
            $lineas = explode("\n",$contenido);

            for ($i==0;  $i < count($lineas); $i++)
            {
                if (trim($lineas[$i])==trim($db_con))
                {
                    $vTexto1=trim($lineas[$i+1]);
                    $vTexto2=trim($lineas[$i+2]);
                    break;
                }
            }

            $this->GetfnEncripta(str_replace("user=", "", $vTexto1), 0);
            $texto1=$this->encry;
            $this->GetfnEncripta(str_replace("password=", "", $vTexto2), 0);
            $texto2=$this->encry;
        }
        else
        {
            //echo '2';
            $this->msjConexion = "No se encontro el archivo";
        }
        $db_con = str_replace("[", "", $db_con);
        $db_con = str_replace("]", "", $db_con);

        //echo $texto1.'--'.$texto2;

        $this->DB_conexion=oci_connect("$texto1","$texto2","$db_con",'AL32UTF8');
    }
}
?>
