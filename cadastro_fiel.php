<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Fiel</title>
</head>
<body>
<center>Cadastrar Fiel</center>
<br /><br /><br />
<?php
	include"include/menu.php";
?>
        <br /><br /><br />
<form name="cadastrofiel" method="post" action="cadastrando_fiel.php">
Nome do Fiel: <input type="texte" name="nome_fiel" /><br/><br />
Data de Nascimento: <input type="char" name="data_nascimento" /><br/><br/>
Sexo: <input type="texte" name="sexo_fiel" /><br/><br/>
CPF: <input type="int" name="cpf_fiel" /><br/><br/>
E-mail: <input type="char" name="email_fiel" /><br/><br/>
Telefone: <input type="int" name="telefone_fiel" /><br/><br/>
Estado Civil: <input type="texte" name="civil_fiel" /><br/><br/>
Endereço: <input type="texte" name="endereco_fiel" /><br/><br/>
Nº: <input type="int" name="numero_fiel" /><br/><br/>
Bairro: <input type="texte" name="bairro_fiel" /><br/><br/>
Cidade: <input type="texte" name="cidade_fiel" /><br/><br/>
Estado: <input type="texte" name="estado_fiel" /><br/><br/>
CEP: <input type="int" name="cep_fiel" /><br/><br/>
<input type="submit" value="Cadastrar"  />
</td> <td><input type="button" value="Voltar" onclick="javascript: location.href='consulta_fiel.php';" />
</form>
</body>
</html>