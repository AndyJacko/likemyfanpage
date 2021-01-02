<?php require_once('cp/connection.php'); ?>
<?php
if (isset($_GET["u"])) {
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSPageExists = "SELECT * FROM tbl_usrs WHERE usr_email = '".$_GET["u"]."'";
  $RSPageExists = mysql_query($query_RSPageExists, $Wisdom_Mcr) or die(mysql_error());
  $row_RSPageExists = mysql_fetch_assoc($RSPageExists);
  $totalRows_RSPageExists = mysql_num_rows($RSPageExists);
  mysql_free_result($RSPageExists);
  if ($totalRows_RSPageExists > 0) {
	  echo 0;
  } else {
	  echo 1;
  }
} else {
 echo 0;
}
?>