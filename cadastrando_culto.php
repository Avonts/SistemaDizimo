<?php require_once('conexao.php'); ?>
<html>
<head>
<title>Cadastrando Culto...</title>
</head>
<body>
<?php
$culto_igreja=$_POST['culto_igreja'];
$data_culto=$_POST['data_culto'];
$periodo_culto=$_POST['periodo_culto'];
$sql = mysql_query("INSERT INTO culto(culto_igreja, data_culto, periodo_culto) VALUES ('$culto_igreja', '$data_culto', '$periodo_culto')");

$insertGoTo = "consulta_culto.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>

</body>
</html>