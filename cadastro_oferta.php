<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Oferta</title>
</head>
<body>
<center>Cadastrar Oferta</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form name="cadastrooferta" method="post" action="cadastrando_oferta.php">
Culto: <input type="int" name="culto_igreja" /><br/><br />
Data: <input type="char" name="data_culto" /><br/><br />
Periodo: <input type="char" name="periodo_culto" /><br/><br />
Valor: <input type="char" name="valor_oferta" /><br/><br />
<input type="submit" value="Cadastrar"  />
</td> <td><input type="button" value="Voltar" onclick="javascript: location.href='consulta_oferta.php';" />
</form>
</body>
</html>