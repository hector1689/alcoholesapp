<?php
namespace App\Http\Controllers;


class ClassControlesGrls
{


    Public $txtRecargos;
    Public $txtActualizacion;
    Public $txtTotalDeclaracion;
    Public $txtImpuestoFavor;
    Public $txtRFCEmpresa;
    Public $des_habNEmpSub;
    Public $des_habtext;
    Public $des_habtext_EmpSubcontratados;
    public $mensajeError;
    Public $arrayDescuento;
    Public $txtSaldo_Pendiente;
    Public $RB_Motivo;
    public $ArrEmp_Subcontratadas;




     function fnInvalidaConexionBD($vmun)
    {
        $this->msj='';

    }

    function fnValidaHSBC()
    {
        $this->bandera=0;

        $vFecha_Act=date('d/m/Y');
        $vFecha_Act= empty($vFecha_Act)?date('d/m/Y'):$vFecha_Act;
        $ta = explode('/',$vFecha_Act);
        $Fecha_Actual=mktime(0,0,0,$ta[1],$ta[0],$ta[2]);

        $vFecha_Ini=date('08/09/2014');
        $vFecha_Ini= empty($vFecha_Ini)?date('d/m/Y'):$vFecha_Ini;
        $ti = explode('/',$vFecha_Ini);
        $Fecha_Inicio=mktime(0,0,0,$ti[1],$ti[0],$ti[2]);

        if ($Fecha_Actual >= $Fecha_Inicio)
        {
            $this->bandera=1;
        }
    }

    function GetfnConec_Mun($vmun)
    {

        switch($vmun)
        {

            case 1:
            $this->vmun_conexion="VICTORIA";
            break;

            case 2:
            $this->vmun_conexion="ABASOLO";
            break;

            case 3:
            $this->vmun_conexion="ALDAMA";
            break;

            case 4:
            $this->vmun_conexion="ALTAMIRA";
            break;

            case 5:
            $this->vmun_conexion="ANTIGUO MORELO";
            break;

            case 6:
            $this->vmun_conexion="BURGOS";
            break;

            case 7:
            $this->vmun_conexion="BUSTAMANTE";
            break;

            case 8:
            $this->vmun_conexion="CAMARGO";
            break;

            case 9:
            $this->vmun_conexion="VILLA DE CASAS";
            break;

            case 10:
            $this->vmun_conexion="CRUILLAS";
            break;

            case 11:
            $this->vmun_conexion="GOMEZ FARIAS";
            break;

            case 12:
            $this->vmun_conexion="GONZALEZ";
            break;

            case 13:
            $this->vmun_conexion="GUEMEZ";
            break;

            case 14:
            $this->vmun_conexion="GUERRERO";
            break;

            case 15:
            $this->vmun_conexion="HIDALGO";
            break;

            case 16:
            $this->vmun_conexion="JAUMAVE";
            break;

            case 17:
            $this->vmun_conexion="JIMENEZ";
            break;

            case 18:
            $this->vmun_conexion="LLERA";
            break;

            case 19:
            $this->vmun_conexion="MADERO";
            break;

            case 20:
            $this->vmun_conexion="MAINERO";
            break;

            case 21:
            $this->vmun_conexion="MANTE";
            break;

            case 22:
            $this->vmun_conexion="MATAMOROS";
            break;

            case 23:
            $this->vmun_conexion="MENDEZ";
            break;

            case 24:
            $this->vmun_conexion="MIER";
            break;

            case 25:
            $this->vmun_conexion="MIQUIHUANA";
            break;

            case 26:
            $this->vmun_conexion="NLAREDO";
            break;

            case 27:
            $this->vmun_conexion="NUEVO MORELOS";
            break;

            case 28:
            $this->vmun_conexion="OCAMPO";
            break;

            case 29:
            $this->vmun_conexion="PADILLA";
            break;

            case 30:
            $this->vmun_conexion="PALMILLAS";
            break;

            case 31:
            $this->vmun_conexion="REYNOSA";
            break;

            case 32:
            $this->vmun_conexion="SAN CARLOS";
            break;

            case 33:
            $this->vmun_conexion="SANFER";
            break;

            case 34:
            $this->vmun_conexion="SAN NICOLAS";
            break;

            case 35:
            $this->vmun_conexion="SLMARINA";
            break;

            case 36:
            $this->vmun_conexion="TAMPICO";
            break;

            case 37:
            $this->vmun_conexion="TULA";
            break;

            case 38:
            $this->vmun_conexion="VILLAGRAN";
            break;

            case 39:
            $this->vmun_conexion="XICO";
            break;

            case 40:
            $this->vmun_conexion="MALEMAN";
            break;

            case 41:
            $this->vmun_conexion="VHERMOSO";
            break;

            case 42:
            $this->vmun_conexion="RIOBRAVO";
            break;

            case 43:
            $this->vmun_conexion="DORDAS";
            break;
        }
    }

    function GetTipo_obligacion_impuestos_estatales($vobl)
    {
        $this->obligacion='';
        $T_Obligacion = array();
        $T_Obligacion["00"] = "OBLIGACION";
        $T_Obligacion["03"] = "NOMINAS";
        $T_Obligacion["04"] = "HONORARIOS";
        $T_Obligacion["05"] = "HOSPEDAJE";
        $T_Obligacion["25"] = "RETENEDOR";

        $ls_obli = '<select name="menu_obligacion" style="font-family:Arial; font-size:11px; width:110px">';
        foreach ($T_Obligacion as $key => $value)
        {
            if ($vobl==$key)
            {
                $ls_obli .= '<option value="'.$key.'" selected="selected">';
                $ls_obli .= '<span style="font-family:Arial; font-size:8pt">'.$value.'</span></option>';
            }
            else
            {
                $ls_obli .= '<option value="'.$key.'" style="border:none">';
                $ls_obli .= '<span style="font-family:Arial; font-size:8pt">'.$value.'</span></option>';
            }
        }
        $ls_obli .= '</select>';
        $this->obligacion=$ls_obli;
    }

    function GetTipo_municipio_impuestos_estatales($bandera, $vmun)
    {
        $T_Municipio = array();
        $T_Municipio["00"] = "Municipio";
        $T_Municipio["02"]="ABASOLO";
        $T_Municipio["03"]="ALDAMA";
        $T_Municipio["04"]="ALTAMIRA";
        $T_Municipio["05"]="ANTIGUO MORELO";
        $T_Municipio["06"]="BURGOS";
        $T_Municipio["07"]="BUSTAMANTE";
        $T_Municipio["08"]="CAMARGO";
        $T_Municipio["10"]="CRUILLAS";
        $T_Municipio["11"]="GOMEZ FARIAS";
        $T_Municipio["12"]="GONZALEZ";
        $T_Municipio["13"]="GUEMEZ";
        $T_Municipio["14"]="GUERRERO";
        $T_Municipio["43"]="GUSTAVO DIAZ ORDAZ";
        $T_Municipio["15"]="HIDALGO";
        $T_Municipio["16"]="JAUMAVE";
        $T_Municipio["17"]="JIMENEZ";
        $T_Municipio["18"]="LLERA";
        $T_Municipio["19"]="MADERO";
        $T_Municipio["20"]="MAINERO";
        $T_Municipio["21"]="MANTE";
        $T_Municipio["22"]="MATAMOROS";
        $T_Municipio["23"]="MENDEZ";
        $T_Municipio["24"]="MIER";
        $T_Municipio["40"]="MIGUEL ALEMAN";
        $T_Municipio["25"]="MIQUIHUANA";
        $T_Municipio["26"]="NUEVO LAREDO";
        $T_Municipio["27"]="NUEVO MORELOS";
        $T_Municipio["28"]="OCAMPO";
        $T_Municipio["29"]="PADILLA";
        $T_Municipio["30"]="PALMILLAS";
        $T_Municipio["31"]="REYNOSA";
        $T_Municipio["42"]="RIO BRAVO";
        $T_Municipio["32"]="SAN CARLOS";
        $T_Municipio["33"]="SAN FERNANDO";
        $T_Municipio["34"]="SAN NICOLAS";
        $T_Municipio["35"]="SOTO LA MARINA";
        $T_Municipio["36"]="TAMPICO";
        $T_Municipio["37"]="TULA";
        $T_Municipio["41"]="VALLE HERMOSO";
        $T_Municipio["01"]="VICTORIA";
        $T_Municipio["09"]="VILLA DE CASAS";
        $T_Municipio["38"]="VILLAGRAN";
        $T_Municipio["39"]="XICOTENCATL";

        if ($bandera=='')
        {
            $ls_mun = '<select name="menu_municipios" id="menu_municipios" style="font-family:Arial; font-size:8pt; width:120px">';
        }
        elseif($bandera<>'')
        {
            $ls_mun = '<select name="menu_municipios" id="menu_municipios" style="font-family:Arial; font-size:8pt; width:120px" disabled="disabled">';
        }
        foreach ($T_Municipio as $key => $value)
        {
            if ($vmun==$key)
            {
                $ls_mun .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
            }
            else
            {
                $ls_mun .= '<option value="'.$key.'" >'.$value.'</option>';
            }
        }
        $ls_mun = $ls_mun.'</select>';
        $this->municipio=$ls_mun;
    }

    function GetDdlMunicipios($bandera, $vmun)
    {
        $T_Municipio = array();
        $T_Municipio["00"] = "Municipio";
        $T_Municipio["02"]="ABASOLO";
        $T_Municipio["03"]="ALDAMA";
        $T_Municipio["04"]="ALTAMIRA";
        $T_Municipio["05"]="ANTIGUO MORELO";
        $T_Municipio["06"]="BURGOS";
        $T_Municipio["07"]="BUSTAMANTE";
        $T_Municipio["08"]="CAMARGO";
        $T_Municipio["10"]="CRUILLAS";
        $T_Municipio["11"]="GOMEZ FARIAS";
        $T_Municipio["12"]="GONZALEZ";
        $T_Municipio["13"]="GUEMEZ";
        $T_Municipio["14"]="GUERRERO";
        $T_Municipio["43"]="GUSTAVO DIAZ ORDAZ";
        $T_Municipio["15"]="HIDALGO";
        $T_Municipio["16"]="JAUMAVE";
        $T_Municipio["17"]="JIMENEZ";
        $T_Municipio["18"]="LLERA";
        $T_Municipio["19"]="MADERO";
        $T_Municipio["20"]="MAINERO";
        $T_Municipio["21"]="MANTE";
        $T_Municipio["22"]="MATAMOROS";
        $T_Municipio["23"]="MENDEZ";
        $T_Municipio["24"]="MIER";
        $T_Municipio["40"]="MIGUEL ALEMAN";
        $T_Municipio["25"]="MIQUIHUANA";
        $T_Municipio["26"]="NUEVO LAREDO";
        $T_Municipio["27"]="NUEVO MORELOS";
        $T_Municipio["28"]="OCAMPO";
        $T_Municipio["29"]="PADILLA";
        $T_Municipio["30"]="PALMILLAS";
        $T_Municipio["31"]="REYNOSA";
        $T_Municipio["42"]="RIO BRAVO";
        $T_Municipio["32"]="SAN CARLOS";
        $T_Municipio["33"]="SAN FERNANDO";
        $T_Municipio["34"]="SAN NICOLAS";
        $T_Municipio["35"]="SOTO LA MARINA";
        $T_Municipio["36"]="TAMPICO";
        $T_Municipio["37"]="TULA";
        $T_Municipio["41"]="VALLE HERMOSO";
        $T_Municipio["01"]="VICTORIA";
        $T_Municipio["09"]="VILLA DE CASAS";
        $T_Municipio["38"]="VILLAGRAN";
        $T_Municipio["39"]="XICOTENCATL";

        if ($bandera=='')
        {
            $ls_mun = '<select name="menu_municipios" style="font-family:Arial; font-size:8pt; width:120px" OnChange="recarga(this.form);">';
        }
        elseif($bandera<>'')
        {
            $ls_mun = '<select name="menu_municipios" style="font-family:Arial; font-size:8pt; width:120px" disabled="disabled">';
        }

        foreach ($T_Municipio as $key => $value)
        {
            if ($vmun==$key)
            {
                $ls_mun .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
            }
            else
            {
                $ls_mun .= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        $ls_mun .= '</select>';
        $this->municipio=$ls_mun;
    }

    function GetfnLlenaSucursal($vsucursal)
    {
        if ($vsucursal=="")
        {
            $this->vsucursal='00';
        }
        else
        {
            if (!is_numeric($vsucursal))
            {
                $this->vsucursal='00';
            }
            else
            {
                if ($vsucursal < 0)
                {
                    $this->vsucursal='00';
                }
                else
                {
                    if (substr_count($vsucursal,".")>= 1)
                    {
                        $this->vsucursal='00';
                    }
                    else
                    {
                        if (strlen($vsucursal)==1)
                        {
                            $this->vsucursal='0'.$vsucursal;
                        }
                        else
                        {
                            $this->vsucursal=$vsucursal;
                        }
                    }
                }
            }
        }
    }

    function GetfnCreaDDLObligacion($vtipo_obliga, $vddl_obl_sel, $vmes_sel, $vanio_sel,
    $vnum_asimilables, $vnum_otros, $vnum_empleados)
    {
        $obligaciones = preg_replace("/[^0-9]/", "", $vtipo_obliga);
        $ArrayObligacion = array();
        $this->des_habilita_hab='';
        $this->desabilita='';
        $this->desabilita_hos_nom='';
        $this->etiqueta='';
        $this->etiqueta_emp_con='';
        $this->txtnum_asimilables=0;
        $this->txtnum_otros=0;
        $this->num_empleados=0;

        if (!isset($_SESSION['anio']))
        {
            $_SESSION['anio']=$vanio_sel;
        }

        if ($_SESSION['anio'] <> $vanio_sel && $vanio_sel >= 2012)
        {
            $vddl_obl_sel=substr($obligaciones, 0, 1);
            $_SESSION['anio']=$vanio_sel;
        }
        elseif($_SESSION['anio'] <> $vanio_sel && $vanio_sel < 2012)
        {
            $_SESSION['anio']=$vanio_sel;
        }

        if ($vmes_sel > 0)
        {
            $ddl_obligacion='<select name="ddl_obligaciones" style="font-family:Arial; font-size:8pt; width:110px" onChange="recarga(this.form);">';
            if ($vddl_obl_sel=='')
            {
                $vddl_obl_sel=substr($obligaciones, 0, 1);
            }
        }
        else
        {
            $ddl_obligacion='<select name="ddl_obligaciones" style="font-family:Arial; font-size:8pt; width:110px" disabled="disabled">';
            $vddl_obl_sel=substr($obligaciones, 0, 1);
        }

        if (substr_count($obligaciones, "3")>=1 && $vanio_sel > 2011)
        {
            $ArrayObligacion["3"] ="NOMINAS";
            $ArrayObligacion["33"] = "NOMINAS(ISRTPS)";
            $ArrayObligacion["25"] = "RETENEDOR";
        }
        elseif (substr_count($obligaciones, "3") >= 1 || $vanio_sel <= 2011)
        {
            $ArrayObligacion["3"] ="NOMINAS";
        }

        if (substr_count($obligaciones, "4")>=1)
        {
            $ArrayObligacion["4"] = "HONORARIOS";
        }

        if (substr_count($obligaciones, "5")>=1 && ($vanio_sel <= 2011 || $vanio_sel >= 2017))
        {
            $ArrayObligacion["5"] = "HOSPEDAJE";
        }

        foreach ($ArrayObligacion as $posicion => $valor)
        {
            if ($posicion==$vddl_obl_sel)
            {
                $ddl_obligacion.='<option value="'.$posicion.'" selected="selected">'.$valor.'</option>';
            }
            else
            {
                $ddl_obligacion.='<option value="'.$posicion.'">'.$valor.'</option>';
            }
        }
        $this->ddl_obligacion=$ddl_obligacion.='</select>';

        if ($vddl_obl_sel=="3" || $vddl_obl_sel=="33")
        {
            $this->etiqueta='<span style="font-size: 7pt; font-family: Arial">Nº Empleados</span>';
            $this->etiqueta_emp_con='<span style="font-size: 7pt; font-family: Arial">Impuesto a pagar, empleados propios</span>';
            $this->num_empleados=$vnum_empleados;
            $this->des_habilita_hab='';
            $this->desabilita='';
            $this->desabilita_hos_nom='';
            $this->txtnum_asimilables=$vnum_asimilables;
            $this->txtnum_otros=$vnum_otros;
        }
        elseif ($vddl_obl_sel=='4')
        {
            $this->etiqueta='<span style="font-size: 7pt; font-family: Arial">Nº Empleados</span>';
            $this->etiqueta_emp_con='<span style="font-size: 7pt; font-family: Arial">Importe a pagar</span>';
            $this->num_empleados=0;

            $this->des_habilita_hab='';
            $this->desabilita='disabled="disabled"';
            $this->desabilita_hos_nom='disabled="disabled"';
            $this->txtnum_asimilables=0;
            $this->txtnum_otros=0;
        }
        elseif ($vddl_obl_sel=='5')
        {
            $this->etiqueta='<span style="font-size: 7pt; font-family: Arial">Habitaciones</span>';
            $this->etiqueta_emp_con='<span style="font-size: 7pt; font-family: Arial">Importe a pagar</span>';
            $this->des_habilita_hab='';
            $this->desabilita='disabled="disabled"';
            $this->desabilita_hos_nom='';
            $this->txtnum_asimilables=0;
            $this->txtnum_otros=0;
            $this->num_empleados=$vnum_empleados;
        }
    }

    function GetDaMunicipioString($vmun)
    {
        switch($vmun)
        {

            case 1:
            $this->mun_string="VICTORIA";
            break;

            case 2:
            $this->mun_string="ABASOLO";
            break;

            case 3:
            $this->mun_string="ALDAMA";
            break;

            case 4:
            $this->mun_string="ALTAMIRA";
            break;

            case 5:
            $this->mun_string="ANTIGUO MORELOS";
            break;

            case 6:
            $this->mun_string="BURGOS";
            break;

            case 7:
            $this->mun_string="BUSTAMANTE";
            break;

            case 8:
            $this->mun_string="CAMARGO";
            break;

            case 9:
            $this->mun_string="VILLA DE CASAS";
            break;

            case 10:
            $this->mun_string="CRUILLAS";
            break;

            case 11:
            $this->mun_string="GOMEZ FARIAS";
            break;

            case 12:
            $this->mun_string="GONZALEZ";
            break;

            case 13:
            $this->mun_string="GUEMEZ";
            break;

            case 14:
            $this->mun_string="GUERRERO";
            break;

            case 15:
            $this->mun_string="HIDALGO";
            break;

            case 16:
            $this->mun_string="JAUMAVE";
            break;

            case 17:
            $this->mun_string="JIMENEZ";
            break;

            case 18:
            $this->mun_string="LLERA";
            break;

            case 19:
            $this->mun_string="MADERO";
            break;

            case 20:
            $this->mun_string="MAINERO";
            break;

            case 21:
            $this->mun_string="MANTE";
            break;

            case 22:
            $this->mun_string="MATAMOROS";
            break;

            case 23:
            $this->mun_string="MENDEZ";
            break;

            case 24:
            $this->mun_string="MIER";
            break;

            case 25:
            $this->mun_string="MIQUIHUANA";
            break;

            case 26:
            $this->mun_string="NUEVO LAREDO";
            break;

            case 27:
            $this->mun_string="NUEVO MORELOS";
            break;

            case 28:
            $this->mun_string="OCAMPO";
            break;

            case 29:
            $this->mun_string="PADILLA";
            break;

            case 30:
            $this->mun_string="PALMILLAS";
            break;

            case 31:
            $this->mun_string="REYNOSA";
            break;

            case 32:
            $this->mun_string="SAN CARLOS";
            break;

            case 33:
            $this->mun_string="SAN FERNANDO";
            break;

            case 34:
            $this->mun_string="SAN NICOLAS";
            break;

            case 35:
            $this->mun_string="SOTO LA MARINA";
            break;

            case 36:
            $this->mun_string="TAMPICO";
            break;

            case 37:
            $this->mun_string="TULA";
            break;

            case 38:
            $this->mun_string="VILLAGRAN";
            break;

            case 39:
            $this->mun_string="XICOTENCATL";
            break;

            case 40:
            $this->mun_string="MIGUEL ALEMAN";
            break;

            case 41:
            $this->mun_string="VALLE HERMOSO";
            break;

            case 42:
            $this->mun_string="RIO BRAVO";
            break;

            case 43:
            $this->mun_string="DIAZ ORDAZ";
            break;
        }
        return $this->mun_string;
    }

    function getLlena_combo_anio($vanio_sel)
    {
        $anio=getdate();
        $anios=$anio['year']-14;
        $anio_act=$anio['year'];

        $cmb_anios = '<select name="anio" style="font-family:Arial; font-size:8pt" onChange="recarga(this.form);">';
        $this->cb_anios= $cmb_anios;
        for ($anio_act==$anio_act; $anios<=$anio_act; $anio_act==$anio_act--)
        {
             if ($vanio_sel==$anio_act)
             {
                $cmb_anios = $cmb_anios.'<option value="'.$anio_act.'" selected="selected" >'.$anio_act.'</option>';
                $this->cb_anios= $cmb_anios;
             }
             else
             {
                $cmb_anios = $cmb_anios.'<option value="'.$anio_act.'">'.$anio_act.'</option>';
                $this->cb_anios= $cmb_anios;
             }
         }
        $cmb_anios = $cmb_anios.'</select>';
        $this->cb_anios= $cmb_anios;
    }

    function getLlena_combo_mes($vanio_sel, $vmes_sel)
    {
        $Fecha=getdate();

        $meses = array();
        $meses[0] = "Mes";
        $meses[1] = "ENERO";
        $meses[2] = "FEBRERO";
        $meses[3] = "MARZO";
        $meses[4] = "ABRIL";
        $meses[5] = "MAYO";
        $meses[6] = "JUNIO";
        $meses[7] = "JULIO";
        $meses[8] = "AGOSTO";
        $meses[9] = "SEPTIEMBRE";
        $meses[10] = "OCTUBRE";
        $meses[11] = "NOVIEMBRE";
        $meses[12] = "DICIEMBRE";

        $mes=0;
        $i=0;
        if ($vanio_sel <> $Fecha['year'])
        {
            $mes=12;
            $cmb_mes = '<select name="meses" style="font-family:Arial; font-size:8pt" onChange="recarga(this.form);">';
            for ($i==0; $i<=$mes; $i==$i++)
            {
                if ($vmes_sel==$i)
                {
                    $cmb_mes = $cmb_mes.'<option value="'.$i.'" selected="selected">'.$meses[$i].'</option>';
                }
                else
                {
                    $cmb_mes = $cmb_mes.'<option value="'.$i.'">'.$meses[$i].'</option>';
                }
            }
            $cmb_mes = $cmb_mes.'</select>';
            $this->cb_mes= $cmb_mes;
        }
        else
        {
            $dia=date("d");
            if ($dia<=17)
            {
                $mes=date("m")-1;
            }
            else
            {
                $mes=date("m");
            }
            $cmb_mes = '<select name="meses" style="font-family:Arial; font-size:8pt" onChange="recarga(this.form);">';
            for ($i==0; $i<=$mes; $i==$i++)
            {
                if ($vmes_sel==$i)
                {
                    $cmb_mes = $cmb_mes.'<option value="'.$i.'" selected="selected">'.$meses[$i].'</option>';
                }
                else
                {
                    $cmb_mes = $cmb_mes.'<option value="'.$i.'">'.$meses[$i].'</option>';
                }
            }
            $cmb_mes = $cmb_mes.'</select>';
            $this->cb_mes= $cmb_mes;
        }
    }

    function GetTipo_Complementaria($vtipo_dec, $vtipoCom_sel, $vfecha, $vmes_sel, $vImporteRectifica,
    $vImpuestoFavor)
    {
        $T_Complemetaria = array();
        $T_Complemetaria["F"] = "FISCALIZACION";
        $T_Complemetaria["S"] = "COMPENSACION";
        $T_Complemetaria["C"] = "CORRECCION FISCAL";

        $rd_tipo_dec = array();
        $rd_tipo_dec["N"] = "Normal";
        $rd_tipo_dec["C"] = "Complementaria";

        if (!isset($_SESSION['TIPO_DEC']))
        {
            $_SESSION['TIPO_DEC']=$vtipo_dec;
        }

        if ($_SESSION['TIPO_DEC'] <> $vtipo_dec)
        {
            $this->LitrosMagna=0;
            $this->ImporteMagna=0;
            $this->LitrosPremium=0;
            $this->ImportePremium=0;
            $this->LitrosDiesel=0;
            $this->ImporteDiesel=0;
            $this->Importe=0;
            $this->txtImportePagar=0;
            $this->Actualizacion=0;
            $this->ImporteRectifica=0;
            $this->Recargos=0;
            $this->ImpuestoCargo=0;
            $this->Multas=0;
            $this->ImpuestoFavor=0;
            $this->TotalDeclaracion=0;
            $this->SaldoPendienteAcreditar=0;
            $this->OtrosEstimulos=0;
            $this->TotalPagar=0;
            $this->CantidadPagar=0;
            $this->Importe_Declaracion=0;
            unset($_SESSION['ACTUALIZACION']);
            unset($_SESSION['RECARGOS']);
            $_SESSION['TIPO_DEC']=$vtipo_dec;
        }

        if (isset($vmes_sel)<>"0")
        {
            foreach ($rd_tipo_dec as $key => $value)
            {
                if ($vtipo_dec=='N')
                {
                    if ($vtipo_dec==$key)
                    {
                        $rb_tipo = '<input type="radio" name="tipo" value="'.$key.'" onClick="recarga(this.form);" checked style="border:none"/>';
                        $rb_tipo = $rb_tipo.'<span style="font-family:Arial; font-size:7pt">'.$value.'</span>';
                    }
                    else
                    {
                        $rb_tipo = $rb_tipo.'<input type="radio" name="tipo" value="'.$key.'" onClick="recarga(this.form);" style="border:none"/>';
                        $rb_tipo = $rb_tipo.'<span style="font-family:Arial; font-size:7pt">'.$value.'</span>';
                    }
                }
                else
                {
                    if ($vtipo_dec==$key)
                    {
                        $rb_tipo = $rb_tipo.'<input type="radio" name="tipo" value="'.$key.'" onClick="recarga(this.form);" checked style="border:none"/>';
                        $rb_tipo = $rb_tipo.'<span style="font-family:Arial; font-size:7pt">'.$value.'</span>';
                    }
                    else
                    {
                        $rb_tipo = '<input type="radio" name="tipo" value="'.$key.'" onClick="recarga(this.form);" style="border:none"/>';
                        $rb_tipo = $rb_tipo.'<span style="font-family:Arial; font-size:7pt">'.$value.'</span>';
                    }
                }
                $this->rboton_tipo=$rb_tipo;
                $_SESSION['tipo']=$vtipo_dec;
            }

            switch ($vtipo_dec)
            {
                case "C":
                $this->disabled= 'style="font-family:Arial; font-size: 8pt; text-align:right; width: 55px;"';
                $this->txt_fecha='<input type="text" name="txt_fecha" id="datepicker" style="width:95px; height:17px; font-family:Arial; font-size:8pt; background-image: url(../../../img/calendario.gif); background-repeat: no-repeat; background-position: right center; border: 1px solid #BDBDBD;" maxlength="10" value="'.$vfecha.'"/>';
                $cbTipo_Comple = '<select name="Tipo_comple" style="font-family:Arial; font-size:8pt" onChange="recarga(this.form);\">';
                break;

                case "N":
                $this->disabled='style="font-family:Arial; font-size: 8pt; text-align:right; width: 55px;" readonly="readonly"';
                $this->txt_fecha='<input type="text" name="txt_fecha" style="width:95px; height:17px; font-family:Arial; font-size:8pt; background-repeat: no-repeat; background-position: right center; border: 1px solid #BDBDBD" disabled="disabled" maxlength="10" value=""/>';
                $cbTipo_Comple = '<select name="Tipo_comple" style="font-family:Arial; font-size:8pt;" disabled="disabled">';
                break;
            }

            foreach ($T_Complemetaria as $key => $value)
            {
                if ($vtipoCom_sel==$key)
                {
                    $cbTipo_Comple = $cbTipo_Comple.'<option value="'.$key.'" selected="selected">'.$value.'</option>';
                }
                else
                {
                    $cbTipo_Comple = $cbTipo_Comple.'<option value="'.$key.'">'.$value.'</option>';
                }
            }
            $cbTipo_Comple = $cbTipo_Comple.'</select>';
            $this->Tipo_Comple=$cbTipo_Comple;
        }
        else
        {
            foreach ($rd_tipo_dec as $key => $value)
            {
                if ($vtipo_dec==$key)
                {
                    $rb_tipo = '<input type="radio" name="tipo" value="'.$key.'" onClick="recarga(this.form);" checked style="border:none" disabled="disabled"/>';
                    $rb_tipo = $rb_tipo.'<span style="font-family:Arial; font-size:8pt">'.$value.'</span>';
                }
                else
                {
                    $rb_tipo = $rb_tipo.'<input type="radio" name="tipo" value="'.$key.'" onClick="recarga(this.form);" style="border:none" disabled="disabled"/>';
                    $rb_tipo = $rb_tipo.'<span style="font-family:Arial; font-size:8pt">'.$value.'</span>';
                }
                $this->rboton_tipo=$rb_tipo;
                $_SESSION['tipo']=$vtipo_dec;
            }

            $this->disabled='style="font-family:Arial; font-size: 8pt; text-align:right; width:55px; color:#8D8C8C;" readonly="readonly"';
            $this->txt_fecha='<input type="text" name="txt_fecha" style="width:95px; height:17px; font-family:Arial; font-size:8pt; background-repeat: no-repeat; background-position: right center; border: 1px solid #BDBDBD;" disabled="disabled" maxlength="10" value=""/>';

            $cbTipo_Comple = $cbTipo_Comple.'<select name="Tipo_comple" style="font-family:Arial; font-size:8pt; color:#999" disabled="disabled">';
            foreach ($T_Complemetaria as $key => $value)
            {
                if ($vtipoCom_sel==$key)
                {
                    $cbTipo_Comple = $cbTipo_Comple.'<option value="'.$key.'" selected="selected">$value</option>';
                }
                else
                {
                    $cbTipo_Comple = $cbTipo_Comple.'<option value="'.$key.'">$value</option>';
                }
            }
            $cbTipo_Comple = $cbTipo_Comple.'</select>';
            $this->Tipo_Comple=$cbTipo_Comple;
        }
    }

    function fnGetComprobar_email($email)
    {
        if ($email=="")
        {
            $this->mensajemail="" ;
            $this->email=$email;
        }
        else
        {
            $mail_correcto = 0;
            //compruebo unas cosas primeras
            if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@"))
            {
                if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," ")))
                {
                //miro si tiene caracter .
                    if (substr_count($email,".")>= 1)
                    {
                    //obtengo la terminacion del dominio
                        $term_dom = substr(strrchr ($email, '.'),1);
                    //compruebo que la terminación del dominio sea correcta
                        if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) )
                        {
                            //compruebo que lo de antes del dominio sea correcto
                            $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                            $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                            if ($caracter_ult != "@" && $caracter_ult != ".")
                            {
                                $mail_correcto = 1;
                            }
                        }
                    }
                }
            }
            if ($mail_correcto)
            {
                $this->mensajemail='';
                $this->email=$email;
            }
            else
            {
                $this->mensajemail='<span style=" font-size:7pt; font-family:Arial; color:red">formato incorrecto</span>';
                $this->email=$email;
            }
        }
    }

    function fnCreaArrayEmpSubcontratadas($txtRFCEmpresa, $vddl_tipoEmpresa_sel, $txtNumEmp, $txtImporteEmp, $vanio_sel, $vmes_sel, $txtNEmpSub, $vrbmotivo)
  {
      $this->msjRFCEmpresa='';
      $this->msjTipoEmp=''; //Aida 25/07/2018
      $this->msjNumEmp='';
      $this->msjImporteEmp='';
      $this->txtRFCEmpresa=$txtRFCEmpresa;
      $this->ddlTipoEmpresa=$vddl_tipoEmpresa_sel; //Aida 25/07/2018
      $this->txtNumEmp=$txtNumEmp;
      $this->txtImporteEmp=$txtImporteEmp;
      $this->msjRFCEmpresa='';

      if ($txtNEmpSub=='0' && $vrbmotivo<>2)
      {
          $this->msjRFCEmpresa='Tiene que tener empleados subcontratados o la opci&oacute;n Acreditan por retenci&oacute;n, para poder agregar empresas subcontratadas ';
          return;
      }

      if ($txtRFCEmpresa=='')
      {
          $this->msjRFCEmpresa='RFC Obligatorio';
      }
      else
      {
          if (strlen($txtRFCEmpresa) < 10)
          {
              $this->msjRFCEmpresa='RFC Incompleto';
          }
      }

      if ($vddl_tipoEmpresa_sel=='0') //Aida 25/07/2018
      {
          $this->msjTipoEmp='Tipo empresa Obligatorio';
      }

      if ($txtNumEmp=='')
      {
          $this->msjNumEmp='Nùmero de empleados Obligatorio';
      }
      else
      {
          if (!is_numeric($txtNumEmp))
          {
              $this->msjNumEmp='Introduzca solo Números';
          }
          else
          {
              if (substr_count($txtNumEmp,".") > 0)
              {
                  $this->msjNumEmp='Solo Números Enteros';
              }
              elseif (substr_count($txtNumEmp,"-") > 0)
              {
                  $this->msjNumEmp='Solo Números Positivos';
              }
          }
      }

      if ($txtImporteEmp=='')
      {
          $this->msjImporteEmp='Importe Obligatorio';
      }
      else
      {
          if (!is_numeric($txtImporteEmp))
          {
              $this->msjImporteEmp='Introduzca solo Números';
          }
          else
          {
              if (substr_count($txtImporteEmp,".") > 0)
              {
                  $this->msjImporteEmp='Solo Números Enteros';
              }
              elseif (substr_count($txtImporteEmp,"-") > 0)
              {
                  $this->msjImporteEmp='Solo Números Positivos';
              }
          }
      }

      if ($this->msjRFCEmpresa=='' && $this->msjTipoEmp=='' && $this->msjNumEmp=='' && $this->msjImporteEmp=='') //Aida 25/07/2018 msjTipoEmp
      {
          if (isset($ArrEmp_Subcontratadas))
          {
              $ArrEmpresas=$ArrEmp_Subcontratadas;

              $contador = $contador + 1;
          }
          else
          {
              $contador=1;
          }

          $ArrEmpresa = array
          (
          'Mes_Declarado'=>$vmes_sel,
          'Anio_Declarado'=>$vanio_sel,
          'RFC_Empresa'=>$txtRFCEmpresa,
          'Tipo_Empresa'=>$vddl_tipoEmpresa_sel, //Aida 25/07/2018
          'Num_EmpleadosSub'=>$txtNumEmp,
          'ImporteCausado'=>$txtImporteEmp,
            );
          $ArrEmpresas[(string)$contador]=$ArrEmpresa;
          $ArrEmp_Subcontratadas=$ArrEmpresas;

          $this->fnCreaTablaEmpSubcontratadas();
          $this->txtRFCEmpresa='';
          $this->ddlTipoEmpresa='0';//Aida 25/07/2018
          $this->txtNumEmp='';
          $this->txtImporteEmp='';
      }
  }

  function fnCreaTablaEmpSubcontratadas()
   {
       if (isset($ArrEmp_Subcontratadas))
       {

           foreach ($ArrEmp_Subcontratadas as $posicion => $dato)
           {
               foreach ($ArrEmp_Subcontratadas[$posicion] as $posicion2 => $dato2)
               {
                   if ($posicion2=='RFC_Empresa')
                   {

                   $tr_i.= $ArrEmp_Subcontratadas[$posicion]['RFC_Empresa'];
                   $tr_i.= $ArrEmp_Subcontratadas[$posicion]['Tipo_Empresa'];//Aida 25/07/2018
                   $tr_i.= $ArrEmp_Subcontratadas[$posicion]['Num_EmpleadosSub'];
                   $tr_i.= $ArrEmp_Subcontratadas[$posicion]['ImporteCausado'];
                   $tr_i.= $ArrEmp_Subcontratadas[$posicion]['BtnEliminar'];

                   }
               }
           }

           $Tabla_EmpresasSub=$tr_i;
       }
   }

   function fnElimina_Empresa_Subcontratada($idsub)
   {
       if(isset($ArrEmp_Subcontratadas))
       {
           unset($ArrEmp_Subcontratadas[$idsub]);
       }

       if (count($ArrEmp_Subcontratadas) == 0)
       {
           unset($ArrEmp_Subcontratadas);
           unset($Tabla_EmpresasSub);
           unset($contador);
       }
       else
       {
           $this->fnCreaTablaEmpSubcontratadas();
       }
   }

    //mensaje del subsidio
    function fnComparaMeses($vanio_sel, $vmes_sel, $arrayDescuento)
    {

        $this->msjSubsidio='';
        $this->EtiquetaNoSub='Impuesto no subsidiado';
        $this->EtiquetaSub='Impuesto subsidiado';
        $this->EtPorcentaje='';

        if ($arrayDescuento['Descuento'] <> '')
        {
            foreach ($arrayDescuento['Descuento'] as $posicion => $valor)
            {
                foreach ($arrayDescuento['Descuento'][$posicion] as $posicion2 => $valor2)
                {
                    if ($posicion2=='Id_tipoMov')
                    {
                        if ($arrayDescuento['Descuento'][$posicion]['Id_tipoMov'] <> 356)
                        {
                            $count=count($Pos=explode('/',$arrayDescuento['Descuento'][$posicion]['Dato_nvo']));
                            $anio=$Pos[1];
                            $mes=$Pos[0];

                            if ($count<3)
                            {
                                $emp=0;
                            }
                            else
                            {
                                $emp=$Pos[2];
                            }

                            if (substr_count($arrayDescuento['Descuento'][$posicion]['Dato_ant'], '|') > 0)
                            {
                                $Pos2=explode('|',$arrayDescuento['Descuento'][$posicion]['Dato_ant']);

                                $Porciento=intval(substr($Pos2[0], 0, 3));
                                $Autoriza=trim(substr($Pos2[0], 3));
                                $MsjEmpleados='total de empleados. '.trim($Pos2[1]);
                            }
                            else
                            {
                                $Porciento=intval(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 0, 3));
                                $Autoriza=trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3));
                                $MsjEmpleados='excedente de: '.$emp.' empleados';
                            }

                            if ($vanio_sel==$anio && $vmes_sel==$mes)
                            {
                                //$this->msjSubsidio='<span style="font-family:arial; font-size: 8pt; color: red">Subsidio autorizado por '.$Autoriza.' del '.$Porciento.'%, por el '.$MsjEmpleados.'</span>';
                                if($arrayDescuento['Descuento'][$posicion]['Id_tipoMov'] == 343)
                                {
                                    $this->msjSubsidio='Subsidio autorizado por '.$Autoriza.' del '.$Porciento.'%';
                                    //$this->msjSubsidio='<span style="font-family:arial; font-size: 8pt; color: red">Subsidio autorizado por '.$Autoriza.' del '.$Porciento.'%, por el '.$MsjEmpleados.'</span>';
                                }
                                else
                                {
                                    $this->msjSubsidio='Subsidio autorizado por '.$Autoriza.' del '.$Porciento.'%';
                                }


                                $this->EtiquetaNoSub='Impuesto no subsidiado por '.$emp.' empleados';
                                if($emp=='0')
                                {
                                    $this->EtiquetaSub='Impuesto subsidiado sobre el total de su plantilla laboral';
                                }
                                else
                                {
                                    $this->EtiquetaSub='Impuesto subsidiado por el excedente de: '.$emp.' empleados</span>';
                                }
                                $this->EtPorcentaje=$Porciento.'%';
                            }
                        }
                    }
                }
            }
        }
    }

    function fnCreaRBMotivo ($vrbmotivo, $txtSaldo_Pendiente)
    {
        $rb_motivo='';

        if ($txtSaldo_Pendiente > 0)
        {
            $disabled='';
            $color='';
        }
        else
        {
            $disabled='disabled="disabled"';
            $vrbmotivo='1';
            $color='color: #A4A4A4';
        }

        if ($vrbmotivo=='1')
        {
            $checked1='checked';
            $checked2='';
            $this->titulo='Subcontratadas';
        }
        else
        {
            $checked1='';
            $checked2='checked';
            $this->titulo='Retenedoras';
        }

      //  $rb_motivo .= '<input type="radio" name="rbmotivo" value="1" '.$checked1 .' '.$disabled.' onClick="recarga(this.form);" style="border:none"/>';
        $rb_motivo .= 'Correcci&oacute;n del impuesto';
      //  $rb_motivo .= '<input type="radio" name="rbmotivo" value="2" '.$checked2.' '.$disabled.' onClick="recarga(this.form);" style="border:none"/>';
        $rb_motivo .= 'Acreditan por retenci&oacute;n';
        $this->rboton_motivo=$rb_motivo;
    }

    // crea  array de  sucursales (se agrago el idnegocio y arraydatosguardado)
    function fnCreaArraySucursales($id_negocio, $vCtaEstatal, $vNEmpleados, $vNAsimilables, $vNOtros, $vImporteDec, $vMun, $vNEmplSub, $ArrSucursales_Datos_Guardados)
   {
       $this->msjMun='';
       $this->msjCtaEst='';
       $this->msjNEmpleados='';
       $this->msjNAsimilables='';
       $this->msjNOtros='';
       $this->msjImporteDec='';
       $this->msjSucursales='';
       $this->msjNEmplSub='';

       $this->vCtaEstatal=$vCtaEstatal;
       $this->vNEmpleados=$vNEmpleados;
       $this->vNAsimilables=$vNAsimilables;
       $this->vNOtros=$vNOtros;
       $this->vNEmplSub=$vNEmplSub;
       $this->vImporteDec=$vImporteDec;
       $this->vMun=$vMun;

       if ($vMun=='00')
       {
           $this->msjMun='Municipio Obligatorio ';
       }

       if ($vCtaEstatal=='')
       {
           $this->msjCtaEst='Cuenta Estatal Obligatorio';
       }
       else
       {
           if (strlen($vCtaEstatal) < 8)
           {
               $this->msjCtaEst='Introduzca los 8 digitos';
           }
           elseif(strlen($vCtaEstatal) == 8)
           {
               $sucursal=substr($vCtaEstatal, 6, 2);

               if (!is_numeric($sucursal))
               {
                   $this->msjCtaEst='Formato Incorrecto';
               }
               else
               {
                   $guion=substr($vCtaEstatal, 5, 1);
                   if ($guion <> '-')
                   {
                       $this->msjCtaEst='Formato Incorrecto';
                   }
                   else
                   {
                       $cta_est=substr($vCtaEstatal, 0, 5);
                       if (!is_numeric($cta_est))
                       {
                           $this->msjCtaEst='Formato Incorrecto';
                       }
                   }
               }
           }
       }

       if ($vNEmpleados=='')
       {
           $this->msjNEmpleados='Num Empleados Obligatorio';
       }
       else
       {
           if (!is_numeric($vNEmpleados))
           {
               $this->msjNEmpleados='Solo Numeros en Num empleados';
           }
           else
           {
               if (substr_count($vNEmpleados,".") > 0)
               {
                   $this->msjNEmpleados='Solo Números Enteros en Empleados';
               }
               elseif (substr_count($vNEmpleados,"-") > 0)
               {
                   $this->msjNEmpleados='Solo Números Positivos';
               }
           }
       }

       if ($vImporteDec=='')
       {
           $this->msjImporteDec='importe Declarado es Obligatorio';
       }
       else
       {
           if (!is_numeric($vImporteDec))
           {
               $this->msjImporteDec='Solo Numeros';
           }
           else
           {
               if (substr_count($vImporteDec,".") > 0)
               {
                   $this->msjImporteDec='Solo Números Enteros';
               }
               elseif (substr_count($vImporteDec,"-") > 0)
               {
                   $this->msjImporteDec='Solo Números Positivos';
               }
           }
       }

       if ($this->msjMun=='' && $this->msjCtaEst=='' && $this->msjNEmpleados=='' && $this->msjImporteDec=='' && $this->msjNAsimilables=='' && $this->msjNOtros=='')
       {

           $this->GetDaMunicipioString($vMun);
           $vMunStr=$this->mun_string;

           $this->vCtaEstatal='';
           $this->vNEmpleados='0';
           $this->vNAsimilables='0';
           $this->vNOtros='0';
           $this->vNEmplSub='0';
           $this->vImporteDec='0';
           $this->vMun='00';

           if ($vNAsimilables=='')
           {
               $vNAsimilables='0';
           }

           if ($vNOtros=='')
           {
               $vNOtros='0';
           }
           if ($vNEmplSub=='')
           {
               $vNEmplSub='0';
           }

           //CONSULTA

           $Conec_Mun = new Class_Conexion;
           $Conec_Mun->GetfnCon_Municipio($vMun);
           $conec_mun=$Conec_Mun->DB_conexion;

           $vCtaCompleta=$vMun.$vCtaEstatal;

           $strValidaCta = oci_parse($conec_mun, "SELECT id_negocio,fecha_baja,id_situacion FROM SIATT.NHHMAE_NEGOCIO WHERE CUENTA_ESTATAL='$vCtaCompleta'");

           oci_execute($strValidaCta);
           oci_close($conec_mun);
           $vExiste=0;
           $vConcentrar='';
           $vEstatus='';

           while ($row = oci_fetch_array($strValidaCta))
           {
               if($row[0]<>'')
               {
                   $vExiste=1;
                   if($row[1]=='')
                   {
                       $vConcentrar=' Concentrar Cta';
                   }
                   else
                   {
                       $vConcentrar='';
                   }
                   //ESTATUS_PRAL
                   if($row_sucursal[2]==117)
                   {
                       if($row_sucursal[1]<>'')
                       {
                           $vEstatus='PRAL';
                       }
                       else
                       {
                           $vEstatus='ACTIVO_PRAL';
                       }
                   }
                   else
                   {
                       if($row_sucursal[1]<>'')
                       {
                           $vEstatus='BAJA_DIF_PRAL';
                       }
                       else
                       {
                           $vEstatus='ACTIVO_DIF_PRAL';
                       }
                   }
               }
           }
           oci_free_statement($strValidaCta);

           if($vExiste==0)
           {
               $this->msjCtaEst='La cuenta no existe';
           }
           else
           {

               if (isset($ArrSucursales_Datos_Guardados))
               {
                   $ArrSucursales_Datos_Guardados=$ArrSucursales_Datos_Guardados;

                   if (count($ArrSucursales_Datos_Guardados)==50)
                   {
                       if($id_negocio=='01012449' || $id_negocio=='36022396' || $id_negocio=='01014903' || $id_negocio=='01014906' ||  $id_negocio=='01015128' || $id_negocio=='01015258' || $id_negocio=='36022396' || $id_negocio=='01008308' || $id_negocio=='01015054')
                       {
                           $_SESSION['contador'] = $_SESSION['contador'] + 1;
                       }
                       else
                       {
                           $this->msjSucursales='Solo puede agregar 25 sucursales';
                           return;
                       }
                   }
                   else
                   {
                       $_SESSION['contador'] = $_SESSION['contador'] + 1;
                   }
               }
               else
               {
                   $_SESSION['contador']=1;
               }

               //diego
               $ArrSucursal=$ArrSucursales_Datos_Guardados;
               foreach ($ArrSucursal as $posicion => $dato)
               {
                   foreach ($ArrSucursal[$posicion] as $posicion2 => $dato2)
                   {
                       if ($posicion2=='CtaEstatal')
                       {
                           if($vCtaEstatal==$ArrSucursal[$posicion]['CtaEstatal'] &&  $vMunStr==$ArrSucursal[$posicion]['Municipio'])
                           {
                               $this->msjSucursales='La cuenta que esta intentando ingresar, ya se encuentra agregada.';
                               return;
                           }
                       }
                   }
               }


              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['Municipio']=$vMunStr;
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['CtaEstatal']=$vCtaEstatal;
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['Fecha_Baja']=$vConcentrar;
              /*
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['txt_CtaEstatal']='<input type="text" name="NCtaEst'.$_SESSION['contador'].'" onBlur="recarga(this.form);" style="font-size:8pt; font-family:Arial; text-align:left; width:50px" maxlength="8" value="'.$vCtaEstatal.'" />';
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['txt_NEmpleado']='<input type="text" name="NEmpleados'.$_SESSION['contador'].'" maxlength="6" onBlur="recarga(this.form);" style="font-size:8pt; font-family:Arial; text-align:right; width:40px"  value="'.$vNEmpleados.'" />';
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['txt_NAsimilables']='<input type="text" name="NAsimilables'.$_SESSION['contador'].'" maxlength="6" onBlur="recarga(this.form);" style="font-size:8pt; font-family:Arial; text-align:right; width:40px"  value="'.$vNAsimilables.'" />';
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['txt_NOtros']='<input type="text" name="NOtros'.$_SESSION['contador'].'" maxlength="6" onBlur="recarga(this.form);" style="font-size:8pt; font-family:Arial; text-align:right; width:40px"  value="'.$vNOtros.'" />';
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['txt_NEmplSub']='<input type="text" name="NEmplSub'.$_SESSION['contador'].'" maxlength="6" onBlur="recarga(this.form);" style="font-size:8pt; font-family:Arial; text-align:right; width:40px"  value="'.$vNEmplSub.'" />';
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['txt_ImporteDec']='<input type="text" name="NImporte'.$_SESSION['contador'].'" maxlength="8" onBlur="recarga(this.form);" style="font-size:8pt; font-family:Arial; text-align:right; width:50px"  value="'.$vImporteDec.'" />';
            */
              $ArrSucursales_Datos_Guardados[(string)$_SESSION['contador']]['estatus_sucursal']=$vEstatus;
           }
       }
   }



      //calcula actualizacion y  recargos
    function GetfnAct_Rec($vtipo_dec, $vmes_sel, $txtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion,
    $vEstFed,$vSaldoaFavor)
    {

        $txtImporte_Pagar = ($txtImporte_Pagar) - ($vtxtImporte_Declaracion) - ($vSaldoaFavor);


        If ($txtImporte_Pagar < 0)
        {
            $txtImporte_Pagar = "0";
        }

        $vmes_sel = $vmes_sel + 1;



        switch($vmes_sel)
        {
            case 1:
            $vmes_sel="01";
            break;

            case 2:
            $vmes_sel="02";
            break;

            case 3:
            $vmes_sel="03";
            break;

            case 4:
            $vmes_sel="04";
            break;

            case 5:
            $vmes_sel="05";
            break;

            case 6:
            $vmes_sel="06";
            break;

            case 7:
            $vmes_sel="07";
            break;

            case 8:
            $vmes_sel="08";
            break;

            case 9:
            $vmes_sel="09";
            break;

            case 13:
            $vmes_sel="01";
            $vanio_sel = $vanio_sel + 1;
            break;
        }

        $Dias_asumar = 1;
        $Fecha_entrada = "14/".$vmes_sel."/".$vanio_sel;


        $vFecha_entrada = $Fecha_entrada;
        $vId_OfnaFiscal = 1; //no lo utiliza la funcion pero se le tiene que enviar
        $vDias_a_Sumar = $Dias_asumar;
        $vTipo_Dias = "H";



       //SACAR FECHA DE VENCIMIENTO
        $Fech_Vencimiento=new ClsFechaVencimiento;
        $Fech_Vencimiento->fnVencimiento($vId_OfnaFiscal, $vDias_a_Sumar, $vTipo_Dias, $vFecha_entrada);
        $vFecha_Vencimiento=$Fech_Vencimiento->vfecha_vencimiento;
        $hoy=date("d/m/Y");



        $fecha= empty($vFecha_Vencimiento)?date('d/m/Y'):$vFecha_Vencimiento;
        $dd   = explode('/',$vFecha_Vencimiento);
        $ts   = mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
        $valdia=date('d',$ts);
        $valmes=date('m',$ts);
        $valanio=date('Y',$ts);

        $Fecha_Vence2=mktime(0,0,0,($valmes-1),$valdia,$valanio);

        $fecha= empty($hoy)?date('d/m/Y'):$hoy;
        $dd   = explode('/',$hoy);
        $ts   = mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
        $valdia=date('d',$ts);
        $valmes=date('m',$ts);
        $valanio=date('Y',$ts);

        $Fecha_Hoy3=mktime(0,0,0,($valmes-1),$valdia,$valanio);
        $vCalcula="";



        if($Fecha_Vence2<$Fecha_Hoy3)
        {
            $vCalcula="S";
        }
        else
        {
            $vCalcula="N";
        }

        //SI LA FECHA DE VENCIMIENTO ES MAYOR AL DIA DE HOY (DECLARACION) SE CALCULA ACTUALIZACIONES Y RECARGOS
        if($vCalcula=="S")
        {
            $ADAT_FECHA_VENCE = $vFecha_Vencimiento;
            $ADAT_FECHA_PAGO = $hoy;
            $AVALOR = $txtImporte_Pagar;
            $AESTATAL_FED = $vEstFed;

            try
            {

            //  $conec_mun=$Conexion->DB_conexion;


                $vmun = '01';
                $Conexion = new Class_Conexion;
                $Conexion->GetfnCon_Municipio($vmun);
                $conec_mun=$Conexion->DB_conexion;

                $query_act_rec= "begin SIATT.SP_ACT_REC_ESTATAL_INTER(to_date('$ADAT_FECHA_VENCE', 'dd/mm/yyyy'), to_date('$ADAT_FECHA_PAGO', 'dd/mm/yyyy'), '$AVALOR', '$AESTATAL_FED', :vACTUALIZACION, :vRECARGOS); end;";


                $state = oci_parse($conec_mun, $query_act_rec) or die ('sintaxis incorrecta1.');
                OCIBindByName($state,":vACTUALIZACION", $vACTUALIZACION, 8) or die ('no se cargo la variable');
                OCIBindByName($state,":vRECARGOS", $vRECARGOS, 8) or die ('no se cargo la variable');
                ociexecute($state) or die ('no se ejecuto1');
                oci_close($conec_mun);

               //}

                $this->vActualizacion = round($vACTUALIZACION);
                $this->vRecargos=round($vRECARGOS);
                $this->vFecha_Vmto=$vFecha_Vencimiento;
                oci_free_statement($state);
            }
            catch (Exception $exc)
            {
                echo $exc->getTraceAsString();
                oci_close($conec_mun);
            }
        }
        else
        {
            $this->vActualizacion="0";
            $this->vRecargos="0";
            $this->vFecha_Vmto=$vFecha_Vencimiento;
        }
    }


    function GetfnSuma_Declaracion($vnum_empleados, $vtipo_dec, $vmes_sel,
    $vanio_sel, $vtxtImporte_Pagar,
     $vtxtMultas, $vtxtSaldo_Pendiente, $vtxtImporte_Declaracion, $vnum_asimilables, $vnum_otros,
     $txtEmpSubcontratados, $txtRFCEmpresa, $txtNEmpSub, $i, $vrbmotivo, $id_negocio)
    {
        $txtRecargos=0;
        $txtActualizacion=0;
        $txtTotalDeclaracion=0;
        $this->txtImpuestoCargo=0;
        $this->txtImpuestoFavor=0;
        $this->txtTotalPagar=0;
        $this->txtRFCEmpresa=$txtRFCEmpresa;
        $this->des_habNEmpSub='';
        $this->des_habtext='';
        $this->des_habtext_EmpSubcontratados='';
        $mensajeError='';



        $arraySubsidio['Subsidio'][$i]['Imp_Subsidio']=0;
        $arraySubsidio['Subsidio'][$i]['Act_Subsidio']=0;
        $arraySubsidio['Subsidio'][$i]['Rec_Subsidio']=0;
        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=0;


        //valida variables

        $vnum_empleados=intval($vnum_empleados);

        if (!is_numeric($vnum_empleados))
        {
            $this->txtnum_empleados=0;
        }
        else
        {
            if(is_int($vnum_empleados))
            {
                $this->txtnum_empleados=$vnum_empleados;
            }
            else
            {
                $this->txtnum_empleados=0;
            }

            if($vnum_empleados<0)
            {
                $this->txtnum_empleados=0;
            }
        }

        //Valida txtAsimilables
        $vnum_asimilables=intval($vnum_asimilables);

        if(!is_numeric($vnum_asimilables))
        {
            $this->txtnum_asimilables=0;
        }
        else
        {
            if (is_int($vnum_asimilables))
            {
                $this->txtnum_asimilables=$vnum_asimilables;
            }
            else
            {
                $this->txtnum_asimilables=0;
            }

            if ($vnum_asimilables<0)
            {
                $this->txtnum_asimilables=0;
            }
        }

        //Valida txtOtros
        $vnum_otros=intval($vnum_otros);

        if(!is_numeric($vnum_otros))
        {
            $this->txtnum_otros=0;
        }
        else
        {
            if(is_int($vnum_otros))
            {
                $this->txtnum_otros=$vnum_otros;
            }
            else
            {
                $this->txtnum_otros=0;
            }

            if ($vnum_otros<0)
            {
                $this->txtnum_otros=0;
            }
        }

        //Valida txtImporte_Pagar
        $vtxtImporte_Pagar=intval($vtxtImporte_Pagar);

        if(!is_numeric($vtxtImporte_Pagar))
        {
            $this->txtImportePagar=0;
        }

        if(is_int($vtxtImporte_Pagar))
        {
            $this->txtImportePagar=$vtxtImporte_Pagar;
        }
        else
        {
            $this->txtImportePagar=0;
        }

        if($vtxtImporte_Pagar<0)
        {
            $this->txtImportePagar=0;
        }

        //Valida txtMultas
        $vtxtMultas=intval($vtxtMultas);

        if(!is_numeric($vtxtMultas))
        {
            $this->txtMultas=0;
        }

        if(is_int($vtxtMultas))
        {
            $this->txtMultas=$vtxtMultas;
        }
        else
        {
            $this->txtMultas=0;
        }

        if ($vtxtMultas<0)
        {
            $this->txtMultas=0;
        }

        //Valida txtSaldoPendienteAcreditar
        $vtxtSaldo_Pendiente=intval($vtxtSaldo_Pendiente);

        if(!is_numeric($vtxtSaldo_Pendiente))
        {
            $this->txtSaldo_Pendiente=0;
        }

        if(is_int($vtxtSaldo_Pendiente))
        {
            $this->txtSaldo_Pendiente=$vtxtSaldo_Pendiente;
        }
        else
        {
            $this->txtSaldo_Pendiente=0;
        }

        if($vtxtSaldo_Pendiente<0)
        {
            $this->txtSaldo_Pendiente=0;
        }

        //Valida txtImporteDeclaracionRectifica
        $vtxtImporte_Declaracion=intval($vtxtImporte_Declaracion);

        if (!is_numeric($vtxtImporte_Declaracion))
        {
            $this->txtImporte_Declaracion=0;
        }

        if (is_int($vtxtImporte_Declaracion))
        {
            $this->txtImporte_Declaracion=$vtxtImporte_Declaracion;
        }
        else
        {
            $this->txtImporte_Declaracion=0;
        }

        if ($vtxtImporte_Declaracion<0)
        {
            $this->txtImporte_Declaracion=0;
        }

        //Valida txtImporteDeclaracionRectifica
        $txtEmpSubcontratados=intval($txtEmpSubcontratados);

        if (!is_numeric($txtEmpSubcontratados))
        {
            $this->txtEmpSubcontratados=0;
        }

        if (is_int($txtEmpSubcontratados))
        {
            $this->txtEmpSubcontratados=$txtEmpSubcontratados;
        }
        else
        {
            $this->txtEmpSubcontratados=0;
        }

        if ($txtEmpSubcontratados<0)
        {
            $this->txtEmpSubcontratados=0;
        }

        //Valida txtImporteDeclaracionRectifica
        $txtNEmpSub=intval($txtNEmpSub);

        if (!is_numeric($txtNEmpSub))
        {
            $this->txtNEmpSub=0;
        }

        if (is_int($txtNEmpSub))
        {
            $this->txtNEmpSub=$txtNEmpSub;
        }
        else
        {
            $this->txtNEmpSub=0;
        }

        if ($txtNEmpSub<0)
        {
            $this->txtNEmpSub=0;
        }



        if ($vmes_sel=='0')
        {
            $this->des_habNEmpSub='readonly="readonly"';
            $this->txtNEmpSub=0;
            $this->des_habtext='readonly="readonly"';
            $this->txtRFCEmpresa='';
            $this->txtEmpSubcontratados=0;
            $this->des_habtext_EmpSubcontratados='readonly="readonly"';

            if($vtxtImporte_Pagar <> 0 || $vtxtMultas <> 0  || $vtxtSaldo_Pendiente <> 0 || $vtxtImporte_Declaracion <> 0)
            {
                if ($i==1)
                {
                    $mensajeError='Favor de elegir un mes';
                }

                $this->txtImportePagar=0;
                $this->txtRecargos=0;
                $this->txtMultas=0;
                $this->txtSaldo_Pendiente=0;
                $this->txtImporte_Declaracion=0;
                $this->txtActualizacion=0;
                $this->txtImpuestoFavor=0;
                $this->txtnum_empleados=0;
                $this->txtTotalDeclaracion=0;
                $this->txtSaldo_Pendiente=0;
                $this->txtImpuestoCargo=0;
                $this->txtTotalPagar=0;
                return ;
            }
        }
        else
        {
            if ($txtNEmpSub > 0 || $vrbmotivo==2)
            {
                $this->txtEmpSubcontratados=$txtEmpSubcontratados;
                $this->txtRFCEmpresa=$txtRFCEmpresa;

                if ($vrbmotivo==2 && $txtNEmpSub==0)
                {
                    $this->des_habtext_EmpSubcontratados='readonly="readonly"';
                }
            }
            else
            {
                $this->des_habtext='readonly="readonly"';
                $this->des_habtext_EmpSubcontratados='readonly="readonly"';
                $txtEmpSubcontratados=0;
                $this->txtEmpSubcontratados=0;
                $this->txtRFCEmpresa='';
            }

            $arraySubsidio['Subsidio'][$i]['Imp_Subconout']=$txtEmpSubcontratados;
            $arraySubsidio['Subsidio'][$i]['Act_Subconout']=0;
            $arraySubsidio['Subsidio'][$i]['Rec_Subconout']=0;
            $arraySubsidio['Subsidio'][$i]['RFC_Empresa']=$txtRFCEmpresa;
            $arraySubsidio['Subsidio'][$i]['NEmp_Sub']=$txtNEmpSub;

            if ($txtEmpSubcontratados > 0)
            {
                $vEstFed="E";
                $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $txtEmpSubcontratados, $vanio_sel, 0, $vEstFed,$this->txtSaldo_Pendiente);
                $arraySubsidio['Subsidio'][$i]['Act_Subconout']=$this->vActualizacion;
                $arraySubsidio['Subsidio'][$i]['Rec_Subconout']=$this->vRecargos;
            }

            $vtxtImporte_Pagar = $vtxtImporte_Pagar + $txtEmpSubcontratados;



            if ($vtipo_dec=="C" && $vtxtImporte_Declaracion > 0)
            {
                $vEstFed="E";
                $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vtxtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,
                $this->txtSaldo_Pendiente);
            }
            else
            {
                $vtxtImporte_Declaracion=0;
                $vEstFed="E";
                $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vtxtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
            }


            $finanzas = new FinanzasController;
            $arrayDescuento= $finanzas-> GetObtieneSubsidio($id_negocio);





            if ($arrayDescuento['Descuento']<>'')
            {
                $ArrDescuento=$arrayDescuento['Descuento'];
                $Porciento=0;
                $RecCalc=0;
                $mes_anio=substr("00".$vmes_sel,strlen("00".$vmes_sel)-2,2).'/'.$vanio_sel;
                $bandera=0;



                foreach ($ArrDescuento as $posicion => $dato)
                {

                    foreach ($ArrDescuento[$posicion] as $posicion2 => $dato2)
                    {
                        if ($posicion2=='Dato_nvo')
                        {

                            if ($ArrDescuento[$posicion]['Id_tipoMov']=='331')//autoriza subsidio rec y act
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;
                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $RecCalc = round(($this->vRecargos * $Porciento)/100);
                                    $this->vRecargos = $this->vRecargos - $RecCalc;

                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $ActCalc = round(($this->vActualizacion * $Porciento)/100);
                                    $this->vActualizacion = $this->vActualizacion - $ActCalc;

                                    $arraySubsidio['Subsidio'][$i]['Act_Subsidio']=$ActCalc;
                                    $arraySubsidio['Subsidio'][$i]['Rec_Subsidio']=$RecCalc;

                                    //SACA  EL PORCENTAJE DE SUBSIDIO


                                    if (trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=2;
                                    }
                                }
                            }
                            elseif($ArrDescuento[$posicion]['Id_tipoMov']=='341')//autoriza subsidio actualizacion
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;
                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $ActCalc = round(($this->vActualizacion * $Porciento)/100);
                                    $this->vActualizacion = $this->vActualizacion - $ActCalc;

                                    $arraySubsidio['Subsidio'][$i]['Act_Subsidio']=$ActCalc;

                                    if (trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=2;
                                    }
                                }
                            }
                            elseif($ArrDescuento[$posicion]['Id_tipoMov']=='342')//autoriza subsidio recargos
                            {

                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;
                                    $Porciento = substr($ArrDescuento[$posicion]['Dato_ant'], 0, 3);


                                    $RecCalc = round(($this->vRecargos * $Porciento)/100);
                                    $this->vRecargos = $this->vRecargos - $RecCalc;
                                    $arraySubsidio['Subsidio'][$i]['Rec_Subsidio']=$RecCalc;



                                    if (trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($arrayDescuento['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {

                                        $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=2;
                                    }
                                }
                            }
                            elseif($ArrDescuento[$posicion]['Id_tipoMov']=='343')//autoriza subsidio impuesto
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;

                                    if (!isset($arraySubsidio['valida']) && !isset($arraySubsidio['MesAnio']) || $arraySubsidio['valida']<>$vtxtImporte_Pagar || $arraySubsidio['MesAnio']<>$mes_anio)
                                    {
                                        $vtxtImporte_Declaracion=0;
                                        $vEstFed="E";

                                        //CALCULA ACT Y REC ORIGINAL
                                        $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vtxtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
                                        $vAct_Original=round($this->vActualizacion);
                                        $vRec_Original=round($this->vRecargos);

                                        $Porciento = substr($ArrDescuento[$posicion]['Dato_ant'], 0, 3);
                                        $ImporteCalc = round(($vtxtImporte_Pagar * $Porciento)/100);
                                        $vtxtImporte_Pagar = $vtxtImporte_Pagar - $ImporteCalc;

                                        $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vtxtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
                                        $vAct_PagarDec=round($this->vActualizacion);
                                        $vRec_PagarDec=round($this->vRecargos);

                                        $arraySubsidio['Subsidio'][$i]['Imp_Subsidio']=$ImporteCalc;
                                        $arraySubsidio['Subsidio'][$i]['Act_Subsidio']=round($vAct_Original-$vAct_PagarDec);//$this->vActualizacion2;
                                        $arraySubsidio['Subsidio'][$i]['Rec_Subsidio']=round($vRec_Original-$vRec_PagarDec);
                                        $this->txtImportePagar=$vtxtImporte_Pagar;
                                        $arraySubsidio['valida']=$vtxtImporte_Pagar;
                                        $arraySubsidio['MesAnio']=$mes_anio;

                                        if (trim(substr($arraySubsidio['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                        {
                                            $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=1;
                                        }
                                        elseif (trim(substr($arraySubsidio['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                        {
                                            $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=3;
                                        }
                                        elseif(trim(substr($arraySubsidio['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                        {
                                            $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=2;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                if($bandera==0)
                {
                    $arraySubsidio['Subsidio'][$i]['Imp_Subsidio']=0;
                    $arraySubsidio['Subsidio'][$i]['Act_Subsidio']=0;
                    $arraySubsidio['Subsidio'][$i]['Rec_Subsidio']=0;
                    $arraySubsidio['Subsidio'][$i]['Tipo_Mov']=0;
                }
            }



            //Valida txtActualizacion
            $this->vActualizacion=intval($this->vActualizacion);

            if (!is_numeric($this->vActualizacion))
            {
                $this->txtActualizacion=0;
            }

            if (is_int($this->vActualizacion))
            {
                $this->txtActualizacion=$this->vActualizacion;
            }
            else
            {
                $this->txtActualizacion=0;
            }

            if ($this->vActualizacion<0)
            {
                $this->txtActualizacion=0;
            }




          // ver donde coocar este   codigo


          $this->fnComparaMeses($vanio_sel, $vmes_sel, $arrayDescuento);
          $msjSubsidio=$this->msjSubsidio;
          $EtiquetaNoSub=$this->EtiquetaNoSub;
          $EtiquetaSub=$this->EtiquetaSub;
          $EtPorcentaje=$this->EtPorcentaje;


          $this->fnCreaRBMotivo($vrbmotivo, $vtxtSaldo_Pendiente);
          $RB_Motivo=$this->rboton_motivo;
          $titulo=$this->titulo;
          ///



            //Valida txtRecargos
            $this->vRecargos=intval($this->vRecargos);

            if (!is_numeric($this->vRecargos))
            {
                $this->txtRecargos=0;
            }

            if (is_int($this->vRecargos))
            {
                $this->txtRecargos=$this->vRecargos;
            }
            else
            {
                $this->txtRecargos=0;
            }

            if ($this->vRecargos<0)
            {
                $this->txtRecargos=0;
            }

            //VALIDACION CUANDO YA SE PAGO EL IMPORTE POR RETENEDORA. AUT. LIC MARY 27/08/2015
            $vTotEmpleados=($this->txtnum_empleados + $this->txtnum_asimilables + $this->txtnum_otros);
            if($this->txtNEmpSub>0)
            {
                if($vTotEmpleados==0)
                {
                    if($vrbmotivo==2)
                    {
                        if($this->txtEmpSubcontratados==$this->txtSaldo_Pendiente)
                        {
                            $this->txtRecargos=0;
                            $this->txtActualizacion=0;
                        }
                    }
                }
            }
            //VALIDACION PROGRAMA FIN DE AÑO
            $vFecha_Act=date('d/m/Y');
            //$Hora_Act=date('H:i:s');
            $vFecha_Act= empty($vFecha_Act)?date('d/m/Y'):$vFecha_Act;
            $dd = explode('/',$vFecha_Act);
            $ts = mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
            $dia_act=date('d',$ts);
            $mes_act=date('m',$ts);
            $anio_act=date('Y',$ts);
            $Fecha_Actual=mktime(0,0,0,$mes_act,$dia_act,$anio_act);


                $vFecha_Ini='01/12/2015';


            //$Hora_Act=date('H:i:s');
            $vFecha_Ini= empty($vFecha_Ini)?date('d/m/Y'):$vFecha_Ini;
            $dd = explode('/',$vFecha_Ini);
            $ts = mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
            $dia_act=date('d',$ts);
            $mes_act=date('m',$ts);
            $anio_act=date('Y',$ts);
            $Fecha_Inicio=mktime(0,0,0,$mes_act,$dia_act,$anio_act);

            $vFecha_Fin='31/12/2015';
            //$Hora_ActFin=date('H:i:s');
            $vFecha_Fin= empty($vFecha_Fin)?date('d/m/Y'):$vFecha_Fin;
            $ddFin = explode('/',$vFecha_Fin);
            $tsFin = mktime(0,0,0,$ddFin[1],$ddFin[0],$ddFin[2]);
            $dia_actFin=date('d',$tsFin);
            $mes_actFin=date('m',$tsFin);
            $anio_actFin=date('Y',$tsFin);
            $Fecha_Final=mktime(0,0,0,$mes_actFin,$dia_actFin,$anio_actFin);

            if($Fecha_Actual>=$Fecha_Inicio && $Fecha_Actual<=$Fecha_Final)
            {
                if($i==1)
                {
                    $Sub_programa=$this->txtRecargos;
                    $Sub_Mul_programa=$this->txtMultas;
                }
                else
                {
                    $Sub_programa2=$this->txtRecargos;
                    $Sub_Mul_programa2=$this->txtMultas;
                }
                $this->txtRecargos=0;
                $this->txtMultas=0;
            }

            //MODIFICACION PARA DECLARACIONES QUE YA SE LES RETUVO EL IMPUESTO POR OUTSOURCING
            //AUT. LIC MARY 01/12/2016
            if($this->txtSaldo_Pendiente>0 && $vrbmotivo==2)
            {
                //echo $_SESSION['Rfc'];
                $Conexion = new Class_Conexion;
                $Conexion->GetfnCon_Principal(10);
                $conec=$Conexion->DB_conexion;

                $vRFC=$txtRFCEmpresa;
                $vFolio=0;
                $vImpCausado=0;
                $strsql = oci_parse($conec, "SELECT MOV.FOLIO_INTERNET,CON.IMPORTE_CAUSADO
                    FROM INGRESOS.NHHMOV_EMPRESA_SUBCONTRATADA CON, INGRESOS.NHHMOV_DECLARACION MOV
                    WHERE CON.FOLIO_INTERNET=MOV.FOLIO_INTERNET
                    AND CON.EJERCICIO_FISCAL=MOV.EJERCICIO_FISCAL
                    AND CON.MES_DECLARADO=MOV.MES_DECLARADO
                    AND MOV.FECHA_PROCESADO IS NOT NULL
                    AND CON.RFC_EMPRESA='$vRFC'
                    AND CON.EJERCICIO_FISCAL=$vanio_sel
                    AND CON.MES_DECLARADO=$vmes_sel");
                //AND CON.IMPORTE_CAUSADO=$vtxtImporte_Pagar

                oci_execute($strsql);
                oci_close($conec);
                while ($row = oci_fetch_array($strsql))
                {
                    $vFolio=$row['FOLIO_INTERNET'];
                    $vImpCausado=$row['IMPORTE_CAUSADO'];
                }
                oci_free_statement($strsql);

                if($vFolio>0)
                {
                    if($vtxtImporte_Pagar==$vImpCausado || $vtxtImporte_Pagar<$vImpCausado)
                    {
                        $this->vRecargos=0;
                        $this->vActualizacion=0;
                        $this->txtRecargos=0;
                        $this->txtActualizacion=0;
                    }
                    elseif($vtxtImporte_Pagar>$vImpCausado)
                    {
                        $vDifCalcular=$vtxtImporte_Pagar-$vImpCausado;
                        $vtxtImporte_Declaracion=0;
                        $vEstFed="E";
                        $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vDifCalcular, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);

                        $this->txtRecargos=round($this->vRecargos);
                        $this->txtActualizacion=round($this->vActualizacion);
                    }
                }
            }

            $Suma1= ($this->txtImportePagar) + ($this->txtActualizacion) + ($this->txtRecargos) + ($this->txtMultas) + ($this->txtEmpSubcontratados);
            $Suma2= $this->txtSaldo_Pendiente;
            $Suma3= ($Suma1) - ($Suma2);
            $Suma4= $this->txtImporte_Declaracion;

            /*Mostrar valores */
            $this->txtTotalDeclaracion=$Suma1;
            $this->txtSaldo_Pendiente=$Suma2;
            $this->txtImpuestoCargo=$Suma1-$Suma4;
            $this->txtTotalPagar=$Suma3-$Suma4;

            if ($this->txtTotalPagar<0 )
            {
                $this->txtTotalPagar=0;
            }

            if($Suma4 > $Suma1)
            {
                $this->txtImpuestoCargo=0;
                $this->txtImpuestoFavor=$Suma4 - $Suma1;
            }
            else
            {
                $this->txtImpuestoFavor=$Suma1 - $Suma4;
                $this->txtImpuestoFavor=0;
            }
        }
    }

    function GetfnSuma_Declaracion_Subsidio($vnum_empleados, $vtipo_dec, $vmes_sel, $vanio_sel,
    $vtxtImporte_Pagar, $vtxtRecargos, $vtxtMultas, $vtxtSaldo_Pendiente, $vtxtImporte_Declaracion,
     $vtxtActualizacion, $vnum_asimilables, $vnum_otros, $txtImporteSubsidiado, $txtImporteNoSubsidiado,
     $txtEmpSubcontratados, $txtRFCEmpresa, $txtNEmpSub)
    {
        $this->txtImporteSubsidiado=0;
        $this->txtImporteNoSubsidiado=0;
        $this->txtImportePagar=0;
        $this->txtRecargos=0;
        $this->txtMultas=0;
        $this->txtSaldo_Pendiente=0;
        $this->txtImporte_Declaracion=0;
        $this->txtActualizacion=0;
        $this->txtImpuestoFavor=0;
        $this->txtTotalDeclaracion=0;
        $this->txtImpuestoCargo=0;
        $this->txtTotalPagar=0;
        $this->txtnum_asimilables=0;
        $this->txtnum_otros=0;

        if (!isset($_SESSION['Subsidio']))
        {
            $Subsidio=Array();
            $Subsidio['Imp_Subsidio']=0;
            $Subsidio['Act_Subsidio']=0;
            $Subsidio['Rec_Subsidio']=0;
            $Subsidio['Tipo_Mov']=0;
            $_SESSION['Subsidio'][1]=$Subsidio;
        }

        $txtImporteSubsidiado=intval($txtImporteSubsidiado);

        if (!is_numeric($txtImporteSubsidiado))
        {
            $this->txtImporteSubsidiado=0;
        }
        else
        {
            if (is_int($txtImporteSubsidiado))
            {
                $this->txtImporteSubsidiado=$txtImporteSubsidiado;
            }
            else
            {
                $this->txtImporteSubsidiado=0;
            }

            if ($txtImporteSubsidiado<0)
            {
                $txtImporteSubsidiado=0;
                $this->txtImporteSubsidiado=0;
            }
        }

        $txtImporteNoSubsidiado=intval($txtImporteNoSubsidiado);

        if (!is_numeric($txtImporteNoSubsidiado))
        {
            $this->txtImporteNoSubsidiado=0;
        }
        else
        {
            if (is_int($txtImporteNoSubsidiado))
            {
                $this->txtImporteNoSubsidiado=$txtImporteNoSubsidiado;
            }
            else
            {
                $this->txtImporteNoSubsidiado=0;
            }

            if ($txtImporteNoSubsidiado<0)
            {
                $txtImporteNoSubsidiado=0;
                $this->txtImporteNoSubsidiado=0;
            }
        }

        $vnum_empleados=intval($vnum_empleados);

        if (!is_numeric($vnum_empleados))
        {
            $this->txtnum_empleados=0;
        }
        else
        {
            if (is_int($vnum_empleados))
            {
                $this->txtnum_empleados=$vnum_empleados;
            }
            else
            {
                $this->txtnum_empleados=0;
            }

            if ($vnum_empleados<0)
            {
                $this->txtnum_empleados=0;
            }
        }

        //Valida txtAsimilables
        $vnum_asimilables=intval($vnum_asimilables);

        if (!is_numeric($vnum_asimilables))
        {
            $this->txtnum_asimilables=0;
        }
        else
        {
            if (is_int($vnum_asimilables))
            {
                $this->txtnum_asimilables=$vnum_asimilables;
            }
            else
            {
                $this->txtnum_asimilables=0;
            }

            if ($vnum_asimilables<0)
            {
                $this->txtnum_asimilables=0;
            }
        }

        //Valida txtOtros
        $vnum_otros=intval($vnum_otros);

        if (!is_numeric($vnum_otros))
        {
            $this->txtnum_otros=0;
        }
        else
        {
            if (is_int($vnum_otros))
            {
                $this->txtnum_otros=$vnum_otros;
            }
            else
            {
                $this->txtnum_otros=0;
            }

            if ($vnum_otros<0)
            {
                $this->txtnum_otros=0;
            }
        }

        //Valida txtImporte_Pagar
        $vtxtImporte_Pagar=intval($vtxtImporte_Pagar);

        if (!is_numeric($vtxtImporte_Pagar))
        {
            $this->txtImportePagar=0;
        }

        if (is_int($vtxtImporte_Pagar))
        {
            $this->txtImportePagar=$vtxtImporte_Pagar;
        }
        else
        {
            $this->txtImportePagar=0;
        }

        if ($vtxtImporte_Pagar<0)
        {
            $this->txtImportePagar=0;
        }

        //Valida txtMultas
        $vtxtMultas=intval($vtxtMultas);

        if (!is_numeric($vtxtMultas))
        {
            $this->txtMultas=0;
        }

        if (is_int($vtxtMultas))
        {
            $this->txtMultas=$vtxtMultas;
        }
        else
        {
            $this->txtMultas=0;
        }

        if ($vtxtMultas<0)
        {
            $this->txtMultas=0;
        }

        //Valida txtSaldoPendienteAcreditar
        $vtxtSaldo_Pendiente=intval($vtxtSaldo_Pendiente);

        if (!is_numeric($vtxtSaldo_Pendiente))
        {
            $this->txtSaldo_Pendiente=0;
        }

        if (is_int($vtxtSaldo_Pendiente))
        {
            $this->txtSaldo_Pendiente=$vtxtSaldo_Pendiente;
        }
        else
        {
            $this->txtSaldo_Pendiente=0;
        }

        if ($vtxtSaldo_Pendiente<0)
        {
            $this->txtSaldo_Pendiente=0;
        }

        //Valida txtImporteDeclaracionRectifica
        $vtxtImporte_Declaracion=intval($vtxtImporte_Declaracion);

        if (!is_numeric($vtxtImporte_Declaracion))
        {
            $this->txtImporte_Declaracion=0;
        }

        if (is_int($vtxtImporte_Declaracion))
        {
            $this->txtImporte_Declaracion=$vtxtImporte_Declaracion;
        }
        else
        {
            $this->txtImporte_Declaracion=0;
        }

        if ($vtxtImporte_Declaracion<0)
        {
            $this->txtImporte_Declaracion=0;
        }

        if ($vmes_sel=='0')
        {
            if($vtxtImporte_Pagar <> 0 || $vtxtMultas <> 0  || $vtxtSaldo_Pendiente <> 0 || $vtxtImporte_Declaracion <> 0)
            {
                $_SESSION['msj_dec_1']='<span style="text-align:center; height: 163px; color: red; font-family: Arial; font-size: 10pt"><strong>Favor de elegir un mes</strong></span>';
                $this->txtImportePagar=0;
                $this->txtRecargos=0;
                $this->txtMultas=0;
                $this->txtSaldo_Pendiente=0;
                $this->txtImporte_Declaracion=0;
                $this->txtActualizacion=0;
                $this->txtImpuestoFavor=0;
                $this->txtImporteSubsidiado=0;
                $this->txtImporteNoSubsidiado=0;

                $Suma1= ($this->txtImportePagar) + ($this->txtActualizacion) + ($this->txtRecargos) + ($this->txtMultas);
                $Suma2= $this->txtSaldo_Pendiente;
                $Suma3= ($Suma1) - ($Suma2);
                $Suma4= $this->txtImporte_Declaracion;

                /*Mostrar valores */
                $this->txtTotalDeclaracion=$Suma1;
                $this->txtSaldo_Pendiente=$Suma2;
                $this->txtImpuestoCargo=$Suma1-$Suma4;
                $this->txtTotalPagar=$Suma3-$Suma4;
                return;
            }
        }
        else
        {
            $_SESSION['msj_dec_1']='';
            $_SESSION['Subsidio'][1]['Imp_Subconout']=$txtEmpSubcontratados;
            $_SESSION['Subsidio'][1]['Act_Subconout']=0;
            $_SESSION['Subsidio'][1]['Rec_Subconout']=0;
            $_SESSION['Subsidio'][1]['RFC_Empresa']=$txtRFCEmpresa;
            $_SESSION['Subsidio'][1]['NEmp_Sub']=$txtNEmpSub;
            $bandera=0;

            if ($_SESSION['Descuento']<>'')
            {
                $ArrDescuento=$_SESSION['Descuento'];
                $Porciento=0;
                $RecCalc=0;

                if ($vtipo_dec=="C" && $vtxtImporte_Declaracion <> 0)
                {
                    $txtImporte_Pagar=$vtxtImporte_Pagar;
                    $vEstFed="E";
                    $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $txtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
                    $this->vFecha_Vmto;
                }
                else
                {
                    $vtxtImporte_Declaracion=0;
                    $txtImporte_Pagar=$vtxtImporte_Pagar;
                    $vEstFed="E";
                    $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $txtImporte_Pagar, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
                    $this->vFecha_Vmto;
                }

                $mes_anio=substr("00".$vmes_sel,strlen("00".$vmes_sel)-2,2).'/'.$vanio_sel;
                foreach ($ArrDescuento as $posicion => $dato)
                {
                    foreach ($ArrDescuento[$posicion] as $posicion2 => $dato2)
                    {
                        if ($posicion2=='Dato_nvo')
                        {
                            if ($ArrDescuento[$posicion]['Id_tipoMov']=='331')//autoriza subsidio rec y act
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;
                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $RecCalc = round(($this->vRecargos * $Porciento)/100);
                                    $this->vRecargos = $this->vRecargos - $RecCalc;

                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $ActCalc = round(($this->txtActualizacion * $Porciento)/100);
                                    $this->txtActualizacion = $this->txtActualizacion - $ActCalc;

                                    $_SESSION['Subsidio'][1]['Act_Subsidio']=$ActCalc;
                                    $_SESSION['Subsidio'][1]['Rec_Subsidio']=$RecCalc;

                                    if (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=2;
                                    }
                                }
                            }
                            elseif($ArrDescuento[$posicion]['Id_tipoMov']=='341')//autoriza subsidio actualizacion
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;
                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $ActCalc = round(($this->txtActualizacion * $Porciento)/100);
                                    $this->txtActualizacion = $this->txtActualizacion - $ActCalc;

                                    $_SESSION['Subsidio'][1]['Act_Subsidio']=$ActCalc;

                                    if (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=2;
                                    }
                                }
                            }
                            elseif($ArrDescuento[$posicion]['Id_tipoMov']=='342')//autoriza subsidio recargos
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;
                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $RecCalc = round(($this->vRecargos * $Porciento)/100);
                                    $this->vRecargos = $this->vRecargos - $RecCalc;

                                    $_SESSION['Subsidio'][1]['Rec_Subsidio']=$RecCalc;

                                    if (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=2;
                                    }
                                }
                            }
                            elseif($ArrDescuento[$posicion]['Id_tipoMov']=='343')//autoriza subsidio impuesto
                            {
                                if ($mes_anio==substr($ArrDescuento[$posicion]['Dato_nvo'], 0, 7))
                                {
                                    $bandera=1;

                                    //$vtxtImporte_Declaracion=0;
                                    $vEstFed="E";
                                    $vTotalOriginal=($txtImporteSubsidiado) + ($txtImporteNoSubsidiado);

                                    if ($vtipo_dec=="C")
                                    {
                                        $vTotalOriginal=$vTotalOriginal-$vtxtImporte_Declaracion;
                                        if($vTotalOriginal<=0)
                                        {
                                            $vTotalOriginal=0;
                                        }
                                    }
                                    else
                                    {
                                        $vtxtImporte_Declaracion=0;
                                    }

                                    //CALCULA ACT Y REC ORIGINAL
                                    $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vTotalOriginal, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
                                    $vAct_Original=round($this->vActualizacion);
                                    $vRec_Original=round($this->vRecargos);

                                    $Porciento = $ArrDescuento[$posicion]['Dato_ant'];
                                    $ImporteCalc = round(($txtImporteSubsidiado * $Porciento)/100, 0);
                                    $txtImporteSubsidiado = $txtImporteSubsidiado - $ImporteCalc;

                                    $vTotalCalc=($txtImporteSubsidiado) + ($txtImporteNoSubsidiado);

                                    $this->GetfnAct_Rec($vtipo_dec, $vmes_sel, $vTotalCalc, $vanio_sel, $vtxtImporte_Declaracion, $vEstFed,$this->txtSaldo_Pendiente);
                                    $vAct_PagarDec=round($this->vActualizacion);
                                    $vRec_PagarDec=round($this->vRecargos);

                                    $_SESSION['Subsidio'][1]['Imp_Subsidio']=$ImporteCalc;
                                    $vAct_Sub=round($vAct_Original-$vAct_PagarDec);

                                    if ($vAct_Sub > 0)
                                    {
                                        $_SESSION['Subsidio'][1]['Act_Subsidio']=$vAct_Sub;
                                    }
                                    else
                                    {
                                        $_SESSION['Subsidio'][1]['Act_Subsidio']=0;
                                    }

                                    $vRec_Sub=round($vRec_Original-$vRec_PagarDec);

                                    if ($vRec_Sub > 0)
                                    {
                                        $_SESSION['Subsidio'][1]['Rec_Subsidio']=$vRec_Sub;
                                    }
                                    else
                                    {
                                        $_SESSION['Subsidio'][1]['Rec_Subsidio']=0;
                                    }

                                    $_SESSION['valida']=$vtxtImporte_Pagar;
                                    $_SESSION['MesAnio']=$mes_anio;

                                    if (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='SRIA ECONOMIA')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=1;
                                    }
                                    elseif (trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='PROG PONTE')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=3;
                                    }
                                    elseif(trim(substr($_SESSION['Descuento'][$posicion]['Dato_ant'], 3))=='DIRECTIVOS')
                                    {
                                        $_SESSION['Subsidio'][1]['Tipo_Mov']=2;
                                    }

                                }
                            }
                        }
                    }
                }

                if($bandera==0)
                {
                    $_SESSION['Subsidio'][1]['Imp_Subsidio']=0;
                    $_SESSION['Subsidio'][1]['Act_Subsidio']=0;
                    $_SESSION['Subsidio'][1]['Rec_Subsidio']=0;
                    $_SESSION['Subsidio'][1]['Tipo_Mov']=0;
                }
            }

            $vtxtImporte_Pagar=($txtImporteSubsidiado) + ($txtImporteNoSubsidiado);
            $this->txtImportePagar=$vtxtImporte_Pagar;



        //Valida txtActualizacion
            $vtxtActualizacion=intval($vtxtActualizacion);

            if (!is_numeric($vtxtActualizacion))
            {
                $this->txtActualizacion=0;
            }

            if (is_int($vtxtActualizacion))
            {
                $this->txtActualizacion=$this->vActualizacion;
            }
            else
            {
                $this->txtActualizacion=0;
            }

            if ($vtxtActualizacion<0)
            {
                $this->txtActualizacion=0;
            }

        //Valida txtRecargos
            $vtxtRecargos=intval($vtxtRecargos);

            if (!is_numeric($vtxtRecargos))
            {
                $this->txtRecargos=0;
            }

            if (is_int($vtxtRecargos))
            {
                $this->txtRecargos=$this->vRecargos;
            }
            else
            {
                $this->txtRecargos=0;
            }

            if ($vtxtRecargos<0)
            {
                $this->txtRecargos=0;
            }

            if ($vtipo_dec=="C")
            {
                $Suma1= ($this->txtImportePagar) + ($this->txtActualizacion) + ($this->txtRecargos) + ($this->txtMultas);
                //$Suma1= ($txtImporteSubsidiado) + ($txtImporteNoSubsidiado) + ($this->txtActualizacion) + ($this->txtRecargos) + ($this->txtMultas);
                $Suma2= $this->txtSaldo_Pendiente;
                $Suma3= ($Suma1) - ($Suma2);
                $Suma4= $this->txtImporte_Declaracion;

                /*Mostrar valores */
                $this->txtTotalDeclaracion=$Suma1;
                $this->txtSaldo_Pendiente=$Suma2;
                $this->txtImpuestoCargo=$Suma1-$Suma4;

                $vtxtImporte_Pagar=($txtImporteSubsidiado) + ($txtImporteNoSubsidiado) + ($this->txtActualizacion) + ($this->txtRecargos) + ($this->txtMultas);
                $this->txtTotalPagar=$vtxtImporte_Pagar-$Suma4;
                //$this->txtTotalPagar=$Suma3-$Suma4;

                if ($this->txtTotalPagar<0 )
                {
                    $this->txtTotalPagar=0;
                }

                if($Suma4 > $vtxtImporte_Pagar)
                {
                    $this->txtImpuestoCargo=0;
                    $this->txtImpuestoFavor=$Suma4 - $Suma1;
                }
                else
                {
                    $this->txtImpuestoCargo=$vtxtImporte_Pagar - $Suma4;
                    $this->txtImpuestoFavor=0;
                }
            }
            else
            {

                //VALIDACION CUANDO YA SE PAGO EL IMPORTE POR RETENEDORA. AUT. LIC MARY 27/08/2015
                $vTotEmpleados=($this->txtnum_empleados + $this->txtnum_asimilables + $this->txtnum_otros);
                if($this->txtNEmpSub>0)
                {
                    if($vTotEmpleados==0)
                    {
                        if($vrbmotivo==2)
                        {
                            if($this->txtEmpSubcontratados==$this->txtSaldo_Pendiente)
                            {
                                $this->txtRecargos=0;
                                $this->txtActualizacion=0;
                            }
                        }
                    }
                }
                //VALIDACION PROGRAMA FIN DE AÑO
                $vFecha_Act=date('d/m/Y');
                //$Hora_Act=date('H:i:s');
                $vFecha_Act= empty($vFecha_Act)?date('d/m/Y'):$vFecha_Act;
                $dd = explode('/',$vFecha_Act);
                $ts = mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
                $dia_act=date('d',$ts);
                $mes_act=date('m',$ts);
                $anio_act=date('Y',$ts);
                $Fecha_Actual=mktime(0,0,0,$mes_act,$dia_act,$anio_act);

                $vFecha_Ini='01/12/2015';
                //$Hora_Act=date('H:i:s');
                $vFecha_Ini= empty($vFecha_Ini)?date('d/m/Y'):$vFecha_Ini;
                $dd = explode('/',$vFecha_Ini);
                $ts = mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
                $dia_act=date('d',$ts);
                $mes_act=date('m',$ts);
                $anio_act=date('Y',$ts);
                $Fecha_Inicio=mktime(0,0,0,$mes_act,$dia_act,$anio_act);

                $vFecha_Fin='31/12/2015';
                //$Hora_ActFin=date('H:i:s');
                $vFecha_Fin= empty($vFecha_Fin)?date('d/m/Y'):$vFecha_Fin;
                $ddFin = explode('/',$vFecha_Fin);
                $tsFin = mktime(0,0,0,$ddFin[1],$ddFin[0],$ddFin[2]);
                $dia_actFin=date('d',$tsFin);
                $mes_actFin=date('m',$tsFin);
                $anio_actFin=date('Y',$tsFin);
                $Fecha_Final=mktime(0,0,0,$mes_actFin,$dia_actFin,$anio_actFin);


                $_SESSION['Sub_programa']=$this->txtRecargos;

                if($Fecha_Actual>=$Fecha_Inicio && $Fecha_Actual<=$Fecha_Final)
                {
                    $this->txtRecargos=0;
                }

                $Suma1= ($this->txtImportePagar) + ($this->txtActualizacion) + ($this->txtRecargos) + ($this->txtMultas);
                $Suma2= $this->txtSaldo_Pendiente;
                $Suma3= ($Suma1) - ($Suma2);
                $Suma4= $this->txtImporte_Declaracion;

                /*Mostrar valores */
                $this->txtTotalDeclaracion=$Suma1;
                $this->txtSaldo_Pendiente=$Suma2;
                $this->txtImpuestoCargo=$Suma1-$Suma4;
                $this->txtTotalPagar=$Suma3-$Suma4;
                //
                if ($this->txtTotalPagar<0 )
                {
                    $this->txtTotalPagar=0;
                }

                if($Suma4 > $Suma1)
                {
                    $this->txtImpuestoCargo=0;
                    $this->txtImpuestoFavor=$Suma4 - $Suma1;
                }
                else
                {
                    $this->txtImpuestoFavor=$Suma1 - $Suma4;
                    $this->txtImpuestoFavor=0;
                }
            }
        }
    }


    function GetfnValida_Declaracion($vnum_empleados,  $vnum_asimilables, $vmes_sel,
    $vddl_obl_sel,  $vtxtImporte_Pagar,  $txtTotalPagar,
     $vnum_otros, $ $txtNEmpSub,  $txtEmpSubcontratados, $txtRFCEmpresa,
      $vanio_sel,  $vrbmotivo, $txtSaldo_Pendiente )
    {
        $this->msj_N_hab_emp='';
      //  $this->msj_N_hab_emp2='';
        $this->msj_declaracion='';
        $this->msjEmpSubcontratados='';
      //  $this->msjEmpSubcontratados2='';
        $this->msjRFCEmpresa='';
      //  $this->msjRFCEmpresa2='';

        if ($txtNEmpSub > 0 && !isset($ArrEmp_Subcontratadas) || $vrbmotivo==2 && !isset($ArrEmp_Subcontratadas))
        {
            $this->msjRFCEmpresa='Proporcione los datos de la empresa subcontratada';
        }

      /*  if ($txtNEmpSub2 > 0 && !isset($ArrEmp_Subcontratadas2) || $vrbmotivo2==2 && !isset($ArrEmp_Subcontratadas2))
        {
            $this->msjRFCEmpresa2='Proporcione los datos de la empresa subcontratada';
        }*/

        $bandera=0;

      /*  if ($vmes_sel2 <> '0')
        {
            $bandera2=0;
        }*/

        if ($arrayDescuento['Descuento']<> '')
        {
            foreach ($arrayDescuento['Descuento'] as $posicion => $valor)
            {
                foreach ($arrayDescuento['Descuento'][$posicion] as $posicion2 => $valor2)
                {
                    if ($posicion2=='Id_tipoMov')
                    {
                        if ($arrayDescuento['Descuento'][$posicion]['Id_tipoMov']=='356')
                        {

                            $Pos=explode('/',$arrayDescuento['Descuento'][$posicion]['Dato_ant']);
                            $anio=$Pos[0];

                            if ($vanio_sel==$anio)
                            {
                                $bandera=1;
                                $this->msjEmpSubcontratados='';
                            }

                          /*  if ($vmes_sel2 <> '0')
                            {
                                if ($vanio_sel2==$anio)
                                {
                                    $bandera2=1;
                                    $this->msjEmpSubcontratados2='';
                                }
                            }*/
                        }
                    }
                }
            }
        }

        if ($bandera==0)
        {
            if ($txtNEmpSub > 0 && $txtEmpSubcontratados=='')
            {
                $this->msjEmpSubcontratados='Empleado subcontratados Obligatorio';
            }
        }

      /*  if ($vmes_sel2 <> '0' && $bandera2==0)
        {
            if ($txtNEmpSub2 > 0 && $txtEmpSubcontratados2 == '')
            {
                $this->msjEmpSubcontratados2='Obligatorio';
            }
        }*/



        if ($vmes_sel <> "0")
        {
            if ($vtxtImporte_Pagar > 0)
            {

                if ($vddl_obl_sel==3)
                {
                    if ($vnum_empleados==0 && $vnum_asimilables==0 && $vnum_otros==0 && $txtNEmpSub==0)
                    {
                        $this->msj_N_hab_emp='Proporcione el número de empleados o asimilables';
                    }
                }
            }
        }


      /*  if ($vmes_sel2 <> '0')
        {
            if ($txtTotalPagar > 0 && $txtTotalPagar2 == 0)
            {
                $this->msj_declaracion='No puede realizar una declaración con monto y otra en ceros';
            }
            if ($txtTotalPagar == 0 && $txtTotalPagar2 > 0)
            {
                $this->msj_declaracion='No puede realizar una declaración en ceros y otra con monto';
            }

            if ($vtxtImporte_Pagar2 > 0)
            {
                if ($vddl_obl_sel2==5)
                {
                    if ($vnum_empleados2==0)
                    {
                        $this->msj_N_hab_emp2='<span style="font-size:7pt; font-family:Arial; color:red">Proporcione el número de habitaciones</span>';
                    }
                }
                if ($vddl_obl_sel2==3)
                {
                    if ($vnum_empleados2==0 && $vnum_asimilables2==0 && $vnum_otros2==0 && $txtNEmpSub2==0)
                    {
                        $this->msj_N_hab_emp2='<span style="font-size:7pt; font-family:Arial; color:red">Proporcione el número de empleados o asimilables</span>';
                    }
                }
            }
        }*/
        $vBandera=0;

        if($vBandera==0)
        {
            if (isset($Sucursales_Datos_Guardados))
            {
                if (!isset($arraySubsidio['Subsidio'][1]['NEmp_Sub']))
                {
                    $arraySubsidio['Subsidio'][1]['NEmp_Sub']=0;
                }

                if (!isset($arraySubsidio['Subsidio'][2]['NEmp_Sub']))
                {
                    $arraySubsidio['Subsidio'][2]['NEmp_Sub']=0;
                }

                if (!isset($arraySubsidio['Subsidio'][1]['Imp_Subconout']))
                {
                    $arraySubsidio['Subsidio'][1]['Imp_Subconout']=0;
                }

                if (!isset($arraySubsidio['Subsidio'][2]['Imp_Subconout']))
                {
                    $arraySubsidio['Subsidio'][2]['Imp_Subconout']=0;
                }

                $ArrSucursales=$Sucursales_Datos_Guardados;
                $TotalArray_Emp_Hab=0;
                $TotalArrayImportePagar=0;
                $Total_Num_Emp_Hab=($vnum_empleados) + ($vnum_empleados2) + ($vnum_asimilables) + ($vnum_asimilables2) + ($vnum_otros) + ($vnum_otros2) + ($_SESSION['Subsidio'][1]['NEmp_Sub']) + ($_SESSION['Subsidio'][2]['NEmp_Sub']);
                $Total_ImportePagar=($vtxtImporte_Pagar) + ($vtxtImporte_Pagar2) + ($arraySubsidio['Subsidio'][1]['Imp_Subconout']) + ($arraySubsidio['Subsidio'][2]['Imp_Subconout']);
                $i = 0;
                $TotalNEmplSub=0;
                foreach ($ArrSucursales as $posicion => $dato)
                {
                    foreach ($ArrSucursales[$posicion] as $posicion2 => $dato2)
                    {
                        if ($posicion2=='CtaEstatal')
                        {

                            if (isset($_POST['NEmpleados'.$posicion]))
                            {
                                $TotalEmpleado=$_POST['NEmpleados'.$posicion];
                            }

                            if (isset($_POST['NAsimilables'.$posicion]))
                            {
                                $TotalAsimilables=$_POST['NAsimilables'.$posicion];
                            }
                            else
                            {
                                $TotalAsimilables=0;
                            }

                            if (isset($_POST['NOtros'.$posicion]))
                            {
                                $TotalOtros=$_POST['NOtros'.$posicion];
                            }
                            else
                            {
                                $TotalOtros=0;
                            }

                            if (isset($_POST['NEmplSub'.$posicion]))
                            {
                                $TotalNEmplSub=$_POST['NEmplSub'.$posicion];
                            }
                            else
                            {
                                $TotalNEmplSub=0;
                            }

                            $TotalArray_Emp_Hab = ($TotalArray_Emp_Hab) + ($TotalEmpleado) + ($TotalAsimilables) + ($TotalOtros) + ($TotalNEmplSub);

                            if (isset($_POST['NImporte'.$posicion]))
                            {
                                $TotalImpte=$_POST['NImporte'.$posicion];
                            }
                            $TotalArrayImportePagar = ($TotalArrayImportePagar) + ($TotalImpte);
                        }
                    }
                }

                if ($Total_Num_Emp_Hab <> $TotalArray_Emp_Hab)
                {

                    $this->msj_declaracion='El número de empleados o asimilables u otros ('.$Total_Num_Emp_Hab.') no coincide con las sucursales ('.$TotalArray_Emp_Hab.')';


                if ($Total_ImportePagar <> $TotalArrayImportePagar)
                {
                    $this->msj_declaracion='El importe de las declaraciones ('.$Total_ImportePagar.') no coincide con las sucursales ('.$TotalArrayImportePagar.')';
                    //return;
                }
            }


            if (isset($ArrEmp_Subcontratadas))
            {
                $TotalEmp_Subcontratados=($txtNEmpSub) + ($txtNEmpSub2);

                if($vrbmotivo=='0' && $vrbmotivo=='0'){ //Aida 25/07/2018
                    $TotalImpEmp_Subcontratados=($vtxtImporte_Pagar) + ($vtxtImporte_Pagar2);
                }else{
                    $TotalImpEmp_Subcontratados=($txtEmpSubcontratados) + ($txtEmpSubcontratados2);//Aida 18/06/2018
                }

                $TotalEmp_Retenidos=($vnum_empleados) + ($vnum_empleados2) + ($vnum_asimilables) + ($vnum_asimilables2)+ ($vnum_otros) + ($vnum_otros2) ;
                $TotalImpEmp_Retenidos=($txtSaldo_Pendiente) + ($txtSaldo_Pendiente2);

                $TotalArrEmp_Subcontratados=0;
                $TotalArrImpEmp_Subcontratados=0;

                $TotalArrEmp_Retenidos=0;//Aida 25/07/2018
                $TotalArrImpEmp_Retenidos=0;

                $TotalArrEmp_Subcontratados2=0;
                $TotalArrImpEmp_Subcontratados2=0;

                $TotalArrEmp_Retenidos2=0;//Aida 25/07/2018
                $TotalArrImpEmp_Retenidos2=0;



                foreach ($ArrEmp_Subcontratadas as $posicion => $dato)
                {
                    foreach ($ArrEmp_Subcontratadas[$posicion] as $posicion2 => $dato2)
                    {
                        if ($posicion2=='RFC_Empresa' && $txtNEmpSub > 0)
                        {
                            if($ArrEmp_Subcontratadas[$posicion]['Tipo_Empresa'] == 'Retenedora'){ //Aida agregue 25/07/2018 toda la condicion
                                $TotalArrEmp_Retenidos=$TotalArrEmp_Retenidos + $ArrEmp_Subcontratadas[$posicion]['Num_EmpleadosSub'];
                                $TotalArrImpEmp_Retenidos=$TotalArrImpEmp_Retenidos + $ArrEmp_Subcontratadas[$posicion]['ImporteCausado'];
                            }else{
                                $TotalArrEmp_Subcontratados=$TotalArrEmp_Subcontratados + $ArrEmp_Subcontratadas[$posicion]['Num_EmpleadosSub'];
                                $TotalArrImpEmp_Subcontratados=$TotalArrImpEmp_Subcontratados + $ArrEmp_Subcontratadas[$posicion]['ImporteCausado'];
                            }

                        }
                    }
                }


              /*  if (isset($_SESSION['ArrEmp_Subcontratadas2']))
                {
                    foreach ($_SESSION['ArrEmp_Subcontratadas2'] as $posicion => $dato)
                    {
                        foreach ($_SESSION['ArrEmp_Subcontratadas2'][$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='RFC_Empresa' && $txtNEmpSub2 > 0)
                            {
                                if($_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Tipo_Empresa'] == 'Retenedora'){//Aida agregue 25/07/2018
                                    $TotalArrEmp_Retenidos2=$TotalArrEmp_Retenidos2 + $_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Num_EmpleadosSub'];
                                    $TotalArrImpEmp_Retenidos2=$TotalArrImpEmp_Retenidos2 + $_SESSION['ArrEmp_Subcontratadas2'][$posicion]['ImporteCausado'];
                                }else{
                                    $TotalArrEmp_Subcontratados2=$TotalArrEmp_Subcontratados2 + $_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Num_EmpleadosSub'];
                                    $TotalArrImpEmp_Subcontratados2=$TotalArrImpEmp_Subcontratados2 + $_SESSION['ArrEmp_Subcontratadas2'][$posicion]['ImporteCausado'];
                                }

                            }
                        }
                    }
                }

                //subcontratados  Aida 25/07/2018
                $T_ArrEmp_Subcontratados = $TotalArrEmp_Subcontratados + $TotalArrEmp_Subcontratados2;
                $T_ArrImpEmp_Subcontratados = $TotalArrImpEmp_Subcontratados + $TotalArrImpEmp_Subcontratados2;

                //retenidos
                $T_ArrEmp_Retenidos = $TotalArrEmp_Retenidos + $TotalArrEmp_Retenidos2;
                $T_ArrImpEmp_Retenidos = $TotalArrImpEmp_Retenidos + $TotalArrImpEmp_Retenidos2;

                if ($T_ArrEmp_Subcontratados <> $TotalEmp_Subcontratados)
                {
                    $this->msj_declaracion='El total de empleados subcontratados ('.$TotalEmp_Subcontratados.') no coincide con el total de numeros de empleados de las empresas subcontratadas ('.$T_ArrEmp_Subcontratados.')';
                }

                if ($T_ArrImpEmp_Subcontratados <> $TotalImpEmp_Subcontratados)
                {
                    $this->msj_declaracion='El total del importe de Impuesto a Pagar ('.$TotalImpEmp_Subcontratados.'), empleados subcontratados no coincide con el total de impuesto causado de las empresas subcontratadas ('.$T_ArrImpEmp_Subcontratados.')';
                }

                */


                //RETENIDOS EMPLEADOS Y TOTAL IMPORTE Aida 25/07/2018
                if($T_ArrEmp_Retenidos>0) //AIDA CHECAR ESTA VALIDACION
                {
                    if ($T_ArrEmp_Retenidos <> $TotalEmp_Retenidos)
                    {
                        $this->msj_declaracion='El total de empleados retenidos ('.$TotalEmp_Retenidos.') no coincide con el total de numeros de empleados de las empresas retenedoras ('.$T_ArrEmp_Retenidos.')';
                    }

                    if ($T_ArrImpEmp_Retenidos <> $TotalImpEmp_Retenidos)
                    {
                        $this->msj_declaracion='El total del importe de Impuesto a Pagar ('.$TotalImpEmp_Retenidos.'), empleados retenidos no coincide con el total de impuesto causado de las empresas retenedoras ('.$T_ArrImpEmp_Retenidos.')';
                    }
                }

            }
        }
    }




    function SetfnGuarda_datos_Declaracion($id_negocio,$msj_N_hab_emp,  $msj_declaracion, $msjnombre, $mensaje_email,  $msjtel, $mensaje_fecha,  $vtipo_mov, $email, $telefono, $nombre_contacto,
     $Total_a_Pagar, $vtipoCom_sel,  $vddl_obl_sel, $vtipo_dec,  $vfecha,  $txtTotalPagar,  $vnum_empleados,  $vmes_sel,  $vanio_sel,
     $vtxtImporte_Pagar,  $vtxtRecargos,  $vtxtMultas,  $vtxtSaldo_Pendiente,  $vtxtImporte_Declaracion,  $vtxtActualizacion,
     $txtImpuestoCargo,  $txtImpuestoFavor,  $vnum_asimilables, $vnum_otros,  $msjEmpSubcontratados,  $msjRFCEmpresa,  $vrbmotivo,  $msjcel, $celular)
    {
        $this->msj_declaracion='';

        if ($msj_declaracion=='' && $msj_N_hab_emp=='' && $msj_N_hab_emp2=='' && $_SESSION['msj_dec_1']=='' && $msjnombre=='' && $mensaje_email=='' && $msjemail=='' && $msjtel=='' && $mensaje_fecha=='' && $mensaje_fecha2=='' && $msjEmpSubcontratados=='' && $msjEmpSubcontratados2=='' && $msjRFCEmpresa=='' && $msjRFCEmpresa2=='' && $msjcel=='')
        {
            if(!isset($vIntentos))//VALIDA LOS INTENTOS
            {
                $vIntentos=0;
            }
            $vIntentos=$vIntentos+1;

            $this->fnValidaBotones($Total_a_Pagar, $vtipo_mov);
            $this->msj_declaracion;

            if ($this->msj_declaracion<>'')
            {
                return;
            }

            if ($vanio_sel==2012 && $vddl_obl_sel=='')
            {
                $this->msj_declaracion='No puede declarar el impuesto Hospedaje para el ejercicio 2012';
                return;
            }

            if ($vddl_obl_sel==''&& $vddl_obl_sel2=='')
            {
                $this->msj_declaracion='Favor de seleccionar un tipo obligación';
                return;
            }
            else
            {
                if ($vmes_sel2 <> "0")
                {
                    if ($vddl_obl_sel==33)
                    {
                        $vddl_obl_sel=3;
                    }

                    if ($vddl_obl_sel2==33)
                    {
                        $vddl_obl_sel2=3;
                    }

                    if ($vanio_sel2==2012 && $vddl_obl_sel2=='')
                    {
                        $this->msj_declaracion='No puede declarar el impuesto Hospedaje para el ejercicio 2012';
                        return;
                    }

                    if ($vddl_obl_sel <> $vddl_obl_sel2)
                    {
                        $this->msj_declaracion='En esta transacción solo se permite un tipo de Obligación a la vez';
                        return;
                    }
                }
            }


            if (isset($Sucursales_Datos_Guardados))
            {
                foreach ($Sucursales_Datos_Guardadosas $posicion => $dato)
                {
                    foreach ($Sucursales_Datos_Guardados[$posicion] as $posicion2 => $dato2)
                    {
                        if ($posicion2=='CtaEstatal')
                        {
                            $Cta_Est=$Sucursales_Datos_Guardados[$posicion][$posicion2];

                            if ($Cta_Est=='')
                            {
                                return;
                            }
                            else
                            {
                                if (strlen($Cta_Est) < 8)
                                {
                                    return;
                                }
                                elseif(strlen($Cta_Est) == 8)
                                {
                                    $sucursal=substr($Cta_Est, 6, 2);

                                    if (!is_numeric($sucursal))
                                    {
                                        return;
                                    }
                                    else
                                    {
                                        $guion=substr($Cta_Est, 5, 1);
                                        if ($guion <> '-')
                                        {
                                            return;
                                        }
                                        else
                                        {
                                        $cta_est=substr($Cta_Est, 0, 5);
                                            if (!is_numeric($cta_est))
                                            {
                                                return;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $vnombre_contacto=substr($nombre_contacto,0,49);
            $vid_negocio=$id_negocio;
            $vtelefono=$telefono;
            $vcelular=$celular;
            $vcorreo_elec=$email;
            $hoy=date("d/m/Y");
            if($vtipo_mov=='L')
            {
                $vtipo_mov='D';
            }

            if ($vddl_obl_sel==33)
            {
                $vddl_obl_sel=3;
            }

            if ($vmes_sel2 <> "0")
            {
                $vcontador_dec = 2;
            }
            else
            {
                $vcontador_dec = 1;
            }

            $vcorreo_elec=str_replace("''","",$vcorreo_elec);
            $vcorreo_elec=str_replace('""',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('--',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('//',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('**',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('/*',"",$vcorreo_elec);

            $vnombre_contacto=str_replace("''","",$vnombre_contacto);
            $vnombre_contacto=str_replace('""',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('--',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('//',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('**',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('/*',"",$vnombre_contacto);

            $vtelefono=str_replace("''","",$vtelefono);
            $vtelefono=str_replace('""',"",$vtelefono);
            $vtelefono=str_replace('--',"",$vtelefono);
            $vtelefono=str_replace('//',"",$vtelefono);
            $vtelefono=str_replace('**',"",$vtelefono);
            $vtelefono=str_replace('/*',"",$vtelefono);

            $vcelular=str_replace("''","",$vcelular);
            $vcelular=str_replace('""',"",$vcelular);
            $vcelular=str_replace('--',"",$vcelular);
            $vcelular=str_replace('//',"",$vcelular);
            $vcelular=str_replace('**',"",$vcelular);
            $vcelular=str_replace('/*',"",$vcelular);

            $ReemplazaLetra = new ClsValidaCaracteres;
            $ReemplazaLetra->fnConvierteNCONTRIB($vnombre_contacto);
            $vnombre_contacto=$ReemplazaLetra->VCONTRIB;

            $_SESSION['Nombre']=str_replace("''","",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('""',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('--',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('//',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('**',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('/*',"",$_SESSION['Nombre']);

            try
            {
                $Conexion = new Class_Conexion;
                $Conexion->GetfnCon_Principal(10);
                $conec=$Conexion->DB_conexion;

                $strquery = "begin ingresos.SP_INS_NHHMAE_DECLARACION('$vid_negocio', '$vddl_obl_sel', '$vcontador_dec', '$Total_a_Pagar', '$vtelefono', '$vcorreo_elec', 'X', '$vtipo_mov', '$vnombre_contacto', '$vcelular', :vFOLIO_INTERNET); end;";

                $state = oci_parse($conec, $strquery) or die ('sintaxis incorrecta 1');
                OCIBindByName($state,":vFOLIO_INTERNET", $vFOLIO_INTERNET, 10) or die ('no se lleno la variable');
                oci_execute($state, OCI_DEFAULT) or die ('no se ejecuto 1');




                if(!$state)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }

                switch($vddl_obl_sel)
                {
                    case 3:
                        $t_servicio=3;
                    break;

                    case 4:
                        $t_servicio=54;
                    break;

                    case 5:
                        $t_servicio=4;
                    break;
                    case 25:
                        $t_servicio=3;
                    break;
                }
                if($vtipo_mov=='D')
                {
                    $vtipo_mov='L';
                }



                $cant2=strlen($vid_negocio."-".$vFOLIO_INTERNET);
                $cant2 = 16 - $cant2;
                $y = 0;
                $ceros2 = "";

                for ($y==1; $y<=$cant2; $y==$y++)
                {
                    $ceros2 = $ceros2."0";
                }

                $sec_trans = $ceros2.$vid_negocio."-".$vFOLIO_INTERNET;

                $vS_TRANSM = $sec_trans;
                $vC_REFERENCIA = substr("000000000000000000000".$vFOLIO_INTERNET,strlen("000000000000000000000".$vFOLIO_INTERNET)-21,21);
                $vT_SERVICIO = $t_servicio;
                $vS_PAGO = 1;
                $vN_AGENCIA = 1;
                $vT_IMPUESTO = round($Total_a_Pagar);

                $_SESSION['Nombre']=str_replace("'"," ",$_SESSION['Nombre']);

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnConvierteNCONTRIB($_SESSION['Nombre']);
                $vN_CONTRIB=substr($ReemplazaLetra->VCONTRIB, 0, 50);

                $vS_MENSAJERIA =2;
                $vFORMA_PAGO = $vtipo_mov;

                if (strlen($vN_CONTRIB)==50)
                {
                    $val_contrib=explode(' ',$vN_CONTRIB);

                    $n=count($val_contrib)-1;

                    if (substr_count($val_contrib[$n], "'") == 1)
                    {
                        $cadena='';
                        $y=0;
                        $i=strpos($val_contrib[$n], "'");

                        $ultimo_valor=substr($val_contrib[$n], 0, $i);

                        for($y==0; $y<$n; $y++)
                        {
                            $cadena.=$val_contrib[$y].' ';
                        }

                        $vN_CONTRIB=$cadena.$ultimo_valor;
                    }
                }

                if ($vN_CONTRIB=="ESTUDIOS Y PROYECTOS BASICOS S'||CHR(209)||'A'||CH")
                {
                    $vN_CONTRIB="ESTUDIOS Y PROYECTOS BASICOS S'||CHR(209)||'A";
                }



                $strquery2 = "begin ingresos.SP_INSMAE_PAGOS_INTERNET('$vFOLIO_INTERNET', '$vddl_obl_sel', '$vS_TRANSM', '$vC_REFERENCIA', '$vT_SERVICIO', '$vS_PAGO', '$vN_AGENCIA', '$vT_IMPUESTO', '$vN_CONTRIB', '$vS_MENSAJERIA', '$vFORMA_PAGO',NULL); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta 2');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto 2');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }

                //****************Inserta en la 1ra declaracion****************//

                $vImpuesto_favor=round($txtImpuestoFavor);
                $t_declaracion_fc=$vtipoCom_sel;
                $t_declaracion=$vtipo_dec;
                $fecha_rectifica=$vfecha;

                $vMes=$vmes_sel;
                $vAnio=$vanio_sel;

                $vImporte=round($vtxtImporte_Pagar);
                $vImpuesto_cargo=round($txtImpuestoCargo);
                $vTotal_declaracion=round($txtTotalPagar);



                $vRecargos=round($vtxtRecargos);
                $vMultas=round($vtxtMultas);
                $vSaldoPendienteAcreditar=round($vtxtSaldo_Pendiente);
                $vImporte_rectifica=round($vtxtImporte_Declaracion);
                $vActualizacion=round($vtxtActualizacion);

                if($vSaldoPendienteAcreditar>0)
                {
                    $vSaldoPendienteAcreditar='-'.$vSaldoPendienteAcreditar;

                    if ($vrbmotivo=='1')
                    {
                        $vrbmotivo='CORRECCION DEL IMPTO';
                    }
                    else
                    {
                        $vrbmotivo='ACREDITAN RETENCION';
                    }
                }
                else
                {
                    $vrbmotivo='';
                }

                $txtImporteSubsidiado=$arraySubsidio['Subsidio'][1]['Imp_Subsidio'];
                $Act_Subsidio=$arraySubsidio['Subsidio'][1]['Act_Subsidio'];
                $Rec_Subsidio=$arraySubsidio['Subsidio'][1]['Rec_Subsidio'];
                $Tipo_Mov=$arraySubsidio['Subsidio'][1]['Tipo_Mov'];
                $Imp_Subconout=$arraySubsidio['Subsidio'][1]['Imp_Subconout'];
                $Act_Subconout=$arraySubsidio['Subsidio'][1]['Act_Subconout'];
                $Rec_Subconout=$arraySubsidio['Subsidio'][1]['Rec_Subconout'];
                //                $RFC_Empresa=$_SESSION['Subsidio'][1]['RFC_Empresa'];
                $vMultasSub=0;
                if(isset($_SESSION['Sub_programa']))
                {
                    $Rec_Subsidio=$_SESSION['Sub_programa'];
                }
                if(isset($_SESSION['Sub_Mul_programa']))
                {
                    $vMultasSub=$_SESSION['Sub_Mul_programa'];
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas']))
                {
                    $RFC_Empresa=$_SESSION['ArrEmp_Subcontratadas'][1]['RFC_Empresa'];

                    $RFC_Empresa=str_replace("''","",$RFC_Empresa);
                    $RFC_Empresa=str_replace('""',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('--',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('//',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('**',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('/*',"",$RFC_Empresa);
                }
                else
                {
                    $RFC_Empresa='';
                }
                $NEmp_Sub=$arraySubsidio['Subsidio'][1]['NEmp_Sub'];

                $vnum_empleados = $vnum_empleados;
                $vNombre_Completo=$_SESSION['Nombre'];
                $vRfc=$_SESSION['Rfc'];
                $vCuenta_Estatal=$_SESSION['Cta_Estatal'];


                $strquery3 = "begin ingresos.SP_INS_NHHMOV_DECLARACION('$vid_negocio', '$vddl_obl_sel', '$vFOLIO_INTERNET', '$vAnio', '$vMes', '$vnum_empleados', '$vImporte', '$vActualizacion', '$vRecargos', '$vMultas', '$hoy', '$t_declaracion', '$fecha_rectifica', '$vTotal_declaracion', '$vImporte_rectifica', '$vImpuesto_cargo', '$vImpuesto_favor', '$vSaldoPendienteAcreditar', '$t_declaracion_fc', '$vRecargos', '$vActualizacion', '$vnum_asimilables', '$vnum_otros', $txtImporteSubsidiado, $Act_Subsidio, $Rec_Subsidio, '$Tipo_Mov', '$Imp_Subconout', '$Act_Subconout', '$Rec_Subconout', '$NEmp_Sub', '$RFC_Empresa', '$vrbmotivo','$vCuenta_Estatal','$vNombre_Completo','$vRfc','$vMultasSub'); end;";

                $state3 = oci_parse($conec, $strquery3) or die ('sintaxis incorrecta 3');
                oci_execute($state3, OCI_DEFAULT) or die ('no se ejecuto 3');

                if (!$state3)
                {
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }

                ////Ticket #42096 02/06/2021 --INSERTA NHHMOV_CAMBIO SI TIENE SUBCONTRATADOS EL MSJE QUE MUESTRA
                if($NEmp_Sub>0 ){
                  //if($NEmp_Sub>0 && $Imp_Subconout >0 ){
                    $vOfnaFisca=substr($vid_negocio,0,2);

                    $Conec_Muni = new Class_Conexion;
                    $Conec_Muni->GetfnCon_Municipio($vOfnaFisca);
                    $conec_muni=$Conec_Muni->DB_conexion;

                    $Inserta_usuario=oci_parse(
                    $conec_muni, "INSERT INTO SIATT.TMP_ACCESO_USUARIO (ID_USUARIO,USUARIO_CONECTA)
                            VALUES ('INTE','INTE')" );
                    oci_execute($Inserta_usuario);
                    oci_free_statement($Inserta_usuario);

                    //Dato_Anterior: mes/año Declaracion,  Dato_Nuevo: Folio_Internet
                    $strqueryCam = "begin SIATT.SP_INS_MHHMOV_CAMBIO_RET('$vid_negocio','$vMes/$vAnio','$vFOLIO_INTERNET'); end;";


                    $stateCam = oci_parse($conec_muni, $strqueryCam) or die ('sintaxis incorrecta Cam');
                    oci_execute($stateCam, OCI_DEFAULT) or die ('no se ejecuto Cam');

                    if (!$stateCam)
                    {
                        oci_rollback($conec_muni);
                        oci_close($conec_muni);
                        die ("$status_msg\n");
                    }else{
                        oci_close($conec_muni);
                    }
                }
                ///////////////////////////////////////////

                //****************Inserta en la 2da declaracion****************//

                if ($vmes_sel2 <> "0")
                {
                    if ($vddl_obl_sel2==33)
                    {
                        $vddl_obl_sel2=3;
                    }


                $vImpuesto_favor2=round($txtImpuestoFavor2);
                $t_declaracion_fc2=$vtipoCom_sel2;
                $t_declaracion2=$vtipo_dec2;
                $fecha_rectifica2=$vfecha2;

                $vMes2=$vmes_sel2;
                $vAnio2=$vanio_sel2;

                $vImporte2=round($vtxtImporte_Pagar2);
                $vImpuesto_cargo2=round($txtImpuestoCargo2);
                $vTotal_declaracion2=round($txtTotalPagar2);



                $vRecargos2=round($vtxtRecargos2);
                $vMultas2=round($vtxtMultas2);
                $vSaldoPendienteAcreditar2=round($vtxtSaldo_Pendiente2);
                $vImporte_rectifica2=round($vtxtImporte_Declaracion2);
                $vActualizacion2=round($vtxtActualizacion2);

                    if($vSaldoPendienteAcreditar2>0)
                    {
                        $vSaldoPendienteAcreditar2='-'.$vSaldoPendienteAcreditar2;

                        if ($vrbmotivo2=='1')
                        {
                            $vrbmotivo2='CORRECCION DEL IMPTO';
                        }
                        else
                        {
                            $vrbmotivo2='ACREDITAN RETENCION';
                        }
                    }
                    else
                    {
                        $vrbmotivo2='';
                    }

                $txtImporteSubsidiado2=$_SESSION['Subsidio'][2]['Imp_Subsidio'];
                $Act_Subsidio2=$_SESSION['Subsidio'][2]['Act_Subsidio'];
                $Rec_Subsidio2=$_SESSION['Subsidio'][2]['Rec_Subsidio'];
                $Tipo_Mov2=$_SESSION['Subsidio'][2]['Tipo_Mov'];
                $Imp_Subconout2=$_SESSION['Subsidio'][2]['Imp_Subconout'];
                $Act_Subconout2=$_SESSION['Subsidio'][2]['Act_Subconout'];
                $Rec_Subconout2=$_SESSION['Subsidio'][2]['Rec_Subconout'];
                $vMultasSub2=0;
                if(isset($_SESSION['Sub_programa2']))
                {
                    $Rec_Subsidio2=$_SESSION['Sub_programa2'];
                }
                if(isset($_SESSION['Sub_Mul_programa2']))
                {
                    $vMultasSub2=$_SESSION['Sub_Mul_programa2'];
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas2']))
                {
                    $RFC_Empresa2=$_SESSION['ArrEmp_Subcontratadas2'][2]['RFC_Empresa'];

                    $RFC_Empresa2=str_replace("''","",$RFC_Empresa2);
                    $RFC_Empresa2=str_replace('""',"",$RFC_Empresa2);
                    $RFC_Empresa2=str_replace('--',"",$RFC_Empresa2);
                    $RFC_Empresa2=str_replace('//',"",$RFC_Empresa2);
                    $RFC_Empresa2=str_replace('**',"",$RFC_Empresa2);
                    $RFC_Empresa2=str_replace('/*',"",$RFC_Empresa2);
                }
                else
                {
                    $RFC_Empresa2='';
                }
                $NEmp_Sub2=$_SESSION['Subsidio'][2]['NEmp_Sub'];

                $vnum_empleados2 = $vnum_empleados2;
                $vNombre_Completo=$_SESSION['Nombre'];
                $vRfc=$_SESSION['Rfc'];
                $vCuenta_Estatal=$_SESSION['Cta_Estatal'];

                $strquery4 = "begin ingresos.SP_INS_NHHMOV_DECLARACION('$vid_negocio', '$vddl_obl_sel2', '$vFOLIO_INTERNET', '$vAnio2', '$vMes2', '$vnum_empleados2', '$vImporte2', '$vActualizacion2', '$vRecargos2', '$vMultas2', '$hoy', '$t_declaracion2', '$fecha_rectifica2', '$vTotal_declaracion2', '$vImporte_rectifica2', '$vImpuesto_cargo2', '$vImpuesto_favor2', '$vSaldoPendienteAcreditar2', '$t_declaracion_fc2', '$vRecargos2', '$vActualizacion2', '$vnum_asimilables2', '$vnum_otros2', $txtImporteSubsidiado2, $Act_Subsidio2, $Rec_Subsidio2, '$Tipo_Mov2', '$Imp_Subconout2', '$Act_Subconout2', '$Rec_Subconout2', '$NEmp_Sub2', '$RFC_Empresa2', '$vrbmotivo2','$vCuenta_Estatal','$vNombre_Completo','$vRfc','$vMultasSub2'); end;";

                $state4 = oci_parse($conec, $strquery4) or die ('sintaxis incorrecta 4');
                oci_execute($state4, OCI_DEFAULT) or die ('no se ejecuto 4');

                    if (!$state4)
                    {
                        // Rollback the procedure
                        oci_rollback($conec);
                        oci_close($conec);
                        die ("$status_msg\n");
                    }
                }

                ////Ticket #42096 02/06/2021 --INSERTA NHHMOV_CAMBIO SI TIENE SUBCONTRATADOS EL MSJE QUE MUESTRA
                if($NEmp_Sub2>0){
                  //if($NEmp_Sub>0 && $Imp_Subconout >0 ){
                    $vOfnaFisca2=substr($vid_negocio,0,2);

                    $Conec_Muni2 = new Class_Conexion;
                    $Conec_Muni2->GetfnCon_Municipio($vOfnaFisca2);
                    $conec_muni2=$Conec_Muni2->DB_conexion;


                    //Dato_Anterior: mes/año Declaracion,  Dato_Nuevo: Folio_Internet
                    $strqueryCam2 = "begin SIATT.SP_INS_MHHMOV_CAMBIO_RET('$vid_negocio','$vMes2/$vAnio2','$vFOLIO_INTERNET'); end;";


                    $stateCam2 = oci_parse($conec_muni2, $strqueryCam2) or die ('sintaxis incorrecta Cam2');
                    oci_execute($stateCam2, OCI_DEFAULT) or die ('no se ejecuto Cam2');

                    if (!$stateCam2)
                    {
                        oci_rollback($conec_muni2);
                        oci_close($conec_muni2);
                        die ("$status_msg\n");
                    }else{
                        oci_close($conec_muni2);
                    }
                }


                if (isset($_SESSION['Sucursales_Datos_Guardados']))
                {
                    $ArrSucursales=$_SESSION['Sucursales_Datos_Guardados'];

                    foreach ($ArrSucursales as $posicion => $dato)
                    {
                        foreach ($ArrSucursales[$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='CtaEstatal')
                            {
                                $vMunicipio=$ArrSucursales[$posicion]['Municipio'];

                                $ConvierteMunStr = new ClassControlesGrls;
                                $ConvierteMunStr->fnConvierteMun_Num($vMunicipio);
                                $mun=$ConvierteMunStr->municipio;

                                if (isset($_POST['NCtaEst'.$posicion]))
                                {
                                    $vCtaEstatal=$mun.$_POST['NCtaEst'.$posicion];
                                }

                                if (isset($_POST['NEmpleados'.$posicion]))
                                {
                                    $vNEmpleados=$_POST['NEmpleados'.$posicion];
                                }

                                if (isset($_POST['NAsimilables'.$posicion]))
                                {
                                    $vNAsimilables=$_POST['NAsimilables'.$posicion];
                                }
                                else
                                {
                                    $vNAsimilables=0;
                                }

                                if (isset($_POST['NOtros'.$posicion]))
                                {
                                    $vNOtros=$_POST['NOtros'.$posicion];
                                }
                                else
                                {
                                    $vNOtros=0;
                                }

                                if (isset($_POST['NEmplSub'.$posicion]))
                                {
                                    $vNEmplSub=$_POST['NEmplSub'.$posicion];
                                }
                                else
                                {
                                    $vNEmplSub=0;
                                }

                                if (isset($_POST['NImporte'.$posicion]))
                                {
                                    $vImporteDec=$_POST['NImporte'.$posicion];
                                }

                                $vCtaEstatal=str_replace("''","",$vCtaEstatal);
                                $vCtaEstatal=str_replace('""',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('--',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('//',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('**',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('/*',"",$vCtaEstatal);

                                $vEstatus_sucursal=$ArrSucursales[$posicion]['estatus_sucursal'];

                                $strquery5 ="begin INGRESOS.SP_INSNHHMAE_SUCURSALES('$vFOLIO_INTERNET', '$vCtaEstatal', $vNEmpleados, $vNAsimilables, $vNOtros, '$vImporteDec','$vNEmplSub','S','$vEstatus_sucursal'); end;";
                                $state5 = oci_parse($conec, $strquery5) or die ('sintaxis incorrecta 5');
                                oci_execute($state5, OCI_DEFAULT) or die ('no se ejecuto 5');

                                if (!$state5)
                                {
                                    // Rollback the procedure
                                    oci_rollback($conec);
                                    oci_close($conec);
                                    die ("$status_msg\n");
                                }
                            }
                        }
                    }
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas']))
                {
                    foreach ($_SESSION['ArrEmp_Subcontratadas'] as $posicion => $dato)
                    {
                        foreach ($_SESSION['ArrEmp_Subcontratadas'][$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='RFC_Empresa')
                            {
                                $Mes_Declarado=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Mes_Declarado'];
                                $Anio_Declarado=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Anio_Declarado'];
                                $RFC_Empresa=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['RFC_Empresa'];
                                $Tipo_Empresa=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Tipo_Empresa'];//Aida agregue 25/07/2018
                                $Num_EmpleadosSub=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Num_EmpleadosSub'];
                                $ImporteCausado=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['ImporteCausado'];

                                if($Tipo_Empresa=='Retenedora'){ //Aida agregue 25/07/2018
                                    $Tipo_Empresa='R';
                                }elseif($Tipo_Empresa=='Subcontratada'){
                                    $Tipo_Empresa='S';
                                }

                                $RFC_Empresa=str_replace("''","",$RFC_Empresa);
                                $RFC_Empresa=str_replace('""',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('--',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('//',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('**',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('/*',"",$RFC_Empresa);

                                $strquery6 ="begin INGRESOS.SP_INS_NHHMOV_EMPRESA_SUBCONTR($vFOLIO_INTERNET, $Anio_Declarado, $Mes_Declarado, '$RFC_Empresa', $Num_EmpleadosSub, $ImporteCausado,'$Tipo_Empresa'); end;"; //Aida agregue $Tipo_Empresa 25/07/2018

                                $state6 = oci_parse($conec, $strquery6) or die ('sintaxis incorrecta 6');
                                oci_execute($state6, OCI_DEFAULT) or die ('no se ejecuto 6');

                                if (!$state6)
                                {
                                    // Rollback the procedure
                                    oci_rollback($conec);
                                    oci_close($conec);
                                    die ("$status_msg\n");
                                }
                            }
                        }
                    }
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas2']))
                {
                    foreach ($_SESSION['ArrEmp_Subcontratadas2'] as $posicion => $dato)
                    {
                        foreach ($_SESSION['ArrEmp_Subcontratadas2'][$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='RFC_Empresa')
                            {
                                $Mes_Declarado=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Mes_Declarado'];
                                $Anio_Declarado=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Anio_Declarado'];
                                $RFC_Empresa=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['RFC_Empresa'];
                                $Tipo_Empresa=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Tipo_Empresa'];//Aida agregue 25/07/2018
                                $Num_EmpleadosSub=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Num_EmpleadosSub'];
                                $ImporteCausado=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['ImporteCausado'];

                                if($Tipo_Empresa=='Retenedora'){ //Aida agregue 25/07/2018
                                    $Tipo_Empresa='R';
                                }elseif($Tipo_Empresa=='Subcontratada'){
                                    $Tipo_Empresa='S';
                                }

                                $RFC_Empresa=str_replace("''","",$RFC_Empresa);
                                $RFC_Empresa=str_replace('""',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('--',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('//',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('**',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('/*',"",$RFC_Empresa);

                                $strquery7 ="begin INGRESOS.SP_INS_NHHMOV_EMPRESA_SUBCONTR($vFOLIO_INTERNET, $Anio_Declarado, $Mes_Declarado, '$RFC_Empresa', $Num_EmpleadosSub, $ImporteCausado,'$Tipo_Empresa'); end;";

                                $state7 = oci_parse($conec, $strquery7) or die ('sintaxis incorrecta');
                                oci_execute($state7, OCI_DEFAULT) or die ('no se ejecuto 7');

                                if (!$state7)
                                {
                                    // Rollback the procedure
                                    oci_rollback($conec);
                                    oci_close($conec);
                                    die ("$status_msg\n");
                                }
                            }
                        }
                    }
                }
                oci_commit($conec);
                oci_close($conec);
                header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");
            }
            catch (Exception $exc)
            {
                oci_close($conec);
                echo $exc->getTraceAsString();
            }
        }
        else
        {
            if($msj_declaracion<>'')
            {
                 $this->msj_declaracion=$msj_declaracion;
            }
            elseif($msj_N_hab_emp<>'')
            {
                $this->msj_declaracion=$msj_N_hab_emp;
            }
            elseif($msj_N_hab_emp2<>'')
            {
                $this->msj_declaracion=$msj_N_hab_emp2;
            }
            elseif($_SESSION['msj_dec_1']<>'')
            {
                $this->msj_declaracion=$_SESSION['msj_dec_1'];
            }
            elseif($msjnombre<>'')
            {
                $this->msj_declaracion=$msjnombre;
            }
            elseif($mensaje_email<>'')
            {
                $this->msj_declaracion=$mensaje_email;
            }
            elseif($msjtel<>'')
            {
                $this->msj_declaracion=$msjtel;
            }
            elseif($mensaje_fecha<>'')
            {
                $this->msj_declaracion=$mensaje_fecha;
            }
            elseif($mensaje_fecha2<>'')
            {
                $this->msj_declaracion=$mensaje_fecha2;
            }
        }
    }

    function SetfnGuarda_datos_Declaracion_Subsidio($msj_N_hab_emp, $msj_N_hab_emp2, $msj_declaracion, $msjnombre, $mensaje_email, $msjemail, $msjtel, $mensaje_fecha, $mensaje_fecha2, $vtipo_mov, $email, $telefono, $nombre_contacto, $Total_a_Pagar, $vtipoCom_sel, $vtipoCom_sel2, $vddl_obl_sel, $vddl_obl_sel2, $vtipo_dec, $vtipo_dec2, $vfecha, $vfecha2, $txtTotalPagar, $txtTotalPagar2, $vnum_empleados, $vnum_empleados2, $vmes_sel, $vmes_sel2, $vanio_sel, $vanio_sel2, $vtxtImporte_Pagar, $vtxtImporte_Pagar2, $vtxtRecargos, $vtxtRecargos2, $vtxtMultas, $vtxtMultas2, $vtxtSaldo_Pendiente, $vtxtSaldo_Pendiente2, $vtxtImporte_Declaracion, $vtxtImporte_Declaracion2, $vtxtActualizacion, $vtxtActualizacion2, $txtImpuestoCargo, $txtImpuestoCargo2, $txtImpuestoFavor, $txtImpuestoFavor2, $vnum_asimilables, $vnum_otros, $vnum_asimilables2, $vnum_otros2, $msjcel, $vcelular, $vrbmotivo, $vrbmotivo2)
    {
        $this->msj_declaracion='';

        if ($msj_declaracion=='' && $msj_N_hab_emp=='' && $msj_N_hab_emp2=='' && $_SESSION['msj_dec_1']=='' && $msjnombre=='' && $mensaje_email=='' && $msjemail=='' && $msjtel=='' && $mensaje_fecha=='' && $mensaje_fecha2=='')
        {
            if(!isset($_SESSION['vIntentos']))//VALIDA LOS INTENTOS
            {
                $_SESSION['vIntentos']=0;
            }
            $_SESSION['vIntentos']=$_SESSION['vIntentos']+1;

            $this->fnValidaBotones($Total_a_Pagar, $vtipo_mov);
            $this->msj_declaracion;

            if ($this->msj_declaracion<>'')
            {
                return;
            }

            if ($vanio_sel==2012 && $vddl_obl_sel=='')
            {
                $this->msj_declaracion='No puede declarar el impuesto Hospedaje para el ejercicio 2012';
                return;
            }

            if ($vddl_obl_sel==''&& $vddl_obl_sel2=='')
            {
                $this->msj_declaracion='Favor de seleccionar un tipo obligación';
                return;
            }
            else
            {
                if ($vmes_sel2 <> "0")
                {
                    if ($vddl_obl_sel==33)
                    {
                        $vddl_obl_sel=3;
                    }

                    if ($vddl_obl_sel2==33)
                    {
                        $vddl_obl_sel2=3;
                    }

                    if ($vanio_sel2==2012 && $vddl_obl_sel2=='')
                    {
                        $this->msj_declaracion='No puede declarar el impuesto Hospedaje para el ejercicio 2012';
                        return;
                    }

                    if ($vddl_obl_sel <> $vddl_obl_sel2)
                    {
                        $this->msj_declaracion='En esta transacción solo se permite un tipo de Obligación a la vez';
                        return;
                    }
                }
            }



            if (isset($_SESSION['Sucursales_Datos_Guardados']))
            {
                foreach ($_SESSION['Sucursales_Datos_Guardados'] as $posicion => $dato)
                {
                    foreach ($_SESSION['Sucursales_Datos_Guardados'][$posicion] as $posicion2 => $dato2)
                    {
                        if ($posicion2=='CtaEstatal')
                        {
                            $Cta_Est=$_SESSION['Sucursales_Datos_Guardados'][$posicion][$posicion2];

                            if ($Cta_Est=='')
                            {
                                return;
                            }
                            else
                            {
                                if (strlen($Cta_Est) < 8)
                                {
                                    return;
                                }
                                elseif(strlen($Cta_Est) == 8)
                                {
                                    $sucursal=substr($Cta_Est, 6, 2);

                                    if (!is_numeric($sucursal))
                                    {
                                        return;
                                    }
                                    else
                                    {
                                        $guion=substr($Cta_Est, 5, 1);
                                        if ($guion <> '-')
                                        {
                                            return;
                                        }
                                        else
                                        {
                                            $cta_est=substr($Cta_Est, 0, 5);
                                            if (!is_numeric($cta_est))
                                            {
                                                return;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $vnombre_contacto=substr($nombre_contacto,0,49);
            $vid_negocio=$_SESSION['Id_negocio'];
            $vtelefono=$telefono;
            $vcorreo_elec=$email;
            $hoy=date("d/m/Y");
            if($vtipo_mov=='L')
            {
                $vtipo_mov='D';
            }

            if ($vddl_obl_sel==33)
            {
                $vddl_obl_sel=3;
            }

            if ($vmes_sel2 <> "0")
            {
                $vcontador_dec = 2;
            }
            else
            {
                $vcontador_dec = 1;
            }

            $vcorreo_elec=str_replace("''","",$vcorreo_elec);
            $vcorreo_elec=str_replace('""',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('--',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('//',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('**',"",$vcorreo_elec);
            $vcorreo_elec=str_replace('/*',"",$vcorreo_elec);

            $vnombre_contacto=str_replace("''","",$vnombre_contacto);
            $vnombre_contacto=str_replace('""',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('--',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('//',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('**',"",$vnombre_contacto);
            $vnombre_contacto=str_replace('/*',"",$vnombre_contacto);

            $vtelefono=str_replace("''","",$vtelefono);
            $vtelefono=str_replace('""',"",$vtelefono);
            $vtelefono=str_replace('--',"",$vtelefono);
            $vtelefono=str_replace('//',"",$vtelefono);
            $vtelefono=str_replace('**',"",$vtelefono);
            $vtelefono=str_replace('/*',"",$vtelefono);

            $ReemplazaLetra = new ClsValidaCaracteres;
            $ReemplazaLetra->fnConvierteNCONTRIB($vnombre_contacto);
            $vnombre_contacto=$ReemplazaLetra->VCONTRIB;

            $_SESSION['Nombre']=str_replace("''","",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('""',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('--',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('//',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('**',"",$_SESSION['Nombre']);
            $_SESSION['Nombre']=str_replace('/*',"",$_SESSION['Nombre']);

            try
            {
                $Conexion = new Class_Conexion;
                $Conexion->GetfnCon_Principal(10);
                $conec=$Conexion->DB_conexion;

                $strquery = "begin ingresos.SP_INS_NHHMAE_DECLARACION('$vid_negocio', '$vddl_obl_sel', '$vcontador_dec', '$Total_a_Pagar', '$vtelefono', '$vcorreo_elec', 'X', '$vtipo_mov', '$vnombre_contacto', '$vcelular',  :vFOLIO_INTERNET); end;";

                $state = oci_parse($conec, $strquery) or die ('sintaxis incorrecta');
                OCIBindByName($state,":vFOLIO_INTERNET", $vFOLIO_INTERNET, 10) or die ('no se lleno la variable');
                oci_execute($state, OCI_DEFAULT) or die ('no se ejecuto1');

                if(!$state)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }

                switch($vddl_obl_sel)
                {
                    case 3:
                        $t_servicio=3;
                    break;

                    case 4:
                        $t_servicio=54;
                    break;

                    case 5:
                        $t_servicio=4;
                    break;
                    case 25:
                        $t_servicio=3;
                    break;
                }
                if($vtipo_mov=='D')
                {
                    $vtipo_mov='L';
                }

                $cant2=strlen($vid_negocio."-".$vFOLIO_INTERNET);
                $cant2 = 16 - $cant2;
                $y = 0;
                $ceros2 = "";

                for ($y==1; $y<=$cant2; $y==$y++)
                {
                    $ceros2 = $ceros2."0";
                }

                $sec_trans = $ceros2.$vid_negocio."-".$vFOLIO_INTERNET;

                $vS_TRANSM = $sec_trans;
                $vC_REFERENCIA = substr("000000000000000000000".$vFOLIO_INTERNET,strlen("000000000000000000000".$vFOLIO_INTERNET)-21,21);
                $vT_SERVICIO = $t_servicio;
                $vS_PAGO = 1;
                $vN_AGENCIA = 1;
                $vT_IMPUESTO = round($Total_a_Pagar);
                $_SESSION['Nombre']=str_replace("'"," ",$_SESSION['Nombre']);

                $ReemplazaLetra = new ClsValidaCaracteres;
                $ReemplazaLetra->fnConvierteNCONTRIB($_SESSION['Nombre']);
                $vN_CONTRIB=substr($ReemplazaLetra->VCONTRIB, 0, 50);

                $vS_MENSAJERIA =2;
                $vFORMA_PAGO = $vtipo_mov;

                $strquery2 = "begin ingresos.SP_INSMAE_PAGOS_INTERNET('$vFOLIO_INTERNET', '$vddl_obl_sel', '$vS_TRANSM', '$vC_REFERENCIA', '$vT_SERVICIO', '$vS_PAGO', '$vN_AGENCIA', '$vT_IMPUESTO', '$vN_CONTRIB', '$vS_MENSAJERIA', '$vFORMA_PAGO',NULL); end;";

                $state2 = oci_parse($conec, $strquery2) or die ('sintaxis incorrecta');
                oci_execute($state2, OCI_DEFAULT) or die ('no se ejecuto2');

                if (!$state2)
                {
                    // Rollback the procedure
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }

                //****************Inserta en la 1ra declaracion****************//
                $vImpuesto_cargo=round($txtImpuestoCargo);
                $vImpuesto_favor=round($txtImpuestoFavor);
                $t_declaracion_fc=$vtipoCom_sel;
                $t_declaracion=$vtipo_dec;
                $fecha_rectifica=$vfecha;
                $vTotal_declaracion=round($txtTotalPagar);
                $vMes=$vmes_sel;
                $vAnio=$vanio_sel;
                $vImporte=round($vtxtImporte_Pagar);
                $vRecargos=round($vtxtRecargos);
                $vMultas=round($vtxtMultas);
                $vSaldoPendienteAcreditar=round($vtxtSaldo_Pendiente);
                $vImporte_rectifica=round($vtxtImporte_Declaracion);
                $vActualizacion=round($vtxtActualizacion);
                if($vSaldoPendienteAcreditar>0)
                {
                    $vSaldoPendienteAcreditar='-'.$vSaldoPendienteAcreditar;
                }

                $txtImporteSubsidiado=$_SESSION['Subsidio'][1]['Imp_Subsidio'];
                $Act_Subsidio=$_SESSION['Subsidio'][1]['Act_Subsidio'];
                $Rec_Subsidio=$_SESSION['Subsidio'][1]['Rec_Subsidio'];
                $Tipo_Mov=$_SESSION['Subsidio'][1]['Tipo_Mov'];
                $Imp_Subconout=$_SESSION['Subsidio'][1]['Imp_Subconout'];
                $Act_Subconout=$_SESSION['Subsidio'][1]['Act_Subconout'];
                $Rec_Subconout=$_SESSION['Subsidio'][1]['Rec_Subconout'];
                //var_dump($_SESSION['Subsidio']);
                $vImporte=round($vtxtImporte_Pagar-$Imp_Subconout);
                $vNombre_Completo=$_SESSION['Nombre'];
                $vRfc=$_SESSION['Rfc'];
                $vCuenta_Estatal=$_SESSION['Cta_Estatal'];

                $vMultasSub=0;
                if(isset($_SESSION['Sub_programa']))
                {
                    $Rec_Subsidio=$_SESSION['Sub_programa'];
                }
                if(isset($_SESSION['Sub_Mul_programa']))
                {
                    $vMultasSub=$_SESSION['Sub_Mul_programa'];
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas']))
                {
                    $RFC_Empresa=$_SESSION['ArrEmp_Subcontratadas'][1]['RFC_Empresa'];

                    $RFC_Empresa=str_replace("''","",$RFC_Empresa);
                    $RFC_Empresa=str_replace('""',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('--',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('//',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('**',"",$RFC_Empresa);
                    $RFC_Empresa=str_replace('/*',"",$RFC_Empresa);
                }
                else
                {
                    $RFC_Empresa='';
                }
                $NEmp_Sub=$_SESSION['Subsidio'][1]['NEmp_Sub'];

                $strquery3 = "begin ingresos.SP_INS_NHHMOV_DECLARACION('$vid_negocio', '$vddl_obl_sel', '$vFOLIO_INTERNET', '$vAnio', '$vMes', '$vnum_empleados', '$vImporte', '$vActualizacion', '$vRecargos', '$vMultas', '$hoy', '$t_declaracion', '$fecha_rectifica', '$vTotal_declaracion', '$vImporte_rectifica', '$vImpuesto_cargo', '$vImpuesto_favor', '$vSaldoPendienteAcreditar', '$t_declaracion_fc', '$vRecargos', '$vActualizacion', '$vnum_asimilables', '$vnum_otros', '$txtImporteSubsidiado', '$Act_Subsidio', '$Rec_Subsidio', '$Tipo_Mov','$Imp_Subconout', '$Act_Subconout', '$Rec_Subconout','$NEmp_Sub','$RFC_Empresa','$vrbmotivo','$vCuenta_Estatal','$vNombre_Completo','$vRfc','$vMultasSub'); end;";

                $state3 = oci_parse($conec, $strquery3) or die ('sintaxis incorrecta');
                oci_execute($state3, OCI_DEFAULT) or die ('no se ejecuto3');

                if (!$state3)
                {
                    oci_rollback($conec);
                    oci_close($conec);
                    die ("$status_msg\n");
                }
                //****************Inserta en la 2da declaracion****************//
                if ($vmes_sel2 <> "0")
                {
                    if ($vddl_obl_sel2==33)
                    {
                        $vddl_obl_sel2=3;
                    }

                    $vImpuesto_cargo2=round($txtImpuestoCargo2);
                    $vImpuesto_favor2=round($txtImpuestoFavor2);
                    $t_declaracion_fc2=$vtipoCom_sel2;
                    $t_declaracion2=$vtipo_dec2;
                    $fecha_rectifica2=$vfecha2;
                    $vTotal_declaracion2=round($txtTotalPagar2);
                    $vMes2=$vmes_sel2;
                    $vAnio2=$vanio_sel2;
                    $vImporte2=round($vtxtImporte_Pagar2);
                    $vRecargos2=round($vtxtRecargos2);
                    $vMultas2=round($vtxtMultas2);
                    $vSaldoPendienteAcreditar2=round($vtxtSaldo_Pendiente2);
                    $vImporte_rectifica2=round($vtxtImporte_Declaracion2);
                    $vActualizacion2=round($vtxtActualizacion2);

                    if($vSaldoPendienteAcreditar2>0)
                    {
                        $vSaldoPendienteAcreditar2='-'.$vSaldoPendienteAcreditar2;
                    }

                    $txtImporteSubsidiado2=$_SESSION['Subsidio'][2]['Imp_Subsidio'];
                    $Act_Subsidio2=$_SESSION['Subsidio'][2]['Act_Subsidio'];
                    $Rec_Subsidio2=$_SESSION['Subsidio'][2]['Rec_Subsidio'];
                    $Tipo_Mov2=$_SESSION['Subsidio'][2]['Tipo_Mov'];
                    $Imp_Subconout2=$_SESSION['Subsidio'][2]['Imp_Subconout'];
                    $Act_Subconout2=$_SESSION['Subsidio'][2]['Act_Subconout'];
                    $Rec_Subconout2=$_SESSION['Subsidio'][2]['Rec_Subconout'];
                    $vImporte2=round($vtxtImporte_Pagar2-$Imp_Subconout2);

                    if (isset($_SESSION['ArrEmp_Subcontratadas2']))
                    {
                        $RFC_Empresa2=$_SESSION['ArrEmp_Subcontratadas2'][1]['RFC_Empresa'];

                        $RFC_Empresa2=str_replace("''","",$RFC_Empresa2);
                        $RFC_Empresa2=str_replace('""',"",$RFC_Empresa2);
                        $RFC_Empresa2=str_replace('--',"",$RFC_Empresa2);
                        $RFC_Empresa2=str_replace('//',"",$RFC_Empresa2);
                        $RFC_Empresa2=str_replace('**',"",$RFC_Empresa2);
                        $RFC_Empresa2=str_replace('/*',"",$RFC_Empresa2);
                    }
                    else
                    {
                        $RFC_Empresa2='';
                    }
                    $NEmp_Sub2=$_SESSION['Subsidio'][2]['NEmp_Sub'];

                    $vnum_empleados2 = $vnum_empleados2;

                    $vNombre_Completo=$_SESSION['Nombre'];
                    $vRfc=$_SESSION['Rfc'];
                    $vCuenta_Estatal=$_SESSION['Cta_Estatal'];

                    $vMultasSub2=0;
                    if(isset($_SESSION['Sub_programa2']))
                    {
                        $Rec_Subsidio2=$_SESSION['Sub_programa2'];
                    }
                    if(isset($_SESSION['Sub_Mul_programa2']))
                    {
                        $vMultasSub2=$_SESSION['Sub_Mul_programa2'];
                    }

                    $strquery4 = "begin ingresos.SP_INS_NHHMOV_DECLARACION('$vid_negocio', '$vddl_obl_sel2', '$vFOLIO_INTERNET', '$vAnio2', '$vMes2', '$vnum_empleados2', '$vImporte2', '$vActualizacion2', '$vRecargos2', '$vMultas2', '$hoy', '$t_declaracion2', '$fecha_rectifica2', '$vTotal_declaracion2', '$vImporte_rectifica2', '$vImpuesto_cargo2', '$vImpuesto_favor2', '$vSaldoPendienteAcreditar2', '$t_declaracion_fc2', '$vRecargos2', '$vActualizacion2', '$vnum_asimilables2', '$vnum_otros2', '$txtImporteSubsidiado2', '$Act_Subsidio2', '$Rec_Subsidio2', '$Tipo_Mov2','$Imp_Subconout2', '$Act_Subconout2', '$Rec_Subconout2', '$NEmp_Sub2', '$RFC_Empresa2', '$vrbmotivo2','$vCuenta_Estatal','$vNombre_Completo','$vRfc','$vMultasSub2'); end;";

                    $state4 = oci_parse($conec, $strquery4) or die ('sintaxis incorrecta');
                    oci_execute($state4, OCI_DEFAULT) or die ('no se ejecuto4');

                    if (!$state4)
                    {
                        // Rollback the procedure
                        oci_rollback($conec);
                        oci_close($conec);
                        die ("$status_msg\n");
                    }
                }



                if (isset($_SESSION['Sucursales_Datos_Guardados']))
                {
                $ArrSucursales=$_SESSION['Sucursales_Datos_Guardados'];

                    foreach ($ArrSucursales as $posicion => $dato)
                    {
                        foreach ($ArrSucursales[$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='CtaEstatal')
                            {
                                $vMunicipio=$ArrSucursales[$posicion]['Municipio'];
                                $ConvierteMunStr = new ClassControlesGrls;
                                $ConvierteMunStr->fnConvierteMun_Num($vMunicipio);
                                $mun=$ConvierteMunStr->municipio;

                                if (isset($_POST['NCtaEst'.$posicion]))
                                {
                                    $vCtaEstatal=$mun.$_POST['NCtaEst'.$posicion];
                                }

                                if (isset($_POST['NEmpleados'.$posicion]))
                                {
                                    $vNEmpleados=$_POST['NEmpleados'.$posicion];
                                }

                                if (isset($_POST['NAsimilables'.$posicion]))
                                {
                                    $vNAsimilables=$_POST['NAsimilables'.$posicion];
                                }

                                if (isset($_POST['NOtros'.$posicion]))
                                {
                                    $vNOtros=$_POST['NOtros'.$posicion];
                                }

                                 if (isset($_POST['NEmplSub'.$posicion]))
                                {
                                    $vNEmplSub=$_POST['NEmplSub'.$posicion];
                                }

                                if (isset($_POST['NImporte'.$posicion]))
                                {
                                    $vImporteDec=$_POST['NImporte'.$posicion];
                                }

                                $vCtaEstatal=str_replace("''","",$vCtaEstatal);
                                $vCtaEstatal=str_replace('""',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('--',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('//',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('**',"",$vCtaEstatal);
                                $vCtaEstatal=str_replace('/*',"",$vCtaEstatal);
                                $vEstatus_sucursal=$ArrSucursales[$posicion]['estatus_sucursal'];

                                $strquery5 ="begin INGRESOS.SP_INSNHHMAE_SUCURSALES('$vFOLIO_INTERNET', '$vCtaEstatal', $vNEmpleados, $vNAsimilables, $vNOtros, '$vImporteDec','$vNEmplSub','S','$vEstatus_sucursal'); end;";

                                $state5 = oci_parse($conec, $strquery5) or die ('sintaxis incorrecta');
                                oci_execute($state5, OCI_DEFAULT) or die ('no se ejecuto5');

                                if (!$state5)
                                {
                                    // Rollback the procedure
                                    oci_rollback($conec);
                                    oci_close($conec);
                                    die ("$status_msg\n");
                                }
                            }
                        }
                    }
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas']))
                {
                    foreach ($_SESSION['ArrEmp_Subcontratadas'] as $posicion => $dato)
                    {
                        foreach ($_SESSION['ArrEmp_Subcontratadas'][$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='RFC_Empresa')
                            {
                                $Mes_Declarado=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Mes_Declarado'];
                                $Anio_Declarado=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Anio_Declarado'];
                                $RFC_Empresa=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['RFC_Empresa'];
                                $Tipo_Empresa=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Tipo_Empresa']; //Aida agregie 25/07/2018
                                $Num_EmpleadosSub=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['Num_EmpleadosSub'];
                                $ImporteCausado=$_SESSION['ArrEmp_Subcontratadas'][$posicion]['ImporteCausado'];

                                if($Tipo_Empresa=='Retenedora'){//Aida agregue 25/07/2018
                                    $Tipo_Empresa='R';
                                }elseif($Tipo_Empresa=='Subcontratada'){
                                    $Tipo_Empresa='S';
                                }

                                $RFC_Empresa=str_replace("''","",$RFC_Empresa);
                                $RFC_Empresa=str_replace('""',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('--',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('//',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('**',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('/*',"",$RFC_Empresa);

                                $strquery6 ="begin INGRESOS.SP_INS_NHHMOV_EMPRESA_SUBCONTR($vFOLIO_INTERNET, $Anio_Declarado, $Mes_Declarado, '$RFC_Empresa', $Num_EmpleadosSub, $ImporteCausado,'$Tipo_Empresa'); end;";

                                $state6 = oci_parse($conec, $strquery6) or die ('sintaxis incorrecta 6 Subsidio');
                                oci_execute($state6, OCI_DEFAULT) or die ('no se ejecuto 6 Subsidio');

                                if (!$state6)
                                {
                                    // Rollback the procedure
                                    oci_rollback($conec);
                                    oci_close($conec);
                                    die ("$status_msg\n");
                                }
                            }
                        }
                    }
                }

                if (isset($_SESSION['ArrEmp_Subcontratadas2']))
                {
                    foreach ($_SESSION['ArrEmp_Subcontratadas2'] as $posicion => $dato)
                    {
                        foreach ($_SESSION['ArrEmp_Subcontratadas2'][$posicion] as $posicion2 => $dato2)
                        {
                            if ($posicion2=='RFC_Empresa')
                            {
                                $Mes_Declarado=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Mes_Declarado'];
                                $Anio_Declarado=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Anio_Declarado'];
                                $RFC_Empresa=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['RFC_Empresa'];
                                $Tipo_Empresa=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Tipo_Empresa']; //Aida agregie 25/07/2018
                                $Num_EmpleadosSub=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['Num_EmpleadosSub'];
                                $ImporteCausado=$_SESSION['ArrEmp_Subcontratadas2'][$posicion]['ImporteCausado'];

                                if($Tipo_Empresa=='Retenedora'){//Aida agregue 25/07/2018
                                    $Tipo_Empresa='R';
                                }elseif($Tipo_Empresa=='Subcontratada'){
                                    $Tipo_Empresa='S';
                                }

                                $RFC_Empresa=str_replace("''","",$RFC_Empresa);
                                $RFC_Empresa=str_replace('""',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('--',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('//',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('**',"",$RFC_Empresa);
                                $RFC_Empresa=str_replace('/*',"",$RFC_Empresa);

                                $strquery7 ="begin INGRESOS.SP_INS_NHHMOV_EMPRESA_SUBCONTR($vFOLIO_INTERNET, $Anio_Declarado, $Mes_Declarado, '$RFC_Empresa', $Num_EmpleadosSub, $ImporteCausado,'$Tipo_Empresa'); end;";//Aida agregie $Tipo_Empresa 25/07/2018

                                $state7 = oci_parse($conec, $strquery7) or die ('sintaxis incorrecta Subsidio');
                                oci_execute($state7, OCI_DEFAULT) or die ('no se ejecuto 7 Subsidio');

                                if (!$state7)
                                {
                                    // Rollback the procedure
                                    oci_rollback($conec);
                                    oci_close($conec);
                                    die ("$status_msg\n");
                                }
                            }
                        }
                    }
                }

                oci_commit($conec);
                oci_close($conec);
                header("location:nhh_preimpresion.php?nhh_folio=$vFOLIO_INTERNET&forma_pago=$vtipo_mov");
            }
            catch (Exception $exc)
            {
            oci_close($conec);
            echo $exc->getTraceAsString();
            }
        }
        else
        {
            if($msj_declaracion<>'')
            {
                 $this->msj_declaracion=$msj_declaracion;
            }
            elseif($msj_N_hab_emp<>'')
            {
                $this->msj_declaracion=$msj_N_hab_emp;
            }
            elseif($msj_N_hab_emp2<>'')
            {
                $this->msj_declaracion=$msj_N_hab_emp2;
            }
            elseif($_SESSION['msj_dec_1']<>'')
            {
                $this->msj_declaracion=$_SESSION['msj_dec_1'];
            }
            elseif($msjnombre<>'')
            {
                $this->msj_declaracion=$msjnombre;
            }
            elseif($mensaje_email<>'')
            {
                $this->msj_declaracion=$mensaje_email;
            }
            elseif($msjtel<>'')
            {
                $this->msj_declaracion=$msjtel;
            }
            elseif($mensaje_fecha<>'')
            {
                $this->msj_declaracion=$mensaje_fecha;
            }
            elseif($mensaje_fecha2<>'')
            {
                $this->msj_declaracion=$mensaje_fecha2;
            }
        }
    }


    function fnGetValidaTxtFecha($vfecha, $vtipo_dec)
    {
        $this->mensajefecha='';
        if ($vtipo_dec=='C')
        {
            if ($vfecha=="")
            {
                $this->mensajefecha='fecha Obligatorio';
            }
            else
            {
                $anio_act=date('Y');

                if (strlen($vfecha) < 10)
                {
                    $this->mensajefecha='Fecha incompleta';
                }
                else
                {
                    $dia_tecleado=substr($vfecha,0,2);
                    $mes_tecleado=substr($vfecha,3,2);
                    $anio_tecleado=substr($vfecha,6,9);

                    if (!is_numeric($anio_tecleado))
                    {
                        $this->mensajefecha='Formato incorrecto';
                        return;
                    }

                    if (substr_count($vfecha, "/") <> 2 || substr($vfecha, 5,1) <> '/'  || substr($vfecha, 2,1) <> '/')
                    {
                        $this->mensajefecha='Formato incorrecto';
                        return;
                    }

                    if (!is_numeric($mes_tecleado))
                    {
                        $this->mensajefecha='Formato incorrecto';
                        return;
                    }

                    if ($mes_tecleado>12 || $mes_tecleado==00)
                    {
                        $this->mensajefecha='Mes incorrecto';
                        return;
                    }

                    if (!is_numeric($dia_tecleado))
                    {
                        $this->mensajefecha='Formato incorrecto';
                        return;
                    }


                    switch($mes_tecleado)
                    {
                        case '01':
                        $dias=31;
                        break;

                        case '02':
                        $dias='';
                        break;

                        case '03':
                        $dias=31;
                        break;

                        case '04':
                        $dias=30;
                        break;

                        case '05':
                        $dias=31;
                        break;

                        case '06':
                        $dias=30;
                        break;

                        case '07':
                        $dias=31;
                        break;

                        case '08':
                        $dias=31;
                        break;

                        case '09':
                        $dias=30;
                        break;

                        case '10':
                        $dias=31;
                        break;

                        case '11':
                        $dias=30;
                        break;

                        case '12':
                        $dias=31;
                        break;
                    }

                    if ($mes_tecleado==02)
                    {
                        if(checkdate(02,29,$anio_tecleado))
                        {
                            $dias=29;
                        }
                        else
                        {
                            $dias=28;
                        }
                    }

                    if ($dia_tecleado > $dias)
                    {
                        $this->mensajefecha='El dia no puede ser mayor a ' .$dias. ;
                    }
                    elseif ($dia_tecleado==00)
                    {
                        $this->mensajefecha='Formato incorrecto';
                    }
                }
            }
        }
    }

    function fnGetValidaEmailNombreTelefono($email, $telefono, $nombre_contacto)
    {
         if ($email=="")
         {
            $this->msjemail='<span style="font-size:7pt; font-family:Arial; color:red">Obligatorio</span>';
         }
         else
         {
            $this->msjemail='';
         }

         if($telefono=="")
         {
            $this->msjtel='<span style="font-size:7pt; font-family:Arial; color:red">Obligatorio</span>';
         }
         else
         {
             $telefono =preg_replace("/[^0-9]/", "",$telefono); // preg_replace('/[() .+-]/', '', $telefono);
            if (strlen($telefono)<>10)
            {
                $this->msjtel='<span style="font-size:7pt; font-family:Arial; color:red">Ingrese 10 n&uacute;meros</span>';
            }
            else {
                $this->msjtel='';
            }
        }

        if($nombre_contacto=="")
        {
           $this->msjnombre='<span style="font-size:7pt; font-family:Arial; color:red">Obligatorio</span>';
        }
        else
        {
           $this->msjnombre='';
        }
    }

    function fnGetValidaEmailNombreTelefonoCelular($email, $telefono, $nombre_contacto, $celular)
    {
        if ($email=="")
        {
            $this->msjemail='Correo Obligatorio';
        }
        else
        {
            $this->msjemail='';
        }

        $this->msjcel='';
        $telefono =preg_replace("/[^0-9]/", "",$telefono);
        $celular =preg_replace("/[^0-9]/", "",$celular);

        if($telefono=="" && $celular=="")
        {
            $this->msjtel='Introduzca al menos un teléfono';
        }
        else
        {
            if ((strlen($telefono)<>10) && (strlen($telefono)>0))
            {
                $this->msjtel='Ingrese 10 n&uacute;meros';
            }
            else
            {
                $this->msjtel='';
            }
            if((strlen($celular)<>10) && (strlen($celular)>0))
            {
            $this->msjcel='Ingrese 10 n&uacute;meros';
            }
            else
            {
                $this->msjcel='';
            }
         }
         $this->msjnombre='';

    }

    function fnMantieneValores($email, $telefono, $nombre_contacto)
    {
        $_SESSION['email']=$email;
        $_SESSION['telefono']=$telefono;
        $_SESSION['Nombre_contacto']=$nombre_contacto;
    }

    function fnMantieneValores2($email, $telefono, $nombre_contacto, $celular)
    {
        $_SESSION['email']=$email;
        $_SESSION['telefono']=$telefono;
        $_SESSION['Nombre_contacto']=$nombre_contacto;
        $_SESSION['celular']=$celular;
    }

    function fnGetcalendario($vfecha)
    {
        $this->txt_fecha='<input type="text" name="txt_fecha" id="datepicker" style="width:95px; height:17px; font-family:Arial; font-size:8pt; background-image: url(../../../img/calendario.gif); background-repeat: no-repeat; background-position: right center; border: 1px solid #BDBDBD; " maxlength="10" value="'.$vfecha.'"/>';
    }

    function fnGetcalendario2($vfecha)
    {
        $this->txt_fecha='<input type="text" name="txt_fecha2" id="datepicker2" style="width:95px; height:17px; font-family:Arial; font-size:8pt; background-image: url(../../../img/calendario.gif); background-repeat: no-repeat; background-position: right center; border: 1px solid #BDBDBD; " maxlength="10" value="'.$vfecha.'"/>';
    }

    function GetfnUne_Anio_Mes($vmes_sel, $vanio_sel)
    {
        if ($vmes_sel > 0)
        {
            switch($vmes_sel)
            {
            case 1:
            $vmes="ENE";
            break;

            case 2:
            $vmes="FEB";
            break;

            case 3:
            $vmes="MAR";
            break;

            case 4:
            $vmes="ABR";
            break;

            case 5:
            $vmes="MAY";
            break;

            case 6:
            $vmes="JUN";
            break;

            case 7:
            $vmes="JUL";
            break;

            case 8:
            $vmes="AGO";
            break;

            case 9:
            $vmes="SEP";
            break;

            case 10:
            $vmes="OCT";
            break;

            case 11:
            $vmes="NOV";
            break;

            case 12:
            $vmes="DIC";
            break;

            case 13:
            $vmes="ANUAL";
            break;
            }
        $this->anio_mes=$vanio_sel."-".$vmes;
        }
    }

    function GetfnSepara_Anio_Mes($ANIO_MES)
    {
        $this->anio=substr($ANIO_MES, 0, 4);

        $mes=substr($ANIO_MES, 5, 3);

        switch($mes)
        {
            case 'ENE':
                $vmes="01";
                break;

            case 'FEB':
                $vmes="02";
                break;

            case 'MAR':
                $vmes="03";
                break;

            case 'ABR':
                $vmes="04";
                break;

            case 'MAY':
                $vmes="05";
                break;

            case 'JUN':
                $vmes="06";
                break;

            case 'JUL':
                $vmes="07";
                break;

            case 'AGO':
                $vmes="08";
                break;

            case 'SEP':
                $vmes="09";
                break;

            case 'OCT':
                $vmes="10";
                break;

            case 'NOV':
                $vmes="11";
                break;

            case 'DIC':
                $vmes="12";
                break;

            case 'ANUAL':
                $vmes="13";
                break;
        }

        $this->mes=$vmes;
    }

    function GetfnsacaMesString($vmes_sel)
    {
        if ($vmes_sel > 0)
        {
            switch($vmes_sel)
            {
            case 1:
            $vmes="Enero";
            break;

            case 2:
            $vmes="Febrero";
            break;

            case 3:
            $vmes="Marzo";
            break;

            case 4:
            $vmes="Abril";
            break;

            case 5:
            $vmes="Mayo";
            break;

            case 6:
            $vmes="Junio";
            break;

            case 7:
            $vmes="Julio";
            break;

            case 8:
            $vmes="Agosto";
            break;

            case 9:
            $vmes="Septiembre";
            break;

            case 10:
            $vmes="Octubre";
            break;

            case 11:
            $vmes="Noviembre";
            break;

            case 12:
            $vmes="Diciembre";
            break;
            }

        $this->mesString=$vmes;
        }
    }

    function GetfnSacaMunicipioConexion($MUNICIPIO)
    {
        switch ($MUNICIPIO)
        {
            case 'ABASOLO':
            $this->municipio='ABASOLO';
            break;

            case 'ALDAMA':
            $this->municipio='ALDAMA';
            break;

            case 'ALTAMIRA':
            $this->municipio='ALTAMIRA';
            break;

            case 'ANTIGUO MORELOS':
            $this->municipio='MANTE';
            break;

            case 'BURGOS':
            $this->municipio='SANFER';
            break;

            case 'BUSTAMANTE':
            $this->municipio='TULA';
            break;

            case 'CAMARGO':
            $this->municipio='CAMARGO';
            break;

            case 'VILLA DE CASAS':
            $this->municipio='VICTORIA';
            break;

            case 'MADERO':
            $this->municipio='MADERO';
            break;

            case 'CRUILLAS':
            $this->municipio='SANFER';
            break;

            case 'GOMEZ FARIAS':
            $this->municipio='MANTE';
            break;

            case 'GONZALEZ':
            $this->municipio='GONZALEZ';
            break;

            case 'GUEMEZ':
            $this->municipio='VICTORIA';
            break;

            case 'GUERRERO':
            $this->municipio='GUERRERO';
            break;

            case 'GUSTAVO DIAZ ORDAZ':
            $this->municipio='DORDAZ';
            break;

            case 'HIDALGO':
            $this->municipio='HIDALGO';
            break;

            case 'JAUMAVE':
            $this->municipio='MANTE';
            break;

            case 'JIMENEZ':
            $this->municipio='JIMENEZ';
            break;

            case 'LLERA':
            $this->municipio='LLERA';
            break;

            case 'MAINERO':
            $this->municipio='HIDALGO';
            break;

            case 'MANTE':
            $this->municipio='MANTE';
            break;

            case 'MATAMOROS':
            $this->municipio='MATAMOROS';
            break;

            case 'MENDEZ':
            $this->municipio='SANFER';
            break;

            case 'MIER':
            $this->municipio='MIER';
            break;

            case 'MIGUEL ALEMAN':
            $this->municipio='MALEMAN';
            break;

            case 'MIQUIHUANA':
            $this->municipio='TULA';
            break;

            case 'NUEVO LAREDO':
            $this->municipio='NLAREDO';
            break;

            case 'NUEVO MORELOS':
            $this->municipio='MANTE';
            break;

            case 'OCAMPO':
            $this->municipio='MANTE';
            break;

            case 'PADILLA':
            $this->municipio='PADILLA';
            break;

            case 'PALMILLAS':
            $this->municipio='TULA';
            break;

            case 'REYNOSA':
            $this->municipio='REYNOSA';
            break;

            case 'RIO BRAVO':
            $this->municipio='RIOBRAVO';
            break;

            case 'SAN CARLOS':
            $this->municipio='PADILLA';
            break;

            case 'SAN FERNANDO':
            $this->municipio='SANFER';
            break;

            case 'SAN NICOLAS':
            $this->municipio='PADILLA';
            break;

            case 'SOTO LA MARINA':
            $this->municipio='SLMARINA';
            break;

            case 'TAMPICO':
            $this->municipio='TAMPICO';
            break;

            case 'TULA':
            $this->municipio='TULA';
            break;

            case 'VALLE HERMOSO':
            $this->municipio='VHERMOSO';
            break;

            case 'VICTORIA':
            $this->municipio='VICTORIA';
            break;

            case 'VILLAGRAN':
            $this->municipio='HIDALGO';
            break;

            case 'XICOTENCATL':
            $this->municipio='XICO';
            break;
        }
    }

    function fnConvierteMun_Num($Mun_string)
    {
        switch ($Mun_string)
        {
            case 'ABASOLO':
            $this->municipio='02';
            break;

            case 'ALDAMA':
            $this->municipio='03';
            break;

            case 'ALTAMIRA':
            $this->municipio='04';
            break;

            case 'ANTIGUO MORELOS':
            $this->municipio='05';
            break;

            case 'BURGOS':
            $this->municipio='06';
            break;

            case 'BUSTAMANTE':
            $this->municipio='07';
            break;

            case 'CAMARGO':
            $this->municipio='08';
            break;

            case 'VILLA DE CASAS':
            $this->municipio='09';
            break;

            case 'MADERO':
            $this->municipio='19';
            break;

            case 'CRUILLAS':
            $this->municipio='10';
            break;

            case 'GOMEZ FARIAS':
            $this->municipio='11';
            break;

            case 'GONZALEZ':
            $this->municipio='12';
            break;

            case 'GUEMEZ':
            $this->municipio='13';
            break;

            case 'GUERRERO':
            $this->municipio='14';
            break;

            case 'GUSTAVO DIAZ ORDAZ':
            $this->municipio='43';
            break;

            case 'HIDALGO':
            $this->municipio='15';
            break;

            case 'JAUMAVE':
            $this->municipio='16';
            break;

            case 'JIMENEZ':
            $this->municipio='17';
            break;

            case 'LLERA':
            $this->municipio='18';
            break;

            case 'MAINERO':
            $this->municipio='20';
            break;

            case 'MANTE':
            $this->municipio='21';
            break;

            case 'MATAMOROS':
            $this->municipio='22';
            break;

            case 'MENDEZ':
            $this->municipio='23';
            break;

            case 'MIER':
            $this->municipio='24';
            break;

            case 'MIGUEL ALEMAN':
            $this->municipio='40';
            break;

            case 'MIQUIHUANA':
            $this->municipio='25';
            break;

            case 'NUEVO LAREDO':
            $this->municipio='26';
            break;

            case 'NLAREDO':
            $this->municipio='26';
            break;

            case 'NUEVO MORELOS':
            $this->municipio='27';
            break;

            case 'OCAMPO':
            $this->municipio='28';
            break;

            case 'PADILLA':
            $this->municipio='29';
            break;

            case 'PALMILLAS':
            $this->municipio='30';
            break;

            case 'REYNOSA':
            $this->municipio='31';
            break;

            case 'RIO BRAVO':
            $this->municipio='42';
            break;

            case 'SAN CARLOS':
            $this->municipio='32';
            break;

            case 'SAN FERNANDO':
            $this->municipio='33';
            break;

            case 'SAN NICOLAS':
            $this->municipio='34';
            break;

            case 'SOTO LA MARINA':
            $this->municipio='35';
            break;

            case 'TAMPICO':
            $this->municipio='36';
            break;

            case 'TULA':
            $this->municipio='37';
            break;

            case 'VALLE HERMOSO':
            $this->municipio='41';
            break;

            case 'VICTORIA':
            $this->municipio='01';
            break;

            case 'VILLAGRAN':
            $this->municipio='38';
            break;

            case 'XICOTENCATL':
            $this->municipio='39';
            break;
        }
    }

    function fnValidaStringCaracteres($parametro)
    {
        $parametro = str_replace("<", "", $parametro);
        $parametro = str_replace("<script", "", $parametro);
        $parametro = str_replace("</s", "", $parametro);
        $parametro = str_replace("'", "", $parametro);
        $parametro = str_replace("--", "", $parametro);
        $parametro = str_replace("||", "", $parametro);
        $parametro = str_replace("//", "", $parametro);
        $parametro = str_replace("/*", "", $parametro);

        $this->parametro=$parametro;
    }

    function fnEnviaCorreo($email, $telefono, $nombre_contacto, $mensaje, $vmun, $vtxtCtaEst,
    $vtxtSuc, $vtxtNomCom, $vtxtGiro)
    {
        $this->msjemail='';
        $this->msjEnviado='';
        $this->msjMun='';
        $this->msjCta='';
        $this->msjSuc='';
	       $this->msjtel='';
        $this->msjnombre='';

        if ($vmun=='00')
        {
            $this->msjMun='Obligatorio';
        }

        if ($vtxtCtaEst=='')
        {
            $this->msjCta='Obligatorio';
        }
        else
        {
            if (!is_numeric($vtxtCtaEst))
            {
                $this->msjCta='Por favor introduzca solo numeros en la Cuenta Estatal';
            }
            elseif(substr_count($vtxtCtaEst, '.') > 0)
            {
                $this->msjCta='Solo Numeros Enteros';
            }
            elseif(substr_count($vtxtCtaEst, '-') > 0)
            {
                $this->msjCta='Solo Numeros Positivos';
            }
        }

        if ($vtxtSuc=='')
        {
            $this->msjSuc='Obligatorio';
        }
        else
        {
            if (substr_count($vtxtSuc, '.') > 0)
            {
                $this->msjSuc='Solo Numeros Enteros';
            }
            elseif(substr_count($vtxtSuc, '-') > 0)
            {
                $this->msjSuc='Solo Numeros Positivos';
            }
        }

        if ($email=='')
        {
           $this->msjemail='<span style="font-size:7pt; font-family:Arial; color:red">Obligatorio</span>';
        }
        else
        {
            $this->fnGetComprobar_email($email);
            $this->msjemail=$this->mensajemail;
        }

        if($telefono=="")
        {
            $this->msjtel='';
        }


        if($nombre_contacto=="")
        {
            $this->msjnombre='<span style="font-size:7pt; font-family:Arial; color:red">Obligatorio</span>';
        }

        if ($this->msjemail=='' && $this->msjtel=='' && $this->msjnombre=='' && $this->msjMun=='' && $this->msjCta=='' && $this->msjSuc=='' && $this->msjcel=='')
        {
            $vtxtCtaEst=substr("00000".$vtxtCtaEst,strlen("00000".$vtxtCtaEst)-5,5);
            $vtxtSuc=substr("00".$vtxtSuc,strlen("00".$vtxtSuc)-2,2);
            $cta_est=$vmun.$vtxtCtaEst.$vtxtSuc;

            date_default_timezone_set('America/Monterrey');

            $Destinatario='armando_diego4567@hotmail.com';


            $fecha=date('d/m/Y');
            $hora=date('H:i:s');

            $asunto='Solicitud al Programa PONTE AL CORRIENTE';


            $comentario='GOBIERNO DEL ESTADO DE TAMAULIPAS
            SECRETARIA DE FINANZAS
            PROGRAMA PONTE AL CORRIENTE
            Cuenta Estatal: '.$cta_est.'
            Nombre Comercial: '.$vtxtNomCom.'
            Giro: '.$vtxtGiro.'
            Nombre: '.$nombre_contacto.'
            Email: '.$email.'
            Telefono: '.$telefono.'
            Celular: '.$celular.'
            Mensaje: '.$mensaje.'
            Enviado: '.$fecha.' a las '.$hora;

            if(mail("$Destinatario", "$asunto", "$comentario"))
            {
                $this->msjEnviado='<span style="font-family: Arial; font-size:10pt; color: #00008B; font-weight: bold">Mail enviado correctamente</span>';
            }
            else
            {
                $this->msjEnviado='<span style="font-family: Arial; font-size:10pt; color: #2F4F4F">Error al enviar el mail</span>';
            }
        }
    }




    function fnVentanilla_Banco($v_grupo)
    {
        $Conexion = new Class_Conexion;
        $Conexion->GetfnCon_Principal(10);
        $conec=$Conexion->DB_conexion;
	       $sql = "SELECT REFERENCIA, HORARIO FROM INGRESOS.GRLCAT_VENTANILLA_BANCO
         WHERE NUM_GRUPO=$v_grupo AND FECHA_BAJA IS NULL ORDER BY ID_VENTANILLA_BANCO";
        $strsql = oci_parse($conec, $sql);

        oci_execute($strsql);
        oci_close($conec);
    		$i=0;
    		$arrDatosBancos=array();

        while ($row = oci_fetch_array($strsql))
        {
            if($row['REFERENCIA']<>''){
                $i++;
                $arrBanco = array();
                $arrBanco["REFERENCIA"]=$row['REFERENCIA'];
                $arrBanco["HORARIO"]=$row['HORARIO'];
                $arrDatosBancos[(string)$i]= $arrBanco;
            }
        }
        oci_free_statement($strsql);

        if($i>0){
            return $arrDatosBancos;
        }
    }

    function fnVentanilla_Banco_ws($v_grupo,$conec)
    {

	     $sql = "SELECT REFERENCIA, HORARIO,PAGO_POR_WS
            FROM INGRESOS.GRLCAT_VENTANILLA_BANCO WHERE NUM_GRUPO=$v_grupo "
            . "AND FECHA_BAJA IS NULL ORDER BY PAGO_POR_WS DESC, ID_VENTANILLA_BANCO";
        $strsql = oci_parse($conec, $sql);

        oci_execute($strsql);

        $i=0;
        $arrDatosBancos=array();

        while ($row = oci_fetch_array($strsql))
        {
            if($row['REFERENCIA']<>''){
                $i++;
                $arrBanco = array();
                $arrBanco["REFERENCIA"]=$row['REFERENCIA'];
                $arrBanco["HORARIO"]=$row['HORARIO'];
                $arrBanco["PAGO_POR_WS"]=$row['PAGO_POR_WS'];
                $arrDatosBancos[(string)$i]= $arrBanco;
            }
        }
        oci_free_statement($strsql);

        if($i>0){
            return $arrDatosBancos;
        }
    }

    function getIdCfdi($vfolio_internet,$municip,$idTipoOb)
    {
        $Conexion = new Class_Conexion;
        $Conexion->GetfnCon_Principal(10);
        $conec=$Conexion->DB_conexion;
        $mensa='';
        try
        {
            $strbuscafolio=oci_parse($conec,"SELECT ID_CFDI FROM FAEMAE_CFDI WHERE FOLIO_FISCAL='$vfolio_internet' AND ID_TIPO_OBLIGACION='$idTipoOb'");
            oci_execute($strbuscafolio);
            oci_close($conec);

            $bandera=0;
            $i=0;
            while ($row = oci_fetch_array($strbuscafolio))
            {
                if (isset($row[0]))
                {
                    $bandera=1;
                    $id_cfdi=$row[0];
                }
                else
                {
                     $this->msjCfdi='';
                }
            }
            oci_free_statement($strbuscafolio);

            if ($bandera==1)
            {
                //echo  $vfolio_internet.'---'.$municip.'---'.$idTipoOb;
                $vFolioImpreso='I'.$municip.str_pad($id_cfdi, 7, "0", STR_PAD_LEFT);

                $mensa='Su CFDI con folio factura <strong>'.$vFolioImpreso.'</strong> le llegará a su correo electrónico registrado o bien, puede darle seguimiento en
                        <a target="_blank" href="http://finanzas.tamaulipas.gob.mx/facturas-busqueda-v3.php">http://finanzas.tamaulipas.gob.mx/facturas-busqueda-v3.php</a>';
                return $mensa;
            }
            else
            {

                $mensa='CFDI será generado como Público en General.';

                return $mensa;

            }
        }
        catch (Exception $exc)
        {
            echo $exc->getTraceAsString();
            oci_close($conec);
        }
    }

    function getIdCfdiConn($vfolio_internet,$municip,$idTipoOb,$conec)
    {
        $mensa='';
        try
        {
            $strbuscafolio=oci_parse($conec,"SELECT ID_CFDI FROM FAEMAE_CFDI WHERE FOLIO_FISCAL='$vfolio_internet' AND ID_TIPO_OBLIGACION='$idTipoOb'");
            oci_execute($strbuscafolio);
            $bandera=0;
            $i=0;
            while ($row = oci_fetch_array($strbuscafolio))
            {
                if (isset($row[0]))
                {
                    $bandera=1;
                    $id_cfdi=$row[0];
                }
                else
                {
                     $this->msjCfdi='';
                }
            }
            oci_free_statement($strbuscafolio);

            if ($bandera==1)
            {
                $vFolioImpreso='I'.$municip.str_pad($id_cfdi, 7, "0", STR_PAD_LEFT);
                $mensa='Su CFDI con folio factura <strong>'.$vFolioImpreso.'</strong> le llegará a su correo electrónico registrado o bien, puede darle seguimiento en
                        <a target="_blank" href="http://finanzas.tamaulipas.gob.mx/facturas-busqueda-v3.php">http://finanzas.tamaulipas.gob.mx/facturas-busqueda-v3.php</a>';
                return $mensa;
            }
            else
            {
                $mensa='CFDI será generado como Público en General.';
                return $mensa;
            }
        }
        catch (Exception $exc)
        {
            echo $exc->getTraceAsString();
        }
    }

    function FnValidaBoletaValida($vFechaVencimiento)
    {
        $vFecha_Act=date('d/m/Y');
        $Hora_Act=date('H:i:s');
        $vFecha_Act= empty($vFecha_Act)?date('d/m/Y'):$vFecha_Act;
        $Hora_Act= empty($Hora_Act)?date('H:i:s'):$Hora_Act;
        $dd = explode('/',$vFecha_Act);
        $dt = explode(':',$Hora_Act);
        $ts = mktime($dt[0],$dt[1],$dt[2],$dd[1],$dd[0],$dd[2]);
        $dia_act=date('d',$ts);
        $mes_act=date('m',$ts);
        $anio_act=date('Y',$ts);
        $hora_act=date('H',$ts);
        $min_act=date('i',$ts);
        $seg_act=date('s',$ts);
        $Fecha_Actual=mktime($hora_act,$min_act,$seg_act,$mes_act,$dia_act,$anio_act);

        $vFecha_Ini=$vFechaVencimiento;
        $Hora_Ini=date('H:i:s');
        $vFecha_Ini= empty($vFecha_Ini)?date('d/m/Y'):$vFecha_Ini;
        $Hora_Ini= empty($Hora_Ini)?date('H:i:s'):$Hora_Ini;
        $dd1 = explode('/',$vFecha_Ini);
        $dt1 = explode(':',$Hora_Ini);
        $ts1 = mktime($dt1[0],$dt1[1],$dt1[2],$dd1[1],$dd1[0],$dd1[2]);
        $dia_ini=date('d',$ts1);
        $mes_ini=date('m',$ts1);
        $anio_ini=date('Y',$ts1);
        $hora_ini=date('H',$ts1);
        $min_ini=date('i',$ts1);
        $seg_ini=date('s',$ts1);
        $Fecha_Vencimiento=mktime($hora_ini,$min_ini,$seg_ini,$mes_ini,$dia_ini,$anio_ini);
        $vVencida=0;

        if($Fecha_Actual>$Fecha_Vencimiento)
        {
            $vVencida=1;
        }
        return $vVencida;
    }

    function fnActualizaFechaVencimiento($vFolioInternet,$vIdObligacion,$vFechaVencimiento)
    {

        if($vFolioInternet<>'' && $vIdObligacion<>'' && $vFechaVencimiento<>'')
        {
            $Conexion = new Class_Conexion;
            $Conexion->GetfnCon_Principal(10);
            $conec=$Conexion->DB_conexion;
            $sql = "UPDATE INGRESOS.GRLMAE_PAGOS_INTERNET SET"
                . " FECHA_VENCIMIENTO=TO_DATE('".$vFechaVencimiento."')"
                . " WHERE FOLIO_INTERNET=$vFolioInternet AND ID_TIPO_OBLIGACION=$vIdObligacion";

            $strsql = oci_parse($conec, $sql);
            oci_execute($strsql);
            oci_free_statement($strsql);
            oci_commit($conec);
            oci_close($conec);
        }
    }

    function fnActualizaFechaVencimientoConn($vFolioInternet,$vIdObligacion,$vFechaVencimiento,$conec)
    {
        if($vFolioInternet<>'' && $vIdObligacion<>'' && $vFechaVencimiento<>'')
        {
            $sql = "UPDATE INGRESOS.GRLMAE_PAGOS_INTERNET SET"
                . " FECHA_VENCIMIENTO=TO_DATE('".$vFechaVencimiento."')"
                . " WHERE FOLIO_INTERNET=$vFolioInternet AND ID_TIPO_OBLIGACION=$vIdObligacion";

            $strsql = oci_parse($conec, $sql);
            oci_execute($strsql);
            oci_free_statement($strsql);
            oci_commit($conec);
        }
    }


    ////////////////////////////////////NUEVO DISEÑO BOOTSTRAP///////////////////////////////////////////////////////
    function FnDropMunicipios($bandera, $vmun)
    {
        $T_Municipio = array();
        $T_Municipio["00"] = "Municipio";
        $T_Municipio["02"]="ABASOLO";
        $T_Municipio["03"]="ALDAMA";
        $T_Municipio["04"]="ALTAMIRA";
        $T_Municipio["05"]="ANTIGUO MORELO";
        $T_Municipio["06"]="BURGOS";
        $T_Municipio["07"]="BUSTAMANTE";
        $T_Municipio["08"]="CAMARGO";
        $T_Municipio["10"]="CRUILLAS";
        $T_Municipio["11"]="GOMEZ FARIAS";
        $T_Municipio["12"]="GONZALEZ";
        $T_Municipio["13"]="GUEMEZ";
        $T_Municipio["14"]="GUERRERO";
        $T_Municipio["43"]="GUSTAVO DIAZ ORDAZ";
        $T_Municipio["15"]="HIDALGO";
        $T_Municipio["16"]="JAUMAVE";
        $T_Municipio["17"]="JIMENEZ";
        $T_Municipio["18"]="LLERA";
        $T_Municipio["19"]="MADERO";
        $T_Municipio["20"]="MAINERO";
        $T_Municipio["21"]="MANTE";
        $T_Municipio["22"]="MATAMOROS";
        $T_Municipio["23"]="MENDEZ";
        $T_Municipio["24"]="MIER";
        $T_Municipio["40"]="MIGUEL ALEMAN";
        $T_Municipio["25"]="MIQUIHUANA";
        $T_Municipio["26"]="NUEVO LAREDO";
        $T_Municipio["27"]="NUEVO MORELOS";
        $T_Municipio["28"]="OCAMPO";
        $T_Municipio["29"]="PADILLA";
        $T_Municipio["30"]="PALMILLAS";
        $T_Municipio["31"]="REYNOSA";
        $T_Municipio["42"]="RIO BRAVO";
        $T_Municipio["32"]="SAN CARLOS";
        $T_Municipio["33"]="SAN FERNANDO";
        $T_Municipio["34"]="SAN NICOLAS";
        $T_Municipio["35"]="SOTO LA MARINA";
        $T_Municipio["36"]="TAMPICO";
        $T_Municipio["37"]="TULA";
        $T_Municipio["41"]="VALLE HERMOSO";
        $T_Municipio["01"]="VICTORIA";
        $T_Municipio["09"]="VILLA DE CASAS";
        $T_Municipio["38"]="VILLAGRAN";
        $T_Municipio["39"]="XICOTENCATL";

        if ($bandera=='')
        {
            $ls_mun = '<select class="form-control" name="menu_municipios" id="menu_municipios">';
        }
        elseif($bandera<>'')
        {
            $ls_mun = '<select class="form-control" name="menu_municipios" id="menu_municipios" disabled="disabled">';
        }
        foreach ($T_Municipio as $key => $value)
        {
            if ($vmun==$key)
            {
                $ls_mun .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
            }
            else
            {
                $ls_mun .= '<option value="'.$key.'" >'.$value.'</option>';
            }
        }
        $ls_mun = $ls_mun.'</select>';
        $this->municipio=$ls_mun;
    }

}
?>
