<?php
$con = mysql_connect("dbHost","dbUser","dbPass");
mysql_select_db("db", $con);
$RSUsers = mysql_query("SELECT * FROM tbl_usrs WHERE usr_fname LIKE '".$_GET["q"]."%'");
$row_RSUsers = mysql_fetch_assoc($RSUsers);
$totalRows_RSUsers = mysql_num_rows($RSUsers);

do {
  //$popo = $popo."<span onClick='settheusername(".$row_RSUsers["tbl_id"].",".$popo.$row_RSUsers["usr_fname"]." ".$row_RSUsers["usr_sname"].")'>".$row_RSUsers["usr_fname"]." ".$row_RSUsers["usr_sname"]."</span> ";
  $popo = $popo. "<a><span onClick='settheusername(".$row_RSUsers["tbl_id"].");'>".$row_RSUsers["usr_fname"]." ".$row_RSUsers["usr_sname"]."</span></a> ";
} while ($row_RSUsers = mysql_fetch_assoc($RSUsers));

mysql_free_result($RSUsers);
echo $popo;
?>