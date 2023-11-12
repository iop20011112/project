<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_gm = "127.0.0.1";
$database_gm = "teaching_db";
$username_gm = "root";
$password_gm = "root";
$gm = mysql_pconnect($hostname_gm, $username_gm, $password_gm) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET UTF8");

?>