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
  $updateSQL = sprintf("UPDATE culto SET culto_igreja=%s, data_culto=%s, periodo_culto=%s WHERE id=%s",
                       GetSQLValueString($_POST['culto_igreja'], "text"),
                       GetSQLValueString($_POST['data_culto'], "text"),
					   GetSQLValueString($_POST['periodo_culto'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "consulta_culto.php";
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
$query_Recordset1 = sprintf("SELECT * FROM culto WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alteração Culto</title>
</head>
<body>
<center>Alterar Culto</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
Culto:<input type="text" class="form-control input-sm" name="culto_igreja" id="culto_igreja" value="<?php echo $row_Recordset1['culto_igreja']; ?>"><br/><br/>
Data:<input type="text" class="form-control input-sm" name="data_culto" id="data_culto" value="<?php echo $row_Recordset1['data_culto']; ?>"><br/><br/>
Periodo:<input type="text" class="form-control input-sm" name="periodo_culto" id="periodo_culto" value="<?php echo $row_Recordset1['periodo_culto']; ?>"><br/><br/>
<input type="submit" value="Alterar"  />
<td align="center"><input type="button" value="Voltar" onclick="javascript: location.href='http://localhost:887/sistemadedizimo/consulta_culto.php';" />
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
</form>
</body>
</html>