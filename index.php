<?php
$erro = isset($_GET['erro'])?$_GET['erro']:"0";
?>

<html>
<head>
<title>Carregar Base</title>
</head>
<body>

<?php 
if ($erro == '1'){
echo "Arquivo vazio ou inválido!<br>Observe o tamanho máximo permitido de 30000000";
header('Location: index.php?erro=0');
} else {
echo '<!-- formulário para receber o arquivo xml -->';
echo '<form enctype="multipart/form-data" action="analise.php" method="POST">';
echo '<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />';
echo 'Base (csv): <input name="userfile" type="file"  accept=".csv" />';
echo '<input type="submit" value="Enviar arquivo" />';
echo '</form>';
}


?>


</body>
</html>