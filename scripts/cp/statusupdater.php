<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Wisdom_Mcr = "dbHost";
$database_Wisdom_Mcr = "db";
$username_Wisdom_Mcr = "dbUser";
$password_Wisdom_Mcr = "dbPass";
$Wisdom_Mcr = mysql_pconnect($hostname_Wisdom_Mcr, $username_Wisdom_Mcr, $password_Wisdom_Mcr) or trigger_error(mysql_error(),E_USER_ERROR); 
?>