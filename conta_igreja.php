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
  $updateSQL = sprintf("UPDATE igreja SET nome_igreja=%s, data_fundacao=%s, cnpj=%s, email_igreja=%s, telefone_igreja=%s, endereco_igreja=%s, numero_igreja=%s, bairro_igreja=%s, cidade_igreja=%s, estado_igreja=%s, cep_igreja=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome_igreja'], "text"),
                       GetSQLValueString($_POST['data_fundacao'], "text"),
					   GetSQLValueString($_POST['cnpj'], "text"),
					   GetSQLValueString($_POST['email_igreja'], "text"),
					   GetSQLValueString($_POST['telefone_igreja'], "text"),
					   GetSQLValueString($_POST['endereco_igreja'], "text"),
					   GetSQLValueString($_POST['numero_igreja'], "text"),
					   GetSQLValueString($_POST['bairro_igreja'], "text"),
					   GetSQLValueString($_POST['cidade_igreja'], "text"),
					   GetSQLValueString($_POST['estado_igreja'], "text"),
					   GetSQLValueString($_POST['cep_igreja'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "conta_igreja.php";
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
$query_Recordset1 = sprintf("SELECT * FROM igreja WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conta Igreja</title>
</head>
<body>
<center>Conta Igreja</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
Nome:<input type="text" class="form-control input-sm" name="nome_igreja" id="nome_igreja" value="<?php echo $row_Recordset1['nome_igreja']; ?>"><br/><br/>
Data da Fundação:<input type="text" class="form-control input-sm" name="data_fundacao" id="data_fundacao" value="<?php echo $row_Recordset1['data_fundacao']; ?>"><br/><br/>
CNPJ:<input type="text" class="form-control input-sm" name="cnpj" id="cnpj" value="<?php echo $row_Recordset1['cnpj']; ?>"><br/><br/>
E-mail:<input type="text" class="form-control input-sm" name="email_igreja" id="email_igreja" value="<?php echo $row_Recordset1['email_igreja']; ?>"><br/><br/>
Telefone: <input type="text" class="form-control input-sm" name="telefone_igreja" id="telefone_igreja" value="<?php echo $row_Recordset1['telefone_igreja']; ?>"><br/><br/>
Endereço: <input type="text" class="form-control input-sm" name="endereco_igreja" id="endereco_igreja" value="<?php echo $row_Recordset1['endereco_igreja']; ?>"><br/><br/>
Nº: <input type="text" class="form-control input-sm" name="numero_igreja" id="numero_igreja" value="<?php echo $row_Recordset1['numero_igreja']; ?>"><br/><br/>
Bairro: <input type="text" class="form-control input-sm" name="bairro_igreja" id="bairro_igreja" value="<?php echo $row_Recordset1['bairro_igreja']; ?>"><br/><br/>
Cidade: <input type="text" class="form-control input-sm" name="cidade_igreja" id="cidade_igreja" value="<?php echo $row_Recordset1['cidade_igreja']; ?>"><br/><br/>
Estado: <input type="text" class="form-control input-sm" name="estado_igreja" id="estado_igreja" value="<?php echo $row_Recordset1['estado_igreja']; ?>"><br/><br/>
CEP: <input type="text" class="form-control input-sm" name="cep_igreja" id="cep_igreja" value="<?php echo $row_Recordset1['cep_igreja']; ?>"><br/><br/>
<input type="submit" value="Salvar"  />
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
</form>
</body>
</html>