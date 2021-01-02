<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php
$updateSQL = "DELETE FROM tbl_usrs WHERE tbl_id=".$_GET["tbl_id"];
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());
$updateSQL = "DELETE FROM tbl_pages WHERE usr_id=".$_GET["tbl_id"];
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());

header(sprintf("Location: index.php?msg=1"));
?>