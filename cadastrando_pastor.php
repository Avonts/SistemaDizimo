<?php require_once('conexao.php'); ?>
<html>
<head>
<title>Cadastrando Pastor...</title>
</head>
<body>
<?php
$perfil_fiel='pastor';
$nome_fiel=$_POST['nome_fiel'];
$data_nascimento=$_POST['data_nascimento'];
$sexo_fiel=$_POST['sexo_fiel'];
$cpf_fiel=$_POST['cpf_fiel'];
$email_fiel=$_POST['email_fiel'];
$telefone_fiel=$_POST['telefone_fiel'];
$civil_fiel=$_POST['civil_fiel'];
$endereco_fiel=$_POST['endereco_fiel'];
$numero_fiel=$_POST['numero_fiel'];
$bairro_fiel=$_POST['bairro_fiel'];
$cidade_fiel=$_POST['cidade_fiel'];
$estado_fiel=$_POST['estado_fiel'];
$cep_fiel=$_POST['cep_fiel'];
$sql = mysql_query("INSERT INTO fiel(perfil_fiel, nome_fiel, data_nascimento, sexo_fiel, cpf_fiel, email_fiel, telefone_fiel, civil_fiel, endereco_fiel, numero_fiel, bairro_fiel, cidade_fiel, estado_fiel, cep_fiel) VALUES ('$perfil_fiel', '$nome_fiel', '$data_nascimento', '$sexo_fiel', '$cpf_fiel', '$email_fiel', '$telefone_fiel', '$civil_fiel', '$endereco_fiel', '$numero_fiel', '$bairro_fiel', '$cidade_fiel', '$estado_fiel', '$cep_fiel')");

$insertGoTo = "cadastro_pastor.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>

</body>
</html>