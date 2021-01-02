<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php
if ($_GET["s"] == 0) {
  $updateSQL = "INSERT INTO tbl_dead (page_id) VALUES (".$_GET["tbl_id"].")";
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());
  echo "bugicon";
} else {
  $updateSQL = "DELETE FROM tbl_dead WHERE page_id=".$_GET["tbl_id"];
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());
  echo "bugnicon";
}

?>