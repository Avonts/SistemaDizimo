<?php
require_once('conexao.php');
$date=date("Y-m-d H:i:s");
if(isset($_POST['ok'])){
$q = mysql_escape_string($_POST['b']);
mysql_select_db($database_conexao, $conexao);
$query_buscar = "SELECT * FROM oferta WHERE culto_igreja LIKE '%$q%' OR data_culto LIKE '%$q%' OR periodo_culto LIKE '%$q%' OR valor_oferta LIKE '%$q%' ORDER BY id DESC" ;
$buscar = mysql_query($query_buscar, $conexao) or die(mysql_error());
$row_buscar = mysql_fetch_assoc($buscar);
$totalRows_buscar = mysql_num_rows($buscar);
} else {
mysql_select_db($database_conexao, $conexao);
$query_buscar = "SELECT * FROM oferta ORDER BY id DESC";
$buscar = mysql_query($query_buscar, $conexao) or die(mysql_error());
$row_buscar = mysql_fetch_assoc($buscar);
$totalRows_buscar = mysql_num_rows($buscar);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Oferta</title>
</head>
<body>
<center>Oferta</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<table>
</form></td> <td><input type="button" value="Home" onclick="javascript: location.href='consulta_oferta.php';" />
<td><form id="form1" name="form1" method="post" action="">
<label><input type="text" name="b" id="b" class="form-control input-sm" placeholder=""/></label>
<label><button type="submit" name="ok" id="ok" class="btn btn-info btn-sm" value="" ><span class='glyphicon glyphicon-search'></span> Pesquisar Oferta</button></label>
</form></td> <td><input type="button" value="Cadastrar nova Oferta" onclick="javascript: location.href='cadastro_oferta.php';" />
</table><br />
<table width="972" border="0">
  <tr>
    <th width="204" scope="col">Culto</th>
    <th width="149" scope="col">Data</th>
    <th width="149" scope="col">Periodo</th>
    <th width="150" scope="col">Valor</th>
    <th width="74" scope="col">Alterar</th>
    <th width="62" scope="col">Inativar</th>
  </tr>
  <?php do { ?>
  <tr>
    <th align="center"><?php echo htmlentities($row_buscar['culto_igreja'], ENT_COMPAT, 'utf-8'); ?></th>
    <td align="center"><?php echo htmlentities($row_buscar['data_culto'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['periodo_culto'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['valor_oferta'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><a href="alteracao_oferta.php?id=<?php echo $row_buscar['id']; ?>"><input type="button" value="" />
    <td width="16" align="center"><input type="button" value="" onclick="javascript: location.href='pagina.php';" />
  </tr>
  <?php } while ($row_buscar = mysql_fetch_assoc($buscar)); ?>
</table>
</body>
</html>