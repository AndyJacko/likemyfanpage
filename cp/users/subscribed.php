<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php
if ($_GET["s"] == 0) {
  $updateSQL = "UPDATE tbl_usrs SET usr_subscribed=1 WHERE tbl_id=".$_GET["tbl_id"];
} else {
  $updateSQL = "UPDATE tbl_usrs SET usr_subscribed=0 WHERE tbl_id=".$_GET["tbl_id"];
}
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());

header(sprintf("Location: index.php"));
?>