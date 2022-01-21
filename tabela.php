
<?php
include 'funcoes.php';
$uploadfile = isset($_POST['arquivobase'])?$_POST['arquivobase']:"null";


?>

<html>
<head>
</head>
<body>

    <?php
    
    if ($uploadfile != "null"){
        $arraycsv= getCSV($uploadfile);    
        ConstroiTabelaValoresIndice2($arraycsv); 
    } else {
        echo "Erro interno! Contate o administrador do sistema ou tente novamente!";
    }
    
    ?>

</body>
</html>