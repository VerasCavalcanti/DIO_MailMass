<?php
include 'funcoes.php';
$uploadfile = isset($_POST['arquivobase'])?$_POST['arquivobase']:"null";
$email = isset($_POST['email'])?$_POST['email']:"null";
$variavel1 = isset($_POST['variavel1'])?$_POST['variavel1']:"null";
$variavel2 = isset($_POST['variavel2'])?$_POST['variavel2']:"null";
$variavel3 = isset($_POST['variavel3'])?$_POST['variavel3']:"null";
$variavel4 = isset($_POST['variavel4'])?$_POST['variavel4']:"null";
$variavel5 = isset($_POST['variavel5'])?$_POST['variavel5']:"null";

//campos do e-mail

$bgheader = isset($_POST['bgheader'])?$_POST['bgheader']:"null";
$imagemheader = isset($_POST['imagemheader'])?$_POST['imagemheader']:"null";
$titulo1 = isset($_POST['titulo1'])?$_POST['titulo1']:"null";
$bgbody = isset($_POST['bgbody'])?$_POST['bgbody']:"null";
$imagembody = isset($_POST['imagembody'])?$_POST['imagembody']:"null";
$paragrafo1 = isset($_POST['paragrafo1'])?$_POST['paragrafo1']:"null";
$paragrafo2 = isset($_POST['paragrafo2'])?$_POST['paragrafo2']:"null";
$bgfooter = isset($_POST['bgfooter'])?$_POST['bgfooter']:"null";
$imagemfooter = isset($_POST['imagemfooter'])?$_POST['imagemfooter']:"null";
$footer = isset($_POST['footer'])?$_POST['footer']:"null";
$remetente = isset($_POST['remetente'])?$_POST['remetente']:"null";

if ($uploadfile != "null"){
    $arraycsv= getCSV($uploadfile);    
} else {
    echo "Erro interno! Contate o administrador do sistema ou tente novamente!";
}

//tratativas do e-mail

$resposta = TratarEmail ($emailmodelo2, $bgheader, $imagemheader, $titulo1, $bgbody, $imagembody, $paragrafo1, $paragrafo2, $bgfooter, $imagemfooter, $footer);



?>
<html>
<head>
<title>Modelo de e-mail</title>
</head>
<body>

<?php

$line = getLine($arraycsv, 1);

if ($email != "null"){
    echo "%email% - ". $email. "- ".$line[$email].'<br>';
}

if ($variavel1 != "null"){
    echo "%variavel1% - ". $variavel1. "- ".$line[$variavel1].'<br>';
    $resposta = str_replace('%variavel1%',$line[$variavel1],$resposta);
}

if ($variavel2 != "null"){
    echo "%variavel2% - ". $variavel2. "- ".$line[$variavel2].'<br>';
    $resposta = str_replace('%variavel2%',$line[$variavel2],$resposta);
}

if ($variavel3 != "null"){
    echo "%variavel3% - ". $variavel3. "- ".$line[$variavel3].'<br>';
    $resposta = str_replace('%variavel3%',$line[$variavel3],$resposta);
}

if ($variavel4 != "null"){
    echo "%variavel4% - ". $variavel4. "- ".$line[$variavel4].'<br>';
    $resposta = str_replace('%variavel4%',$line[$variavel4],$resposta);
}

if ($variavel5 != "null"){
    echo "%variavel5% - ". $variavel5. "- ".$line[$variavel5].'<br>';
    $resposta = str_replace('%variavel5%',$line[$variavel5],$resposta);
}

echo "Modelo de exemplo:<br>";
echo $resposta;
?>


</body>
</html>