<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Igreja</title>
</head>
<body>
<center>Cadastrar Igreja</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form name="cadastroigreja" method="post" action="cadastrando_igreja.php">
Nome da Igreja: <input type="texte" name="nome_igreja" /><br/><br/>
Data da Fundacao: <input type="char" name="data_fundacao" /><br/><br/>
CNPJ: <input type="int" name="cnpj" /><br/><br/>
E-mail: <input type="char" name="email_igreja" /><br/><br/>
Telefone: <input type="int" name="telefone_igreja" /><br/><br/>
Endereco: <input type="texte" name="endereco_igreja" /><br/><br/>
Nº: <input type="int" name="numero_igreja" /><br/><br/>
Bairro: <input type="texte" name="bairro_igreja" /><br/><br/>
Cidade: <input type="texte" name="cidade_igreja" /><br/><br/>
Estado: <input type="texte" name="estado_igreja" /><br/><br/>
CEP: <input type="int" name="cep_igreja" /><br/><br/>
<input type="submit" value="Cadastrar"  />
</form>
</body>
</html>