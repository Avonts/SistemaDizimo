<?php require_once('conexao.php'); ?>
<html>
<head>
<title>Cadastrando Igreja...</title>
</head>
<body>
<?php
$nome_igreja=$_POST['nome_igreja'];
$data_fundacao=$_POST['data_fundacao'];
$cnpj=$_POST['cnpj'];
$email_igreja=$_POST['email_igreja'];
$telefone_igreja=$_POST['telefone_igreja'];
$endereco_igreja=$_POST['endereco_igreja'];
$numero_igreja=$_POST['numero_igreja'];
$bairro_igreja=$_POST['bairro_igreja'];
$cidade_igreja=$_POST['cidade_igreja'];
$estado_igreja=$_POST['estado_igreja'];
$cep_igreja=$_POST['cep_igreja'];
$sql = mysql_query("INSERT INTO igreja(nome_igreja, data_fundacao, cnpj, email_igreja, telefone_igreja, endereco_igreja, n_igreja, bairro_igreja, cidade_igreja, estado_igreja, cep_igreja) VALUES ('$nome_igreja', '$data_fundacao', '$cnpj', '$email_igreja', '$telefone_igreja', '$endereco_igreja', '$numero_igreja', '$bairro_igreja', '$cidade_igreja', '$estado_igreja', '$cep_igreja')");

$insertGoTo = "cadastro_pastor.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>

</body>
</html>