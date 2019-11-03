<?php require_once('conexao.php'); ?>
<html>
<head>
<title>Cadastrando Dizimo...</title>
</head>
<body>
<?php
$cpf_fiel=$_POST['cpf_fiel'];
$valor_dizimo=$_POST['valor_dizimo'];
$data_dizimo=$_POST['data_dizimo'];
$sql = mysql_query("INSERT INTO dizimo(cpf_fiel, valor_dizimo, data_dizimo) VALUES ('$cpf_fiel', '$valor_dizimo', '$data_dizimo')");

$insertGoTo = "consulta_dizimo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>

</body>
</html>