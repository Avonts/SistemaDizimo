<?php require_once('conexao.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE fiel SET nome_fiel=%s, data_nascimento=%s, sexo_fiel=%s, cpf_fiel=%s, email_fiel=%s, telefone_fiel=%s, civil_fiel=%s, endereco_fiel=%s, numero_fiel=%s, bairro_fiel=%s, cidade_fiel=%s, estado_fiel=%s, cep_fiel=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome_fiel'], "text"),
                       GetSQLValueString($_POST['data_nascimento'], "text"),
					   GetSQLValueString($_POST['sexo_fiel'], "text"),
					   GetSQLValueString($_POST['cpf_fiel'], "text"),
					   GetSQLValueString($_POST['email_fiel'], "text"),
					   GetSQLValueString($_POST['telefone_fiel'], "text"),
					   GetSQLValueString($_POST['civil_fiel'], "text"),
					   GetSQLValueString($_POST['endereco_fiel'], "text"),
					   GetSQLValueString($_POST['numero_fiel'], "text"),
					   GetSQLValueString($_POST['bairro_fiel'], "text"),
					   GetSQLValueString($_POST['cidade_fiel'], "text"),
					   GetSQLValueString($_POST['estado_fiel'], "text"),
					   GetSQLValueString($_POST['cep_fiel'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "conta_fiel.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM fiel WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conta Fiel</title>
</head>
<body>
<center>Conta Fiel</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
Nome:<input type="text" class="form-control input-sm" name="nome_fiel" id="nome_fiel" value="<?php echo $row_Recordset1['nome_fiel']; ?>"><br/><br/>
Data de Nascimento:<input type="text" class="form-control input-sm" name="data_nascimento" id="data_nascimento" value="<?php echo $row_Recordset1['data_nascimento']; ?>"><br/><br/>
Sexo:<input type="text" class="form-control input-sm" name="sexo_fiel" id="sexo_fiel" value="<?php echo $row_Recordset1['sexo_fiel']; ?>"><br/><br/>
CPF:<input type="text" class="form-control input-sm" name="cpf_fiel" id="cpf_fiel" value="<?php echo $row_Recordset1['cpf_fiel']; ?>"><br/><br/>
E-mail:<input type="text" class="form-control input-sm" name="email_fiel" id="email_fiel" value="<?php echo $row_Recordset1['email_fiel']; ?>"><br/><br/>
Telefone: <input type="text" class="form-control input-sm" name="telefone_fiel" id="telefone_fiel" value="<?php echo $row_Recordset1['telefone_fiel']; ?>"><br/><br/>
Estado Civil: <input type="text" class="form-control input-sm" name="civil_fiel" id="civil_fiel" value="<?php echo $row_Recordset1['civil_fiel']; ?>"><br/><br/>
Endereço: <input type="text" class="form-control input-sm" name="endereco_fiel" id="endereco_fiel" value="<?php echo $row_Recordset1['endereco_fiel']; ?>"><br/><br/>
Nº: <input type="text" class="form-control input-sm" name="numero_fiel" id="numero_fiel" value="<?php echo $row_Recordset1['numero_fiel']; ?>"><br/><br/>
Bairro: <input type="text" class="form-control input-sm" name="bairro_fiel" id="bairro_fiel" value="<?php echo $row_Recordset1['bairro_fiel']; ?>"><br/><br/>
Cidade: <input type="text" class="form-control input-sm" name="cidade_fiel" id="cidade_fiel" value="<?php echo $row_Recordset1['cidade_fiel']; ?>"><br/><br/>
Estado: <input type="text" class="form-control input-sm" name="estado_fiel" id="estado_fiel" value="<?php echo $row_Recordset1['estado_fiel']; ?>"><br/><br/>
CEP: <input type="text" class="form-control input-sm" name="cep_fiel" id="cep_fiel" value="<?php echo $row_Recordset1['cep_fiel']; ?>"><br/><br/>
<input type="submit" value="Salvar"  />
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
</form>
</body>
</html>