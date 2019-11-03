<?php require_once('conexao.php'); ?>
<html>
<head>
<title>Cadastrando Oferta...</title>
</head>
<body>
<?php
$culto_igreja=$_POST['culto_igreja'];
$data_culto=$_POST['data_culto'];
$periodo_culto=$_POST['periodo_culto'];
$valor_oferta=$_POST['valor_oferta'];
$sql = mysql_query("INSERT INTO oferta(culto_igreja, data_culto, periodo_culto, valor_oferta) VALUES ('$culto_igreja', '$data_culto', '$periodo_culto', '$valor_oferta')");

$insertGoTo = "consulta_oferta.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>

</body>
</html>