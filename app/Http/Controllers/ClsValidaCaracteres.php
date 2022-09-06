<?php

namespace App\Http\Controllers;
class ClsValidaCaracteres
{
    function fnReemplazaLetra($Variable)
    {
    $this->Variable=$Variable;

        if (substr_count($Variable, '??') > 0)
        {
        $this->Variable=str_replace("??","Ñ",$Variable);
        }
        elseif (substr_count($Variable, '?') > 0)
        {
        $this->Variable=str_replace("?","Ñ",$Variable);
        }

        if(substr_count($Variable, '%') > 0)
        {
        $this->Variable=str_replace("%","Ñ",$Variable);
        }
        if(substr_count($Variable, '1?') > 0)
        {
        $this->Variable=str_replace("1?","1º",$Variable);
        }
        if(substr_count($Variable, '2?') > 0)
        {
        $this->Variable=str_replace("2?","2º",$Variable);
        }
        if(substr_count($Variable, '3?') > 0)
        {
        $this->Variable=str_replace("3?","3º",$Variable);
        }
        if(substr_count($Variable, '4?') > 0)
        {
        $this->Variable=str_replace("4?","4º",$Variable);
        }
        if(substr_count($Variable, '5?') > 0)
        {
        $this->Variable=str_replace("5?","5º",$Variable);
        }
        if(substr_count($Variable, '6?') > 0)
        {
        $this->Variable=str_replace("6?","6º",$Variable);
        }
        if(substr_count($Variable, 'CHR(209)') > 0)
        {
            $this->Variable=str_replace("CHR(209)","Ñ",$Variable);
        }
        if (substr_count($Variable, '¿¿') > 0)
        {
        $this->Variable=str_replace("¿¿","Ñ",$Variable);
        }

    }


    function fnConvierteNCONTRIB($VCONTRIB)
    {

        /* si tiene comilla simple la reemplaza */
            if (substr_count($VCONTRIB, "'")> 0)
            {
                $VCONTRIB=str_replace("'","'||CHR(39)||'", $VCONTRIB);
            }

        $this->VCONTRIB=$VCONTRIB;
        return;
    }


    function fnConvierteNCONTRIBMayusculas($VCONTRIB)
    {
//        $this->VCONTRIB='';

        /* si tiene comilla simple se lo quita */
            if (substr_count($VCONTRIB, "'")> 0)
            {
                $VCONTRIB=str_replace("'","'||CHR(39)||'", $VCONTRIB);
            }
        /* hasta aqui */

        if (substr_count($VCONTRIB, 'Ñ')> 0)
        {
        $VCONTRIB=str_replace("Ñ","'||CHR(209)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, '�?')> 0)
        {
        $VCONTRIB=str_replace("�?","'||CHR(193)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'É')> 0)
        {
        $VCONTRIB=str_replace("É","'||CHR(201)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, '�?')> 0)
        {
        $VCONTRIB=str_replace("�?","'||CHR(205)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'Ó')> 0)
        {
        $VCONTRIB=str_replace("Ó","'||CHR(211)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'Ú')> 0)
        {
        $VCONTRIB=str_replace("Ú","'||CHR(218)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'ñ')> 0)
        {
        $VCONTRIB=str_replace("ñ","'||CHR(209)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'á')> 0)
        {
        $VCONTRIB=str_replace("á","'||CHR(193)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'é')> 0)
        {
        $VCONTRIB=str_replace("é","'||CHR(201)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'í')> 0)
        {
        $VCONTRIB=str_replace("í","'||CHR(205)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'ó')> 0)
        {
        $VCONTRIB=str_replace("ó","'||CHR(211)||'",$VCONTRIB);
        }

        if (substr_count($VCONTRIB, 'ú')> 0)
        {
        $VCONTRIB=str_replace("ú","'||CHR(218)||'",$VCONTRIB);
        }

        $this->VCONTRIB=$VCONTRIB;
        return;

    }



    function fnReemplazaLetraMinuscula($Variable)
    {
    $this->Variable='';

        if (substr_count($Variable, '?')> 0)
        {
        $this->Variable=str_replace("?","ñ",$Variable);
        }

        elseif (substr_count($Variable, '??')> 0)
        {
        $this->Variable=str_replace("??","ñ",$Variable);
        }


        elseif(substr_count($Variable, '%')> 0)
        {
        $this->Variable=str_replace("%","ñ",$Variable);
        }

        else
        {
        $this->Variable=$Variable;
        }
    }

}

?>
