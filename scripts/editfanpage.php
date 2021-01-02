<?php require_once('cp/connection.php'); ?>
<?php require_once('authnlogoutuser.php'); ?>
<?php require_once('cp/getvalstring.php'); ?>
<?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tbl_pages SET page_name=%s, page_url=%s, sub_id=%s WHERE tbl_id=%s",
                       GetSQLValueString(htmlspecialchars($_POST['pageName']), "text"),
                       GetSQLValueString($_POST['pageURL'], "text"),
                       GetSQLValueString($_POST['sub_id'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());

  header(sprintf("Location: /yourfanpages.php?s=2"));
}
?>