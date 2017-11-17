<?php
	session_start();
	$servername="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="testdata";
	mysql_connect($servername,$dbusername,$dbpassword) or die(mysql_error());
	mysql_select_db($dbname);
 ?>