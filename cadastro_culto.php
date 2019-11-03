<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Culto</title>
</head>
<body>
<center>Cadastrar Culto</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form name="cadastroculto" method="post" action="cadastrando_culto.php">
Culto: <input type="int" name="culto_igreja" /><br/><br />
Data: <input type="char" name="data_culto" /><br/><br />
Periodo: <input type="char" name="periodo_culto" /><br/><br />
<input type="submit" value="Cadastrar"  />
</td> <td><input type="button" value="Voltar" onclick="javascript: location.href='consulta_culto.php';" />
</form>
</body>
</html>