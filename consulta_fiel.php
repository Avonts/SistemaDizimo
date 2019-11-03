<?php
require_once('conexao.php');
$date=date("Y-m-d H:i:s");

if(isset($_POST['ok'])){
	
$q = mysql_escape_string($_POST['b']);

mysql_select_db($database_conexao, $conexao);
$query_buscar = "SELECT * FROM fiel WHERE nome_fiel LIKE '%$q%' OR data_nascimento LIKE '%$q%' OR sexo_fiel LIKE '%$q%' OR cpf_fiel LIKE '%$q%' OR email_fiel LIKE '%$q%' OR telefone_fiel LIKE '%$q%' OR civil_fiel LIKE '%$q%' OR endereco_fiel LIKE '%$q%' OR numero_fiel LIKE '%$q%' OR bairro_fiel LIKE '%$q%' OR cidade_fiel LIKE '%$q%' OR estado_fiel LIKE '%$q%' OR cep_fiel ORDER BY id DESC" ;
$buscar = mysql_query($query_buscar, $conexao) or die(mysql_error());
$row_buscar = mysql_fetch_assoc($buscar);
$totalRows_buscar = mysql_num_rows($buscar);

} else {

mysql_select_db($database_conexao, $conexao);
$query_buscar = "SELECT * FROM fiel ORDER BY id DESC";
$buscar = mysql_query($query_buscar, $conexao) or die(mysql_error());
$row_buscar = mysql_fetch_assoc($buscar);
$totalRows_buscar = mysql_num_rows($buscar);

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Fiel</title>
</head>
<body>
<center>Fiel</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />

<table>
</form></td> <td><input type="button" value="Home" onclick="javascript: location.href='consulta_fiel.php';" />
<td><form id="form1" name="form1" method="post" action="">
<label><input type="text" name="b" id="b" class="form-control input-sm" placeholder=""/></label>
<label><button type="submit" name="ok" id="ok" class="btn btn-info btn-sm" value="" ><span class='glyphicon glyphicon-search'></span> Pesquisar Fiel</button></label>
</form></td> <td><input type="button" value="Cadastrar novo Fiel" onclick="javascript: location.href='cadastro_fiel.php';" />
</table><br />

<table width="972" border="0">
  <tr>
    <th width="204" scope="col">Nome</th>
    <th width="149" scope="col">CPF</th>
    <th width="147" scope="col">Telefone</th>
    <th width="150" scope="col">Cep</th>
    <th width="136" scope="col">Situação</th>
    <th width="74" scope="col">Alterar</th>
    <th width="62" scope="col">Inativar</th>
  </tr>
  <?php do { ?>
  <tr>
    <th align="center"><?php echo htmlentities($row_buscar['nome_fiel'], ENT_COMPAT, 'utf-8'); ?></th>
    <td align="center"><?php echo htmlentities($row_buscar['cpf_fiel'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['telefone_fiel'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['cep_fiel'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><?php echo htmlentities($row_buscar['situacao_fiel'], ENT_COMPAT, 'utf-8'); ?></td>
    <td align="center"><a href="alteracao_fiel.php?id=<?php echo $row_buscar['id']; ?>"><input type="button" value="" />
    <td width="16" align="center"><input type="button" value="" onclick="javascript: location.href='pagina.php';" />
  </tr>
  <?php } while ($row_buscar = mysql_fetch_assoc($buscar)); ?>
</table>
</body>
</html>