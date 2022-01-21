    <?php
include 'funcoes.php';
$uploadfile = isset($_POST['arquivobase'])?$_POST['arquivobase']:"null";
$email = isset($_POST['email'])?$_POST['email']:"null";
$variavel1 = isset($_POST['variavel1'])?$_POST['variavel1']:"null";
$variavel2 = isset($_POST['variavel2'])?$_POST['variavel2']:"null";
$variavel3 = isset($_POST['variavel3'])?$_POST['variavel3']:"null";
$variavel4 = isset($_POST['variavel4'])?$_POST['variavel4']:"null";
$variavel5 = isset($_POST['variavel5'])?$_POST['variavel5']:"null";


if ($uploadfile != "null"){
    $arraycsv= getCSV($uploadfile);    
} else {
    echo "Erro interno! Contate o administrador do sistema ou tente novamente!";
}


?>
<html>
<head>
<title></title>
</head>
<body>

<?php
    if ($uploadfile != "null"){
        $arraycsv= getCSV($uploadfile);    

        echo "Dados da variável 1<br>";
        $i = 1;
        do {
            $line = getLine($arraycsv, $i);
            echo $line[$variavel1].'<br>';
        $i++;
        } while ($i < count($arraycsv)-1);

        
       // echo ' <embed type="text/html" src="templates_mail\modelo2.html" width="600" height="100%"> ';

    } else {
        echo "Erro interno! Contate o administrador do sistema ou tente novamente!";
    }
    ?>

    <form action="email.php" method="POST" target="_blank" >
    <input type="hidden" name="arquivobase" value="<?php echo $uploadfile; ?>" >

    <table border="0" width="600">
    <tr>
    <td>Remetente</td>
    <td><input type="email" name="remetente" maxlength="400" size="50" placeholder="E-mail remetente" value=""></td>
    </tr>
    <tr>
    <td>Header (cabeçalho)</td>
    <td></td>
    </tr>
    <tr>
    <td>Cor de fundo</td>
    <td><input type="color" name="bgheader" value="#ff0000"></td>
    </tr>
    <tr>
    <td>Imagem de fundo (background)</td>
    <td><input type="text" name="imagemheader" maxlength="400" size="50" placeholder="URL DA IMAGEM 600x190 pixels" value=""></td>
    </tr>
    <tr>
    <td>Título (header)</td>
    <td><input type="text" name="titulo1" maxlength="80" size="50" placeholder="TÍTULO DO CABEÇALHO. Máximo de 80 caracteres" value=""></td>
    </tr>
    <tr>
    <td>Corpo do e-mail (Body)</td>
    <td></td>
    </tr>
    <tr>
    <td>Cor de fundo</td>
    <td><input type="color" name="bgbody" value="#ff0000"></td>
    </tr>
    <tr>
    <td>Imagem de fundo (background)</td>
    <td><input type="text" name="imagembody" maxlength="400" size="50" placeholder="URL DA IMAGEM 600 pixels largura" value=""></td>
    </tr>
    <tr>
    <td>Texto</td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td><textarea name="paragrafo1" maxlength="480" size="50" placeholder="Paragrafo 1"></textarea></td>
    </tr>
    <tr>
    <td></td>
    <td><textarea name="paragrafo2" maxlength="480" size="50" placeholder="Paragrafo 2"></textarea></td>
    </tr>
    <tr>
    <td>Footer (rodapé)</td>
    <td></td>
    </tr>
    <tr>
    <td>cor de fundo</td>
    <td><input type="color" name="bgfooter" value="#ff0000"></td>
    </tr>
    <tr>
    <td>Imagem de rodapé (footer)</td>
    <td><input type="text" name="imagemfooter" maxlength="400" size="50" value=""></td>
    </tr>
    <tr>
    <td>Texto de rodapé</td>
    <td><input type="text" name="footer" maxlength="400" size="50" value=""></td>
    </tr>
    </table>



    <input type="hidden" name="email" value="<?php echo $email; ?>" >
    <input type="hidden" name="variavel1" value="<?php echo $variavel1; ?>" >
    <input type="hidden" name="variavel2" value="<?php echo $variavel2; ?>" >
    <input type="hidden" name="variavel3" value="<?php echo $variavel3; ?>" >
    <input type="hidden" name="variavel4" value="<?php echo $variavel4; ?>" >
    <input type="hidden" name="variavel5" value="<?php echo $variavel5; ?>" >

    <input type="submit" value="Preparar e-mail" />

    <imput >


</body>
</html>