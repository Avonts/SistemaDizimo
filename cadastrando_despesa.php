<?php require_once('conexao.php'); ?>
<html>
<head>
<title>Cadastrando Despesa...</title>
</head>
<body>
<?php
$descricao_desp=$_POST['descricao_desp'];
$data_desp=$_POST['data_desp'];
$valor_desp=$_POST['valor_desp'];
$tipo_desp=$_POST['tipo_desp'];
$sql = mysql_query("INSERT INTO despesa(descricao_desp, data_desp, valor_desp, tipo_desp) VALUES ('$descricao_desp', '$data_desp', '$valor_desp', '$tipo_desp')");

$insertGoTo = "consulta_despesa.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>

</body>
</html>