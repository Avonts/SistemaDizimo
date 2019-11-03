<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
ini_set('display_errors', 1);

/*$hostname_conexao = "localhost";
$database_conexao = "sistemapdv";
$username_conexao = "root";
$password_conexao = "";*/

$host = "localhost";
$user = "root";
$pass = "";
$banco = "sistemadedizimo";

$conexao = mysql_connect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db('sistemadedizimo');
?>