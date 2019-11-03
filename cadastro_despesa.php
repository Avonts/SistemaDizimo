<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Despesa</title>
</head>
<body>
<center>Cadastrar Despesa</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form name="cadastrodespesa" method="post" action="cadastrando_despesa.php">
Descrição: <input type="int" name="descricao_desp" /><br/><br />
Data: <input type="char" name="data_desp" /><br/><br />
Valor: <input type="char" name="valor_desp" /><br/><br />
Tipo:  <input type="char" name="tipo_desp" /><br/><br />
<input type="submit" value="Cadastrar"  />
</td> <td><input type="button" value="Voltar" onclick="javascript: location.href='consulta_despesa.php';" />
</form>
</body>
</html>