<?php
$dbserver="localhost";
	$dbusername="root";
	$password="";
	$dbname="caricacan";
	mysql_connect($dbserver, $dbusername, $password) or die(mysql_error());
	mysql_select_db($dbname) or die (mysql_error());
?>
