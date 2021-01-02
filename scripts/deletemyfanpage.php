<?php require_once('cp/connection.php'); ?>
<?php require_once('authnlogoutuser.php'); ?>
<?php require_once('cp/getvalstring.php'); ?>
<?php
$deleteSQL = "DELETE FROM tbl_pages WHERE tbl_id=".$_GET['id'];
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$Result1 = mysql_query($deleteSQL, $Wisdom_Mcr) or die(mysql_error());

header(sprintf("Location: /yourfanpages.php?s=3"));
?>