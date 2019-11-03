<?php
require_once('conexao.php');
$date=date("Y-m-d H:i:s");
if(isset($_POST['ok'])){
$q = mysql_escape_string($_POST['b']);
mysql_select_db($database_conexao, $conexao);
$query_buscar = "SELECT * FROM dizimo WHERE cpf_fiel LIKE '%$q%' OR data_dizimo LIKE '%$q%' OR valor_dizimo LIKE '%$q%' ORDER BY id DESC" ;
$buscar = mysql_query($query_buscar, $conexao) or die(mysql_error());
$row_buscar = mysql_fetch_assoc($buscar);
$totalRows_buscar = mysql_num_rows($buscar);
} else {
mysql_select_db($database_conexao, $conexao);
$query_buscar = "SELECT * FROM dizimo ORDER BY id DESC";
$buscar = mysql_query($query_buscar, $conexao) or die(mysql_error());
$row_buscar = mysql_fetch_assoc($buscar);
$totalRows_buscar = mysql_num_rows($buscar);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Dizimo</title>
</head>
<body>
<center>Dizimo</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<table>
</form></td> <td><input type="button" value="Home" onclick="javascript: location.href='consulta_dizimo.php';" />
<td><form id="form1" name="form1" method="post" action="">
<label><input type="text" name="b" id="b" class="form-control input-sm" placeholder=""/></label>
<label><button type="submit" name="ok" id="ok" class="btn btn-info btn-sm" value="" ><span class='glyphicon glyphicon-search'></span> Pesquisar Dizimo</button></label>
</form></td> <td><input type="button" value="Cadastrar novo Dizimo" onclick="javascript: location.href='cadastro_dizimo.php';" />
</table><br />
<table width="972" border="0">
  <tr>
    <th width="204" scope="col">Nome</th>
    <th width="149" scope="col">CPF</th>
    <th width="150" scope="col">Data</th>
    <th width="136" scope="col">Valor</th>
    <th width="74" scope="col">Alterar</th>
    <th width="62" scope="col">Inativar</th>
  </tr>
  <?php do { ?>
  <tr>
    <th align="center"><?php echo htmlentities($row_buscar['nome_fiel'], ENT_COMPAT, 'utf-8'); ?></th>
    <td align="center"><?php echo htmlentities($row_buscar['cpf_fiel'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['data_dizimo'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['valor_dizimo'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><a href="alteracao_dizimo.php?id=<?php echo $row_buscar['id']; ?>"><input type="button" value="" />
    <td width="16" align="center"><input type="button" value="" onclick="javascript: location.href='pagina.php';" />
  </tr>
  <?php } while ($row_buscar = mysql_fetch_assoc($buscar)); ?>
</table>
</body>
</html>