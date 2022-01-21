<?php

//time zone do projeto
date_default_timezone_set("America/Fortaleza");

function AplicarData(){
    $resposta = date("d-m-Y");
    $resposta = (string)$resposta;
    return $resposta;
}

function AplicarHora(){
    $resposta = date("His");
    $resposta = (string)$resposta;
    return $resposta;
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getCSV($name) {
    $file = fopen($name, "r");
    $result = array();
    $i = 0;
    while (!feof($file)):
       if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :
          $i++;
       endif;
    endwhile;
    fclose($file);
    return $result;
 }

 function getLine($array, $index) {
    return explode(';', $array[$index]);
 }

 //construir tabela html para indice do csv e seu valor
 function ConstroiTabelaValoresIndice ($arrayreferencia){
    $colunasvalores = getLine($arrayreferencia, 0);
    $i= 0;
    echo '<table border="1">';
    echo "<tr>";   
    do {
 
    echo "<td>$colunasvalores[$i]</td>";
    $i++;
    } while ($i < count($colunasvalores));
    echo "</tr>";
    echo "<tr>";
    $i=0;
    do {
    echo "<td>$i</td>";
    $i++;
    } while ($i < count($colunasvalores));
    echo "</tr>";
    echo "</table>";
 }

 function ConstroiTabelaValoresIndice2 ($arrayreferencia){
    $colunasvalores = getLine($arrayreferencia, 0);
    $i= 0;
    echo '<table border="1">';
    echo "<tr><td>Valor</td><td>Campo</td></tr>";
   
    do {
    echo "<tr>";
    echo "<td>$i</td><td>$colunasvalores[$i]</td>";
    echo "</tr>";
    $i++;
    } while ($i < count($colunasvalores));
    echo "</table>";
 }

 //verifica se existe campo de email na base
 function ChecarEmail ($arrayreferencia){
 $resultado = false;
 $colunasvalores = getLine($arrayreferencia, 0);
 $i= 0;
 do {
    if ($colunasvalores[$i] == "email") {
        $resultado = true;
    }
    $i++;
    } while ($i < count($colunasvalores));
    return $resultado;
 }

 function InserirValues($arrayreferencia){

    $colunasvalores = getLine($arrayreferencia, 0);
    $i= 0;
    do {
        echo '<option value="'.$i.'">'.$i.'</option>';
       $i++;
       } while ($i < count($colunasvalores));
 }

 function TratarEmail ($modelo, $bgheader, $imagemheader, $titulo1, $bgbody, $imagembody, $paragrafo1, $paragrafo2, $bgfooter, $imagemfooter, $footer){

    $email = $modelo;

    //testagem
    if ($bgheader == "null"){
        $bgheader = "";
    } else {
        $bgheader = 'bgcolor="'.$bgheader.'"'; 
    }

    if ($imagemheader == "null"){
        $imagemheader = "";
    } else {
        $imagemheader = 'background="'.$imagemheader.'"'; 
    }

    if ($titulo1 == "null"){
        $titulo1 = "";
    } else {
        $titulo1 = '<h2>'.$titulo1.'<h2>'; 
    }

    if ($bgbody == "null"){
        $bgbody = "";
    } else {
        $bgbody = 'bgcolor="'.$bgbody.'"'; 
    }

    if ($imagembody == "null"){
        $imagembody = "";
    } else {
        $imagembody = 'background="'.$imagembody.'"'; 
    }

    if ($paragrafo1 == "null"){
        $paragrafo1 = "";
    } else {
        $paragrafo1 = $paragrafo1; 
    }

    if ($paragrafo2 == "null"){
        $paragrafo2 = "";
    } else {
        $paragrafo2 = $paragrafo2; 
    }

    if ($bgfooter == "null"){
        $bgfooter = "";
    } else {
        $bgfooter = 'bgcolor="'.$bgfooter.'"'; 
    }

    if ($imagemfooter == "null"){
        $imagemfooter = "";
    } else {
        $imagemfooter = 'background="'.$imagemfooter.'"'; 
    }

    if ($footer == "null"){
        $footer = "";
    } else {
        $footer = $footer; 
    }

    
    //inicio do replace
    $email = str_replace('%bgheader%',$bgheader,$email);
    $email = str_replace('%bgimg%',$imagemheader,$email);
    $email = str_replace('%tituloemail%',$titulo1,$email);
    $email = str_replace('%bgbody%',$bgbody,$email);
    $email = str_replace('%imgbody%',$imagembody,$email);
    $email = str_replace('%paragrafo1%',$paragrafo1,$email);
    $email = str_replace('%paragrafo2%',$paragrafo2,$email);
    $email = str_replace('%bgfooter%',$bgfooter,$email);
    $email = str_replace('%imgfooter%',$imagemfooter,$email);
    $email = str_replace('%footer%',$footer,$email);
    

    return $email;
 }

 $emailmodelo2 = '
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>%title_mail%</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="margin: 0; padding: 0;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
 <tr>
  <td %bgimg% %bgheader% width="600" height="190" style="text-align: center;">
	%tituloemail%
  </td>
 </tr>
 <tr>
  <td %imgbody% %bgbody% style="padding: 25px 0 0 0;">
  
  <p align="justify">%paragrafo1%</p>
 
   <p align="justify">%paragrafo2%</p>
    
  </td>
 </tr>
 <tr>
  <td %imgfooter% %bgfooter% width="100%" height="80">
    %footer%
  </td>
 </tr>
</table>
</body>
 ';

 /*
 function RetornaValorIndice ($arrareferencia, ){

    $i = 1;
    do {
        $bar = getLine($foo, $i);
        $item = CriarRegistroProduto($bar[0],utf8_encode($bar[2]),$bar[13],$bar[4]);
        $registro = $registro.$item."\n";
    $i++;
    } while ($i < count($foo)-1);
    
    echo "Importado " .($i-1)." registros e salvo no identificador *LIVRE*<br>";
    echo $registro;
    EscreverInformacaoNoXML($registro, "*LIVRE*", "produtos.xml");

 }

 */




?>