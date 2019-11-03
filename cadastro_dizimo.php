<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Dízimo</title>
</head>
<body>
<center>Cadastrar Dízimo</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form name="cadastrodizimo" method="post" action="cadastrando_dizimo.php">
CPF do Fiel: <input type="int" name="cpf_fiel" /><br/><br />
Valor: <input type="char" name="valor_dizimo" /><br/><br />
Data: <input type="char" name="data_dizimo" /><br/><br />
<input type="submit" value="Cadastrar"  />
</td> <td><input type="button" value="Voltar" onclick="javascript: location.href='consulta_dizimo.php';" />
</form>
</body>
</html>