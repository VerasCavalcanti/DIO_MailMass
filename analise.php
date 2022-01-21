<?php
//chamar funções ao projeto
include 'funcoes.php';


//$uploaddir = '/var/www/uploads/';

$data = AplicarData();
$hora = AplicarHora();

//definir diretório e alterar nome incluindo data e hora
$processnamefile = "[processado_".$data."_".$hora."]";
$uploaddir = "C:/wamp64/www/mailing/bases/";

//receber arquivo no POST
$arquivo = isset($_FILES['userfile'])?$_FILES['userfile']:"null";

//echo $arquivo['name'];

//echo $arquivo['size'];

?>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php

if (($arquivo['size'] == 0) and ($arquivo['size'] > 3000)) {
    header('Location: arquivo.php?erro=01');
} else {

    $uploadfile = $uploaddir . $processnamefile . basename($arquivo['name']);

if (move_uploaded_file($arquivo['tmp_name'], $uploadfile)) {

    echo "Arquivo CSV válido e registrado com sucesso.<br>";
  //$foo = utf8_encode(getCSV('produtos.csv'));

  $arraycsv= getCSV($uploadfile);


  if (ChecarEmail($arraycsv)){
    echo "Confira os campos da base e seus respectivos valores.<br>";

    //tela para visualização de tabela 
    echo '<form action="tabela.php" method="POST" target="_blank" >';
    echo '<input type="hidden" name="arquivobase" value="'.$uploadfile.'" >';
    echo '<input type="submit" value="Visualizar tabela" />';
    echo '</form>';
    //fim da exibição de tabela

    //formulário de seleção de variáveis
    echo '<form action="preparo.php" method="POST">';

    echo '<label for="email">Selecione o valor do campo E-mail:</label>';
    echo '<select id="email" name="email" form="carform">';
    //<!-- inserir options -->
    InserirValues($arraycsv);
    echo '</select><br>';
    echo 'Definir variáveis.<br>';
    echo 'Variável 1 (%variavel1%):'; 
    echo '<select id="variavel1" name="variavel1" >';
    //<!-- inserir options -->
    echo '<option value="null">null</option>';
    InserirValues($arraycsv);
    echo '</select><br>';
    
    echo 'Variável 2 (%variavel2%):'; 
    echo '<select id="variavel2" name="variavel2" >';
    //<!-- inserir options -->
    echo '<option value="null">null</option>';
    InserirValues($arraycsv);
    echo '</select><br>';
    
    echo 'Variável 3 (%variavel3%):'; 
    echo '<select id="variavel3" name="variavel3" >';
    //<!-- inserir options -->
    echo '<option value="null">null</option>';
    InserirValues($arraycsv);
    echo '</select><br>';
    
    echo 'Variável 4 (%variavel4%):'; 
    echo '<select id="variavel4" name="variavel4" >';
    //<!-- inserir options -->
    echo '<option value="null">null</option>';
    InserirValues($arraycsv);
    echo '</select><br>';
    
    echo 'Variável 5 (%variavel5%):'; 
    echo '<select id="variavel5" name="variavel5" >';
    //<!-- inserir options -->
    echo '<option value="null">null</option>';
    InserirValues($arraycsv);
    echo '</select>';
    
    echo '<input type="hidden" name="arquivobase" value="'.$uploadfile.'" >';
    echo '<input type="submit" value="Enviar arquivo" />';
    
    echo '</form>';
    //fim formulário 


  } else {
      echo "A base enviada não existe campo email.<br>";
      echo 'O campo email é obrigatório para envio em lote. Se tiver, confira a nomenclatura utilizada, altere e submeta a nova base! <a href="index.php">Voltar</a><br>';
      //ConstroiTabelaValoresIndice2($arraycsv);
  }



} else {
    echo "Possível arquivo maior que 30000 bytes\n";
}

//echo 'Aqui está mais informações de debug:';
//print_r($arquivo);

}

?>

</body>
<html>